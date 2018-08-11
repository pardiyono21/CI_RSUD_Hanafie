<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mreporting_rawatinap extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	private $db2;

	public function __construct()
	{
	  	parent::__construct();
	    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	}
	
	//Informasi jumlah pasien rawat rentang tanggal
	public function report_pasien(){
		
		$awal=$this->input->get('awal');
		$akhir=$this->input->get('akhir');
		$jk = array('P', 'L');
	 	$query = $this->db->select('DATE_FORMAT(tgl_masuk, "%b %Y") AS tgl_masuk,Count(*) as jml')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->where('tgl_masuk >=', $awal)
						   ->where('tgl_masuk <=', $akhir)
	 					   ->group_by('left(tgl_masuk,7)')
	 					   ->get('pasien');
	  	if ($query->num_rows() >= 1) {
			return $query;
		} else {
			return false;
		}
	}
} 