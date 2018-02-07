<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('zip');
				if(!is_logged_in())  // if you add in constructor no need write each function in above controller.
				{
				 redirect('');
				}
    }

	public function index(){
		$page = 'profile';
		$s = $this->mymodel->Select('user', 'ORDER BY id_user DESC');
		$data = array('data' => $s);

		$comp = array(
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"content" => $this->load->view('content',$data,true),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('profile/index', $comp);
		//$this->load->view('beranda', $data);
	}

	public function insert(){
		$page = 'profile';
		$comp = array(
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('profile/insert', $comp);
	}

	public function do_insert(){
		$data = array(
		  'nama' => $this->input->post('nama'),
		  'email' => $this->input->post('email'),
		  'level' => $this->input->post('level'),
			'password' => md5($this->input->post('password')),
		);
		$res = $this->mymodel->Insert('user', $data);

		if($res >= 1){
			$this->load->library('session');
			$this->session->set_flashdata('pesan', 'sukses_tambah');
			redirect('profile');
		}
	}

	public function update($id){

		$page = 'profile';
		$list = $this->mymodel->Select("user", "WHERE id_user = '$id' ");

		foreach ($list as $d) {
			$nama = $d->nama;
			$email = $d->email;
			$level = $d->level;
		}

		$comp = array(
			'id' => $id,
			'nama' => $nama,
			'email' => $email,
			'level' => $level,
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('profile/update',$comp);
	}
	public function do_update($id){
		$data = array(
			'nama' => $this->input->post('nama'),
		  'email' => $this->input->post('email'),
		  'level' => $this->input->post('level'),
		);
		$where = array('id_user' => $id);
		$res = $this->mymodel->Update('user', $data, $where);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_edit');
			redirect('profile/index');
		  //echo "insert sukses";
		}
	}

	public function do_delete($id){
		$data = array('id_user' => $id);
		$res = $this->mymodel->Delete('user', $data);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_hapus');
			redirect('profile/index');
		}
	}

	public function ubah_pass($id){
		$page = 'profile';
		$comp = array(
			"id" => $id,
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('profile/ubah_pass', $comp);
	}

	public function do_ubah_pass($id){
		$lama = md5($this->input->post('lama'));
		$baru = md5($this->input->post('baru'));
		$list = $this->mymodel->Select("user", "WHERE id_user = '$id'");
		$count = count($list);
		if ($count > 0 ){
			foreach ($list as $d) {
				$password = $d->password;
			}
			if($lama == $password){

				$data = array(
				  'password' => $baru
				);
				$where = array('id_user' => $id);
				$res = $this->mymodel->Update('user', $data, $where);
				$this->session->set_flashdata('pesan', 'sukses');
				redirect('profile');
			}else{
				$this->session->set_flashdata('pesan', 'gagal');
				redirect('profile/ubah_pass/'.$id.'');
			}
		}else{
			$this->session->set_flashdata('pesan', 'gagal');
			redirect('profile/ubah_pass/'.$id.'');
		}
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

	public function navbar($page){
		$data = array(
			"page" => $page
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


	//=============================== AVAILABILITY =================================


	function check_no_availability(){

		$this->load->model('mymodel');
		if($this->mymodel->is_no_available($this->input->post('no'))) {
			echo "No Surat telah digunakan";
		}
	}

}
