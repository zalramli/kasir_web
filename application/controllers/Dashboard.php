<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function index()
    {
        $sql = $this->db->query("SELECT COUNT(*) as jml_barang FROM tbl_barang")->result_array();
        $data['barang'] = $sql[0]['jml_barang'];
        $sql2 = $this->db->query("SELECT COUNT(*) as jml_transaksi FROM tbl_transaksi")->result_array();
        $data['transaksi'] = $sql2[0]['jml_transaksi'];
        $sql3 = $this->db->query("SELECT COUNT(*) as jml_pemesanan FROM tbl_pemesanan WHERE status='belum'")->result_array();
        $data['pemesanan'] = $sql3[0]['jml_pemesanan'];
        $sql4 = $this->db->query("SELECT COUNT(*) as jml_pegawai FROM tbl_pegawai")->result_array();
        $data['pegawai'] = $sql4[0]['jml_pegawai'];
        $sql5 = $this->db->query("SELECT COUNT(*) as jml_kategori FROM tbl_kategori")->result_array();
        $data['kategori'] = $sql5[0]['jml_kategori'];
        $sql6 = $this->db->query("SELECT COUNT(*) as jml_merk FROM tbl_merk")->result_array();
        $data['merk'] = $sql6[0]['jml_merk'];
        $sql7 = $this->db->query("SELECT COUNT(*) as jml_jabatan FROM tbl_jabatan")->result_array();
        $data['jabatan'] = $sql7[0]['jml_jabatan'];
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}
