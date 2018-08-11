<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Class untuk membuat laporan

class Laporan extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    /**
     Fungsi untuk menampilkan menu laporan penerima bantuan
     @param none
     @return void
    **/

    function index(){
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('admin/reporting',[],true);
        $stylesheet = file_get_contents(base_url().'isset/css/style.css');  
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $mpdf->Output();
    }
    public function db_backup(){
        // Load the DB utility class
    $this->load->dbutil();
    $prefs = array(
        /*'tables'        => array('table1', 'table2'),*/   // Array of tables to backup.
        'ignore'        => array(),                     // List of tables to omit from the backup
        'format'        => 'zip',                       // gzip, zip, txt
        'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n"                         // Newline character used in backup file
    );
    // Backup your entire database and assign it to a variable
    $backup = $this->dbutil->backup($prefs);

    // Load the file helper and write the file to your server
    /*$this->load->helper('file');
    write_file('/path/to/mybackup.gz', $backup);*/

    // Load the download helper and send the file to your desktop
    $this->load->helper('download');
    force_download('mybackup.sql.zip', $backup);
    }
}
