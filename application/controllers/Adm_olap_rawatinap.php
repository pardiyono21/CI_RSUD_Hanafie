<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_olap_rawatinap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();	
		$this->load->model('MOlap_rawatinap','rawatinap');
		$this->load->model('MOlap_rawatinap_jk','rawatinap_jk');
		$this->load->model('MOlap_rawatinap_dokter','rawatinap_dokter');	
		$this->load->model('MOlap_rawatinap_asuransi','rawatinap_asuransi');
		$this->load->model('MOlap_rawatinap_kamar','rawatinap_kamar');
		$this->load->model('MOlap_rawatinap_penyakit','rawatinap_penyakit');
 		if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['hak_akses']=='admin'){
			
		}else{
			redirect('/login/');
		}
	}

	public function index() /*PASIEN RAWAT INAP PER BULAN/TAHUN*/
	{

		$data['pasien_2016']=$this->rawatinap->pasien_2016()->result();
		$data['pasien_2017']=$this->rawatinap->pasien_2017()->result();
		$data['all_pasien']=$this->rawatinap->all_pasien()->all_pasien;
			$datareport=$this->rawatinap->chart_pasien()->result();
			foreach ($datareport as $key) {
				$namabulan[]=$key->tgl_masuk;
				$jml[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['jml']= json_encode($jml);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_rawatinap',$data);
		$this->load->view('admin/nav/footer');
	}
	public function informasi1() /* PASIEN RAWAT INAP BERDASARKAN JENIS KELAMIN PER BULAN/TAHUN*/
	{
		
		$data['pasien_2016_jk']=$this->rawatinap_jk->pasien_2016_jk()->result();
		$data['pasien_2017_jk']=$this->rawatinap_jk->pasien_2017_jk()->result();
		$data['all_pasien']=$this->rawatinap_jk->all_pasien()->all_pasien;
		$datareport=$this->rawatinap_jk->chart_pasien()->result();
			foreach ($datareport as $key) {
				$namabulan[]=$key->tgl_masuk;
				$jmlp[]=$key->jml_p;
				$jmll[]=$key->jml_l;
			}
			//$arrayName = array($namabulan);
			$data['namabulan']= json_encode($namabulan);
			$data['jmlp']= json_encode($jmlp);
			$data['jmll']= json_encode($jmll);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_rawatinap_info1',$data);
		$this->load->view('admin/nav/footer');
	}

	public function informasi2() /*PASIEN RAWAT INAP BERDASARKAN DOKTER PER BULAN / TAHUN*/ 
	{
		

		$data['jan_dokter2016']=$this->rawatinap_dokter->dokter('2016-01')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-02')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-03')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-04')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-05')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-06')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-07')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-08')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-09')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-10')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-11')->result();
		$data_2016[]=$this->rawatinap_dokter->dokter('2016-12')->result();

		$data['data_2016'] = $data_2016;

		$data['jan_dokter2017']=$this->rawatinap_dokter->dokter('2017-01')->result();
		$data_2017[]=$this->rawatinap_dokter->dokter('2017-02')->result();
		$data_2017[]=$this->rawatinap_dokter->dokter('2017-03')->result();
		$data_2017[]=$this->rawatinap_dokter->dokter('2017-04')->result();
		$data_2017[]=$this->rawatinap_dokter->dokter('2017-05')->result();
		$data_2017[]=$this->rawatinap_dokter->dokter('2017-06')->result();
		$data_2017[]=$this->rawatinap_dokter->dokter('2017-07')->result();
		$data_2017[]=$this->rawatinap_dokter->dokter('2017-08')->result();

		$data['data_2017'] = $data_2017;
		$data['all_pasien']=$this->rawatinap_dokter->all_pasien()->all_pasien;

		$datareport=$this->rawatinap_dokter->chart_pasien()->result();
			foreach ($datareport as $key) {
				$namadokter[]=substr($key->nama_dokter,0,20);
				$jml[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['namadokter']= json_encode($namadokter);
			$data['jml']= json_encode($jml);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_rawatinap_info2',$data);
		$this->load->view('admin/nav/footer');
	}
	public function informasi3() /*PASIEN RAWAT INAP BERDASARKAN ASURANSI PER BULAN/TAHUN*/
	{
		


		$data['data_asuransi2016']=$this->rawatinap_asuransi->asuransi('2016-01')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-02')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-03')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-04')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-05')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-06')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-07')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-08')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-09')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-10')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-11')->result();
		$data_2016[]=$this->rawatinap_asuransi->asuransi('2016-12')->result();

		$data['data_2016'] = $data_2016;

		$data['data_asuransi2017']=$this->rawatinap_asuransi->asuransi('2017-01')->result();
		$data_2017[]=$this->rawatinap_asuransi->asuransi('2017-02')->result();
		$data_2017[]=$this->rawatinap_asuransi->asuransi('2017-03')->result();
		$data_2017[]=$this->rawatinap_asuransi->asuransi('2017-04')->result();
		$data_2017[]=$this->rawatinap_asuransi->asuransi('2017-05')->result();
		$data_2017[]=$this->rawatinap_asuransi->asuransi('2017-06')->result();
		$data_2017[]=$this->rawatinap_asuransi->asuransi('2017-07')->result();
		$data_2017[]=$this->rawatinap_asuransi->asuransi('2017-08')->result();

		$data['data_2017'] = $data_2017;
		$data['all_pasien']=$this->rawatinap_asuransi->all_pasien()->all_pasien;
		$datareport2016=$this->rawatinap_asuransi->chart_pasien('2016')->result();
			foreach ($datareport2016 as $key) {
				$namaasuransi2016[]=$key->id_asuransi;
				$jml2016[]=$key->jml;
			}
		$datareport2017=$this->rawatinap_asuransi->chart_pasien('2017')->result();
			foreach ($datareport2017 as $key) {
				$namaasuransi2017[]=$key->id_asuransi;
				$jml2017[]=$key->jml;
			}
			//$arrayName = array($namabulan);
			$data['namaasuransi2016']= json_encode($namaasuransi2016);
			$data['jml2016']= json_encode($jml2016);
			$data['namaasuransi2017']= json_encode($namaasuransi2017);
			$data['jml2017']= json_encode($jml2017);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_rawatinap_info3',$data);
		$this->load->view('admin/nav/footer');
	}
	public function informasi4() /*PASIEN RAWAT INAP BERDASARKAN KAMAR PER BULAN/TAHUN*/
	{
		


		$data['data_kamar2016']=$this->rawatinap_kamar->kamar('2016-01')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-02')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-03')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-04')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-05')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-06')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-07')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-08')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-09')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-10')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-11')->result();
		$data_2016[]=$this->rawatinap_kamar->kamar('2016-12')->result();

		$data['data_2016'] = $data_2016;

		$data['data_kamar2017']=$this->rawatinap_kamar->kamar('2017-01')->result();
		$data_2017[]=$this->rawatinap_kamar->kamar('2017-02')->result();
		$data_2017[]=$this->rawatinap_kamar->kamar('2017-03')->result();
		$data_2017[]=$this->rawatinap_kamar->kamar('2017-04')->result();
		$data_2017[]=$this->rawatinap_kamar->kamar('2017-05')->result();
		$data_2017[]=$this->rawatinap_kamar->kamar('2017-06')->result();
		$data_2017[]=$this->rawatinap_kamar->kamar('2017-07')->result();
		$data_2017[]=$this->rawatinap_kamar->kamar('2017-08')->result();

		$data['data_2017'] = $data_2017;
		$data['all_pasien']=$this->rawatinap_kamar->all_pasien()->all_pasien;
		$datareport=$this->rawatinap_kamar->chart_pasien()->result();
			foreach ($datareport as $key) {
				$namakamar[]=substr($key->id_kamar,0,20);
				$jml[]=$key->jml_kamar;
			}
			//$arrayName = array($namabulan);
			$data['namakamar']= json_encode($namakamar);
			$data['jml']= json_encode($jml);
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_rawatinap_info4',$data);
		$this->load->view('admin/nav/footer');
	}
	public function informasi5() /*PASIEN RAWAT INAP BERDASARKAN KAMAR PER BULAN/TAHUN*/
	{
		


		$data['data_penyakit2016']=$this->rawatinap_penyakit->penyakit('2016-01')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-02')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-03')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-04')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-05')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-06')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-07')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-08')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-09')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-10')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-11')->result();
		$data_2016[]=$this->rawatinap_penyakit->penyakit('2016-12')->result();

		$data['data_2016'] = $data_2016;

		$data['data_penyakit2017']=$this->rawatinap_penyakit->penyakit('2017-01')->result();
		$data_2017[]=$this->rawatinap_penyakit->penyakit('2017-02')->result();
		$data_2017[]=$this->rawatinap_penyakit->penyakit('2017-03')->result();
		$data_2017[]=$this->rawatinap_penyakit->penyakit('2017-04')->result();
		$data_2017[]=$this->rawatinap_penyakit->penyakit('2017-05')->result();
		$data_2017[]=$this->rawatinap_penyakit->penyakit('2017-06')->result();
		$data_2017[]=$this->rawatinap_penyakit->penyakit('2017-07')->result();
		$data_2017[]=$this->rawatinap_penyakit->penyakit('2017-08')->result();

		$data['data_2017'] = $data_2017;
		$data['all_pasien']=$this->rawatinap_penyakit->all_pasien()->all_pasien;
		$this->load->view('admin/nav/head.php');
		$this->load->view('admin/olap_rawatinap_info5',$data);
		$this->load->view('admin/nav/footer');
	}
}
