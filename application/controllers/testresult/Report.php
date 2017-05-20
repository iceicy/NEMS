<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (__DIR__.'/../NEMs_Controller.php');

Class Report extends NEMs_Controller{


    function __construct()
    {
        parent::__construct();
        $this->load->model('testresult/ProvincesReportModel', 'provincesReportModel');
    }

    // หน้าหลัก dashboard
    public function index(){
        $this->load->model('testresult/DashboardsReportModel', 'dashboardsReportModel');

        $getTotalOfStudentsAllType = $this->dashboardsReportModel->getTotalOfStudentsAllType();
        $dataRenderGraphPie = '';
        foreach($getTotalOfStudentsAllType as $key => $value) {
            $dataRenderGraphPie .= "['".$value['type_name']."',".$value['count_type_id']."],";
        }   

        $getStudentOfSubject = $this->dashboardsReportModel->getStudentOfSubject();
        $dataRenderGraphColumn = '';
        foreach($getStudentOfSubject as $key => $value) {
            $dataRenderGraphColumn .= "['".$value['subject_name']."',".$value['student_id']."],";
        }

        $getExamTypePerformance = $this->dashboardsReportModel->getExamTypePerformance();
        // echo '<pre>'; print_r($getStudentOfSubject); echo "</pre>"; die();
        $dataRenderGraphBar = '';
        foreach($getExamTypePerformance as $key => $value) {
            $dataRenderGraphBar .= "['".$value['subject_name']."',".$value['score_point'].",'".$value['color']."'"."],";
        }
        // echo '<pre>'; print_r($dataRenderGraphColumn); echo "</pre>"; die();   

        $data['dataRenderGraphPie'] = $dataRenderGraphPie;
        $data['dataRenderGraphColumn'] = $dataRenderGraphColumn;
        $data['dataRenderGraphBar'] = $dataRenderGraphBar;
        $this->output('testresult/v_dashboard', $data);
    }

    public function dashboardexportpdf(){
        $this->load->model('testresult/DashboardsReportModel', 'dashboardsReportModel');
        $getTotalOfStudentsAllType = $this->dashboardsReportModel->getTotalOfStudentsAllType();
        $dataRenderGraphPie = '';
        foreach($getTotalOfStudentsAllType as $key => $value) {
            $dataRenderGraphPie .= "['".$value['type_name']."',".$value['count_type_id']."],";
        }   

        $getStudentOfSubject = $this->dashboardsReportModel->getStudentOfSubject();
        $dataRenderGraphColumn = '';
        foreach($getStudentOfSubject as $key => $value) {
            $dataRenderGraphColumn .= "['".$value['subject_name']."',".$value['student_id']."],";
        }

        $getExamTypePerformance = $this->dashboardsReportModel->getExamTypePerformance();
        // echo '<pre>'; print_r($getStudentOfSubject); echo "</pre>"; die();
        $dataRenderGraphBar = '';
        foreach($getExamTypePerformance as $key => $value) {
            $dataRenderGraphBar .= "['".$value['subject_name']."',".$value['score_point'].",'".$value['color']."'"."],";
        }
        // echo '<pre>'; print_r($dataRenderGraphColumn); echo "</pre>"; die();   

        $data['dataRenderGraphPie'] = $dataRenderGraphPie;
        $data['dataRenderGraphColumn'] = $dataRenderGraphColumn;
        $data['dataRenderGraphBar'] = $dataRenderGraphBar;

        $this->load->library('testresult/PdfGenerator');
        $pdf = new PdfGenerator();
        $html = $this->load->view('testresult/v_dashboard_pdf.php', $data, TRUE);

        die($html);

        $pdf->GenPdfWithHtml($html);
        
    }
    
    // ระดับจังหวัด
    public function provincesview(){
        $getScoresProvincesAll = $this->provincesReportModel->getScoresProvincesAll();

        $dataRender = '';
        foreach($getScoresProvincesAll as $key => $value) {
            $dataRender .= "['".$value['province_name_en']."',".$value['max_score_point']."],";
        }       
        $data['dataRender'] = $dataRender;
        $data['getProvincesAll'] = $getScoresProvincesAll;

        $this->output('testresult/v_report_province', $data);
    }

    public function provincesviewpdf(){
        $getScoresProvincesAll = $this->provincesReportModel->getScoresProvincesAll();
        $data['getProvincesAll'] = $getScoresProvincesAll;
        $html = $this->load->view('testresult/v_report_province_pdf.php', $data, TRUE);
        $this->load->library('testresult/PdfGenerator');
        $pdf = new PdfGenerator();
        $pdf->GenPdfWithHtml($html);
    }
    
    // ระดับโรงเรียน
    public function schoolsview(){
         $sql = 'SELECT tb_scores_tresult.school_id , tb_schools_tresult.school_name , MAX(tb_scores_tresult.score_point) AS score_max, MIN(tb_scores_tresult.score_point)AS score_min FROM tb_scores_tresult 
                 INNER JOIN tb_schools_tresult 
                 ON tb_scores_tresult.school_id =tb_schools_tresult.school_id 
                 GROUP BY tb_scores_tresult.school_id';
        $data ['list_school_available'] = $this->db->query($sql)->result_array();
        $this->output('testresult/v_report_school' , $data);
    }
    
    // ส่วนคะแนนที่มีปัญหา
    public function pointproblem(){
         $this->output('testresult/v_dashboard');
    }
    
    // คะแนนรายเดี่ยว 
    public function individualview(){

        $sql = 'SELECT tb_scores_tresult.student_id,  tb_student_tresult.first_name , tb_student_tresult.last_name 
                , tb_exam_type_tresult.type_name , tb_scores_tresult.score_test_round , tb_scores_tresult.type_id ,
                 tb_subjects_tresult.subject_name , tb_scores_tresult.subject_id
                FROM tb_scores_tresult
                INNER JOIN tb_student_tresult
                ON tb_scores_tresult.student_id=tb_student_tresult.student_ID
                INNER JOIN tb_exam_type_tresult
                ON tb_scores_tresult.type_id=tb_exam_type_tresult.type_id
                INNER JOIN tb_subjects_tresult
                ON tb_scores_tresult.subject_id=tb_subjects_tresult.subject_id
                ';
        $data ['all_score_individual'] = $this->db->query($sql)->result_array();
        //  $data['all_score'] = ($this->db->get('tb_score_tresult')->result_array());
        $this->output('testresult/v_report_individual' , $data);
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


    // search by id of student 
    public function searchById(){
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
                WHERE  tb_scores_tresult.student_id ="'.$this->input->post('student_id').'"
                AND tb_scores_tresult.type_id = '.$this->input->post('type_id').'
                AND tb_scores_tresult.subject_id = '.$this->input->post('subject_id').'
                AND tb_scores_tresult.score_test_round = '.$this->input->post('score_test_round').'';
    
         $data =  $this->db->query($sql)->row();
         echo json_encode($data);
    }

        // search by id of student 
    public function editPointStudent(){
        $sql = 'UPDATE tb_scores_tresult
                SET score_point = "'.$this->input->post('update_score[0]').'", score_editer="tresult_admin",
                score_remark = "'.$this->input->post('update_score[1]').'"
                WHERE student_id = "'.$this->input->post('student_ref[student_id]').'"';
        $data1 = $this->db->query($sql);

	// log_id log_date type_id test_subject test_round test_student_id test_before_point test_after_point test_editer test_remark
        $sql = 'INSERT INTO tb_log_edit_tresult (log_id, log_date, type_id, test_subject, test_round , test_student_id , test_before_point , test_after_point , test_editer , test_remark )
                VALUES ("", NOW(), "'.$this->input->post('student_ref[type_id]').'", "'.$this->input->post('student_ref[subject_id]').'" 
                        , "'.$this->input->post('student_ref[score_test_round]').'" , "'.$this->input->post('student_ref[student_id]').'"
                        , "'.$this->input->post('student_ref[score_point]').'" , "'.$this->input->post('update_score[0]').'" , "tresult_admin" , "'.$this->input->post('update_score[1]').'"

                        )';

        $data2 = $this->db->query($sql);
        $res = [$data1 , $data2];
        echo json_encode($res , JSON_UNESCAPED_UNICODE);
    }

    public function savecharttoimg(){
        $data = $_POST['data'];
        $fileName = $_POST['fileName'];

        $fileName = __DIR__.'/img/'.$fileName;
        file_put_contents($fileName, base64_decode(explode(',',$data)[1]));
    }




}