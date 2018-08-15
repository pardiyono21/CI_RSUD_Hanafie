<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_olap_rawatjalan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();	
		$this->load->model('MOlap_rawatjalan','rawatjalan');
		$this->load->model('MOlap_rawatjalan_jk','rawatjalan_jk');
		$this->load->model('MOlap_rawatjalan_dokter','rawatjalan_dokter');	
		$this->load->model('MOlap_rawatjalan_asuransi','rawatjalan_asuransi');
		$this->load->model('MOlap_rawatjalan_klinik','rawatjalan_klinik');
		$this->load->model('MOlap_rawatjalan_penyakit','rawatjalan_penyakit');
 		if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['hak_akses']=='admin'){
			
		}else{
			redirect('/login/');
		}
	}

	public function index() /*PASIEN RAWAT INAP PER BULAN/TAHUN*/
	{
		if ($this->input->get()==false || $this->rawatjalan->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{
			$data['pasien_2016']=$this->rawatjalan->pasien_2016()->result();
			$data['pasien_2017']=$this->rawatjalan->pasien_2017()->result();
			$data['all_pasien']=$this->rawatjalan->all_pasien()->all_pasien;
				$datareport=$this->rawatjalan->chart_pasien()->result();
				foreach ($datareport as $key) {
					$namabulan[]=$key->tgl_masuk;
					$jml[]=$key->jml;
				}
				//$arrayName = array($namabulan);
				$data['namabulan']= json_encode($namabulan);
				$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_rawatjalan',$data);
			$this->load->view('admin/nav/footer');
		}
	}
	public function informasi1() /* PASIEN RAWAT INAP BERDASARKAN JENIS KELAMIN PER BULAN/TAHUN*/
	{
		
		if ($this->input->get()==false || $this->rawatjalan_jk->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{
			$data['pasien_2016_jk']=$this->rawatjalan_jk->pasien_2016_jk()->result();
			$data['pasien_2017_jk']=$this->rawatjalan_jk->pasien_2017_jk()->result();
			$data['all_pasien']=$this->rawatjalan_jk->all_pasien()->all_pasien;
			$datareport=$this->rawatjalan_jk->chart_pasien()->result();
			foreach ($datareport as $key) {
				$jenis_kelamin[]=$key->jenis_kelamin;
				$jml[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['jenis_kelamin']= json_encode($jenis_kelamin);
			$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_rawatjalan_info1',$data);
			$this->load->view('admin/nav/footer');
		}
	}

	public function informasi2() /*PASIEN RAWAT INAP BERDASARKAN DOKTER PER BULAN / TAHUN*/ 
	{
		
		if ($this->input->get()==false || $this->rawatjalan_dokter->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{
			$data['jan_dokter2016']=$this->rawatjalan_dokter->dokter('2016-01')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-02')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-03')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-04')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-05')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-06')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-07')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-08')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-09')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-10')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-11')->result();
			$data_2016[]=$this->rawatjalan_dokter->dokter('2016-12')->result();

			$data['data_2016'] = $data_2016;

			$data['jan_dokter2017']=$this->rawatjalan_dokter->dokter('2017-01')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-02')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-03')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-04')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-05')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-06')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-07')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-08')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-09')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-10')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-11')->result();
			$data_2017[]=$this->rawatjalan_dokter->dokter('2017-12')->result();

			$data['data_2017'] = $data_2017;
			$data['all_pasien']=$this->rawatjalan_dokter->all_pasien()->all_pasien;

			$datareport=$this->rawatjalan_dokter->chart_pasien()->result();
				foreach ($datareport as $key) {
					$namadokter[]=substr($key->nama_dokter,0,20);
					$jml[]=$key->jml;
				}
				//$arrayName = array($namabulan);
				$data['namadokter']= json_encode($namadokter);
				$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_rawatjalan_info2',$data);
			$this->load->view('admin/nav/footer');
		}
	}
	public function informasi3() /*PASIEN RAWAT INAP BERDASARKAN ASURANSI PER BULAN/TAHUN*/
	{
		

		if ($this->input->get()==false || $this->rawatjalan_asuransi->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{
			$data['data_asuransi2016']=$this->rawatjalan_asuransi->asuransi('2016-01')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-02')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-03')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-04')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-05')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-06')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-07')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-08')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-09')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-10')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-11')->result();
			$data_2016[]=$this->rawatjalan_asuransi->asuransi('2016-12')->result();

			$data['data_2016'] = $data_2016;

			$data['data_asuransi2017']=$this->rawatjalan_asuransi->asuransi('2017-01')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-02')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-03')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-04')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-05')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-06')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-07')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-08')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-09')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-10')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-11')->result();
			$data_2017[]=$this->rawatjalan_asuransi->asuransi('2017-12')->result();

			$data['data_2017'] = $data_2017;
			$data['all_pasien']=$this->rawatjalan_asuransi->all_pasien()->all_pasien;
			$datareport=$this->rawatjalan_asuransi->chart_pasien()->result();
				foreach ($datareport as $key) {
					$namaasuransi[]=$key->id_asuransi;
					$jml[]=$key->jml;
				}
			
				//$arrayName = array($namabulan);
				$data['namaasuransi']= json_encode($namaasuransi);
				$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_rawatjalan_info3',$data);
			$this->load->view('admin/nav/footer');
		}
	}
	public function informasi4() /*PASIEN RAWAT INAP BERDASARKAN KAMAR PER BULAN/TAHUN*/
	{
		
		if ($this->input->get()==false || $this->rawatjalan_klinik->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{

			$data['data_klinik2016']=$this->rawatjalan_klinik->klinik('2016-01')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-02')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-03')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-04')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-05')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-06')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-07')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-08')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-09')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-10')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-11')->result();
			$data_2016[]=$this->rawatjalan_klinik->klinik('2016-12')->result();

			$data['data_2016'] = $data_2016;

			$data['data_klinik2017']=$this->rawatjalan_klinik->klinik('2017-01')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-02')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-03')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-04')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-05')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-06')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-07')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-08')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-09')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-10')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-11')->result();
			$data_2017[]=$this->rawatjalan_klinik->klinik('2017-12')->result();

			$data['data_2017'] = $data_2017;
			$data['all_pasien']=$this->rawatjalan_klinik->all_pasien()->all_pasien;
			$datareport=$this->rawatjalan_klinik->chart_pasien()->result();
				foreach ($datareport as $key) {
					$namaklinik[]=substr($key->nama_klinik,0,20);
					$jml[]=$key->jml_klinik;
				}
				//$arrayName = array($namabulan);
				$data['namaklinik']= json_encode($namaklinik);
				$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_rawatjalan_info4',$data);
			$this->load->view('admin/nav/footer');
		}
	}
	public function informasi5() /*PASIEN RAWAT INAP BERDASARKAN KAMAR PER BULAN/TAHUN*/
	{
		
		if ($this->input->get()==false || $this->rawatjalan_penyakit->all_pasien() == false) {
			$alert="<script>toastr['error']('Data tidak tersedia')</script>";
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url('adm_olap'));
		}else{

			$data['data_penyakit2016']=$this->rawatjalan_penyakit->penyakit('2016-01')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-02')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-03')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-04')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-05')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-06')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-07')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-08')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-09')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-10')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-11')->result();
			$data_2016[]=$this->rawatjalan_penyakit->penyakit('2016-12')->result();

			$data['data_2016'] = $data_2016;

			$data['data_penyakit2017']=$this->rawatjalan_penyakit->penyakit('2017-01')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-02')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-03')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-04')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-05')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-06')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-07')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-08')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-09')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-10')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-11')->result();
			$data_2017[]=$this->rawatjalan_penyakit->penyakit('2017-12')->result();

			$data['data_2017'] = $data_2017;
			$data['all_pasien']=$this->rawatjalan_penyakit->all_pasien()->all_pasien;
			$datareport=$this->rawatjalan_penyakit->chart_pasien()->result();
				foreach ($datareport as $key) {
					$namapenyakit[]=substr($key->id_penyakit,0,10);
					$jml[]=$key->jml_penyakit;
				}
				//$arrayName = array($namabulan);
				$data['namapenyakit']= json_encode($namapenyakit);
				$data['jml']= json_encode($jml);
			$this->load->view('admin/nav/head.php');
			$this->load->view('admin/olap_rawatjalan_info5',$data);
			$this->load->view('admin/nav/footer');
		}
	}
}
