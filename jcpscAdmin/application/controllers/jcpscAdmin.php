<?php
require "vendor/autoload.php";
use Dompdf\Dompdf;

defined('BASEPATH') OR exit('No direct script access allowed');


class jcpscAdmin extends CI_Controller {


	public function pdf()
	{

		// $data = array(
		// 	'title_english' => "jamil ahmed",
		// 	'title_bangla' => "আস্ফাস্ফাস্ফাদ সদফাদস্ফাফাদস্ফ স্ফাদফ",
		// 	'des_english' => "jamil ahmedI am looking for a developer to make a tournament site (esport) with a system of registration and connection of the teams, in addition to registering for the tournaments they will be able to have their team file and according to the placement on each tournament they will win points and a ranking is displayed. preferably under wordpress (possibility of using a template)",
		// 	'des_bangla' => "জামিল আহ্মেদ আমি একটি বিকাশকারীকে দলগুলির রেজিস্ট্রেশন এবং সংযোগ ব্যবস্থা সহ dfgfgfd সাইট (এস্পোর্ট) তৈরি করার জন্য খুঁজছি, টুর্নামেন্টগুলির জন্য নিবন্ধকরণ ছাড়াও তারা তাদের দলের ফাইল রাখতে সক্ষম হবে এবং প্রতিটি টুর্নামেন্টের স্থান অনুসারে তারা পয়েন্ট জিতবে এবং একটি র‌্যাঙ্কিং প্রদর্শিত হবে। সাধারণত ওয়ার্ডপ্রেসের অধীনে (কোনও টেম্পলেট ব্যবহারের সম্ভাবনা)",
		// 	'creator' => "jamil ahmed aj",
		// 	'notice_date' => "10-20-2020",
		// );
		// // $data = "md jamil aj";
		// $this->load->model('pdf');
		// $html = $this->pdf->pdf1($data);

		// var_dump($html);

			
		$html ='<!DOCTYPE html>
			<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<style>
			@font-face {
			font-family: SolaimanLipi;
			font-style: normal;
			font-weight: normal;
			src: url(http://files.ekushey.org/Ekushey_OpenType_Bangla_Fonts/SolaimanLipi_22-02-2012.ttf) format(\'true-type\');
			}
			</style>

			</head>
			<body>
				<p style="font-family: SolaimanLipi">আস্ফাস্ফাস্ফাদ সদফাদস্ফাফাদস্ফ স্ফাদফ</p>
				<p>asdasdasdas dfsdf sdfsdf</p>
			</body>
			</html>';

			$dompdf = new DOMPDF();

			//load stored html string
			$dompdf->load_html($html);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4');

			$dompdf->set_option('defaultMediaType', 'all');
			$dompdf->set_option('isFontSubsettingEnabled', true);


			$dompdf->render();
			$dompdf->stream("sample.pdf");

		
		
	}



	public function index()
	{
		$this->load->view('header');

		$data['details'] = $this->db->get('common_details')->result_array();
		$this->load->view('admin/setup/index', $data);
		// echo CI_VERSION;
		$this->load->view('footer');
	}

	public function edit()
	{
		$this->load->view('header');

		$edit_id = $this->input->get('edit');
		$query = $this->db->select('*')
		->where('news_id', $edit_id)
		->get('common_details');
		$data['edit_data'] = $query->result();

		// var_dump($data);
		// echo $data;
		$this->load->view('admin/setup/edit', $data);

		// $data['details'] = $this->db->get('common_details')->result_array();
        // $this->load->view('admin/setup/index', $data);
		$this->load->view('footer');
	}



	public function update()
	{
		$news_id = $this->input->post('news_id');

		$data = array(
			'news_title' => $this->input->post('news_title'),
			'news_title_bangla' => $this->input->post('news_title_bangla'),
			'news_details' => $this->input->post('news_details'),
			'news_details_bangla' => $this->input->post('news_details_bangla'),
			'news_date' => $this->input->post('news_date'),
			'showDocument' => $this->input->post('showDocument'),
			);

		$this->db->where('news_id', $news_id);
		$this->db->update('common_details', $data);
		// echo $news_title ."<br>";
		// echo $news_title_bangla ."<br>";
		// echo $news_details ."<br>";
		// echo $news_details_bangla ."<br>";


	}


	public function notice_index()
	{
		$this->load->view('header');
		$first_date = $this->input->post('first_date');
		$last_date = $this->input->post('last_date');

		if($first_date=='' || $last_date==''){
			$data['details'] = $this->db->get('notice')->result_array();
		}else{
			$query = $this->db->select('*')
				->where('doc >=', $first_date)
				->where('doc <=', $last_date)
				->get('notice');
			
			$data['details'] = $query->result_array();
			// $data['details'] = $this->db->get('notice')->result_array();
		}

		$this->load->view('admin/setup/notice/index', $data);
		$this->load->view('footer');
	}



	public function notice_create()
	{
		$this->load->view('header');

		$data['details'] = $this->db->get('common_details')->result_array();
        $this->load->view('admin/setup/notice/notice_create', $data);
		$this->load->view('footer');
	}
	
	
	public function notice_store()
	{
		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx';
	    $config['max_size'] = '2000';
	    $config['max_width']  = '2200';
	    $config['max_height']  = '1800';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('attachment')) {
			echo $this->upload->display_errors();
			$error = 1;
	    } else {

	        $photo = $this->upload->data();
	        $file_name = $photo['file_name'];
	    }


	    
	    $title_english = $this->input->post('title_english');
		$title_bangla = $this->input->post('title_bangla');
		$des_english = $this->input->post('des_english');
		$des_bangla = $this->input->post('des_bangla');
		$notice_date = $this->input->post('notice_date');
		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$showDocument = $this->input->post('showDocument');
		$notice_publish_date_time = $publish_date."-".$publish_time;
		$creator = $this->input->post('creator');
		if($error === 1){
			$attachment = '0';
		}else{
			$attachment = $file_name;
		}


		$data = array();
		$data = ['title_english' => $title_english, 'title_bangla' => $title_bangla, 'des_english' => $des_english, 'des_bangla' => $des_bangla, 'attachment' => $attachment, 'notice_date' => $notice_date, 'notice_publish_date_time' => $notice_publish_date_time, 'creator' => $creator, 'showDocument' => $showDocument];
		$this->db->insert('notice', $data);


	}


