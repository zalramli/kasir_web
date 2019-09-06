<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ApiUpdate extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Mengirim atau menambah data kontak baru
    function index_post()
    {

        $id_pelanggan = $this->post('id_pelanggan');
        $password = $this->post('password');
        $data = array(
            'id_pelanggan'           => $this->post('id_pelanggan'),
            'nama_pelanggan'          => $this->post('nama_pelanggan'),
            'email'    => $this->post('email'),
            'alamat'           => $this->post('alamat'),
            'no_hp'          => $this->post('no_hp'),
            'username'          => $this->post('username'),
            'password'    => $password
        );

        $this->db->where('id_pelanggan', $id_pelanggan);
        $update = $this->db->update('tbl_pelanggan', $data);
        if ($update) {

            // membuat array untuk di transfer
            $result["success"] = "1";
            $result["message"] = "success";
            $this->response($result, 200);
        } else {

            // membuat array untuk di transfer ke API
            $result["success"] = "0";
            $result["message"] = "error";
            $this->response($result, 404);
        }
    }
}
