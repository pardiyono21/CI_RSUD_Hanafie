<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatjalan_dokter extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function dokter($tgl_masuk){ //jumlah pasien berdsrkan dokter perbulan thn 2017
		$jk = array('P', 'L');
		$query = $this->db->select('nama_dokter, count(*) as jml')
						   ->join('dokter','pasien.id_dokter=dokter.id_dokter')
						   ->where('jenis_rawat','rawat jalan')
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('pasien.jenis_kelamin', $jk)
	 					   ->group_by('pasien.id_dokter')
	 					   ->get('pasien');
	  	return $query;
	}

	public function chart_pasien() //chart pasien rawat jalan berdsrkan jenis kelamin per bulan thn
	{
		$jk = array('P', 'L');
	 	$query = $this->db->select('nama_dokter, pasien.id_dokter, count(*) as jml')
						   ->join('dokter','pasien.id_dokter=dokter.id_dokter')
						   ->where('jenis_rawat','rawat jalan')
	 					   ->where_in('pasien.jenis_kelamin', $jk)
	 					   ->group_by('pasien.id_dokter')
	 					   ->get('pasien');
	  	if ($query->num_rows() >= 1) {
			return $query;
		} else {
			return false;
		}
	}

	// Total pasien 
	public function all_pasien()
	{	$jk = array('P', 'L');
	 	$all_pasien = $this->db->select('COUNT(jenis_kelamin) AS all_pasien')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('pasien');
	  	return $all_pasien->row();
	}

} 