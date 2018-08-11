<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatinap_asuransi extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function asuransi($tgl_masuk)
	{
		$jk = array('P', 'L');
	 	$apr_labor_asuransi = $this->db->select('kategori AS id_asuransi, COUNT(kategori) AS jml_asuransi')
	 					   ->join('asuransi','pasien.id_asuransi=asuransi.nama_asuransi')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('kategori')
	 					   ->get('pasien');
	  	return $apr_labor_asuransi;
	}

	public function chart_pasien($tgl_masuk) //chart pasien rawat inap berdsrkan asuransi per bulan thn
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('kategori AS id_asuransi, COUNT(kategori) AS jml')
	 					   ->join('asuransi','pasien.id_asuransi=asuransi.nama_asuransi')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('kategori')
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