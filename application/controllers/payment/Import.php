<?php
/* Class Import
 * Main Controller Import payment
 * @author: Jiranun
 * @Create Date: 2560-04-11
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__)."/../NEMs_Controller.php");

class Import extends NEMs_Controller {
	public function __construct(){
        parent::__construct();
	}
	
	
	function remove_comma($number){
		return str_replace(',', '',$number);
	}
	
	function splitDate($date,$sp="-") {
		list($dd, $mm, $yy) = preg_split("[/|-]", $date);
		$yy -= 543;
		return $yy.'-'.$mm.'-'.$dd;
	}
	
	
/* fn import_file 
 * Page input file excel to read payment
 * @input: file excel .xls , .xlsx
 * @output: Read file
 * @author: Jiranun
 * @Create Date: 2560-04-11
*/
	public function import_file(){
		
		$this->output("Payment/v_import_excel",$this->data);
	}//end fn import_file
	
/* fn excelColumnRange 
 * Getting column title of excel 
 * @input: $lower (start column ), $upper (end column )
 * @output: rang column in array
 * @author: Jiranun
 * @Create Date: 2560-04-11
*/	
	
	function excelColumnRange($lower, $upper) {
		$arr_range = array();
		++$upper;
		for ($value = $lower; $value !== $upper; ++$value) {
			//echo $value." : ";
			array_push($arr_range, $value);
		}
		return $arr_range;
	}//end fn excelColumnRange

