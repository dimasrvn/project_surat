<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){

		$comp = array(
			"head" => $this->head(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('login/index', $comp);
	}

	public function out(){
		$this->session->sess_destroy();
		redirect('');
	}

	public function proses(){
		  $email = $this->input->post('email');
		  $password = md5($this->input->post('password'));
			$list = $this->mymodel->Select("user", "WHERE email = '$email' AND password ='$password'");
			$count = count($list);
			if ($count > 0){
				foreach ($list as $d) {
					$id = $d->id_user;
					$email = $d->email;
					$pass = $d->password;
					$nama = $d->nama;
					$lvl = $d->level;
				}
				if($pass == $password){
					$user = array(
						'id_user'=>$id,
						'nama' => $nama,
						'level' => $lvl
					);
					$this->load->library('session');
					$this->session->set_userdata($user);
					redirect('beranda');
				}
			}else{
				$this->session->set_flashdata('pesan', 'gagal');
				redirect('login');
			}
	}

	public function forgot(){

		$comp = array(
			"head" => $this->head(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('login/forgot', $comp);
	}

	public function proses_forgot(){
		  $email = $this->input->post('email');
			$e=$this->mymodel->Select('user', 'where email = "'.$email.'"');
			if($e >= 1){
				foreach ($e as $row){
					$pass = $row->password;
					$id = $row->id_user;
				}

				$this->session->set_flashdata('pesan', 'sukses');
				//redirect('surat_keluar/upload_gambar/'.$id.'');
			}else{
				$this->session->set_flashdata('pesan', 'gagal');
				//redirect('surat_keluar/upload_gambar/'.$id.'');
			}
	}

	//================================ TEMPLATE ==================================

	public function head(){
		$data = array();
		return $this->load->view('head',$data,true);
	}

	public function load_js(){
		$data = array();
		return $this->load->view('load_js',$data,true);
	}
}
