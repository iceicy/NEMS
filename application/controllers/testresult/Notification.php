<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../NEMs_Controller.php');


require_once APPPATH.'/third_party/testresult/PHPMailer/PHPMailerAutoload.php';

Class Notification extends NEMs_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $sql = 'SELECT tb_scores_tresult.student_id,  tb_student_tresult.first_name , tb_student_tresult.last_name 
                , tb_exam_type_tresult.type_name , tb_scores_tresult.score_test_round , tb_scores_tresult.type_id ,
                 tb_subjects_tresult.subject_name , tb_scores_tresult.subject_id , tb_email_tresult.email_name , tb_email_tresult.email_id
                FROM tb_scores_tresult
                INNER JOIN tb_email_tresult
                ON  tb_scores_tresult.student_id=tb_email_tresult.student_id
                INNER JOIN tb_student_tresult
                ON tb_scores_tresult.student_id=tb_student_tresult.student_ID
                INNER JOIN tb_exam_type_tresult
                ON tb_scores_tresult.type_id=tb_exam_type_tresult.type_id
                INNER JOIN tb_subjects_tresult
                ON tb_scores_tresult.subject_id=tb_subjects_tresult.subject_id
                ';
        $data ['all_score_individual'] = $this->db->query($sql)->result_array();
        $this->output('testresult/v_notification',$data);
    }


    public function individualviewReport($student_id , $type_id , $subject_id , $score_test_round){

          $sql = 'SELECT tb_scores_tresult.student_id,  tb_student_tresult.first_name , tb_student_tresult.last_name 
                , tb_exam_type_tresult.type_name , tb_scores_tresult.score_test_round , tb_scores_tresult.type_id ,
                 tb_subjects_tresult.subject_name , tb_scores_tresult.subject_id , tb_scores_tresult.score_point ,
                 tb_scores_tresult.score_remark
                FROM tb_scores_tresult
                INNER JOIN tb_student_tresult
                ON tb_scores_tresult.student_id=tb_student_tresult.student_ID
                INNER JOIN tb_exam_type_tresult
                ON tb_scores_tresult.type_id=tb_exam_type_tresult.type_id
                INNER JOIN tb_subjects_tresult
                ON tb_scores_tresult.subject_id=tb_subjects_tresult.subject_id
                WHERE  tb_scores_tresult.student_id ="'.$student_id.'"
                AND tb_scores_tresult.type_id = '.$type_id.'
                AND tb_scores_tresult.subject_id = '.$subject_id.'
                AND tb_scores_tresult.score_test_round = '.$score_test_round.'';
    
        $data['result'] = $this->db->query($sql)->row_array();
        $html = $this->load->view('testresult/ReportTemplate/report1', $data, true); 
        $this->load->library('testresult/PdfGenerator');
        $pdf = new PdfGenerator();
        $pdf->GenPdfWithHtml($html);
    }


    public function sendEmail(){

        

        $sql = 'SELECT tb_scores_tresult.student_id,  tb_student_tresult.first_name , tb_student_tresult.last_name 
                , tb_exam_type_tresult.type_name , tb_scores_tresult.score_test_round , tb_scores_tresult.type_id ,
                 tb_subjects_tresult.subject_name , tb_scores_tresult.subject_id , tb_scores_tresult.score_point ,
                 tb_scores_tresult.score_remark
                FROM tb_scores_tresult
                INNER JOIN tb_student_tresult
                ON tb_scores_tresult.student_id=tb_student_tresult.student_ID
                INNER JOIN tb_exam_type_tresult
                ON tb_scores_tresult.type_id=tb_exam_type_tresult.type_id
                INNER JOIN tb_subjects_tresult
                ON tb_scores_tresult.subject_id=tb_subjects_tresult.subject_id
                WHERE  tb_scores_tresult.student_id ="'.$this->input->post("student_id").'"
                AND tb_scores_tresult.type_id = '.$this->input->post("type_id").'
                AND tb_scores_tresult.subject_id = '.$this->input->post('subject_id').'
                AND tb_scores_tresult.score_test_round = '.$this->input->post("score_test_round").'';
    
        $data['result'] = $this->db->query($sql)->row_array();
        $html = $this->load->view('testresult/ReportTemplate/emailTemplate', $data, true); 
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "dream07312@gmail.com";
        $mail->Password = "023341432";
        $mail->setFrom('dream07312@gmail.com', 'NEMS Administrator');
        $mail->addAddress('dream07312@gmail.com', $this->input->post('name'));
        $mail->Subject = '[NEMs] แจ้งผลสอบคะแนนการสอบ-'.$data['result']['type_name'].'-'.$data['result']['subject_name'];
        $mail->msgHTML($html);
        if (!$mail->send()) {
            echo "error";
        } else {
            echo "success";
        }
    }
    
    
}