	public function notice_print()
	{    
		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$notice_publish_date_time = $publish_date."-".$publish_time;


		$data['notice_info'] = array(
			'title_english' => $this->input->post('title_english'),
			'title_bangla' => $this->input->post('title_bangla'),
			'des_english' => $this->input->post('des_english'),
			'des_bangla' => $this->input->post('des_bangla'),
			'notice_date' => $this->input->post('notice_date'),
			'showDocument' => $this->input->post('showDocument'),
			'notice_publish_date_time' => $this->input->post('notice_publish_date_time'),
			'creator' => $this->input->post('creator'),
			);




			require "vendor/autoload.php";
			$fileUrl = base_url()."pdf.php";

			$fileContent = file_get_contents($fileUrl) ;

			$dompdf = new DOMPDF();
			//load stored html string
			$dompdf->load_html($fileContent);
			$dompdf->render();
			$dompdf->stream("sample.pdf");

			redirect(base_url());


	}



	public function notice_store_and_print()
	{
		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx';
	    $config['max_size'] = '2000';
	    $config['max_width']  = '2200';
	    $config['max_height']  = '1800';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('attachment')) {
			// echo $this->upload->display_errors();
			$error = 1;
	    } else {

	        $photo = $this->upload->data();
	        $file_name = $photo['file_name'];
	    }


	    
	    $title_english = $this->input->post('title_english');
		$title_bangla = $this->input->post('title_bangla');
		$des_english = $this->input->post('des_english');
		$des_bangla = $this->input->post('des_bangla');
		$notice_date = $this->input->post('notice_date');
		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$showDocument = $this->input->post('showDocument');
		$notice_publish_date_time = $publish_date."-".$publish_time;
		$creator = $this->input->post('creator');
		if($error === 1){
			$attachment = '0';
		}else{
			$attachment = $file_name;
		}


