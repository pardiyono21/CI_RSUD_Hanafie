<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_olap_penunjangmedis extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();	
		$this->load->model('MOlap_penunjangmedis','pen_medis');	
		$this->load->model('MOlap_penunjangmedis_jk','pen_medis_jk');
		$this->load->model('MOlap_penunjangmedis_jenis','pen_medis_jenis');
		$this->load->model('MOlap_penunjangmedis_asuransi','pen_medis_asuransi');	
 		if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['hak_akses']=='admin'){
			
		}else{
			redirect('/login/');
		}
	}

	public function index()
	{
		$data['pasien']=$this->pen_medis->pasien()->result();
		
		$data['all_pasien']=$this->pen_medis->all_pasien()->all_pasien;
		foreach ($this->pen_medis->pasien()->result() as $key) {
				$namabulan[]=$key->tgl_masuk;
				$jml[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['jml']= json_encode($jml);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_penunjangmedis',$data);
		$this->load->view('admin/nav/footer');
	}

	public function informasi1()
	{
		$data['pasien']=$this->pen_medis_jk->pasien_jk()->result();
		
		$data['all_pasien']=$this->pen_medis_jk->all_pasien()->all_pasien;
		foreach ($this->pen_medis_jk->pasien_jk()->result() as $key) {
				$namabulan[]=$key->tgl_masuk;
				$jmlp[]=$key->jml_p;
				$jmll[]=$key->jml_l;
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['jmlp']= json_encode($jmlp);
			$data['jmll']= json_encode($jmll);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_penunjangmedis_jk',$data);
		$this->load->view('admin/nav/footer');
	}

	public function informasi2()
	{
		$data['pasien_jenis']=$this->pen_medis_jenis->pasien_jenis()->result();
		
		$data['all_pasien']=$this->pen_medis_jenis->all_pasien()->all_pasien;
		foreach ($this->pen_medis_jenis->pasien_jenis()->result() as $key) {
				$namabulan[]=$key->tgl_masuk;
				$jmlp[]=$key->jml_labor;
				$jmll[]=$key->jml_radio;
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['jmlp']= json_encode($jmlp);
			$data['jmll']= json_encode($jmll);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_penunjangmedis_jenis',$data);
		$this->load->view('admin/nav/footer');
	}
	public function informasi3()
	{
		$data['pasien_asuransi']=$this->pen_medis_asuransi->pasien_asuransi()->result();
		
		$data['all_pasien']=$this->pen_medis_asuransi->all_pasien()->all_pasien;
		foreach ($this->pen_medis_asuransi->pasien_asuransi()->result() as $key) {
				$namabulan[]=$key->tgl_masuk;
				$asuransi[]=$key->asuransi;
				$perusahaan[]=$key->perusahaan;
				$umum[]=$key->umum;
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['asuransi']= json_encode($asuransi);
			$data['perusahaan']= json_encode($perusahaan);
			$data['umum']= json_encode($umum);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_penunjangmedis_asuransi',$data);
		$this->load->view('admin/nav/footer');
	}
	
}
