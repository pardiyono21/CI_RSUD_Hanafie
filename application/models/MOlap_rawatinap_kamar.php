<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatinap_kamar extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function kamar($tgl_masuk)
	{
		$jk = array('P', 'L');
	 	$apr_labor_asuransi = $this->db->select('id_kamar, COUNT(id_kamar) AS jml_kamar')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('id_kamar')
	 					   ->get('pasien');
	  	return $apr_labor_asuransi;
	}

	public function chart_pasien() //chart pasien rawat inap berdsrkan asuransi per bulan thn
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('id_kamar, COUNT(id_kamar) AS jml_kamar')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('id_kamar')
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
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('pasien');
	  	return $all_pasien->row();
	}

} 