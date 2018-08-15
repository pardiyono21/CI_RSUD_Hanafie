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
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$apr_labor_asuransi = $this->db2->select('kategori AS id_asuransi, COUNT(kategori) AS jml_asuransi')
	 					   ->join('dim_asuransi','fact_rawat_inap.id_asuransi=dim_asuransi.id_asuransi')
	 					   ->join('dim_pasien','fact_rawat_inap.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->like('tgl_masuk', $tgl_masuk)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('kategori')
	 					   ->get('fact_rawat_inap');
	  	return $apr_labor_asuransi;
	}

	public function chart_pasien() //chart pasien rawat inap berdsrkan asuransi per bulan thn
	{
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db2->select('kategori AS id_asuransi, COUNT(kategori) AS jml')
	 					   ->join('dim_asuransi','fact_rawat_inap.id_asuransi=dim_asuransi.id_asuransi')
	 					   ->join('dim_pasien','fact_rawat_inap.id_pasien=dim_pasien.id_pasien')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('kategori')
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