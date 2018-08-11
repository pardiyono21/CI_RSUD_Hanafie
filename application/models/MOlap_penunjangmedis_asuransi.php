<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_penunjangmedis_asuransi extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function pasien_asuransi()
	{	$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$pasien = $this->db->select('DATE_FORMAT(tgl_masuk, "%b") AS tgl_masuk, Count(*) as jml,
	 								COUNT(CASE WHEN kategori LIKE "%Asuransi%" THEN 1 END) AS asuransi, 
									COUNT(CASE WHEN kategori LIKE "%Perusahaan%" THEN 1 END) AS perusahaan,
									COUNT(CASE WHEN kategori LIKE "%Umum%" THEN 1 END) AS umum')
	 					   ->join('asuransi','pasien.id_asuransi=asuransi.nama_asuransi')
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('pasien');
	  	return $pasien;
	}
	
	// Total pasien 2016
	public function all_pasien()
	{	$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$all_pasien = $this->db->select('COUNT(jenis_kelamin) AS all_pasien')
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('pasien');
	  	return $all_pasien->row();
	}

} 