<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproses_etl extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
	 private $db2;

	 public function __construct()
	 {
	  parent::__construct();
	         $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
	         ini_set('memory_limit', '-1');

	 }
	 public function field_db($tabel)
	 {
	 	$pasien = $this->db->select('*')
	 					   ->where('TABLE_SCHEMA','rsudhanafie_db')
	 					   ->where('TABLE_NAME', $tabel)
	 					   ->get('INFORMATION_SCHEMA.COLUMNS');
	  	return $pasien;
	 }
	 public function field_dw($tabel)
	 {
	 	$tabeldim = 'dim_'.$tabel;
	  	$pasien = $this->db2->select('*')
	 					   ->where('TABLE_SCHEMA','rsudhanafie_dw')
	 					   ->where('TABLE_NAME', $tabeldim)
	 					   ->get('INFORMATION_SCHEMA.COLUMNS');
	  	return $pasien;
	}

	public function ekstrak_data_dokter()
	 {

	 	//pasien 
		 	$query = $this->db->get('dokter');
		 	$result = array();
		    foreach($query->result() AS $key){
		     $result[] = array(
		      	"id_dokter" => $key->id_dokter,
				"kd_dokter" => $key->kd_dokter,
				"nama_dokter" => $key->nama_dokter,
				"jabatan" => $key->jabatan
		     );
		    }
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_dokter', $result);

	    	//$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
	}

	public function ekstrak_data_kamar()
	 {

	 	//pasien 
		 	$query = $this->db->get('kamar');
		 	$result = array();
		    foreach($query->result() AS $key){
		     $result[] = array( 
		      	"id_kamar" => $key->id_kamar,
				"kd_kamar" => $key->kd_kamar,
				"nama_kamar" => $key->nama_kamar,
				"kelompok_kamar" => $key->kelompok_kamar
		     );
			    
		    }
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_kamar', $result);
		    
	    	//$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
	}

	public function ekstrak_data_penyakit()
	 {

	 	//pasien 
		 	$query = $this->db->get('penyakit');
		 	$result = array();
		    foreach($query->result() AS $key){
		     $result[] = array( 
		      	"id_penyakit" => $key->id_penyakit,
				"kd_icd" => $key->kd_icd,
				"nama_penyakit" => $key->nama_penyakit
		     );
			    
		    }
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_penyakit', $result);
		    
	    	//$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
	}

	public function ekstrak_data_asuransi()
	 {

	 	//pasien 
		 	$query = $this->db->get('asuransi');
		 	$result = array();
		    foreach($query->result() AS $key){
		     $result[] = array( 
		      	"id_asuransi" => $key->id_asuransi,
				"kd_asuransi" => $key->kd_asuransi,
				"kategori" => $key->kategori,
				"nama_asuransi" => $key->nama_asuransi
		     );
			    
		    }
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_asuransi', $result);
		    
	    	//$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
	}

	public function ekstrak_data_klinik()
	 {

	 	//pasien 
		 	$query = $this->db->get('klinik');
		 	$result = array();
		    foreach($query->result() AS $key){
		     $result[] = array( 
		      	"id_klinik" => $key->id_klinik,
				"kd_klinik" => $key->kd_klinik,
				"nama_klinik" => $key->nama_klinik
		     );
			    
		    }
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_klinik', $result);
		    
	    	//$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
	}

	public function ekstrak_data_medis()
	 {

	 	//pasien 
		 	$query = $this->db->get('penunjang_medis');
		 	$result = array();
		    foreach($query->result() AS $key){
		     $result[] = array( 
		      	"id_penunjang_medis" => $key->id_penunjang_medis,
				"kd_penunjang_medis" => $key->kd_penunjang_medis,
				"nama_penunjang_medis" => $key->nama_penunjang_medis
		     );
			    
		    }
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_penunjang_medis', $result);
		    
	    	//$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
	}

	public function ekstrak_data_pasien()
	 {

	 	//pasien 
		 	$query = $this->db->get('pasien');
		 	$result = array();
		    foreach($query->result() AS $key){
		     $result[] = array(
		      	"id_pasien" => $key->id_pasien,
				"kd_pasien" => $key->kd_pasien,
				"nama_pasien" => $key->nama_pasien,
				"jenis_kelamin" => $key->jenis_kelamin,
				"tgl_masuk" => $key->tgl_masuk,
				"jenis_rawat" => $key->jenis_rawat
		     );
		    }
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_pasien', $result);

	    	//$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
	}

	public function ekstrak_data_apotek()
	{

	 	//waktu 
	 		$query_waktu = $this->db->get('waktu');
		 	$result_waktu = array();
		    foreach($query_waktu->result() AS $key){
		     $result_waktu[] = array(
		      	"id_waktu" => $key->id_waktu,
				"tgl" => $key->tgl,
				"bulan" => $key->bulan,
				"tahun" => $key->tahun,
				"date" => $key->date
		     );
		    }
		//obat 
	 		$query_obat = $this->db->get('obat');
		 	$result_obat = array();
		    foreach($query_obat->result() AS $key){
		     $result_obat[] = array(
		      	"id_obat" => $key->id_obat,
				"kd_obat" => $key->kd_obat,
				"nama_obat" => $key->nama_obat,
				"harga" => $key->harga
		     );
		    }
		//apotek 
	 		$query_apotek = $this->db->get('apotek');
		 	$result_apotek = array();
		    foreach($query_apotek->result() AS $key){
		     $result_apotek[] = array(
		      	"id_fact_apotek" => $key->id_apotek,
				"id_waktu" => $key->id_waktu,
				"id_pasien" => $key->id_pasien,
				"id_obat" => $key->id_obat,
				"jumlah_obat" => $key->jumlah_obat
		     );
		    }

		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db dim_waktu
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_waktu', $result_waktu);
	    	$this->load->database('rsudhanafie_dw', TRUE);

	    	$this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db dim_obat
	    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_obat', $result_obat);
	    	$this->load->database('rsudhanafie_dw', TRUE);

	    	$this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db fact_apotek
	    	$sql = $this->db2->insert_on_duplicate_update_batch('fact_apotek', $result_apotek);
	    	$this->load->database('rsudhanafie_dw', TRUE);

			return ($this->db2->affected_rows() > 0) ? true : false;
	}

	public function ekstrak_data_rawatinap()
	{

	 	//pasien 
		 	$jk = array('P', 'L');
	 		$query_waktu = $this->db->select('id_pasien,RIGHT(tgl_masuk,2) AS tgl, DATE_FORMAT(tgl_masuk, "%b") AS bulan, LEFT(tgl_masuk,4) AS tahun, tgl_masuk AS date')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('pasien');
	 		
	 		$query = $this->db->select('id_pasien, id_dokter, asuransi.id_asuransi, id_penyakit, id_kamar')
	 					   ->join('asuransi','pasien.id_asuransi=asuransi.nama_asuransi')
	 					   ->where('jenis_rawat','rawat inap')
	 					   ->get('pasien');
	 	
	 		$cek_id_waktu = $this->db2->order_by('id_waktu','desc')
	 					   ->get('dim_waktu');
		 	$result_waktu = array();
		 	$id_waktu = $cek_id_waktu->row()->id_waktu+1;
		    foreach($query_waktu->result() AS $key){
		    $query2 = $this->db2->select('id_waktu')
		    			   ->where('id_pasien',$key->id_pasien)
	 					   ->get('fact_rawat_inap');
	 		if ($this->db2->affected_rows()>0) {
	 			$id_pasiencek = $query2->row()->id_waktu;
	 		}else{
	 			$id_pasiencek = $id_waktu1++;
	 		}
		     $result_waktu[] = array(
		     	"id_waktu" => $id_pasiencek,
		     	"tgl" => $key->tgl,
				"bulan" => $key->bulan,
		      	"tahun" => $key->tahun,
		      	"date" => $key->date
		     );
		    }

		    $result = array();
		    $id_waktu1 = $cek_id_waktu->row()->id_waktu+1;
		    foreach($query->result() AS $key){
		    $query2 = $this->db2->select('id_waktu')
		    			   ->where('id_pasien',$key->id_pasien)
	 					   ->get('fact_rawat_inap');
	 		if ($this->db2->affected_rows()>0) {
	 			$id_pasiencek = $query2->row()->id_waktu;
	 		}else{
	 			$id_pasiencek = $id_waktu1++;
	 		}
		     $result[] = array(		     	
		     	"id_fact_rawat_inap" => $key->id_pasien,
		     	"id_waktu" => $id_pasiencek,
		     	"id_pasien" => $key->id_pasien,
				"id_dokter" => $key->id_dokter,
		      	"id_asuransi" => $key->id_asuransi,
		      	"id_penyakit" => $key->id_penyakit,
		      	"id_kamar" => $key->id_kamar
		     );
		    }
		   
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
		    $sql = $this->db2->insert_on_duplicate_update_batch('fact_rawat_inap', $result);
		    if ($this->db2->affected_rows() > 0) {
		    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_waktu', $result_waktu);
		    }
	    	
	    	

	    	$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
		    
		    
	}

	public function ekstrak_data_rawatjalan()
	{

	 	//pasien 
		 	$jk = array('P', 'L');
	 		$query_waktu = $this->db->select('id_pasien,RIGHT(tgl_masuk,2) AS tgl, DATE_FORMAT(tgl_masuk, "%b") AS bulan, LEFT(tgl_masuk,4) AS tahun, tgl_masuk AS date')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('pasien');
	 		
	 		$query = $this->db->select('id_pasien, id_dokter, asuransi.id_asuransi, id_penyakit, id_klinik')
	 					   ->join('asuransi','pasien.id_asuransi=asuransi.nama_asuransi')
	 					   ->where('jenis_rawat','rawat jalan')
	 					   ->get('pasien');
	 		
	 	
	 		$cek_id_waktu = $this->db2->order_by('id_waktu','desc')
	 					   ->get('dim_waktu');
		 	$result_waktu = array();
		 	$id_waktu = $cek_id_waktu->row()->id_waktu+1;
		    foreach($query_waktu->result() AS $key){

		    $query2 = $this->db2->select('id_waktu')
		    			   ->where('id_pasien',$key->id_pasien)
	 					   ->get('fact_rawat_jalan');
	 		if ($this->db2->affected_rows()>0) {
	 			$id_pasiencek = $query2->row()->id_waktu;
	 		}else{
	 			$id_pasiencek = $id_waktu1++;
	 		}
		     $result_waktu[] = array(
		     	"id_waktu" => $id_waktu++,
		     	"tgl" => $key->tgl,
				"bulan" => $key->bulan,
		      	"tahun" => $key->tahun,
		      	"date" => $key->date
		     );
		    }

		    $result = array();
		    $id_waktu1 = $cek_id_waktu->row()->id_waktu+1;
		    
		    foreach($query->result() AS $key){
		    $query2 = $this->db2->select('id_waktu')
		    			   ->where('id_pasien',$key->id_pasien)
	 					   ->get('fact_rawat_jalan');
	 		if ($this->db2->affected_rows()>0) {
	 			$id_pasiencek = $query2->row()->id_waktu;
	 		}else{
	 			$id_pasiencek = $id_waktu1++;
	 		}
	 		
	 			
		     $result[] = array(		     	
		     	"id_fact_rawat_jalan" => $key->id_pasien,
		     	"id_waktu" => $id_pasiencek,
		     	"id_pasien" => $key->id_pasien,
				"id_dokter" => $key->id_dokter,
		      	"id_asuransi" => $key->id_asuransi,
		      	"id_penyakit" => $key->id_penyakit,
		      	"id_klinik" => $key->id_klinik
		     );
		    }
		   
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
		    $sql = $this->db2->insert_on_duplicate_update_batch('fact_rawat_jalan', $result);
		    if ($this->db2->affected_rows() > 0) {
		    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_waktu', $result_waktu);
		    }
	    	
	    	

	    	$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
		    
		    
	}
	public function ekstrak_data_penunjangmedis()
	{

	 	//pasien 
	 		$jenis_rawat = array('laboratorium', 'radiologi');
		 	$jk = array('P', 'L');
	 		$query_waktu = $this->db->select('RIGHT(tgl_masuk,2) AS tgl, DATE_FORMAT(tgl_masuk, "%b") AS bulan, LEFT(tgl_masuk,4) AS tahun, tgl_masuk AS date')
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->where_in('jenis_kelamin', $jk)
	 					   ->get('pasien');
	 		
	 		$query = $this->db->select('id_pasien, id_dokter, asuransi.id_asuransi, id_penyakit, id_penunjang_medis')
	 					   ->join('asuransi','pasien.id_asuransi=asuransi.nama_asuransi')
	 					   ->join('penunjang_medis','pasien.jenis_rawat=penunjang_medis.nama_penunjang_medis')
	 					   ->where_in('jenis_rawat', $jenis_rawat)
	 					   ->get('pasien');
	 	
	 		$cek_id_waktu = $this->db2->order_by('id_waktu','desc')
	 					   ->get('dim_waktu');
		 	$result_waktu = array();
		 	$id_waktu = $cek_id_waktu->row()->id_waktu+1;
		    foreach($query_waktu->result() AS $key){

		     $result_waktu[] = array(
		     	"id_waktu" => $id_waktu++,
		     	"tgl" => $key->tgl,
				"bulan" => $key->bulan,
		      	"tahun" => $key->tahun,
		      	"date" => $key->date
		     );
		    }

		    $result = array();
		    $id_waktu1 = $cek_id_waktu->row()->id_waktu+1;
		    foreach($query->result() AS $key){
		     $result[] = array(		     	
		     	"id_fact_penunjang_medis" => $key->id_pasien,
		     	"id_waktu" => $id_waktu1++,
		     	"id_pasien" => $key->id_pasien,
		      	"id_asuransi" => $key->id_asuransi,
		      	"id_penunjang_medis" => $key->id_penunjang_medis
		     );
		    }
		   
		    $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
		    $this->db2->save_queries = false;
		     // eksttrak db
		    $sql = $this->db2->insert_on_duplicate_update_batch('fuct_penunjang_medis', $result);
		    if ($this->db2->affected_rows() > 0) {
		    	$sql = $this->db2->insert_on_duplicate_update_batch('dim_waktu', $result_waktu);
		    }
	    	
	    	

	    	$this->load->database('rsudhanafie_dw', TRUE);
			return ($this->db2->affected_rows() > 0) ? true : false;
		    
		    
	}
} 