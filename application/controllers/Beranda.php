<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
		{
				parent::__construct();
				if(!is_logged_in())  // if you add in constructor no need write each function in above controller.
				{
				 redirect('');
				}
		}

	public function index(){
		$page = 'beranda';

		// COUNT

		 $sm = $this->mymodel->Select('s_masuk');
		 $sm0 = $this->mymodel->Select('s_masuk', 'WHERE status="0"');
		 $sm1 = $this->mymodel->Select('s_masuk', 'WHERE status="1"');
		 $sm2 = $this->mymodel->Select('s_masuk', 'WHERE status="2"');
		 $level = $this->session->userdata('level');
		 	if($level == "sekertaris"){
				$sm3 = $this->mymodel->Select('s_masuk', 'WHERE (status="0" OR status="1")');
	 		}else if($level == "dirut"){
				//$sm2 = $this->mymodel->Select('s_masuk', 'WHERE status_disposisi_1="0" AND status="2"');
				$sm3 = $this->mymodel->Select('s_masuk', 'WHERE (status="0" OR status="1")');
	 		}else if($level == "dirkeu"){
				//$sm2 = $this->mymodel->Select('s_masuk', 'WHERE status_disposisi_2="0" AND (status_disposisi_1="3" OR status_disposisi_1="1") AND status="2"');
				$sm3 = $this->mymodel->Select('s_masuk', 'WHERE (status_disposisi_1="3" OR status_disposisi_1="1") AND (status="0" OR status="1")');
	 		}else if($level == "dirtek"){
				//$sm2 = $this->mymodel->Select('s_masuk', 'WHERE status_disposisi_3="0" AND (status_disposisi_1="3" OR status_disposisi_1="2") AND status="2"');
				$sm3 = $this->mymodel->Select('s_masuk', 'WHERE (status_disposisi_1="3" OR status_disposisi_1="2") AND (status="0" OR status="1")');
	 		}else{
	 			//$sm2 = "";
				$sm3 = "";
	 		}



		//Disposisi
		$data = array(
			'data' => $sm3,
			'data_done' => $sm2
		);

		$comp = array(
			"jumlah_surat" => count($sm),
			"jumlah_surat0" => count($sm0),
			"jumlah_surat1" => count($sm1),
			"jumlah_surat2" => count($sm2),
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"content" => $this->load->view('content',$data,true),
			"navbar" => $this->navbar(),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('beranda/index', $comp);
		//$this->load->view('beranda', $data);
	}

	//================================ TEMPLATE ==================================

	public function head(){
		$data = array();
		return $this->load->view('head',$data,true);
	}

  public function sidebar($page){
		$data = array(
			"page" => $page
		);
		return $this->load->view('sidebar',$data,true);
	}

	public function navbar(){
		$level = $this->session->userdata('level');
		if($level == "dirut"){
			$sm0 = $this->mymodel->Select('s_masuk', 'WHERE status_disposisi_1="0"');
		}else if($level == "dirkeu"){
			$sm0 = $this->mymodel->Select('s_masuk', 'WHERE status_disposisi_2="0" AND (status_disposisi_1="3" OR status_disposisi_1="1") AND status="1"');
		}else if($level == "dirtek"){
			$sm0 = $this->mymodel->Select('s_masuk', 'WHERE status_disposisi_3="0" AND (status_disposisi_1="3" OR status_disposisi_1="2") AND status="1"');
		}else{
			$sm0 = "";
		}
		$data = array(
			"jumlah_surat0" => count($sm0),
			"surat0" => $sm0,
		);
		return $this->load->view('navbar',$data,true);
	}

	public function footer(){
		$data = array();
		return $this->load->view('footer',$data,true);
	}

	public function load_js(){
		$data = array();
		return $this->load->view('load_js',$data,true);
	}
}
