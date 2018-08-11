<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_olap_apotek extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();	
		$this->load->model('MOlap_apotek','apotek');	
 		if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['hak_akses']=='admin'){
			
		}else{
			redirect('/login/');
		}
	}

	public function index()
	{
		
		$data['apotek']=$this->apotek->apotek()->result();
		$data['all_pasien']=$this->apotek->all_pasien()->all_pasien;
		foreach ($this->apotek->apotek()->result() as $key) {
				$namabulan[]=$key->bulan;
				$jml[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['jml']= json_encode($jml);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_apotek',$data);
		$this->load->view('admin/nav/footer');
	}
	public function informasi1()
	{
		
		$data['apotek']=$this->apotek->apotek()->result();
		$data['all_pasien']=$this->apotek->all_pasien()->all_pasien;
		
		foreach ($this->apotek->apotek()->result() as $key) {
				$namabulan[]=$key->bulan;
				$jmlp[]=$key->jml/3;
				$jmll[]=$key->jml-($key->jml/3);
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['jmlp']= json_encode($jmlp);
			$data['jmll']= json_encode($jmll);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_apotek_medik',$data);
		$this->load->view('admin/nav/footer');
	}
}
