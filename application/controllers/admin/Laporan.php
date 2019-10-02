<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends MY_Controller {

    public function __construct()
	{
		parent::__construct();		
		$this->load->model('Murid_model', 'murid');
    }

    public function export()
    {
        $this->load->library('excel');

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $object->setActiveSheetIndex(0);

        $table_columns = array("No", "Nama Murid", "Kelas");

        $column = 0;

        foreach($table_columns as $field){

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;

        }

        $murid = $this->murid->cari_semua_array();

        $excel_row = 2;

        $no = 1;

        foreach($murid as $row){

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $no++);

            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nama_murid']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['nama_kelas']);

            $excel_row++;

        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="Employee Data.xls"');

        $object_writer->save('php://output');

    }

}
    
	

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */