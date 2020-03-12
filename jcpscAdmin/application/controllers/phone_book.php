<?php

use AdnSms\AdnSmsNotification;


defined('BASEPATH') OR exit('No direct script access allowed');

class phone_book extends CI_Controller {


	public $total_success = 0;
	public $total_failed = 0;
	public $failed;
	public $faild_send_student_id = array();




	public function sms_length($sms){
		return strlen($sms);
	}


	
	





	public function index()
	{
		$this->load->view('header');

		$data['students'] = $this->db->get('student')->result();
		$data['sms'] = $this->db->get('sms')->result();
		$this->load->view('index', $data);
		$this->load->view('footer');
	}







	public function search_data_insert()
	{

		//id select
		$name = $this->input->post('name', true);
		$sms = $this->input->post('sms', true);



		$comma = ",";
		$dashes = "-";

		if(strpos($name, $comma) !== false){

			$id = explode(",",$name);
			// echo json_encode($id);


			$this->db->select('*');
			$this->db->from('student');
			$length = count($id);
			for ($i = 0; $i < $length; $i++) {
				if($id[$i]==0){
					$this->db->where('student_id', $id[$i]);
				}else{
					$this->db->or_where('student_id', $id[$i]);
				}
				
			}
			
			$query = $this->db->get();
			$student_info = $query->result_array();
			// echo json_encode($student_info);
			

		}else if(strpos($name, $dashes) !== false){

			$id = explode("-",$name);
			$id1 = $id[0];
			$id2 = $id[1];

			$this->load->model('search');
			$student_info = $this->search->search_info2($id1, $id2);
			// echo json_encode($student_info);

		}else{
			$this->load->model('search');
			$student_info = $this->search->search_info3($name);
			// echo json_encode($student_info);
		}

			$this->load->model('search');
			$sms = $this->search->search_sms($sms);



			$data = array();
			$data['student_info'] = $student_info;
			$data['sms'] = $sms;
			echo json_encode($data);


		}









		public function send_sms_data()
		{

			$this->load->view("php-oop-sample/lib/AdnSmsNotification.php");




			$send_student_id = $this->input->post('myCheckboxes', true);
			$send_sms_status = $this->input->post('send_sms_status', true);
			$send_sms_id = $this->input->post('send_sms_id', true);
			// $count_id = count($send_student_id);
			// echo json_encode($send_sms_id);
			$total_qty = 0;
			$i=0;
			$j=0;
			$faild_send_stu_id = array();
			$faild_arr = array();
			

			// foreach ($send_student_id as $send_student_id)
			// {

				$this->load->model('search');
				$student_info = $this->search->search_sms_student($send_student_id);



				$recipient = $student_info->contact;
				// echo json_encode($student_info);
				$name = $student_info->name;
				$message = "Dear $name, $send_sms_status";
				$requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
				$messageType = 'UNICODE';         // options available: "TEXT", "UNICODE"
				// echo json_encode($send_sms_id);


				$sms = new AdnSmsNotification();
				$response = $sms->sendSms($requestType, $message, $recipient, $messageType);
				// echo json_encode($response);
				$response_data = json_decode($response);
				


				
				$api_response_message = $response_data->api_response_message;
				// echo $api_response_message;

				if($api_response_message == "SUCCESS"){

				$sms_uid = $response_data->sms_uid;
				$sms_status_data = $sms->checkSmsStatus($sms_uid);
				$sms_status_data_decode = json_decode($sms_status_data);
				$sms_qty = $sms_status_data_decode->sms->sms_quantity;
				$sms_status = $sms_status_data_decode->sms->sms_status;
				// $total_qty += $sms_qty;
				// $j++;
				// $total_success = $this->total_success;
				// $total_success = $j;
				// $this->total_success = $total_success;


				// $sms_length = $this->sms_length($message);


				$data = array();
				$data = ['client_id' => $send_student_id, 'send_sms_id' => $send_sms_id, 'sms_uid' => $sms_uid, 'sms_status' => $sms_status, 'sms_qty' => $sms_qty];
				$this->db->insert('send_sms_info', $data);
				// echo json_encode($data);


				$data = array();
				$data['qty'] = $sms_qty;
				$data['cheak'] = $sms_status;
				echo json_encode($data);


			}else{
				
				// $this->total_failed++;
				// $i++;
				// $total_failed = $this->total_failed;
				// $total_failed = $i;
				// $this->total_failed = $total_failed;

				$error_message = $response_data->error->error_message;

				$data = array();
				$data = ['client_id' => $send_student_id, 'send_sms_id' => $send_sms_id, 'sms_uid' => $error_message, 'sms_status' => $api_response_message, 'sms_qty' => 0];
				$this->db->insert('send_sms_info', $data);



				// $faild_send_student_id = $this->faild_send_student_id;
				// $faild_send_stu_id[] = $send_student_id;
				$faild_send_student_id = $send_student_id;
				// $this->faild_send_student_id = $faild_send_student_id;

				// $this->failed = $error_message;
				// $failed = $this->failed;
				// $faild_arr[]= $error_message;
				$failed = $error_message;
				// $this->failed = $failed;
				// echo $data;
				$data = array();
				$data['failed_status'] = $failed;
				$data['failed_send_student_id'] = $faild_send_student_id;
				$data['cheak'] = "error";
				echo json_encode($data);
				
			}


			// }


			// $data = array();
			// $data['qty'] = array($total_qty);
			// $data['success'] = array($this->total_success);
			// $data['total_failed'] = array($this->total_failed);
			// $data['failed_status'] = array($this->failed);
			// $data['failed_send_student_id'] = array($this->faild_send_student_id);
			// echo json_encode($data);
		}



