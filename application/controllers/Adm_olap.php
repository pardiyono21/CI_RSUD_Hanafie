<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_olap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
 		if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['hak_akses']=='admin'){
			
		}else{
			redirect('/login/');
		}
	}

	public function index()
	{
		
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap');
		$this->load->view('admin/nav/footer');
	}

	public function proses_olap(){
		$olap=$this->input->get('olap');
		$info=$this->input->get('informasi');
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		if ($olap=='rawat_inap' && $info=='') {
			redirect(base_url('adm_olap_rawatinap?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_inap' && $info=='informasi1') {
			redirect(base_url('adm_olap_rawatinap/informasi1?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_inap' && $info=='informasi2') {
			redirect(base_url('adm_olap_rawatinap/informasi2?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_inap' && $info=='informasi3') {
			redirect(base_url('adm_olap_rawatinap/informasi3?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_inap' && $info=='informasi4') {
			redirect(base_url('adm_olap_rawatinap/informasi4?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_inap' && $info=='informasi5') {
			redirect(base_url('adm_olap_rawatinap/informasi5?awal='.$awal.'&akhir='.$akhir.''));
		}

		elseif ($olap=='rawat_jalan' && $info=='') {
			redirect(base_url('adm_olap_rawatjalan?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_jalan' && $info=='informasi1') {
			redirect(base_url('adm_olap_rawatjalan/informasi1?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_jalan' && $info=='informasi2') {
			redirect(base_url('adm_olap_rawatjalan/informasi2?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_jalan' && $info=='informasi3') {
			redirect(base_url('adm_olap_rawatjalan/informasi3?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_jalan' && $info=='informasi4') {
			redirect(base_url('adm_olap_rawatjalan/informasi4?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='rawat_jalan' && $info=='informasi5') {
			redirect(base_url('adm_olap_rawatjalan/informasi5?awal='.$awal.'&akhir='.$akhir.''));
		}

		elseif ($olap=='penunjang_medis' && $info=='') {
			redirect(base_url('adm_olap_penunjangmedis?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='penunjang_medis' && $info=='informasi1') {
			redirect(base_url('adm_olap_penunjangmedis/informasi1?awal='.$awal.'&akhir='.$akhir.''));
		}
		elseif ($olap=='penunjang_medis' && $info=='informasi2') {
			redirect(base_url('adm_olap_penunjangmedis/informasi2?awal='.$awal.'&akhir='.$akhir.''));
		}
		elseif ($olap=='penunjang_medis' && $info=='informasi3') {
			redirect(base_url('adm_olap_penunjangmedis/informasi3?awal='.$awal.'&akhir='.$akhir.''));
		}

		elseif ($olap=='apotek' && $info=='') {
			redirect(base_url('adm_olap_apotek?awal='.$awal.'&akhir='.$akhir.''));
		}elseif ($olap=='apotek' && $info=='informasi1') {
			redirect(base_url('adm_olap_apotek/informasi1?awal='.$awal.'&akhir='.$akhir.''));
		}

		else{
			redirect(base_url('adm_olap'));
		}

	}
}
