<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller
{

    public function __construct()
    {
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
    public function katalog($type)
    {
        $this->db->select('barang.nama AS NamaBarang, barang.merk, barang.tipe, barang.spesifikasi, barang.hargaPokok, barang.hargaSatuan, kategori.nama AS KategoriBarang, users.first_name, users.last_name');
        $this->db->from('barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id');
        $this->db->join('users', 'barang.createdBy = users.id');
        $query = $this->db->get();
        $this->exportKatalog($query, $type);
    }

    /**
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

        // Field names in the first row
        $fields = $query->list_fields();
        $headTable = array('Nama Barang', 'Merk', 'Tipe', 'Spesifikasi', 'Harga Pokok', 'Harga Satuan', 'Kategori', 'Nama Depan Pemesan', 'Nama Belakang Pemesan');
        $col = 0;
        $styleArray = array(
            'font' => array(
                'bold' => true
            ));
        for ($i = 0; $i < 9; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $headTable[$i]);
            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, 1)->applyFromArray($styleArray);
            $col++;
        }

        // Fetching the table data
        $row = 2;
        foreach ($query->result() as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
            $row++;
        }

        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $type);

        // Sending headers to force the user to download the file
        header("Content-type: text/html; charset=utf-8");
        header('Content-Disposition: attachment;filename="Katalog_' . date('d-M-y h:ia') . $extention. '"');
        header('Cache-Control: max-age=0');

        $objWriter->save('php://output');
    }

    /**
     * @param
     * Excel5 untuk export Excel
     * PDF untuk export PDF
     */
    public function kategori($type)
    {
        $query = $this->db->get('kategori');
        $this->exportKategori($query, $type);
    }

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

        // Field names in the first row
        $fields = $query->list_fields();
        $headTable = array('ID Kategori', 'Nama Kategori');
        $col = 0;
        $styleArray = array(
            'font' => array(
                'bold' => true
            ));
        for ($i = 0; $i < 2; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $headTable[$i]);
            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, 1)->applyFromArray($styleArray);
            $col++;
        }

        // Fetching the table data
        $row = 2;
        foreach ($query->result() as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
            $row++;
        }

        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $type);

        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Kategori_' . date('d-M-y h:ia') . $extention. '"');
        header('Cache-Control: max-age=0');

        $objWriter->save('php://output');
    }
}
