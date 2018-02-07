<?php
class my404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
      $page = 'beranda';

  		$comp = array(
  			"head" => $this->head(),
  			"sidebar" => $this->sidebar($page),
  			"navbar" => $this->navbar($page),
  			"footer" => $this->footer(),
  			"load_js" => $this->load_js(),
  		);
  		$this->load->view('404', $comp);
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
      $data = array();
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