		public function cheak_sms_uid()
		{
			$this->load->view("header");
			$this->load->view('check_sms_status');
			$this->load->view("footer");
		}


		public function check_sms_status()
		{
			$this->load->view("php-oop-sample/lib/AdnSmsNotification.php");

			$sms_uid_num = $this->input->post('sms_uid_num', true);

			// $smsUid = $this->input->post('sms_u_id', true);
			$smsUid = $sms_uid_num; //'S1456191582441666'


			$sms = new AdnSmsNotification();
			$sms_status = $sms->checkSmsStatus($smsUid);
			$sms = json_decode($sms_status);
			// print_r($sms_status);
			// print_r($sms->sms->sms_status);
			// print_r($sms->sms->sms_quantity);
		}



		public function send_campaign_uid()
		{
			$this->load->view("php-oop-sample/lib/AdnSmsNotification.php");


			$messageType = 'UNICODE'; // option available: "TEXT", "UNICODE"
			$campaignTitle = '20180517_MultibodyCampaign01'; // optional for MULTIBODY_CAMPAIGN

			/*
			* Prepare the $smsArray for Multibody Campaign
			*/
			$smsArray = [
				['mobile' => '01701645480', 'message_body' => 'This AdnSms SMS CHEAK 01'],
				// ['mobile' => '01676065851', 'message_body' => 'This is message body 02'],
				// ['mobile' => '8801617xxxxxx', 'message_body' => 'This is message body 03'],
				// ['mobile' => '8801527xxxxxx', 'message_body' => 'This is message body 04'],
				// ['mobile' => '8801927xxxxxx', 'message_body' => 'This is message body 05'],
			];

			$sms = new AdnSmsNotification();
			$response = $sms->multibodyCampaign($smsArray, $messageType, $campaignTitle);
			var_dump($response);
			print_r($sms_status);
		}



		public function cheak_campaign_uid()
		{
			$this->load->view("php-oop-sample/lib/AdnSmsNotification.php");

			$campaignUid = 'C6396441582780504';

			$sms = new AdnSmsNotification();
			$response = $sms->checkCampaignStatus($campaignUid);
			$sms = json_decode($response);

			print_r($response->campaign_uid);
			print_r($sms);
			print_r($sms->campaign_uid);
			$sms_status = $sms->api_response_message;
			print_r($sms_status);

		}



		public function date_search()
		{
			$this->load->view("header");
			$this->load->view('date_search');
			$this->load->view("footer");
		}


		public function date_search_sql()
		{
			$first_date = $this->input->post('first_date', true);
			$last_date = $this->input->post('last_date', true);


			$this->load->model('search');
			$search_date_inside_all_info = $this->search->search_date_value($first_date, $last_date);
			
			echo json_encode($search_date_inside_all_info);
		}


}
