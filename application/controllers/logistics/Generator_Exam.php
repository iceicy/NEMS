<?php
/**
 * User: Developer Jirayus
 * Date: 5/5/2560
 * Time: 22:47
 */


include_once('Logistics_Controllers.php');

Class Generator_Exam extends Logistics_Controllers
{
    function __construct()
    {
        parent::__construct();
    }

    function index($id = "")
    {
        $this->load->model($this->config->item('lg_dir') . 'M_Other', 'ot');
        $this->load->model($this->config->item('lg_dir') . 'M_mapping_exam', 'me');
        /**
         * DropDown
         */
        $this->data['op_year'] = $this->ot->get_option_year();
        $this->data['op_location'] = $this->ot->get_option_location();
        $this->data['op_subject'] = $this->ot->get_option_subject();
        $this->data['op_typeexam'] = $this->ot->get_option_typeexam();
        /**
         * Set Default Value
         */
        $this->data['header_name'] = "สร้างรหัสประจำชุดรายวิชาที่สอบ";
        $this->data['val_year'] = date('Y');
        $this->data['val_location'] = "";
        $this->data['val_subject'] = "";
        $this->data['val_typeexam'] = "";
        $this->data['val_numberExam'] = 1;
        $this->data['val_mapId'] = '';
        if ($id != "") {
            $val = $this->me->get_by_id($id);
            $this->data['val_year'] = $val->Year;
            $this->data['val_location'] = $val->LocID.'|'.$val->LocSeqNo;
            $this->data['val_subject'] = $val->SubID;
            $this->data['val_typeexam'] = $val->TypeID;
            $this->data['val_numberExam'] = $val->numberExam;
            $this->data['val_mapId'] = $val->mapId;
            $this->data['header_name'] = "แก้ไขข้อมูลรหัสประจำชุดรายวิชาที่สอบ";
        }
        /**
         * Value In Table
         */
        $this->data['data_tables'] = $this->me->get_data_mapping();

        $this->output($this->config->item('lg_dir') . 'genaretor_exam/' . 'v_main');
    }

    function action()
    {
        $this->load->model($this->config->item('lg_dir') . 'M_mapping_exam', 'me');

        $data_insert = array();

        $data_insert['Year'] = $this->input->post('Year');
        $data_insert['TypeID'] = $this->input->post('TypeID');
        $data_insert['SubID'] = $this->input->post('SubID');
        $tp_location = explode('|', $this->input->post('tb_location'));
        $LocID = $tp_location[0];
        $LocSeqNo = $tp_location[1];
        $data_insert['LocID'] = $LocID;
        $data_insert['LocSeqNo'] = $LocSeqNo;

        $data_insert['numberExam'] = $this->input->post('numberExam');

        $data_insert['GenaratorCode'] = $data_insert['Year'] . $data_insert['TypeID']
            . $data_insert['SubID'] . $LocID . $data_insert['numberExam'];
        if($this->input->post('mapId') != ""){
            $this->me->update($this->input->post('mapId'),$data_insert);
        }else {
            $this->me->insert($data_insert);
        }
        redirect($this->config->item('lg_dir') . 'Generator_Exam/index');
    }

    function delete($id)
    {
        $this->load->model($this->config->item('lg_dir') . 'M_mapping_exam', 'me');
        $this->me->delete($id);
        redirect($this->config->item('lg_dir') . 'Generator_Exam/index');
    }

    function barcode($code)
    {
        //load library
        $this->load->library('Zend');
        //load in folder Zend Barcode
        $this->zend->load('Zend/Barcode');
        //generate barcode
        Zend_Barcode::render('code128', 'image', array('text' => $code), array());
    }
}