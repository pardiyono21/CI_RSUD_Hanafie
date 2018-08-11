<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatinap_penyakit extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function penyakit($tgl_masuk)
	{
		$jk = array('P', 'L');
	 	$apr_labor_asuransi = $this->db->select('nama_penyakit as id_penyakit, COUNT(pasien.id_penyakit) AS jml_penyakit')
	 					   ->join('penyakit','pasien.id_penyakit=penyakit.id_penyakit')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('pasien.id_penyakit')
	 					   ->order_by('jml_penyakit','desc')
	 					   ->limit('10')
	 					   ->get('pasien');
	  	return $apr_labor_asuransi;
	}

	
	// Total pasien 2016
	public function all_pasien()
	{	$jk = array('P', 'L');
	 	$all_pasien = $this->db->select('COUNT(jenis_kelamin) AS all_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('pasien');
	  	return $all_pasien->row();
	}

} 