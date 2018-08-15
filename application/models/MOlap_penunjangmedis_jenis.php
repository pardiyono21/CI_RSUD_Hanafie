<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_penunjangmedis_jenis extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function pasien_jenis()
	{	
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$pasien = $this->db2->select('DATE_FORMAT(tgl_masuk, "%b") AS tgl_masuk, Count(*) as jml,
	 								COUNT(CASE WHEN jenis_rawat LIKE "%laboratorium%" THEN 1 END) AS jml_labor,
	 								COUNT(CASE WHEN jenis_rawat LIKE "%radiologi%" THEN 1 END) AS jml_radio')
	 					   ->join('dim_pasien','fuct_penunjang_medis.id_pasien=dim_pasien.id_pasien')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('fuct_penunjang_medis');
	  	return $pasien;
	}
	
	public function chart_pasien()
	{	
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$pasien = $this->db2->select('jenis_rawat, Count(jenis_rawat) as jml')
	 					   ->join('dim_pasien','fuct_penunjang_medis.id_pasien=dim_pasien.id_pasien')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('jenis_rawat')
	 					   ->get('fuct_penunjang_medis');
	  	return $pasien;
	}
	
	// Total pasien 2016
	public function all_pasien()
	{	
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$all_pasien = $this->db2->select('COUNT(jenis_kelamin) AS all_pasien')
	 					   ->join('dim_pasien','fuct_penunjang_medis.id_pasien=dim_pasien.id_pasien')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('fuct_penunjang_medis');
	  	if ($all_pasien->row()->all_pasien >= 1) {
			return $all_pasien->row();
		} else {
			return false;
		}
	}

} 