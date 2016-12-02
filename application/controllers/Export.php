<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends MY_Controller
{
    private $filename;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
        require_once APPPATH . 'libraries/PHPExcel.php';
        include_once APPPATH . 'libraries/PHPExcel/Writer/PDF.php';
        include_once APPPATH . 'libraries/PHPExcel/Writer/Excel5.php';
        $this->load->model(array('barang_m', 'kategori_m'));
    }

    /**
     * @param $type
     * Excel5 untuk export Excel
     * PDF untuk export PDF
     */
    public function katalog($type = 'excel5')
    {
        $this->db->select("concat(b.kode_kategori, '.', b.id) AS kodeBarang, b.nama AS NamaBarang, b.merk, b.tipe, b.ukuran, b.satuan, b.hargaPasar, b.biayaKirim, b.resistensi, b.ppn, b.hargashsb, b.keterangan, b.spesifikasi, k.nama AS KategoriBarang");
        $this->db->from('barang b');
        $this->db->join('kategori k', 'b.kode_kategori = k.kode_kategori');
        $query = $this->db->get();
        $this->exportKatalog($query, $type); // Gunakan excel5 untuk Export Excel dan pdf untuk dalam bentuk PDF
        $this->addTemp($this->getPath() . $this->filename);
        force_download($this->getPath() . $this->filename, NULL);
    }

    /**
     * Fungsi untuk mencetak ke katalog
     * @param $query
     * @param $type
     * @return bool
     */
    private function exportKatalog($query, $type)
    {
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
        $this->printReady($objPHPExcel);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
        // Menentukan nama kolom tabel
        $fields = $query->list_fields();
        $this->kop($objPHPExcel, "STANDART HARGA SATUAN BARANG", 1);
        $this->kop($objPHPExcel, "KEBUTUHAN PEMERINTAH KABUPATEN LUMAJANG", 2);
        $this->kop($objPHPExcel, "TAHUN ANGGARAN ".date('Y'), 3);
        $headTable = array('No', 'Kode Barang', 'Nama Barang', 'Merk', 'Tipe', 'Ukuran', 'Satuan', 'Harga Pasar', 'Biaya Kirim', 'Resistensi', 'PPn', 'Harga SHSB', 'Keterangan', 'Spesifikasi', 'Kategori');
        $col = 0;
        $styleArray = array(
            'font' => array(
                'bold' => true,
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ));
        for ($i = 0; $i < 15; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 5, $headTable[$i]);
            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, 5)->applyFromArray($styleArray);
            $col++;
        }

        // Mengambil data dari tabel excel
        $row = 6;
        foreach ($query->result() as $data) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $row - 1);
            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow(0, $row)->applyFromArray($styleArray);
            $col = 1;
            foreach ($fields as $field) {
                $objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($col, $row, strip_tags($data->$field));
                $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, $row)->applyFromArray($styleArray);
                $col++;
            }
            $row++;
        }

        $objPHPExcel->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $type);

        $this->filename ="Katalog_" . date('dmYhis') . $extention;
        return $objWriter->save($this->getPath(). $this->filename);
    }

    /**
     * @param $type
     * Excel5 untuk export Excel
     * PDF untuk export PDF
     */
    public function kategori()
    {
        $this->db->select("CAST(k.kode_kategori AS char), k.nama, CAST(ik.nama AS char)");
        $this->db->from('kategori k');
        $this->db->join('kategori ik', 'k.kode_induk_kategori = ik.kode_kategori');
        $query = $this->db->get();
        $this->exportKategori($query, 'excel5'); // Gunakan excel5 untuk Export Excel dan pdf untuk dalam bentuk PDF
        force_download($this->getPath() . $this->filename, NULL);
        $this->addTemp($this->getPath(). $this->filename);
    }

    /**
     * Fungsi untuk mencetak ke katalog
     * @param $query
     * @param $type
     * @return bool
     */
    private function exportKategori($query, $type)
    {
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
        $this->printReady($objPHPExcel);
        // Menentukan nama kolom tabel
        $fields = $query->list_fields();
        $headTable = array('No', 'Kode Kategori', 'Nama Kategori', 'Kategori Induk');
        $col = 0;
        $styleArray = array(
            'font' => array(
                'bold' => true,
            ));
        for ($i = 0; $i < 4; $i++) {
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
                $objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($col, $row, strip_tags($data->$field));
                $col++;
            }
            $row++;
        }

        $objPHPExcel->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $type);

        $this->filename ="Kategori_" . date('dmYhis') . $extention;
        return $objWriter->save($this->getPath(). $this->filename);
    }

    public function printReady($objPHPExcel)
    {
        $objPHPExcel->getActiveSheet()->getPageMargins()->setTop(1);
        $objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.75);
        $objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
        $objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(1);
    }

    /**
     * @param $objPHPExcel
     */
    private function kop($objPHPExcel, $text, $row)
    {
        $sheet = $objPHPExcel->getActiveSheet();
        $sheet->setCellValueByColumnAndRow(0, $row, $text);
        $sheet->mergeCells('A'.$row.':O'.$row);
        $style = array(
            'font' => array(
                'bold' => true,
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
        $sheet->getStyle('A'.$row.':O'.$row)->applyFromArray($style);
    }
}
