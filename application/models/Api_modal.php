<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_modal extends CI_model{

	public function select($table,$data,$where=''){
		$this->db->select($data);
		$this->db->from($table);
		if($where != ''){
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function del($table,$where=''){
		$this->db->where($where);
		$this->db->delete($table);
		$query = $this->db->get();
		return true;
	}
	public function empty_table($table){
		$this->db->empty_table($table);
		return true;
	}
	public function checkData($data,$tablename,$where)
	{
		$query = $this->db->select($data)
						->where($where)
						-> get($tablename);
			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
	}
	public function createMultiple($tablename,$data)
	{
		$query = $this->db->insert_batch($tablename, $data);
		return true;
	}
	public function selectSingleData($table,$data,$where=''){
		$this->db->select($data);
		$this->db->from($table);
		if($where != ''){
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query->row();
	}
	public function selectmultiDataArray($table,$data,$where=''){
		$this->db->select($data);
		$this->db->from($table);
		if($where != ''){
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function select_distinct($table,$data,$where=''){
		$this->db->distinct();
		$this->db->select($data);
		$this->db->from($table);
		$this->db->order_by($data, "asc");
		if($where != ''){
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function max_no($table,$field){
		$this->db->select_max($field);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->row();
	}
	public function insert_with_id($data,$table){
		$this->db->insert($data,$table);
		return $this->db->insert_id();
	}
	public function insert($data,$table){
		$this->db->insert($data,$table);
		return true;
	}

	public function update($table,$data,$where=''){
		$this->db->where($where);
		$this->db->update($table,$data);
		return true;
	}
	public function GetSampleData($age,$gender,$value){
		$query = $this->db->query("SELECT exam_val_attr.id,exam_val_attr.exam_val_id,exam_val_attr.units,(SELECT name FROM package WHERE package.id=exam_val.package_id)packag_name,exam_val_attr.min_age,exam_val_attr.max_age,exam_val_attr.gender,exam_val_attr.min_value,exam_val_attr.max_value,exam_val.name FROM `exam_val_attr` INNER JOIN exam_val ON exam_val.id=exam_val_attr.exam_val_id WHERE (((exam_val_attr.min_age >= '$age' and exam_val_attr.min_age <= '$age') or (exam_val_attr.max_age >= '$age' and exam_val_attr.max_age<='$age')) or(('$age'>=exam_val_attr.min_age and '$age' <= exam_val_attr.max_age) or ('$age' <= exam_val_attr.max_age and '$age'>=exam_val_attr.min_age))) AND exam_val_attr.gender = '$gender' AND exam_val_attr.exam_val_id = '$value'");
		return $query->row();
	}
	public function GetOpdDetails($id){
		$query = $this->db->query("SELECT patient.id,appointment.appointment_id as appoitment_id,appointment.id as receipt_id_appointment_id,patient.address1,patient.address2,patient.address3,patient.patient_id,patient.name,patient.care_of_name,patient.gender,patient.mobile,patient.age,patient.Date_of_Birth,patient.weight,opd_list.token_no,opd_list.department_name,opd_list.treatment_category,voucher.invoice_no,voucher.appointment_type,voucher.bill_to,voucher.rate,voucher.discount,voucher.payable_amount,payment_history.paid_amount as paid_amount,payment_history.mode_of_Payment,payment_history.Reference_no,payment_history.create_date,appointment.referred_by FROM ((((appointment LEFT JOIN patient ON appointment.patient_id=patient.patient_id)LEFT JOIN opd_list ON  appointment.appointment_id=opd_list.appointment_id)LEFT JOIN voucher ON appointment.appointment_id=voucher.appointment_id)LEFT JOIN payment_history ON appointment.appointment_id=payment_history.appointment_id) WHERE appointment.appointment_id='$id'");
		return $query->row();
	}
	public function GetLabDetails($id){
		$query = $this->db->query("SELECT patient.id,lab_appointment.id as id,lab_appointment.id as receipt_id_appointment_id,patient.address,patient.patient_id,patient.name,patient.gender,patient.phone_no,patient.age,patient.dob,lab_test.token_no,lab_test.package,lab_test.bill_package,lab_test.treatment_category,voucher_lab.invoice_no,voucher_lab.appointment_type,voucher_lab.bill_to,voucher_lab.rate,voucher_lab.discount,voucher_lab.payable_amount,lab_payment_history.paid_amount as paid_amount,lab_payment_history.mode_of_Payment,lab_payment_history.Reference_no,lab_payment_history.create_date,lab_appointment.referred_by FROM ((((lab_appointment LEFT JOIN patient ON lab_appointment.patient_id=patient.patient_id) LEFT JOIN lab_test ON lab_appointment.id=lab_test.appointment_id )LEFT JOIN voucher_lab ON lab_appointment.id=voucher_lab.appointment_id)LEFT JOIN lab_payment_history ON lab_appointment.id=lab_payment_history.appointment_id) WHERE lab_appointment.id='$id'");
		return $query->row();
	}
	public function GetSampleDataReport($id){
	   $query = $this->db->query("SELECT patient.id,patient.patient_id,patient.name,patient.gender,patient.age,patient.dob,patient.weight,patient.address,patient.city,patient.state,patient.pin,patient.phone_no,patient.uid,patient.care_of_name,appointment.id,patient_sample_repors.sample_details,patient_sample_repors.note,patient_sample_repors.clinical_history,appointment.created_date as appointment_date,appointment.doc_id,(SELECT token_no FROM lab_test WHERE lab_test.appointment_id=appointment.id)token_no,(SELECT sample_date FROM lab_test WHERE lab_test.appointment_id=appointment.id)sample_date, appointment.referred_by AS referred_by,appointment.sample_collected_at,appointment.srf_no,transaction.created_date as payment_date,patient_sample_repors.modify_date as report_date FROM (((appointment INNER JOIN patient ON patient.patient_id=appointment.patient_id) INNER JOIN patient_sample_repors ON appointment.id=patient_sample_repors.appointment_id)INNER JOIN transaction ON transaction.appointment_id=appointment.id) WHERE appointment.id='$id'");

	//	$query = $this->db->query("SELECT patient.id,patient.patient_id,patient.name,patient.gender,patient.age,patient.dob,patient.weight,patient.address,patient.city,patient.state,patient.pin,patient.phone_no,patient.uid,patient.care_of_name,appointment.id,patient_sample_repors.sample_details,patient_sample_repors.note,patient_sample_repors.clinical_history,appointment.created_date as appointment_date,appointment.doc_id,(SELECT token_no FROM lab_test WHERE lab_test.appointment_id=appointment.id)token_no, appointment.referred_by AS referred_by,transaction.created_date as payment_date,patient_sample_repors.created_date as sample_date,patient_sample_repors.modify_date as report_date FROM (((appointment INNER JOIN patient ON patient.patient_id=appointment.patient_id) INNER JOIN patient_sample_repors ON appointment.id=patient_sample_repors.appointment_id)INNER JOIN transaction ON transaction.appointment_id=appointment.id) WHERE appointment.id='$id'");

	//	$query = $this->db->query("SELECT patient.id,patient.patient_id,patient.name,patient.gender,patient.age,patient.dob,patient.weight,patient.address,patient.city,patient.state,patient.pin,patient.phone_no,patient.uid,patient.care_of_name,doctor.name AS doctor_name,doctor.degree,appointment.id,patient_sample_repors.sample_details,patient_sample_repors.note,patient_sample_repors.clinical_history,appointment.appointment_date as appointment_date,(SELECT token_no FROM lab_test WHERE lab_test.appointment_id=appointment.id)token_no, appointment.referred_by AS referred_by,patient_sample_repors.created_date as sample_date FROM ((((appointment INNER JOIN patient ON patient.patient_id=appointment.patient_id) INNER JOIN patient_sample_repors ON appointment.id=patient_sample_repors.appointment_id)INNER JOIN transaction ON transaction.appointment_id=appointment.id)INNER JOIN doctor ON appointment.doc_id=doctor.id) WHERE appointment.id='$id'");
		return $query->row();
	}
	public function patient_list($from,$to){
		$query = $this->db->query("SELECT patient.id,patient.patient_id,patient.name,patient.gender,patient.age,patient.Date_of_Birth,patient.weight,lab_test.token_no,lab_test.package,lab_test.status,lab_test.sample_desc,appointment.today_date,appointment.appointment_id FROM ((appointment INNER JOIN patient ON appointment.patient_id=patient.patient_id) INNER JOIN lab_test ON lab_test.appointment_id=appointment.appointment_id) WHERE appointment.status='0' AND appointment.lab_test_id>0 AND appointment.appointment_for='LabTest' AND lab_test.is_deleted='0' AND patient.is_deleted='0' AND appointment.today_date >= '$from' AND appointment.today_date <= '$to'");
		return $query->result_array();
	}
	public function Generate_report_data($id){
		$query = $this->db->query("SELECT patient.id,patient.patient_id,patient.name,patient.name,patient.gender,patient.age,patient.dob,patient.weight,patient.address,patient.city,patient.state,patient.pin,patient.phone_no,patient.uid,patient.care_of_name,appointment.id as appoitment_id,(SELECT sample_collected_details from lab_test WHERE lab_test.appointment_id=appointment.id)selected_package,(SELECT token_no from lab_test WHERE lab_test.appointment_id=appointment.id)token_no,(SELECT created_date from lab_test WHERE lab_test.appointment_id=appointment.id)lab_date,(SELECT notes from lab_test WHERE lab_test.appointment_id=appointment.id)notes,(SELECT sample_tracking_no from lab_test WHERE lab_test.appointment_id=appointment.id)sample_tracking_no,(SELECT sample_type from lab_test WHERE lab_test.appointment_id=appointment.id)sample_type,(SELECT status from lab_test WHERE lab_test.appointment_id=appointment.id)lab_status,appointment.srf_no,appointment.created_date as appointment_date FROM appointment INNER JOIN patient ON appointment.patient_id=patient.patient_id WHERE appointment.id='$id'");
		return $query->row();
	}
	public function view_lab_record($id){
		$query = $this->db->query("SELECT lab_test.*,patient.name FROM lab_test,patient WHERE patient.id='$id' AND lab_test.patient_id=patient.patient_id");
		return $query->result();
	}
	public function GetExaminationValue($package_id,$age,$gender){
		$query = $this->db->query("SELECT exam_val.*,exam_val_attr.units,exam_val_attr.min_value,exam_val_attr.max_value FROM `exam_val` LEFT JOIN exam_val_attr ON exam_val.id=exam_val_attr.exam_val_id WHERE (((exam_val_attr.min_age >= '$age' and exam_val_attr.min_age <= '$age') or (exam_val_attr.max_age >= '$age' and exam_val_attr.max_age<='$age')) or(('$age'>=exam_val_attr.min_age and '$age' <= exam_val_attr.max_age) or ('$age' <= exam_val_attr.max_age and '$age'>=exam_val_attr.min_age))) AND exam_val_attr.gender = '$gender' AND exam_val.package_id IN($package_id) AND exam_val.is_deleted='0' AND exam_val_attr.is_deleted='0'");
		return $query->result();
	}
	public function ExaminationValue(){
		$query = $this->db->query("SELECT exam_val.*,package.name as test_name FROM `exam_val` INNER JOIN package ON exam_val.package_id=package.id WHERE exam_val.is_deleted='0' ORDER BY package.name");
		return $query->result();
	}
	public function appointment_list($from,$to){
		$query = $this->db->query("SELECT patient.id,patient.patient_id,patient.name,patient.gender,patient.age,patient.Date_of_Birth,patient.weight,patient.mobile,patient.email,patient.aadhaar_no,patient.care_of_name,appointment.id as increment_id_of_appointment,appointment.appointment_type,appointment.appointment_for,appointment.appointment_id,appointment.status,lab_test.token_no as lab_test_token,lab_test.treatment_category as lab_treatment_category,opd_list.treatment_category as opd_treatment_category,opd_list.token_no as opd_token,opd_list.department_name,appointment.today_date,appointment.created_date,users.user_name FROM ((((appointment INNER JOIN patient ON appointment.patient_id=patient.patient_id)LEFT JOIN lab_test ON appointment.appointment_id=lab_test.appointment_id) LEFT JOIN opd_list ON appointment.appointment_id=opd_list.appointment_id)LEFT JOIN users ON appointment.created_by=users.id) WHERE patient.is_deleted='0' AND appointment.today_date >= '$from' AND appointment.today_date <= '$to'");
		return $query->result();
	}
	public function test(){
		$query = $this->db->query("SELECT package.*,exam_val.id as exam_val_id FROM package INNER JOIN exam_val ON package.id=exam_val.package_id WHERE package.is_deleted='0'  AND exam_val.is_deleted='0'");
		return $query->result();
	}
	public function test_id($id){
		$query = $this->db->query("SELECT package.*,exam_val.id as exam_val_id FROM package INNER JOIN exam_val ON package.id=exam_val.package_id WHERE package.is_deleted='0'  AND exam_val.is_deleted='0' AND package.id='$id'");
		return $query->row();
	}
	public function edit_appointment($id){
		$query = $this->db->query("SELECT appointment.id as appointmentid,appointment.appointment_id,appointment.patient_id,appointment.appointment_for,appointment.referred_by,appointment.today_date,IF(opd_list.department_name != '',opd_list.department_name,'No Department') as departemnt_name,IF(opd_list.treatment_category != '',opd_list.treatment_category,lab_test.treatment_category) as treatment_category,lab_test.bill_package,voucher.bill_to,voucher.discount,voucher.payable_amount,payment_history.paid_amount AS paid_amount,payment_history.mode_of_payment,payment_history.Reference_no,appointment.status as appointment_status FROM ((((appointment LEFT JOIN opd_list ON appointment.appointment_id=opd_list.appointment_id)LEFT JOIN lab_test ON appointment.appointment_id=lab_test.appointment_id)LEFT JOIN voucher ON voucher.appointment_id=appointment.appointment_id)LEFT JOIN payment_history ON appointment.appointment_id=payment_history.appointment_id) WHERE appointment.id='$id'");
		return $query->row();
	}
	public function tally_reports($from_date,$to_date,$appointmenttype,$treatment_category){
		$query = $this->db->query("SELECT patient.name,patient.patient_id,appointment.appointment_id,appointment.today_date,appointment.id AS appoitment_id,voucher.treatment_category AS treatment_category,voucher.invoice_no,voucher.created_date as invoice_date,voucher.appointment_type AS purpose,voucher.rate,voucher.discount,voucher.payable_amount,appointment.status,users.user_name,IF(voucher.appointment_type='Opd',opd_list.department_name,'LabTest')department_list FROM ((((voucher INNER JOIN appointment ON voucher.appointment_id=appointment.appointment_id) INNER JOIN patient ON voucher.patient_id=patient.patient_id)LEFT JOIN users ON voucher.created_by=users.id)LEFT JOIN opd_list ON voucher.appointment_id=opd_list.appointment_id) WHERE voucher.appointment_type LIKE '$appointmenttype' AND voucher.treatment_category LIKE '$treatment_category' AND appointment.today_date >= '$from_date' AND appointment.today_date <= '$to_date'");
		return $query->result();
	}
	
	public function reprint_with_appointment_date($from,$to){
		$query = $this->db->query("SELECT patient.id,patient.patient_id,patient.name,patient.gender,patient.age,patient.Date_of_Birth,patient.weight,patient.mobile,patient.email,patient.aadhaar_no,patient.care_of_name,voucher.invoice_no,appointment.id as increment_id_of_appointment,appointment.appointment_type,appointment.appointment_for,appointment.appointment_id,appointment.status,lab_test.token_no as lab_test_token,lab_test.treatment_category as lab_treatment_category,opd_list.treatment_category as opd_treatment_category,opd_list.token_no as opd_token,opd_list.department_name,appointment.today_date,appointment.created_date FROM ((((appointment INNER JOIN patient ON appointment.patient_id=patient.patient_id)LEFT JOIN lab_test ON appointment.appointment_id=lab_test.appointment_id) LEFT JOIN opd_list ON appointment.appointment_id=opd_list.appointment_id)LEFT JOIN voucher ON appointment.appointment_id=voucher.appointment_id) WHERE patient.is_deleted='0' AND appointment.today_date >= '$from' AND appointment.today_date <= '$to'");
		return $query->result();
	}
    public function lab_user_name_with_id(){
		$query = $this->db->query("SELECT users.name,lab_test.created_by FROM lab_test INNER JOIN users ON lab_test.created_by=users.id GROUP BY lab_test.created_by,users.name");
		return $query->result();
	}
	public function lab_test_sample_status($from_date,$to_date,$lab_id){
		$query = $this->db->query("SELECT lab_test.*,patient.name,(select id from appointment where id=lab_test.appointment_id)recpt_no FROM lab_test INNER JOIN patient ON lab_test.patient_id=patient.patient_id WHERE lab_test.created_date >= '$from_date' AND lab_test.modified_date <= '$to_date' AND lab_test.created_by LIKE '%$lab_id%'");
		return $query->result();
	}
	public function sample_worksheet_data($from_date,$to_date){
		$query = $this->db->query("SELECT lab_test.*,patient.name,(select token_no from appointment where id=lab_test.appointment_id)recpt_no,(select sample_collected_at from appointment where id=lab_test.appointment_id)sample_collected_at,(select referred_by from appointment where id=lab_test.appointment_id)referred_by FROM lab_test INNER JOIN patient ON lab_test.patient_id=patient.patient_id WHERE lab_test.created_date >= '$from_date' AND lab_test.modified_date <= '$to_date'");
		return $query->result();
        }
}