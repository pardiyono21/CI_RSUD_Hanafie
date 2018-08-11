<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multi_db extends CI_Model {
 // db2 digunakan untuk mengakses database ke-2
 private $db2;

 public function __construct()
 {
  parent::__construct();
         $this->db2 = $this->load->database('rsudhanafie_dw', TRUE);
 }
 public function get_db1()
 {
  return $this->db->get('dim_dokter');
 }
 public function get_db2()
 {
  return $this->db2->get('dim_dokter');
 }
} 