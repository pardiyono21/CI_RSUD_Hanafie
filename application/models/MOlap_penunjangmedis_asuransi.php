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
	{	
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$pasien = $this->db2->select('DATE_FORMAT(tgl_masuk, "%b") AS tgl_masuk, Count(*) as jml,
	 								COUNT(CASE WHEN kategori LIKE "%Pemerintah%" THEN 1 END) AS asuransi, 
									COUNT(CASE WHEN kategori LIKE "%Perusahaan%" THEN 1 END) AS perusahaan,
									COUNT(CASE WHEN kategori LIKE "%Umum%" THEN 1 END) AS umum')
	 					   ->join('dim_asuransi','fuct_penunjang_medis.id_asuransi=dim_asuransi.id_asuransi')
	 					   ->join('dim_pasien','fuct_penunjang_medis.id_pasien=dim_pasien.id_pasien')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('fuct_penunjang_medis');
	  	return $pasien;
	}
	
	public function chart_pasien()
	{	
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$pasien = $this->db2->select('kategori AS id_asuransi, COUNT(kategori) AS jml')
	 					   ->join('dim_asuransi','fuct_penunjang_medis.id_asuransi=dim_asuransi.id_asuransi')
	 					   ->join('dim_pasien','fuct_penunjang_medis.id_pasien=dim_pasien.id_pasien')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('kategori')
	 					   ->get('fuct_penunjang_medis');
	  	return $pasien;
	}
	// Total pasien 2016
	public function all_pasien()
	{	
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$all_pasien = $this->db2->select('COUNT(jenis_kelamin) AS all_pasien')
	 					   ->join('dim_pasien','fuct_penunjang_medis.id_pasien=dim_pasien.id_pasien')
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('fuct_penunjang_medis');
	  	if ($all_pasien->row()->all_pasien >= 1) {
			return $all_pasien->row();
		} else {
			return false;
		}
	}

} 