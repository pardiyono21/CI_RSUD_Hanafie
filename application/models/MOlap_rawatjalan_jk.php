<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatjalan_jk extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function pasien_2016_jk() //jumlah pasien berdsrkan jenis kelamin perbulan thn 2016
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('DATE_FORMAT(tgl_masuk,"%b") tgl_masuk,COUNT(tgl_masuk) AS jml,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%P%" THEN 1 END) AS jml_p,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%L%" THEN 1 END) AS jml_l')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->like('tgl_masuk', '2016')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('mid(tgl_masuk, 6, 2)')
	 					   ->order_by('mid(tgl_masuk, 6, 2)')
	 					   ->get('pasien');
	  	return $query;
	}

	public function pasien_2017_jk() //jumlah pasien berdsrkan jenis kelamin perbulan thn 2017
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('DATE_FORMAT(tgl_masuk,"%b") tgl_masuk,COUNT(tgl_masuk) AS jml,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%P%" THEN 1 END) AS jml_p,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%L%" THEN 1 END) AS jml_l')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->like('tgl_masuk', '2017')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('mid(tgl_masuk, 6, 2)')
	 					   ->order_by('mid(tgl_masuk, 6, 2)')
	 					   ->get('pasien');
	  	return $query;
	}

	public function chart_pasien() //chart pasien rawat jalan berdsrkan jenis kelamin per bulan thn
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('DATE_FORMAT(tgl_masuk,"%b %Y") tgl_masuk,COUNT(tgl_masuk) AS jml,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%P%" THEN 1 END) AS jml_p,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%L%" THEN 1 END) AS jml_l')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk, 7)')
	 					   ->order_by('left(tgl_masuk, 7)')
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