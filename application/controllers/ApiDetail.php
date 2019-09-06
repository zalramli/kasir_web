<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ApiDetail extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $result = array();
        $result['meals'] = array();
        $cari = $this->input->get('s');
        $merk = $this->db->get_where('api_barang', array('nama_barang' => $cari));
        foreach ($merk->result_array() as $item) {
            $path2 = "uploads/" . $item["foto"];
            $finalPath = "http://192.168.43.184/workshop_smt4/" . $path2;

            $data = array(
                'id_merk' => $item["id_merk"],
                'id_kategori' => $item["id_kategori"],
                'id_barang' => $item["id_barang"],
                'nama_barang' => $item["nama_barang"],
                'foto' => $finalPath,
                'stok_real' => $item["stok_real"],
                'harga' => $item["harga"],
                'nama_kategori' => $item["nama_kategori"],
                'nama_merk' => $item["nama_merk"],
                'deskripsi' => $item["deskripsi"],

            );
            array_push($result['meals'], $data);

            $result['success'] = "1";
            $result['message'] = "success";
            $this->response($result, 200);
        }
    }
}
