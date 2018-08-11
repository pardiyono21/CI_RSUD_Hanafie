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
		$jk = array('P', 'L');
	 	$apr_labor_asuransi = $this->db->select('nama_klinik, COUNT(pasien.id_klinik) AS jml_klinik')
	 					   ->join('klinik', 'pasien.id_klinik=klinik.id_klinik')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('pasien.id_klinik')
	 					   ->get('pasien');
	  	return $apr_labor_asuransi;
	}

	public function chart_pasien() //chart pasien rawat jalan berdsrkan asuransi per bulan thn
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('nama_klinik, COUNT(pasien.id_klinik) AS jml_klinik')
	 					   ->join('klinik', 'pasien.id_klinik=klinik.id_klinik')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('pasien.id_klinik')
	 					   ->get('pasien');
	  	if ($query->num_rows() >= 1) {
			return $query;
		} else {
			return false;
		}
	}
	// Total pasien 2016
	public function all_pasien()
	{	$jk = array('P', 'L');
	 	$all_pasien = $this->db->select('COUNT(jenis_kelamin) AS all_pasien')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('pasien');
	  	return $all_pasien->row();
	}

} 