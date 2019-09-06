<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ApiPemesananDetail extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post()
    {
        $data = array(
            'id_pemesanan'          => $this->post('id_pemesanan'),
            'id_barang'    => $this->post('id_barang'),
            'jumlah'          => $this->post('jumlah')
        );
        $insert = $this->db->insert('tbl_pemesanandetail', $data);
        if ($insert) {
            $this->response(array('success' => '1', 'message' => 'success'));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
