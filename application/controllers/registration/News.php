<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once dirname(__FILE__).'/../NEMs_Controller.php';
/*require_once('../NEMs_Controller.php');*/
///Applications/MAMP/htdocs/NEMs/application/controllers/registration
class News extends NEMs_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration/rg_form','form');
    }
    public function form()
    {
        $data['form'] = null;
        $this->output('registration/news/form',$data);
    }

    public function form_edit()
    {
        $news_id = $this->input->post('news_id');
        $access_level = $this->input->post('access_level');
        $topic = $this->input->post('topic');
        $description = $this->input->post('description');
        $content = $this->input->post('content');
        $picture = ""; //$this->input->post('picture');
        $priority = $this->input->post('priority');
        $start_date = $this->input->post('start_date');
        $st_date = date('Y-m-d', strtotime(str_replace('/', '-', $start_date)));
        $end_date = $this->input->post('end_date');
        $en_date = date('Y-m-d', strtotime(str_replace('/', '-', $end_date)));
        $create_date = date("Y-m-d H:i:s");
        $pin = $this->input->post('pin');
        if($pin == null) {
            $pin = 0;
        } else {
            $pin = 1;
        }
//=====================================================
        $config['upload_path']= "./uploads/registration/news/";
        $config['allowed_types']='png|jpg|gif';
        //$cofig['max_size']='1000';
        //$cofig['max_width']='1024';
        //$cofig['max_height']= '768';
        
        $extension = explode(".", $_FILES['picture']['name']);;
        $file_name = date("Ymd_His")."-".md5($_FILES['picture']['name']).".".end($extension);
        $config['file_name']= $file_name;
        $img_path = $config['upload_path']."/".$file_name;  

        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('picture'))
        {
            $error = array('error'=>$this->upload->display_errors());
            // var_dump($error);
        }
        else
        {
            $data = array('upload_data'=>$this->upload->data());
            $picture = $data['upload_data']['file_name'];
            // $picture = $img_path;
            // $this->img->img_name    =   $data['upload_data']['file_name'];
            // $this->img->img_path    =   $img_path;
            // $this->img->img_eqs_id  =   $eqs->last_insert_id;
            // $img->insert();
        }
        // die;
//=====================================================

        if($news_id != null) {
            $this->form->update_tb_news($access_level,$topic,$description,$content,$picture,$priority,$create_date,$st_date,$en_date,$pin,$news_id);
        }
        else {
            $this->form->insert_tb_news($access_level,$topic,$description,$content,$picture,$priority,$create_date,$st_date,$en_date,$pin);
            $news_id = $this->db->insert_id();
        }
        $data['alert'] =  '<script>sweetAlert("บันทึกสำเร็จ","","success");</script>';
        $qu_form = $this->form->get_by_key($news_id)->result_array(); 
        $data['form'] = array_shift($qu_form);
        $this->output('registration/news/form',$data);
        // redirect("registration/news/form");
    }
    public function list()
    {
        $this->output('registration/news/list');
    }
    public function listview()
    {
        $data['qu_first_news'] = $this->form->get_first_news();
        $data['qu_news_more'] = $this->form->get_news_more();
        $data['qu_first_news_pin'] = $this->form->get_first_news_pin();
        $data['qu_news_pin_more'] = $this->form->get_news_pin_more();

        $this->output('registration/news/listview',$data);
    }

    public function listview_more()
    {
        $data['qu_news_more'] = $this->form->get_news_more();
        $data['qu_news_pin_more'] = $this->form->get_news_pin_more();

        $this->output('registration/news/listview_moredetail',$data);
    }

    public function listview2()
    {
        $data['qu_first_news'] = $this->form->get_first_news();
        $this->output('registration/news/listview2',$data);
    }

    /*
     * แสดงรายละเอียดข่าว
     */
    public function topic_detail($news_id)
    {
        $this->form->news_ID = $news_id;
        $rs_news = $this->form->get_news();
        if($rs_news->num_rows()>0){
            $data['rs_news'] = $rs_news->row();
            $this->output('registration/news/topic_detail',$data);
        }else{
            redirect('registration/news/listview');
        }

    }
        //$this->_print($this->session->userdata());
        $this->output('registration/news/listview');
    }
    public function _print($mval = '')
    {
        if ($mval) {
            echo '<pre>';
            print_r($mval);

            echo '</pre>';
        }
    }
            echo '</pre>12334';
        }
    }

}
