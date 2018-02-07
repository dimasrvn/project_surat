<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('zip');
    }

	public function index(){
		$page = 'masuk';
		$level = $this->session->userdata('level');
		if($level == 'sekertaris'){
			$s = $this->mymodel->Select('s_masuk', 'ORDER BY id_surat DESC');
		}else if($level == 'dirut'){
			$s = $this->mymodel->Select('s_masuk', 'ORDER BY id_surat DESC');
		}else if($level == 'dirkeu'){
			$s = $this->mymodel->Select('s_masuk', 'where status_disposisi_1 = "1" OR status_disposisi_1 = "3" ORDER BY id_surat DESC');
		}else if($level == 'dirtek'){
			$s = $this->mymodel->Select('s_masuk', 'where status_disposisi_1 = "2" OR status_disposisi_1 = "3" ORDER BY id_surat DESC');
		}else{
			$s = $this->mymodel->Select('s_masuk', 'ORDER BY id_surat DESC');
		}

		//$s = $this->mymodel->Select('s_masuk');
		$data = array('data' => $s);

		$comp = array(
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"content" => $this->load->view('content',$data,true),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_masuk/index', $comp);
		//$this->load->view('beranda', $data);
	}

	public function insert(){
		$page = 'masuk';
		$comp = array(
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_masuk/insert', $comp);
	}

	public function do_insert(){
		$data = array(
		  'no_surat' => $this->input->post('no'),
		  'tanggal_terima' => $this->input->post('tgl_terima'),
		  'tanggal_surat' => $this->input->post('tgl_surat'),
		  'perihal' => $this->input->post('perihal'),
		  'kepada' => $this->input->post('kepada'),
			'pemberi' => $this->input->post('pemberi'),
			// 'status_disposisi_1' => 0,
			// 'status_disposisi_2' => 0,
			// 'status' => 0,
			//'gambar' => $_POST['gambar']
		);

		$no_surat = $this->input->post('no');
		$res = $this->mymodel->Insert('s_masuk', $data);
		$s=$this->mymodel->Select('s_masuk', 'where no_surat = "'.$no_surat.'"');
		foreach ($s as $row)
		{
		   $id = $row->id_surat;
		}

		if($res >= 1){
			$this->load->library('session');
			$this->session->set_flashdata('pesan', 'sukses_tambah');
			$sesi = array('id'=>$id);
			$this->session->set_userdata($sesi);
			redirect('surat_masuk/upload_gambar/'.$id.'');
		  //echo "insert sukses";
		}
	}

	public function update($id){

		$page = 'masuk';
		$list = $this->mymodel->Select("s_masuk", "WHERE id_surat = '$id' ");

		foreach ($list as $d) {
			$no = $d->no_surat;
			$tanggal_surat = $d->tanggal_surat;
			$tanggal_terima = $d->tanggal_terima;
			$perihal = $d->perihal;
			$kepada = $d->kepada;
			$pemberi = $d->pemberi;
		}

		$comp = array(
			'id' => $id,
			'no' => $no,
			'tanggal_terima' => $tanggal_terima,
			'tanggal_surat'=> $tanggal_surat,
			'perihal' => $perihal,
			'kepada' => $kepada,
			'pemberi' => $pemberi,
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_masuk/update',$comp);
	}
	public function do_update($id){
		$data = array(
			  'no_surat' => $this->input->post('no'),
			  'tanggal_terima' => $this->input->post('tgl_terima'),
			  'tanggal_surat' => $this->input->post('tgl_surat'),
			  'perihal' => $this->input->post('perihal'),
			  'kepada' => $this->input->post('kepada'),
			  'pemberi' => $this->input->post('pemberi'),
			//'gambar' => $_POST['gambar']
		);
		$where = array('id_surat' => $id);
		$res = $this->mymodel->Update('s_masuk', $data, $where);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_edit');
			redirect('surat_masuk/index');
		  //echo "insert sukses";
		}
	}

	public function do_delete($id){
		$data = array('id_surat' => $id);
		$res = $this->mymodel->Delete('s_masuk', $data);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_hapus');
			redirect('surat_masuk/index');
		}
	}


	public function upload_gambar(){
		$page = 'masuk';
		$comp = array(
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_masuk/upload_gambar', $comp);
	}

	public function upload(){
		// $ida = $this->uri->segment(3);
		// $id = "'".$ida."'";
		$id = $this->session->userdata('id');
		$dir = "assets/file/";

		//mkdir($dir);
		  if($_FILES["files"]["name"] != '')
		  {
		   $output = '';
		   $config["upload_path"] = $dir;
		   $config["allowed_types"] = 'gif|jpg|png';
		   $this->load->library('upload', $config);
		   $this->upload->initialize($config);

			 $query = $this->db->query("SELECT * FROM berkas WHERE id_surat ='$id' AND jenis='masuk' ");
			 $c = $query->num_rows();

			 if($c>0){
				 $i=$c+1;
			 }else{
				 $i=0;
			 }

		   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
		   {
		   	$filename = $_FILES["files"]["name"][$count];
				$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
				$file_ext = substr($filename, strripos($filename, '.')); // get file name
				$newfilename = $id."-surat-masuk-". $i . $file_ext;

		    $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
		    $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
		    $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
		    $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
		    $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

		    if($this->upload->do_upload('file'))
		    {
		     $data = $this->upload->data();
		     move_uploaded_file($_FILES["file"]["tmp_name"], $dir . $newfilename);
		     $temp = "assets/file/".$_FILES["file"]["name"];
		     $temp = str_replace(" ","_", $temp);
		     unlink($temp);


		     $data1 = array(
				  'id_surat' => $id,
				  'gambar' => $newfilename,
				  'jenis' => 'masuk'
				 	);

			 	 $res = $this->mymodel->Insert('berkas', $data1);

		     $gambar = $newfilename;
		     $output .= '
		     <div class="col-md-3">
		      <img src="'.base_url().'assets/file/'.$gambar.'" class="img-responsive img-thumbnail" />
		     </div>
		     ';
		    }
				$i++;
			}

		   echo $output;
		 }	$this->session->set_flashdata('pesan', 'sukses_tambah');
		 }

	public function lihat_gambar($id){
		$page = 'masuk';
		$list = $this->mymodel->Select("s_masuk", "WHERE id_surat = '$id' ");
		foreach ($list as $d) { $no = $d->no_surat;}

		$s = $this->mymodel->Select("berkas", "WHERE id_surat = '$id' AND jenis='masuk' ");
		$data = array('data' => $s);

		$comp = array(
			'no' => $no,
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"content" => $this->load->view('content',$data,true),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$sesi = array('id'=>$id);
		$this->session->set_userdata($sesi);
		$this->load->view('surat_masuk/lihat_gambar', $comp);
	}

	public function download_berkas($id){
			$query = $this->mymodel->Select("berkas", "WHERE id_surat = '$id' ");

			foreach ($query as $row){
					$dir = "assets/file/";
					$dir = $dir."".$row->gambar;
			    $this->zip->read_file($dir);
			}

			$list = $this->mymodel->Select("s_masuk", "WHERE id_surat = '$id' ");
			foreach ($list as $d) {
				$no = $d->no_surat;
			}

			$nama_berkas = "berkas-".$no;
			$this->zip->download($nama_berkas);
  }

	public function do_delete_gambar($id_surat,$id){
		$data = array('id_berkas' => $id);

		$s = $this->mymodel->Select("berkas", "WHERE id_berkas = '$id' ");
		foreach ($s as $d) {
			$gambar = $d->gambar;
		}

		$res = $this->mymodel->Delete('berkas', $data);

		$temp = "assets/file/".$gambar;
		$temp = str_replace(" ","_", $temp);
		unlink($temp);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_hapus');
			redirect('surat_kuasa/lihat_gambar/'.$id_surat.'');
		}
	}

	public function disposisi($id){
		$page = 'masuk';
		$list = $this->mymodel->Select("s_masuk", "WHERE id_surat = '$id' ");

		foreach ($list as $d) {
			$no = $d->no_surat;
			$disdirut = $d->disdirut;
			$status_disposisi_1 = $d->status_disposisi_1;
		}

		$comp = array(
			'id' => $id,
			'no' => $no,
			'disdirut' => $disdirut,
			'status_disposisi_1'=>$status_disposisi_1,
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_masuk/disposisi',$comp);
	}
	public function do_disposisi($id){
			$data = array(
			  'status_disposisi_1' => $this->input->post('status_disposisi_1'),
			  'disdirut' => $this->input->post('disdirut'),
			  'status' => '1'
			//'gambar' => $_POST['gambar']
		);
		$where = array('id_surat' => $id);
		$res = $this->mymodel->Update('s_masuk', $data, $where);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_edit');
			redirect('surat_masuk/index');
		  //echo "insert sukses";
		}
	}

	public function disposisi_2($id){
		$page = 'masuk';
		$list = $this->mymodel->Select("s_masuk", "WHERE id_surat = '$id' ");

		foreach ($list as $d) {
			$no = $d->no_surat;
			$disdirkeu = $d->disdirkeu;
		}

		$comp = array(
			'id' => $id,
			'no' => $no,
			'disdirkeu' => $disdirkeu,
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_masuk/disposisi_2',$comp);
	}

	public function do_disposisi_2($id){
		$list = $this->mymodel->Select("s_masuk", "WHERE id_surat = '$id' ");
		foreach ($list as $d) {
			$disu = $d->status_disposisi_1;
			$disk = $d->status_disposisi_2;
			$dist = $d->status_disposisi_3;
		}
		if($disu == 3){
			if(($disk == 0) AND ($dist == 0)){
				$data = array(
				  'status_disposisi_2' => '1',
				  'disdirkeu' => $this->input->post('disdirkeu'),
				  'status' => '1'
				);
			}else if(($disk == 0) AND ($dist == 1)){
				$data = array(
				  'status_disposisi_2' => '1',
				  'disdirkeu' => $this->input->post('disdirkeu'),
				  'status' => '2'
				);
			}
		}


		$where = array('id_surat' => $id);
		$res = $this->mymodel->Update('s_masuk', $data, $where);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_edit');
			redirect('surat_masuk/index');
		  //echo "insert sukses";
		}
	}

	public function disposisi_3($id){
		$page = 'masuk';
		$list = $this->mymodel->Select("s_masuk", "WHERE id_surat = '$id' ");

		foreach ($list as $d) {
			$no = $d->no_surat;
			$disdirtek = $d->disdirtek;
		}

		$comp = array(
			'id' => $id,
			'no' => $no,
			'disdirtek' => $disdirtek,
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_masuk/disposisi_3',$comp);
	}

	public function do_disposisi_3($id){
		$list = $this->mymodel->Select("s_masuk", "WHERE id_surat = '$id' ");
		foreach ($list as $d) {
			$disu = $d->status_disposisi_1;
			$disk = $d->status_disposisi_2;
			$dist = $d->status_disposisi_3;
		}
		if($disu == 3){
			if(($disk == 0) AND ($dist == 0)){
				$data = array(
				  'status_disposisi_3' => '1',
				  'disdirtek' => $this->input->post('disdirtek'),
				  'status' => '1'
				);
			}else if(($disk == 1) AND ($dist == 0)){
				$data = array(
				  'status_disposisi_3' => '1',
				  'disdirtek' => $this->input->post('disdirtek'),
				  'status' => '2'
				);
			}
		}


		$where = array('id_surat' => $id);
		$res = $this->mymodel->Update('s_masuk', $data, $where);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_edit');
			redirect('surat_masuk/index');
		  //echo "insert sukses";
		}
	}

	//============================== VALIDASI UNIK ===============================
	function filename_exists(){
    $no = $this->input->post('no');
    $exists = $this->User_model->filename_exists('s_masuk', $no);

    $count = count($exists);
    // echo $count

    if (empty($count)) {
        return true;
    } else {
        return false;
    }
	}


	//=============================== TEST INPUT =================================
	public function test_input($data){
		$data = mysql_real_escape_string($data);
		return $data;
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
      $sm0 = $this->mymodel->Select('s_masuk', 'WHERE status_disposisi_2="0" AND status="1"');
    }else if($level == "dirtek"){
      $sm0 = $this->mymodel->Select('s_masuk', 'WHERE status_disposisi_3="0" AND status="1"');
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


	//=============================== AVAILABILITY =================================


	function check_no_availability(){

		$this->load->model('mymodel');
		if($this->mymodel->is_no_available($this->input->post('no'))) {
			echo "No Surat telah digunakan";
		}
	}

}
