<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOlap_apotek extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	 	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}

	// Januari
	public function apotek()
	{
	 	$query = $this->db->select('bulan, sum(jumlah_obat) as jml,
	 								COUNT(CASE WHEN jenis_rawat LIKE "%rawat jalan%" THEN 1 END) AS labor, 
									COUNT(CASE WHEN jenis_rawat LIKE "%rawat inap%" THEN 1 END) AS radio')
	 					   ->join('waktu','apotek.id_waktu=waktu.id_waktu')
	 					   ->join('pasien','apotek.id_pasien=pasien.id_pasien')
	 					   ->join('obat','apotek.id_obat=obat.id_obat')
	 					   ->group_by('bulan')
	 					   ->order_by('date','asc')
	 					   ->get('apotek');
	  	return $query;
	}
	

	// Total pasien 2016
	public function all_pasien()
	{	$jk = array('P', 'L');
	 	$all_pasien = $this->db->select('sum(jumlah_obat) as all_pasien')
	 					   ->get('apotek');
	  	return $all_pasien->row();
	}

} 