<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../NEMs_Controller.php');

Class Import extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->temp_import_db = $this->load->database('temp_testreult_import', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $this->dbforgetwo = $this->load->dbforge($this->temp_import_db, TRUE);
        
        $newdata = array(
            'username'  => 'dream07312'
        );
        $this->session->set_userdata($newdata);
    }

    public function index(){
        $this->output('testresult/v_import');
    }

    function file_selected_test(){
        $this->form_validation->set_message('file_selected_test', '<small class="text-danger">กรุณาอัพโหลดไฟล์</small>');
        if (empty($_FILES['tresult_import_file']['name'])) {
                return FALSE;
            }else{
                return TRUE;
            }
        }



    public function importaction(){

        $config['upload_path']  = './uploads/upload_testresult';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['encrypt_name'] = true;
        $this->load->library('upload',$config);
        $this->load->library('testresult/excel');


        

        $this->form_validation->set_rules('tresult_import_type', 'ประเภทการสอบ', 'required',
                array('required' => '<small class="text-danger">กรุณาเลือก%s</small>')
        );
        $this->form_validation->set_rules('tresult_import_test_round', 'ครั้งที่สอบ / ปีการศึกษา', 'required',
                array('required' => '<small class="text-danger">กรุณาเลือก%s</small>')
        );

      $this->form_validation->set_rules('tresult_import_subject', 'เลือกรายวิชาผลคะแนนสอบ', 'required',
                array('required' => '<small class="text-danger">กรุณาเลือก%s</small>')
        );

        $this->form_validation->set_rules('tresult_import_file', 'อัพโหลดไฟล์', 'callback_file_selected_test');

        if ($this->form_validation->run() == FALSE)
        {
             $this->output('testresult/v_import');
            
        }else{

         $uploadData = $this->uploadProcess('tresult_import_file');
         $mockTable = $this->readExcel($uploadData['path']);

            $data['tresult_import'] = [
                "tresult_import_type"    => $this->input->post("tresult_import_type"),
                "tresult_import_test_round"   => $this->input->post("tresult_import_test_round"),
                "tresult_import_subject" => $this->input->post("tresult_import_subject"),
                "file_name" =>  $uploadData['file_name'],
                "path" => $uploadData['path'],
                "sheetData" => $this->temp_import_db->get($mockTable['table_name'])->result(),
                "table_name" => $mockTable['table_name'] ,
                "table_column" => $mockTable['table_column'] ,
            ];
            $this->output('testresult/v_importpreview' , $data);

            
        } // end else form_validation as TRUE
    
    } // end validation

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

    private function readExcel($pathFile){
        // config phpexcel Reder
        $inputFileType = PHPExcel_IOFactory::identify($pathFile);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $sheetData = $objReader->load($pathFile)->getActiveSheet()->toArray(true,true,true,true);  
        // column by form 
        $table_column  = [  $sheetData[1]["A"] ,  $sheetData[1]["B"] ,  $sheetData[1]["C"] ,  $sheetData[1]["D"] ,  $sheetData[1]["E"]  ];

        $fields = array(
                $sheetData[1]["A"]  => array(
                    'type' => 'VARCHAR',
                    'constraint' => 20,
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
                )
                // $sheetData[1]["F"]  => array(
                //     'type' =>'VARCHAR',
                //     'constraint' => '255'
                // )
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
                        // $table_column[5] => $row['F']
                    );
                    $this->temp_import_db->insert($table_name , $data);
                }
            }
            $array_data = array('table_name' => $table_name ,  'table_column' => $table_column );
            return $array_data;
    } //readExcel

    private function uploadProcess($import_name){
            if($this->upload->do_upload($import_name)) {
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];  
                $fileName = $data['upload_data']['file_name']; 
                $array_data = array( 'status' => TRUE ,  'file_name' => $fileName  , 'path' => $path  );
                return  $array_data;
            }else{
                $message_upload =  $this->upload->display_errors();
                $array_data = array( 'status' => FALSE  , 'msg_error' => $message_upload );
                return $array_data;
                // $this->output('testresult/v_import' , $data);
            }
    } // end uploadProcess

}