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
		$jk = array('P', 'L');
	 	$query = $this->db->select('DATE_FORMAT(tgl_masuk, "%b") AS tgl_masuk,Count(*) as jml')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->like('tgl_masuk', '2016')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('pasien');
	  	return $query;
	}
	public function pasien_2017() //jumlah pasien perbulan thn 2017
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('DATE_FORMAT(tgl_masuk, "%b") AS tgl_masuk,Count(*) as jml')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->like('tgl_masuk', '2017')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('pasien');
	  	return $query;
	}
	
	public function chart_pasien() //chart pasien rawat jalanperbulan thn
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('DATE_FORMAT(tgl_masuk, "%b %Y") AS tgl_masuk,Count(*) as jml')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
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