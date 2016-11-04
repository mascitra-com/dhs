<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function __construct() {
		parent::__construct();
		require_once APPPATH . 'libraries/PHPExcel.php';
		include_once APPPATH . 'libraries/PHPExcel/Writer/PDF.php';
		$this->load->model(array('barang_m', 'kategori_m'));
	}

	/**
	 * @param $type
	 * Excel5 untuk export Excel
	 * PDF untuk export PDF
	 */
	public function katalog() {
		$this->db->select("concat(b.kode_kategori, '.', b.id) AS kodeBarang, b.nama AS NamaBarang, b.merk, b.tipe, b.ukuran, b.satuan, b.hargaPasar, b.biayaKirim, b.resistensi, b.ppn, b.hargashsb, b.keterangan, b.spesifikasi, k.nama AS KategoriBarang");
		$this->db->from('barang b');
		$this->db->join('kategori k', 'b.kode_kategori = k.kode_kategori');
		$query = $this->db->get();
		$this->exportKatalog($query, 'excel5'); // Gunakan excel5 untuk Export Excel dan pdf untuk dalam bentuk PDF
	}

	/**
	 * Fungsi untuk mencetak ke katalog
	 * @param $query
	 * @param $type
	 * @return bool
	 */
	private function exportKatalog($query, $type) {
		if (!$query) {
			return false;
		}
		if ($type === 'pdf') {
			$rendererName = PHPExcel_Settings::PDF_RENDERER_DOMPDF;
			$rendererLibrary = 'domPDF';
			$rendererLibraryPath = APPPATH . 'libraries/' . $rendererLibrary;
			if (!PHPExcel_Settings::setPdfRenderer(
				$rendererName,
				$rendererLibraryPath
			)
			) {
				die(
					'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
					PHP_EOL .
					'at the top of this script as appropriate for your directory structure'
				);
			}
			$extention = '.pdf';
		} else {
			$extention = '.xls';
		}
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setTitle(ucfirst('export'))->setDescription("none");

		$objPHPExcel->setActiveSheetIndex(0);

		// Menentukan nama kolom tabel
		$fields = $query->list_fields();
		$headTable = array('No', 'Kode Barang', 'Nama Barang', 'Merk', 'Tipe', 'Ukuran', 'Satuan', 'Harga Pasar', 'Biaya Kirim', 'Resistensi', 'PPn', 'Harga SHSB', 'Keterangan', 'Spesifikasi', 'Kategori');
		$col = 0;
		$styleArray = array(
			'font' => array(
				'bold' => true,
			));
		for ($i = 0; $i < 15; $i++) {
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $headTable[$i]);
			$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, 1)->applyFromArray($styleArray);
			$col++;
		}

		// Mengambil data dari tabel excel
		$row = 2;
		foreach ($query->result() as $data) {
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $row - 1);
			$col = 1;
			foreach ($fields as $field) {
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, strip_tags($data->$field));
				$col++;
			}
			$row++;
		}

		$objPHPExcel->setActiveSheetIndex(0);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $type);

		// Sending headers to force the user to download the file
		header("Content-type: text/html; charset=utf-8");
		header('Content-Disposition: attachment;filename="Katalog_' . date('d-M-y h:ia') . $extention . '"');
		header('Cache-Control: max-age=0');

		return $objWriter->save('php://output');
	}
}
