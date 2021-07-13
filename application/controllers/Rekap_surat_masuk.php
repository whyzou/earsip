<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require(APPPATH . 'vendor/autoload.php');


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// End load library phpspreadsheet

class Rekap_surat_masuk extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_surat_masuk');
        $this->load->model('Security');
        $this->Security->Cek();
        $this->Security->level(2);
    }

    //export bpjs ke excel
    public function exportSuratMasuk($mulai = TANGGAL_AWAL_TAHUN, $akhir = TANGGAL_AKHIR_TAHUN)
    {


        $surat_masuk = $this->M_surat_masuk->export($mulai, $akhir);
        $filename = 'Rekap Surat Masuk (' . date('d-m-Y', strtotime($mulai)) . ' - ' . date('d-m-Y', strtotime($akhir)) . ').xlsx';


        $jumlah_data = count($surat_masuk);

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator($this->session->userdata('nama'))
            ->setLastModifiedBy($this->session->userdata('nama'))
            ->setTitle('Surat Masuk')
            ->setSubject('Surat Masuk')
            ->setDescription('Surat Masuk')
            ->setCategory('suratmasuk');

        //add some style
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10);

        // title
        $spreadsheet->getActiveSheet()->mergeCells('A1:I1');
        $spreadsheet->getActiveSheet()->mergeCells('A2:I2');
        $spreadsheet->getActiveSheet()->mergeCells('A3:I3');
        $spreadsheet->getActiveSheet()->mergeCells('A4:I4');

        // header table
        $spreadsheet->getActiveSheet()->mergeCells('A5:A6');
        $spreadsheet->getActiveSheet()->mergeCells('B5:B6');
        $spreadsheet->getActiveSheet()->mergeCells('C5:C6');
        $spreadsheet->getActiveSheet()->mergeCells('D5:D6');
        $spreadsheet->getActiveSheet()->mergeCells('E5:E6');
        $spreadsheet->getActiveSheet()->mergeCells('F5:F6');
        $spreadsheet->getActiveSheet()->mergeCells('G5:G6');
        $spreadsheet->getActiveSheet()->mergeCells('H5:H6');
        $spreadsheet->getActiveSheet()->mergeCells('I5:I6');



        //title
        $spreadsheet->getActiveSheet()->getStyle('A1:I1')
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A1:I1')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A2:I2')
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A2:I2')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A3:I3')
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A3:I3')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A5:I5')
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A5:I5')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A5:I5')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFD9DBDA');

        $spreadsheet->getActiveSheet()->getStyle('A7:I' . (6 + $jumlah_data))
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A7:I' . (6 + $jumlah_data))
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT)->setWrapText(true);


        //table style

        $styleArray = [
            'font' => [
                'bold' => true,
            ],

        ];

        $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);

        $styleBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],

            ],
        ];
        $spreadsheet->getActiveSheet(0)->getStyle('A5:I' . (6 + $jumlah_data))->applyFromArray($styleBorder);


        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'BUKU AGENDA SURAT MASUK')
            ->setCellValue('A2', $surat_masuk[0]['pNama'])
            ->setCellValue('A3', $surat_masuk[0]['alamat']);



        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A5', 'No.')
            ->setCellValue('B5', 'Tanggal Terima')
            ->setCellValue('C5', 'Nomor dan Tanggal Surat')
            ->setCellValue('D5', 'Perihal')
            ->setCellValue('E5', 'Nama dan Alamat Pengirim')
            ->setCellValue('F5', 'Lampiran')
            ->setCellValue('G5', 'Kode')
            ->setCellValue('H5', 'Keterangan')
            ->setCellValue('I5', 'Pengelola');

        // Miscellaneous glyphs, UTF-8
        $no = 0;
        $i = 7;
        foreach ($surat_masuk as $sm) {
            $no++;

            $tanggal_masuk = tanggal_indonesia($sm['tanggal_masuk']);
            $tanggal_surat = tanggal_indonesia($sm['tanggal_surat']);


            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $no)
                ->setCellValue('B' . $i, $tanggal_masuk)
                ->setCellValue('C' . $i, $sm['nomor_surat'] . ', ' . $tanggal_surat)
                ->setCellValue('D' . $i, $sm['perihal'])
                ->setCellValue('E' . $i, $sm['pengirim'] . ', ' . $sm['alamat_pengirim'])
                ->setCellValue('F' . $i, $sm['lampiran'])
                ->setCellValue('G' . $i, $sm['kode'])
                ->setCellValue('H' . $i, $sm['keterangan'])
                ->setCellValue('I' . $i, $sm['registrar']);
            $i++;
        }



        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Rekap Surat Masuk');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"" . $filename . "\"");
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);
        exit;
    }
}
