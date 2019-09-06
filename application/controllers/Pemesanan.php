<?php
class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kasir');
        $this->load->database();
    }
    public function index()
    {
        $sql = $this->db->query("SELECT COUNT(*) as counts FROM tbl_pemesanan WHERE status='belum'");
        $data['jumlah'] = $sql->result();
        $sql = $this->db->query("SELECT * FROM tbl_pemesanan JOIN tbl_pelanggan USING(id_pelanggan) WHERE status='belum'");
        $data['pemesanan'] = $sql->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('pemesanan/dataPemesanan', $data);
        $this->load->view('template/footer');
    }
    public function detailPemesanan($id)
    {
        $sql5 = $this->db->query("SELECT COUNT(*) as counts FROM tbl_pemesanan WHERE status='belum'");
        $data['jumlah'] = $sql5->result();
        $sql = $this->db->query("SELECT * FROM tbl_pemesanandetail JOIN tbl_barang ON tbl_pemesanandetail.id_barang = tbl_barang.id_barang JOIN tbl_kategori ON tbl_barang.id_kategori=tbl_kategori.id_kategori JOIN tbl_merk ON tbl_barang.id_merk=tbl_merk.id_merk WHERE id_pemesanan='$id'");
        $data['detail'] = $sql->result();
        $sql2 = $this->db->query("SELECT * FROM tbl_pemesanan JOIN tbl_pelanggan ON tbl_pemesanan.id_pelanggan = tbl_pelanggan.id_pelanggan WHERE id_pemesanan='$id'");
        $data['pelanggan'] = $sql2->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('pemesanan/detail', $data);
        $this->load->view('template/footer');
    }
}
