<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_edaran extends CI_Controller {

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
		$page = 'edaran';
		$s = $this->mymodel->Select('s_edaran', 'ORDER BY id_surat DESC');
		$data = array('data' => $s);

		$comp = array(
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"content" => $this->load->view('content',$data,true),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_edaran/index', $comp);
		//$this->load->view('beranda', $data);
	}

	public function insert(){
		$page = 'edaran';
		$comp = array(
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_edaran/insert', $comp);
	}

	public function do_insert(){
		$data = array(
		  'no_surat' => $this->input->post('no'),
		  'tanggal' => $this->input->post('tgl'),
		  'perihal' => $this->input->post('perihal'),
		  'kepada' => $this->input->post('kepada'),
			'pemberi' => $this->input->post('pemberi'),
			'inisial' => $this->input->post('inisial'),
			//'gambar' => $_POST['gambar']
		);

		$no_surat = $this->input->post('no');
		$res = $this->mymodel->Insert('s_edaran', $data);
		$s=$this->mymodel->Select('s_edaran', 'where no_surat = "'.$no_surat.'"');
		foreach ($s as $row)
		{
		   $id = $row->id_surat;
		}

		if($res >= 1){
			$this->load->library('session');
			$this->session->set_flashdata('pesan', 'sukses_tambah');
			$sesi = array('id'=>$id);
			$this->session->set_userdata($sesi);
			redirect('surat_edaran/upload_gambar/'.$id.'');
		  //echo "insert sukses";
		}
	}

	public function update($id){

		$page = 'edaran';
		$list = $this->mymodel->Select("s_edaran", "WHERE id_surat = '$id' ");

		foreach ($list as $d) {
			$no = $d->no_surat;
			$tgl = $d->tanggal;
			$perihal = $d->perihal;
			$kepada = $d->kepada;
			$pemberi = $d->pemberi;
			$inisial = $d->inisial;
		}

		$comp = array(
			'id' => $id,
			'no' => $no,
			'tgl' => $tgl,
			'perihal' => $perihal,
			'kepada' => $kepada,
			'pemberi' => $pemberi,
			'inisial' => $inisial,
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_edaran/update',$comp);
	}
	public function do_update($id){
		$data = array(
			'no_surat' => $this->input->post('no'),
		  'tanggal' => $this->input->post('tgl'),
		  'perihal' => $this->input->post('perihal'),
		  'kepada' => $this->input->post('kepada'),
			'pemberi' => $this->input->post('pemberi'),
			'inisial' => $this->input->post('inisial'),
			//'gambar' => $_POST['gambar']
		);
		$where = array('id_surat' => $id);
		$res = $this->mymodel->Update('s_edaran', $data, $where);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_edit');
			redirect('surat_edaran/index');
		  //echo "insert sukses";
		}
	}

	public function do_delete($id){
		$data = array('id_surat' => $id);
		$res = $this->mymodel->Delete('s_edaran', $data);

		if($res >= 1){
			$this->session->set_flashdata('pesan', 'sukses_hapus');
			redirect('surat_edaran/index');
		}
	}


	public function upload_gambar(){
		$page = 'edaran';
		$comp = array(
			"head" => $this->head(),
			"sidebar" => $this->sidebar($page),
			"navbar" => $this->navbar($page),
			"footer" => $this->footer(),
			"load_js" => $this->load_js(),
		);
		$this->load->view('surat_edaran/upload_gambar', $comp);
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

			 $query = $this->db->query("SELECT * FROM berkas WHERE id_surat ='$id' AND jenis='edaran' ");
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
				$newfilename = $id."-surat-edaran-". $i . $file_ext;

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
				  'jenis' => 'edaran'
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
		$page = 'edaran';
		$list = $this->mymodel->Select("s_edaran", "WHERE id_surat = '$id' ");
		foreach ($list as $d) { $no = $d->no_surat;}

		$s = $this->mymodel->Select("berkas", "WHERE id_surat = '$id' AND jenis='edaran' ");
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
		$this->load->view('surat_edaran/lihat_gambar', $comp);
	}

	public function download_berkas($id){
			$query = $this->mymodel->Select("berkas", "WHERE id_surat = '$id' ");

			foreach ($query as $row){
					$dir = "assets/file/";
					$dir = $dir."".$row->gambar;
			    $this->zip->read_file($dir);
			}

			$list = $this->mymodel->Select("s_edaran", "WHERE id_surat = '$id' ");
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
			redirect('surat_edaran/lihat_gambar/'.$id_surat.'');
		}
	}





	//============================== VALIDASI UNIK ===============================
	function filename_exists(){
    $no = $this->input->post('no');
    $exists = $this->User_model->filename_exists('s_edaran', $no);

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
