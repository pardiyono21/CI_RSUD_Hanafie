<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mreporting_penunjangmedis extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	  	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}
	
	//Informasi jumlah pasien rawat rentang tanggal
	public function report_pasien(){
		
		$jk = array('P', 'L');
		$jenis_rawat = array('laboratorium', 'radiologi');
	 	$query = $this->db->select('DATE_FORMAT(tgl_masuk, "%b") AS tgl_masuk,Count(*) as jml')
	 					   ->where_in('jenis_rawat',$jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('pasien');
	  	return $query;
	}
} 