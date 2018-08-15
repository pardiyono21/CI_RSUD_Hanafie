<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_rawatinap_jk extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	public function pasien_2016_jk() //jumlah pasien berdsrkan jenis kelamin perbulan thn 2016
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('DATE_FORMAT(tgl_masuk,"%b") tgl_masuk,COUNT(tgl_masuk) AS jml,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%P%" THEN 1 END) AS jml_p,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%L%" THEN 1 END) AS jml_l')
	 					   ->join('dim_pasien','fact_rawat_inap.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->like('tgl_masuk', '2016')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('mid(tgl_masuk, 6, 2)')
	 					   ->order_by('mid(tgl_masuk, 6, 2)')
	 					   ->get('fact_rawat_inap');
	  	return $query;
	}

	public function pasien_2017_jk() //jumlah pasien berdsrkan jenis kelamin perbulan thn 2017
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('DATE_FORMAT(tgl_masuk,"%b") tgl_masuk,COUNT(tgl_masuk) AS jml,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%P%" THEN 1 END) AS jml_p,
	 								COUNT(CASE WHEN jenis_kelamin LIKE "%L%" THEN 1 END) AS jml_l')
	 					   ->join('dim_pasien','fact_rawat_inap.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->like('tgl_masuk', '2017')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('mid(tgl_masuk, 6, 2)')
	 					   ->order_by('mid(tgl_masuk, 6, 2)')
	 					   ->get('fact_rawat_inap');
	  	return $query;
	}

	public function chart_pasien() //chart pasien rawat inap berdsrkan jenis kelamin per bulan thn
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('jenis_kelamin, COUNT(jenis_kelamin) AS jml')
	 					   ->join('dim_pasien','fact_rawat_inap.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('jenis_kelamin')
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