<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../NEMs_Controller.php');

Class Import extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        // mock up user session 
        $newdata = array(
            'username'  => 'dream07312'
        );
        $this->session->set_userdata($newdata);
        $this->temp_import_db = $this->load->database('temp_testreult_import', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->dbforgetwo = $this->load->dbforge($this->temp_import_db, TRUE);

    }

    public function index(){
         $this->output('testresult/import');
    }

    public function importaction(){

        if($this->input->post("tresult_import_submit")){
            $config['upload_path']  = './uploads/upload_testresult';
            $config['allowed_types'] = 'xls|xlsx|csv';
            $config['encrypt_name'] = true;
            $this->load->library('upload' ,  $config);
            $this->load->library('testresult/excel');

            if($this->upload->do_upload('tresult_import_file')) {

                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];  
                $fileName = $data['upload_data']['file_name'];  
                // config phpexcel Reder
                // $objReader = PHPExcel_IOFactory::load($path);
                // $sheetData = $objReader->getActiveSheet()->toArray(true,true,true,true);   
                $inputFileType = PHPExcel_IOFactory::identify($path);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $sheetData = $objReader->load($path)->getActiveSheet()->toArray(true,true,true,true);  




                // column by form 
                $table_column  = [  $sheetData[1]["A"] ,  $sheetData[1]["B"] ,  $sheetData[1]["C"] ,  $sheetData[1]["D"] ,  $sheetData[1]["E"] ,  $sheetData[1]["F"]  ];



                $fields = array(
                       $sheetData[1]["A"]  => array(
                            'type' => 'INT',
                            'constraint' => 13,
                        ),
                       $sheetData[1]["B"]  => array(
                            'type' =>'VARCHAR',
                            'constraint' => '255'
                        ),
                        $sheetData[1]["C"]  => array(
                            'type' =>'VARCHAR',
                            'constraint' => '255'
                        ),
                        $sheetData[1]["D"]  => array(
                            'type' =>'VARCHAR',
                            'constraint' => '255'
                        ),
                        $sheetData[1]["E"]  => array(
                            'type' =>'VARCHAR',
                            'constraint' => '255'
                        ),
                        $sheetData[1]["F"]  => array(
                            'type' =>'VARCHAR',
                            'constraint' => '255'
                        )
                    );
                    $time_current =  date("Y-m-d_H-i-s");
                    $this->dbforgetwo->add_field($fields);

        $table_name = 'tresult_import_'.$this->session->userdata['username'].'_'.$time_current;
        $this->dbforgetwo->create_table('tresult_import_'.$this->session->userdata['username'].'_'.$time_current , TRUE);


                    foreach ($sheetData as $key => $row) {
                        if($key != 1){
                            $row;
                         foreach ($row as $key => $field) {
                                $temp  = array( $key => $field );
                                array_push($row, $temp); 
                          }
                              $data = array( 
                                $table_column[0] => $row['A'],
                                $table_column[1] => $row['B'],
                                $table_column[2] => $row['C'],
                                $table_column[3] => $row['D'],
                                $table_column[4] => $row['E'],
                                $table_column[5] => $row['F']
                             );
                             $this->temp_import_db->insert($table_name , $data);
                         }
                     }

                    $data['sheetData']  =  $this->temp_import_db->get($table_name)->result();
                    $data['fileName'] = $fileName;
                    $data['table_name'] = $table_name;
                    $data['table_column'] = $table_column;
                    $this->output('testresult/import' , $data);

            }else{
                $data['message_upload'] =  $this->upload->display_errors();
                $this->output('testresult/import' , $data);
            }
        }else{
            redirect('testresult/import');
        }
    }




	public function CompleteImport(){
	 	// move from temp to database
        if($this->input->post("tresult_import_confirm")){

            echo "success import to nems database";

        }else if($this->input->post("tresult_import_cancel")){

            $table_name = $this->input->post("table_name");
            $fileName = $this->input->post("fileName");
            $this->dbforgetwo->drop_table($table_name,TRUE);
            $path = FCPATH."/uploads/upload_testresult/".$fileName;
            if(file_exists($path)){
                unlink($path);
                redirect('testresult/import');
            }
        }else{
                // import to nems database , In case success !
                redirect('testresult/import');
        }

    }


  public function test()
    {                          
        echo phpinfo();
    }

    

}