<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ApiPemesananWhereDetail extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    function index_get($id)
    {
        $result = array();
        $result['detail_pemesanan'] = array();
        $pemesananDetail = $this->db->query("SELECT * FROM tbl_pemesanandetail JOIN tbl_barang ON tbl_pemesanandetail.id_barang=tbl_barang.id_barang JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori WHERE id_pemesanan='$id'");
        foreach ($pemesananDetail->result_array() as $item) {
            $path2 = "uploads/" . $item["foto"];
            $finalPath = "http://192.168.43.184/workshop_smt4/" . $path2;

            $data = array(
                'foto' => $finalPath,
                'nama_barang' => $item["nama_barang"],
                'nama_kategori' => $item["nama_kategori"],
                'harga' => $item["harga"],
                'jumlah' => $item["jumlah"],
            );
            array_push($result['detail_pemesanan'], $data);

            $result['success'] = "1";
            $result['message'] = "success";
            $this->response($result, 200);
        }
    }
}