		$data = array();
		$data = ['title_english' => $title_english, 'title_bangla' => $title_bangla, 'des_english' => $des_english, 'des_bangla' => $des_bangla, 'attachment' => $attachment, 'notice_date' => $notice_date, 'notice_publish_date_time' => $notice_publish_date_time, 'creator' => $creator, 'showDocument' => $showDocument];
		$this->db->insert('notice', $data);


		    $data['notice_info'] = array(
			'title_english' => $title_english,
			'title_bangla' => $title_bangla,
			'des_english' => $des_english,
			'des_bangla' => $des_bangla,
			'notice_date' => $notice_date,
			'notice_publish_date_time' => $notice_publish_date_time,
			'creator' => $creator,
			'showDocument' => $this->input->post('showDocument'),
			'file_name' => $attachment,
			);
			$this->load->view('admin/setup/notice/notice_print', $data);
	}


	public function notice_edit()
	{
		$this->load->view('header');

		$edit_id = $this->input->get('edit');
		$query = $this->db->select('*')
		->where('id', $edit_id)
		->get('notice');
		$data['edit_data'] = $query->result();

		// var_dump($data);
		// echo $data;
		$this->load->view('admin/setup/notice/edit', $data);

		// $data['details'] = $this->db->get('common_details')->result_array();
        // $this->load->view('admin/setup/index', $data);
		$this->load->view('footer');
	}



	public function notice_update()
	{
		$error = 0;

		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx';
	    $config['max_size'] = '2000';
	    $config['max_width']  = '2200';
	    $config['max_height']  = '1800';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('attachment')) {
			// echo $this->upload->display_errors();
			$error = 1;
	    } else {

	        $photo = $this->upload->data();
	        $file_name = $photo['file_name'];
		}
		
		$notice_id = $this->input->post('notice_id');
		$file_url = $this->input->post('file_url');

		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$notice_publish_date_time = $publish_date."-".$publish_time;
		
		if($error === 1){
			$attachment = $file_url;
		}else{
			$attachment = $file_name;
		}
		$data = array(
			'title_english' => $this->input->post('title_english'),
			'title_bangla' => $this->input->post('title_bangla'),
			'des_english' => $this->input->post('des_english'),
			'des_bangla' => $this->input->post('des_bangla'),
			'notice_date' => $this->input->post('notice_date'),
			'notice_publish_date_time' => $notice_publish_date_time,
			'creator' => $this->input->post('creator'),
			'showDocument' => $this->input->post('showDocument'),
			'attachment' => $attachment,
			);

		$this->db->where('id', $notice_id);
		$this->db->update('notice', $data);

		$this->session->set_flashdata('msg', 'Update Successfully !');
		redirect(base_url().'jcpscAdmin/notice_index');
	}




	public function notice_update_and_print()
	{
		$error = 0;

		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx';
	    $config['max_size'] = '2000';
	    $config['max_width']  = '2200';
	    $config['max_height']  = '1800';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('attachment')) {
			// echo $this->upload->display_errors();
			$error = 1;
	    } else {

	        $photo = $this->upload->data();
	        $file_name = $photo['file_name'];
		}
		
		$notice_id = $this->input->post('notice_id');
		$file_url = $this->input->post('file_url');

		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$notice_publish_date_time = $publish_date."-".$publish_time;
		
		if($error === 1){
			$attachment = $file_url;
		}else{
			$attachment = $file_name;
		}
		$data = array(
			'title_english' => $this->input->post('title_english'),
			'title_bangla' => $this->input->post('title_bangla'),
			'des_english' => $this->input->post('des_english'),
			'des_bangla' => $this->input->post('des_bangla'),
			'notice_date' => $this->input->post('notice_date'),
			'notice_publish_date_time' => $notice_publish_date_time,
			'creator' => $this->input->post('creator'),
			'showDocument' => $this->input->post('showDocument'),
			'attachment' => $attachment,
			);

		$this->db->where('id', $notice_id);
		$this->db->update('notice', $data);

		// $this->session->set_flashdata('msg', 'Update Successfully !');
		// redirect(base_url().'jcpscAdmin/notice_index');

		$value['notice_info'] = $data;

		$this->load->view('admin/setup/notice/notice_print', $value);
	}

}
