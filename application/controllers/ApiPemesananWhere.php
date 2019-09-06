<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ApiPemesananWhere extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    function index_get($id)
    {
        $pemesanan = $this->db->query("SELECT a.*, COUNT(b.id_pemesanan) AS jml_barang FROM tbl_pemesanan AS a LEFT JOIN tbl_pemesanandetail AS b USING(id_pemesanan) WHERE id_pelanggan='$id' GROUP BY a.id_pemesanan ORDER BY status DESC,id_pemesanan ASC")->result();
        $this->response(array('pemesanan' => $pemesanan));
    }
}
