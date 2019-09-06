<?php
class Merk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_merk');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['merk'] = $this->m_merk->tampil_data()->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('merk/dataMerk', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $data['kode'] = $this->m_merk->buat_kode();

        $this->form_validation->set_rules('nama_merk', 'Nama Merk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('merk/inputMerk', $data);
            $this->load->view('template/footer');
        } else {

            $this->store();
        }
    }

    public function store()
    {
        $id_merk = $this->input->post('id_merk');
        $nama_merk = $this->input->post('nama_merk');
        $data = array(
            'id_merk' => $id_merk,
            'nama_merk' => $nama_merk
        );

        $this->m_merk->input_data($data, 'tbl_merk');
        $this->session->set_flashdata('sukses', 'Ditambahkan !');

        redirect('merk');
    }

    public function edit($id)
    {
        $where = array('id_merk' => $id);
        $data['merk'] = $this->m_merk->edit_data($where, 'tbl_merk')->result();
        $this->form_validation->set_rules('nama_merk', 'Nama Merk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('merk/editMerk', $data);
            $this->load->view('template/footer');
        } else {
            $this->update();
        }
    }
    public function update()
    {
        $id_merk = $this->input->post('id_merk');
        $nama_merk = $this->input->post('nama_merk');
        $data = array('nama_merk' => $nama_merk);

        $where = array('id_merk' => $id_merk);

        $this->m_merk->update_data($where, $data, 'tbl_merk');
        $this->session->set_flashdata('edit', 'Diubah !');
        redirect('merk');
    }

    public function hapus($id = "")
    {
        $where = array('id_merk' => $id);
        $this->m_merk->hapus_data($where, 'tbl_merk');
        $this->session->set_flashdata('hapus', 'Dihapus !');
        redirect('merk');
    }
}
