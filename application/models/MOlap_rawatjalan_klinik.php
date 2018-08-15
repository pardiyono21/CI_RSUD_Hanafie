<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatjalan_klinik extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function klinik($tgl_masuk)
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$apr_labor_asuransi = $this->db2->select('nama_klinik, COUNT(fact_rawat_jalan.id_klinik) AS jml_klinik')
	 					   ->join('dim_klinik', 'fact_rawat_jalan.id_klinik=dim_klinik.id_klinik')
	 					   ->join('dim_pasien','fact_rawat_jalan.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('fact_rawat_jalan.id_klinik')
	 					   ->get('fact_rawat_jalan');
	  	return $apr_labor_asuransi;
	}

	public function chart_pasien() //chart pasien rawat jalan berdsrkan asuransi per bulan thn
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('nama_klinik, COUNT(fact_rawat_jalan.id_klinik) AS jml_klinik')
	 					   ->join('dim_klinik', 'fact_rawat_jalan.id_klinik=dim_klinik.id_klinik')
	 					   ->join('dim_pasien','fact_rawat_jalan.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('fact_rawat_jalan.id_klinik')
	 					   ->get('fact_rawat_jalan');
	  	if ($query->num_rows() >= 1) {
			return $query;
		} else {
			return false;
		}
	}
	// Total pasien 2016
	public function all_pasien()
	{	
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$all_pasien = $this->db2->select('COUNT(jenis_kelamin) AS all_pasien')
	 					   ->join('dim_pasien','fact_rawat_jalan.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('fact_rawat_jalan');
	  	return $all_pasien->row();
	}

} 