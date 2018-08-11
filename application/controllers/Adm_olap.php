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
		if ($this->input->post('olap')=='rawat_inap' && $this->input->post('informasi')=='') {
			redirect(base_url('adm_olap_rawatinap'));
		}elseif ($this->input->post('olap')=='rawat_inap' && $this->input->post('informasi')=='informasi1') {
			redirect(base_url('adm_olap_rawatinap/informasi1'));
		}elseif ($this->input->post('olap')=='rawat_inap' && $this->input->post('informasi')=='informasi2') {
			redirect(base_url('adm_olap_rawatinap/informasi2'));
		}elseif ($this->input->post('olap')=='rawat_inap' && $this->input->post('informasi')=='informasi3') {
			redirect(base_url('adm_olap_rawatinap/informasi3'));
		}elseif ($this->input->post('olap')=='rawat_inap' && $this->input->post('informasi')=='informasi4') {
			redirect(base_url('adm_olap_rawatinap/informasi4'));
		}elseif ($this->input->post('olap')=='rawat_inap' && $this->input->post('informasi')=='informasi5') {
			redirect(base_url('adm_olap_rawatinap/informasi5'));
		}

		elseif ($this->input->post('olap')=='rawat_jalan' && $this->input->post('informasi')=='') {
			redirect(base_url('adm_olap_rawatjalan'));
		}elseif ($this->input->post('olap')=='rawat_jalan' && $this->input->post('informasi')=='informasi1') {
			redirect(base_url('adm_olap_rawatjalan/informasi1'));
		}elseif ($this->input->post('olap')=='rawat_jalan' && $this->input->post('informasi')=='informasi2') {
			redirect(base_url('adm_olap_rawatjalan/informasi2'));
		}elseif ($this->input->post('olap')=='rawat_jalan' && $this->input->post('informasi')=='informasi3') {
			redirect(base_url('adm_olap_rawatjalan/informasi3'));
		}elseif ($this->input->post('olap')=='rawat_jalan' && $this->input->post('informasi')=='informasi4') {
			redirect(base_url('adm_olap_rawatjalan/informasi4'));
		}elseif ($this->input->post('olap')=='rawat_jalan' && $this->input->post('informasi')=='informasi5') {
			redirect(base_url('adm_olap_rawatjalan/informasi5'));
		}

		elseif ($this->input->post('olap')=='penunjang_medis' && $this->input->post('informasi')=='') {
			redirect(base_url('adm_olap_penunjangmedis'));
		}elseif ($this->input->post('olap')=='penunjang_medis' && $this->input->post('informasi')=='informasi1') {
			redirect(base_url('adm_olap_penunjangmedis/informasi1'));
		}
		elseif ($this->input->post('olap')=='penunjang_medis' && $this->input->post('informasi')=='informasi2') {
			redirect(base_url('adm_olap_penunjangmedis/informasi2'));
		}
		elseif ($this->input->post('olap')=='penunjang_medis' && $this->input->post('informasi')=='informasi3') {
			redirect(base_url('adm_olap_penunjangmedis/informasi3'));
		}

		elseif ($this->input->post('olap')=='apotek' && $this->input->post('informasi')=='') {
			redirect(base_url('adm_olap_apotek'));
		}elseif ($this->input->post('olap')=='apotek' && $this->input->post('informasi')=='informasi1') {
			redirect(base_url('adm_olap_apotek/informasi1'));
		}

		else{
			redirect(base_url('adm_olap'));
		}

	}
}
