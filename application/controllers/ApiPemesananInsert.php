<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ApiPemesananInsert extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post()
    {
        $data = array(
            'tanggal_pesan'          => $this->post('tanggal_pesan'),
            'tanggal_tenggang'    => $this->post('tanggal_tenggang'),
            'status'          => $this->post('status'),
            'id_pelanggan'          => $this->post('id_pelanggan')
        );
        $insert = $this->db->insert('tbl_pemesanan', $data);
        $insert_id = $this->db->insert_id();
        if ($insert) {
            $this->response(array('success' => '1', 'message' => 'success', 'id' => $insert_id));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
