<?php

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }
    public function index()
    {
        $data['transaksi'] = $this->m_transaksi->tampil_data()->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('transaksi/dataTransaksi', $data);
        $this->load->view('template/footer');
    }
    public function print()
    {
        $this->load->database();
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir    = $this->input->post('tgl_akhir');
        $sql = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_pegawai USING(id_pegawai) JOIN tbl_pelanggan USING(id_pelanggan) WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_transaksi ASC");
        $data['ambil'] = $sql->result();
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $html = $this->load->view('transaksi/rekap', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "print_rekap.pdf";

        //load mPDF library
        $this->load->library('m_pdf');
        ob_start();
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "I");
    }
    public function detail($id)
    {
        $sql = $this->db->query("SELECT * FROM tbl_transaksidetail JOIN tbl_transaksi USING(id_transaksi) JOIN tbl_barang USING(id_barang) WHERE id_transaksi='$id'");
        $data['detail'] = $sql->result();
        $sql2 = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_pegawai USING(id_pegawai) JOIN tbl_pelanggan USING (id_pelanggan) WHERE id_transaksi = '$id'");
        $data['transaksi'] = $sql2->result();
        $sql3 = $this->db->query("SELECT COUNT(*) AS jumlah_barang FROM tbl_transaksidetail WHERE id_transaksi = '$id'");
        $data['count'] = $sql3->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('transaksi/detailTransaksi', $data);
        $this->load->view('template/footer');
    }
}
