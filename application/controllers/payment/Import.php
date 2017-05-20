<?php
/* Class Import
 * Main Controller Import payment
 * @author: Jiranun
 * @Create Date: 2560-04-11
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__)."/../NEMs_Controller.php");

class Import extends NEMs_Controller {
	public $data = array();
	
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
		$this->load->model("payment/M_pa_payment","payment");
		
		$this->data["rs_year_exam"] = $this->payment->get_year_exam();
		
		$this->output("Payment/v_import_excel",$this->data);
	}//end fn import_file
	
	public function type_exam_option(){
		$this->load->model("payment/M_pa_payment","payment");
		
		$bgy_value = $this->input->post("im_edu_bgy");
		$default_selected = "";
		//ค้นหาประเภทการสอบ ตามปีการศึกษาที่เลือก
		$rs_type_exam = $this->payment->get_type_exam_by_year($bgy_value);
		if($rs_type_exam->num_rows()>0){
			echo "<option value=\"\">--- เลือก ---</option>";
			foreach($rs_type_exam->result() as $type_ex){
				$selected = "";
				if($type_ex->TypeID == $default_selected){
					$selected = "selected";
				}
				echo "<option ".$selected." value=".$type_ex->TypeID.">".$type_ex->TypeName."(".$type_ex->Term.")</option>";
			}
		}else{
			
			echo "<option value=\"\">--- ไม่พบข้อมูล ---</option>";
		}
		
		
	}//end fn type_exam_option
	
	
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
				$start_col = 'A';	
				
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
							$pay_status		= 2; 	//สถานะการชำระเงิน
							$pay_bill_no	= "";	//ref billNo
								
							$pay_date 		= "0000-00-00";	
							$pay_amount		= 0.00; //จำนวนเงินที่ชำระ
							$pay_receiver   = ""; 	//ผู้รับชำระเงิน
							$pay_creator 	= "";   //ผู้บันทึก  ต้องมาจาก login
						foreach($row_col as $key_col => $val_col){
							// แปลง index column เป็น name column
							$colIndex = PHPExcel_Cell::stringFromColumnIndex($key_col);
							//echo "<br/>".$key_col.":".$colIndex;
							$val_column = "";
							if($colIndex == "C"){ //วันที่จ่าย
								$val_date =  date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell($colIndex.$row)->getValue()));
								$val_column = $val_date;
							}else{
								$val_column = $sheet->getCell($colIndex.$row)->getValue();
								if(empty($val_column) || $val_column == ""){
									$val_column = $val_col;
								}
							}
							//echo "col:".$colIndex." : ".$val_column."<br/>";
								//echo "==> ".$val_col."===> ".$val_column;
							if(!empty($val_column)){
								if($colIndex == "B") $pay_bill_no 	= $val_column;
								if($colIndex == "C") $pay_date 		= $val_column;
								if($colIndex == "D") $pay_amount 	= $this->remove_comma($val_column);
								if($colIndex == "E") $pay_receiver 	= $val_column;
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
								"arr_bill_no" => $pay_bill_no,
								"arr_date" => $pay_date,
								"arr_amount" => $pay_amount,
								"arr_receiver" => $pay_receiver
					));
				}//end each row
				$this->data["section_txt"] = "ข้อมูลการชำระเงิน";	
				$this->data["rs_data"] = $arr_data;	
				$this->output("Payment/v_import_preview", $this->data);
				
			}//end Checking file
		}//end isset file
		
	}//end preview_file
	
	
	function save_payment(){
		
		$this->load->model("payment/M_pa_payment","payment");
		$pay_creator = "Jiranun";
		
		$this->db->trans_begin();
		
		$im_bgy = $this->input->post("im_edu_bgy");				//ปีการศึกษา
		$im_exam = $this->input->post("im_exam");	
		//ประเภทการสอบ
		$arr_bill = json_decode($this->input->post("arr_bill"));			//รหัสอ้างอิงใบชำระเงิน
		$arr_date = json_decode($this->input->post("arr_date"));			//วันที่จ่าย
		
		$arr_amount = json_decode($this->input->post("arr_amount"));		//จำนวนเงินค่าใช้จ่าย
		$arr_receiver = json_decode($this->input->post("arr_receiver"));	// ผู้รับเงิน/รับชำระ
			
		$list_bill = array();
		$list_date = array();
		$list_amount = array();
		$list_receiver = array();
		$seq1 = $seq2= $seq3 = $seq4 = 0;
		
		
		//รหัสอ้างอิงใบชำระเงิน
		foreach($arr_bill as $value) {
			echo "<br/>".$list_bill[$seq1] = $value;
			$seq1++;
		}		
		
		//วันที่ใช้จ่าย
		foreach($arr_date as $value) {
			$list_date[$seq2] = $this->splitDate($value);
			$seq2++;
		}
		//จำนวนเงินที่ชำระ
		foreach($arr_amount as $value) {
			if(empty($value)){
				$value = 0;
			}
			$list_amount[$seq3] = $this->remove_comma($value);
			$seq3++;
		}
		
		//ผู้รับชำระ
		foreach($arr_receiver as $value) {
			if(empty($value)){
				$value = "";
			}
			$list_receiver[$seq4] = trim(preg_replace('/\s\s+/', ' ', $value));
			$seq4++;
		}	
		
		
		
		$str = "";
		$str_notice = array();
		
		$bgy_title = "";
		if(!empty($arr_bill && count($arr_bill)>0 ) ){
			$no = 0;
			foreach($arr_bill as $billNo) {
				//หาเลขที่อ้างอิงใบชำระเงิน
				$bill_ref = "";
				$bill_amount = "";			// จำนวนเงิน ที่ต้องชำระ
				$bill_amount_actual = ""; 	// จำนวนเงิน ที่ชำระจริง
				$qu_bill = $this->payment->get_bill($billNo)->row_array();
				
				if(!empty($qu_bill["BillNo"])){
					$bill_ref = $qu_bill["BillNo"];
					$bill_amount = (float)$qu_bill["ExamAmount"];
				}				
				
				
				if(!empty($bill_ref)){				
					/************* Insert in to DB **************/
					//ตรวจสอบยอดการชำระ
					$bill_amount_actual = (float)$list_amount[$no];
					$payment_status = 0;
					if($bill_amount_actual == $bill_amount){
						$payment_status = 6; //ชำระเรียบร้อย
					}else if($bill_amount_actual == 0.00){
						$payment_status = 7; //ยังไม่ชำระเรียบร้อย
						
					}else{
						if($bill_amount_actual > 0.00 && ($bill_amount_actual != $bill_amount)){
							$payment_status = 8; //ชำระไม่ครบตามจำนวน
						}
						
					}
					
					$this->payment->pay_id = "";			
					$this->payment->pay_ps_id = "";				//สถานะการชำระเงิน
					$this->payment->pay_bill = $bill_ref;				//รหัสอ้างอิงใบชำระเงิน
					$this->payment->pay_date = $list_date[$no];				//วันที่จ่าย
					$this->payment->pay_amount = $list_amount[$no];			//จำนวนเงินที่ชำระ
					$this->payment->pay_receiver = $list_receiver[$no];			//ผู้รับชำระเงิน
					$this->payment->pay_createdate = "";		//วันที่จ่าย
					$this->payment->pay_creator = $pay_creator;	//ผู้นำเข้า/ผู้บันทึก
					$this->payment->insert();				
					
					//อัปเดต เงินที่ชำระจริงของใบแจ้งชำระเงิน
					$this->payment->update_bill($bill_ref, $list_amount[$no]);
					
					$str_notice = "success";
				}//end get data
				else{		
					$str_notice = "--- Not found billNo ".$bill_ref." ---";
					echo "--- Not found ---";
				}
							
				
				$no++;
			}//end each insert from check arr_ref
		}//end check arr_ref ! empty
		
		
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
			$data["json_str"] = "นำเข้าข้อมูลการใช้งินสำเร็จ ";
			$data["json_alert"] = true;
			echo json_encode($data);
		}
		
	}//end fn save_payment
	
	
	
}//end Class Import
