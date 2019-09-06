<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ApiRegister extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post()
    {
        $data = array(
            'nama_pelanggan'          => $this->post('nama_pelanggan'),
            'email'    => $this->post('email'),
            'alamat'          => $this->post('alamat'),
            'no_hp'          => $this->post('no_hp'),
            'username'          => $this->post('username'),
            'password'          => $this->post('password')
        );
        $insert = $this->db->insert('tbl_pelanggan', $data);
        if ($insert) {
            $this->response(array('success' => '1', 'message' => 'success'));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
