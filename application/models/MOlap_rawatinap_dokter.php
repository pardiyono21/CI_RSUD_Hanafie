<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatinap_dokter extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function dokter($tgl_masuk){ //jumlah pasien berdsrkan dokter perbulan thn 2017
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
		$query = $this->db2->select('nama_dokter, count(*) as jml')
						   ->join('dim_dokter','fact_rawat_inap.id_dokter=dim_dokter.id_dokter')
	 					   ->join('dim_pasien','fact_rawat_inap.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('dim_pasien.jenis_kelamin', $jk)
	 					   ->group_by('dim_dokter.id_dokter')
	 					   ->get('fact_rawat_inap');
	  	return $query;
	}

	public function chart_pasien() //chart pasien rawat inap berdsrkan jenis kelamin per bulan thn
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('nama_dokter, dim_dokter.id_dokter, count(*) as jml')
						   ->join('dim_dokter','fact_rawat_inap.id_dokter=dim_dokter.id_dokter')
						   ->join('dim_pasien','fact_rawat_inap.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('dim_pasien.jenis_kelamin', $jk)
	 					   ->group_by('dim_dokter.id_dokter')
	 					   ->get('fact_rawat_inap');
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
	 					   ->join('dim_pasien','fact_rawat_inap.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('fact_rawat_inap');
	  	if ($all_pasien->row()->all_pasien >= 1) {
			return $all_pasien->row();
		} else {
			return false;
		}
	}

} 