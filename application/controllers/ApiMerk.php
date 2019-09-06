<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ApiMerk extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $result = array();
        $result['categories'] = array();
        $merk = $this->db->get('tbl_kategori');
        foreach ($merk->result_array() as $item) {
            $path2 = "uploads/" . $item["fotoKategori"];
            $finalPath = "http://192.168.43.184/workshop_smt4/" . $path2;

            $data = array(
                'id_kategori' => $item["id_kategori"],
                'nama_kategori' => $item["nama_kategori"],
                'fotoKategori' => $finalPath,
            );
            array_push($result['categories'], $data);

            $result['success'] = "1";
            $result['message'] = "success";
            $this->response($result, 200);
        }
    }
}