/* fn preview_file 
 * Page Preview file excel to read
 * @input: already file excel .xls , .xlsx
 * @output: Display data from read file
 * @author: Jiranun
 * @Create Date: 2560-04-11
*/	

	function preview_file(){
		
		/** Set default timezone (will throw a notice otherwise) */
		date_default_timezone_set('Asia/Bangkok');
		/** PHPExcel */
		include ("plugins/PHPExcel/Classes/PHPExcel.php");
		/** PHPExcel_IOFactory - Reader */
		include ("plugins/PHPExcel/Classes/PHPExcel/IOFactory.php");
			

		if(isset($_FILES['uploadfile']['name'])){
			$file_name = $_FILES['uploadfile']['name'];
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);
			
			//echo ": ".$file_name; //die;
			//Checking the file extension (ext)
			if($ext == "xlsx" || $ext == "xls"){
				$Path = 'uploads/payment';	
				$filename =$Path.'/'.$file_name;
				copy($_FILES['uploadfile']['tmp_name'],$filename);	
				
				$inputFileName = $filename;
				//echo $inputFileName;
				
			/**********************PHPExcel Script to Read Excel File**********************/
				//  Read your Excel workbook
				try {
					//echo "try".$inputFileName;
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName); //Identify the file
					$objReader = PHPExcel_IOFactory::createReader($inputFileType); 
					$objReader->setReadDataOnly(true);
					//Creating the reader
					$objPHPExcel = $objReader->load($inputFileName); //Loading the file
					//echo "จบ try นะ";
					
				} catch (Exception $e) {
					echo "<pre>";
					print_r($e);
					echo "</pre>";
					die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
					. '": ' . $e->getMessage());
				}

				//ข้อมูลนำเข้า
				$this->data["im_exam"] = $this->input->post("im_exam");	 		//ประเภทการสอบ
				$this->data["im_edu_bgy"] = $this->input->post("im_edu_bgy");	 	//ปีการศึกษา
				
				
				/* start ROW && COLUMN */
				$sheet_active = 0;
				$start_row = 2;
				$start_col = 'B';	
				
				// Get worksheet dimensions
				$sheet = $objPHPExcel->getSheet($sheet_active); //Selecting sheet 0				
				$highestRow = $sheet->getHighestRow();     		//Getting number of rows
				$highestColumn = $sheet->getHighestColumn();    //Getting number of columns
				
				
				$arr_data = array(); // per project 1 row
				
				for ($row = $start_row; $row <= $highestRow; $row++) {		
					//******** column A-H :: expend project *********//
					$column_key = $sheet->rangeToArray($start_col.$row.":".$highestColumn.$row, NULL, TRUE, FALSE);
					
					if(!empty($column_key)){
					foreach($column_key as $row_col){
						/***************** start expend **********************/
						if(!empty($row_col)){
							$pay_ref 		= "";	 //type ของโครงการ / กิจกรรม (P = โครงการ , A = กิจกรรม)
							$pay_code 		= "";	
							$pay_date 		= "";	
							$pay_resource 	= "";	
							$pay_sub 		= ""; 	
							$pay_list 		= "";	
							$pay_amount		= "";
							$pay_note 		= "";
						foreach($row_col as $key_col => $val_col){
							// แปลง index column เป็น name column
							$colIndex = PHPExcel_Cell::stringFromColumnIndex($key_col);
							//echo "<br/>".$key_col.":".$colIndex;
							$val_column = "";
							if($colIndex == "D"){ //วันที่จ่าย
								//$val_column = $sheet->getCell($colIndex.$row)->getFormattedValue();
								//$val_column = $sheet->getCell($colIndex.$row)->getValue();
								
								
								//Case 2
								$val_date =  date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell($colIndex.$row)->getValue()));
								$val_column = $val_date;
								
								
								/*$str_date = explode("/",$val_date);
								$year = $str_date[2];
								if($year < 2550){
									$val_column = splitDateForm4Buddish($val_date);
								}else{
									$val_column = $val_date;
								}*/
								
								
							}else{
								$val_column = $sheet->getCell($colIndex.$row)->getValue();
							}
							//echo "col:".$colIndex." : ".$val_column."<br/>";
								
							if(!empty($val_column)){
								if($colIndex == "B") $pay_ref 		= $val_column;
								if($colIndex == "C") $pay_code 		= $val_column;
								if($colIndex == "D") $pay_date 		= $val_column;
								/*if($colIndex == "E") $pay_resource 	= $val_column;
								if($colIndex == "F") $pay_sub 		= $val_column;
								if($colIndex == "G") $pay_list 		= $val_column;*/
								if($colIndex == "E") $pay_amount 	= $this->remove_comma($val_column);
								if($colIndex == "F") $pay_note 		= strip_tags(trim(preg_replace("<br/>", "", $val_column)));
							}
						}//end each row_col
						
						}//end each num_rows row_col
						/***************** end expend **********************/
						
						
					}//end each column_key
					}//end each !empty column_key
					//if(file_exist($this->config->item("pbms_upload_dir").$file_name)) {
						//echo $this->config->item("pbms_upload_dir").$file_name;
						//unlink($this->config->item("pbms_upload_dir").$file_name);
					//}
					
					
					//splitDateFormTH($pay_date)
					array_push($arr_data,array(
								"pay_ref" => $pay_ref,
								"pay_code" => $pay_code,
								"pay_date" => $pay_date,
								/*"pay_resource" => $pay_resource,
								"pay_sub" => $pay_sub,
								"pay_list" => $pay_list,*/
								"pay_amount" => $pay_amount,
								"pay_note" => $pay_note
					));
				}//end each row
				$this->data["section_txt"] = "ข้อมูลการชำระเงิน";	
				$this->data["rs_data"] = $arr_data;	
				$this->output("Payment/v_import_preview", $this->data);
				
			}//end Checking file
		}//end isset file
		
	}//end preview_file
	
	
	function save_payment(){
		
		//$this->load->model($this->config->item("pbms_module_project")."M_pbms_budget_spend","budget_spend");
		
		
		$this->db->trans_begin();
		
		$im_bgy = $this->input->post("im_edu_bgy");				//ปีการศึกษา
		$im_exam = $this->input->post("im_exam");				//ประเภทการสอบ
		$spd_ref = json_decode($this->input->post("arr_ref"));				//รหัสอ้างอิงใบชำระเงิน
		$spd_code = json_decode($this->input->post("arr_code"));			//รหัสผู้เข้าสอบ
		$spd_date = json_decode($this->input->post("arr_date"));			//วันที่จ่าย
		/*$spd_resource = json_decode($this->input->post("arr_resource"));	//แหล่งงบประมาณ
		$spd_sub = json_decode($this->input->post("arr_sub"));				//หมวดงบประมาณ
		$spd_list = json_decode($this->input->post("arr_list"));			//ประเภท/รายการค่าใช้จ่าย
		*/
		$spd_amount = json_decode($this->input->post("arr_amount"));		//จำนวนเงินค่าใช้จ่าย
		$spd_note = json_decode($this->input->post("arr_note"));			// คอมเม้นต์
			
		$list_code = array();
		$list_date = array();
		$list_month = array();
		$list_resource = array();
		$list_sub = array();
		$list_cost = array(); //ค่าใช้จ่าย
		$list_amount = array();
		$list_note = array(); //หมายเหตุ
		$seq = $seq1 = $seq2= $seq3 = $seq4 = $seq5= $seq6 = $seq7= $seq8 = 0;
		
		
		//รหัสอ้างอิงใบชำระเงิน
		foreach($spd_code as $value) {
			echo "<br/>".$list_code[$seq] = $value;
			$seq++;
		}		
		
		//วันที่ใช้จ่าย
		foreach($spd_date as $value) {
			$list_date[$seq1] = $this->splitDate($value);
			$month = date("m",strtotime($list_date[$seq1]));
			$list_month[$seq1] = $month;
			//echo "<br/>".$month." : ".$list_date[$seq1];
			$seq1++;
		}
		/*
		//แหล่งงบประมาณ
		foreach($spd_resource as $value) {
			$list_resource[$seq2] = $value;
			$seq2++;
		}
		
		//หมวดงบประมาณ
		foreach($spd_sub as $value) {
			if(empty($value) || $value == "-" || $value == 0 || $value == ""){
				$value = null;
			}
			$list_sub[$seq3] = $value;
			$seq3++;
		}	
		
		//ค่าใช้จ่าย
		foreach($spd_list as $value) {
			if(empty($value)){
				$value = "";
			}
			$list_cost[$seq4] = strip_tags(trim(preg_replace("<br/>", "", $value)));
			$seq4++;
		}	
		*/
		
		
		//จำนวนงบประมาณ
		foreach($spd_amount as $value) {
			if(empty($value)){
				$value = 0;
			}
			$list_amount[$seq5] = $this->remove_comma($value);
			$seq5++;
		}
		
		//หมายเหตุ
		foreach($spd_note as $value) {
			if(empty($value)){
				$value = "";
			}
			$list_note[$seq6] = strip_tags(trim(preg_replace("<br/>", "", $value)));
			$seq6++;
		}	
		
		
		
		$str = "";
		//ใช้งบประมาณ ใบเบิก
		$str_notice = array();
		$no = 0;
		$bgy_title = "";
		if(!empty($spd_ref && count($spd_ref)>0 ) ){			
			$pj_bgy_id = 0;
			foreach($spd_ref as $ref) {
				//หาเลขที่อ้างอิงใบชำระเงิน
				if(!empty($ref)){
				
					/************* Insert in to DB **************/				
					
					
					$str_notice = "success";
				}//end get data
				else{		
					$str_notice = "--- Not found ---";
					echo "--- Not found ---";
				}
							
				
				$no++;
			}//end each insert from check spd_ref
		}//end check spd_ref ! empty
		
		
		//check trans_commit
		if ($this->db->trans_status() === FALSE){
			//echo 'trans_rollback';
			$this->db->trans_rollback();
			$data["json_alert"] = false;
			$data["json_type"] = "danger";
			$data["data_notice"] = $str_notice;
			$data["str_notice"] = "FALSE TRANSACTION!";
			$data["json_str"] = "ไม่สามารถบันทึกข้อมูลได้";
			echo json_encode($data);
		}else{
			//echo 'trans_commit';
			$this->db->trans_commit();
			$data["json_type"] = "success";
			$data["str_notice"] = "COMMIT: ";
			$data["data_notice"] = $str_notice;
			$data["json_str"] = "นำเข้าข้อมูลการใช้งินสำเร็จ  ปีงบประมาณ  ".$bgy_title;
			$data["json_alert"] = true;
			echo json_encode($data);
		}
		
	}//end fn save_payment
	
	
	
}//end Class Import
