<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatjalan extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	
	public function pasien_2016() //jumlah pasien perbulan thn 2016
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('DATE_FORMAT(tgl_masuk, "%b") AS tgl_masuk,Count(*) as jml')
	 					   ->join('dim_pasien','fact_rawat_jalan.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->like('tgl_masuk', '2016')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('fact_rawat_jalan');
	  	
		return $query;
		
	}
	public function pasien_2017() //jumlah pasien perbulan thn 2017
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('DATE_FORMAT(tgl_masuk, "%b") AS tgl_masuk,Count(*) as jml')
	 					   ->join('dim_pasien','fact_rawat_jalan.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->like('tgl_masuk', '2017')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('fact_rawat_jalan');
	  	
		return $query;
		
	}
	
	public function chart_pasien() //chart pasien rawat inapperbulan thn
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('DATE_FORMAT(tgl_masuk, "%b %Y") AS tgl_masuk,Count(*) as jml')
	 					   ->join('dim_pasien','fact_rawat_jalan.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
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
	  	if ($all_pasien->row()->all_pasien >= 1) {
			return $all_pasien->row();
		} else {
			return false;
		}
	}

} 