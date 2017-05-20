<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'/third_party/testresult/mpdf/mpdf.php';

/**
* This is PdfGenerator class.
*
* author lennon
*/
Class PdfGenerator {

    private $mpdf;
    public $header_title;

    function __construct($params=NULL) {
        if($params == null) {
            $param = "'th', 'A4', '0', ''";
        }
        $this->mpdf = new mPdf($param);    
    }
    
    public function GenPdfWithHtml($html=null) {  
        $this->mpdf->WriteHTML($html);
        $title = strcode2utf($this->header_title);
        $this->mpdf->SetTitle($title);
        $this->mpdf->Output($title.".pdf", 'D');
        exit();
    }

}