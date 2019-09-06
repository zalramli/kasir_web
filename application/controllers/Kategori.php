<?php

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['kategori'] = $this->m_kategori->tampil_data()->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('kategoriBarang/dataKategori', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        $data['kode'] = $this->m_kategori->buat_kode();
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('kategoriBarang/inputKategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->store();
        }
    }
    public function store()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $nama_kategori
        );
        $this->m_kategori->input_data($data, 'tbl_kategori');
        $this->session->set_flashdata('sukses', 'Ditambahkan !');
        redirect('kategori');
    }
    public function edit($id)
    {
        $where = array('id_kategori' => $id);
        $data['kategori'] = $this->m_kategori->edit_data($where, 'tbl_kategori')->result();
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('kategoriBarang/editKategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->update();
        }
    }
    public function update()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');

        $data = array(
            'nama_kategori' => $nama_kategori
        );

        $where = array(
            'id_kategori' => $id_kategori
        );

        $this->m_kategori->update_data($where, $data, 'tbl_kategori');
        $this->session->set_flashdata('edit', 'Diubah !');
        redirect('kategori');
    }
    public function hapus($id)
    {
        $where = array('id_kategori' => $id);
        $this->m_kategori->hapus_data($where, 'tbl_kategori');
        $this->session->set_flashdata('hapus', 'Dihapus !');
        redirect('kategori');
    }
}
