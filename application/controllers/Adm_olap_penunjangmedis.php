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
		if ($this->input->get()==false || $this->pen_medis->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{
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
	}

	public function informasi1()
	{
		if ($this->input->get()==false || $this->pen_medis_jk->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{
			$data['pasien']=$this->pen_medis_jk->pasien_jk()->result();
			
			$data['all_pasien']=$this->pen_medis_jk->all_pasien()->all_pasien;
			$datareport=$this->pen_medis_jk->chart_pasien()->result();
			foreach ($datareport as $key) {
				$jenis_kelamin[]=$key->jenis_kelamin;
				$jml[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['jenis_kelamin']= json_encode($jenis_kelamin);
			$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_penunjangmedis_jk',$data);
			$this->load->view('admin/nav/footer');
		}
	}

	public function informasi2()
	{
		if ($this->input->get()==false || $this->pen_medis_jenis->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{
			$data['pasien_jenis']=$this->pen_medis_jenis->pasien_jenis()->result();
			
			$data['all_pasien']=$this->pen_medis_jenis->all_pasien()->all_pasien;
			$datareport=$this->pen_medis_jenis->chart_pasien()->result();
			foreach ($datareport as $key) {
				$jenis_rawat[]=$key->jenis_rawat;
				$jml[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['jenis_rawat']= json_encode($jenis_rawat);
			$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_penunjangmedis_jenis',$data);
			$this->load->view('admin/nav/footer');
		}
	}
	public function informasi3()
	{
		if ($this->input->get()==false || $this->pen_medis_asuransi->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{
			$data['pasien_asuransi']=$this->pen_medis_asuransi->pasien_asuransi()->result();
			
			$data['all_pasien']=$this->pen_medis_asuransi->all_pasien()->all_pasien;
			$datareport=$this->pen_medis_asuransi->chart_pasien()->result();
				foreach ($datareport as $key) {
					$namaasuransi[]=$key->id_asuransi;
					$jml[]=$key->jml;
				}
			
				//$arrayName = array($namabulan);
				$data['namaasuransi']= json_encode($namaasuransi);
				$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_penunjangmedis_asuransi',$data);
			$this->load->view('admin/nav/footer');
		}
	}
	
}
