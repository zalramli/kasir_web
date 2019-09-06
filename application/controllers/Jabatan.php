<?php
class Jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jabatan');
        $this->load->library('form_validation');
    }
    public function index()

    {
        $data['jabatan'] = $this->m_jabatan->tampil_data()->result();

        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('jabatan/dataJabatan', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        $data['kode'] = $this->m_jabatan->buat_kode();
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('jabatan/inputJabatan', $data);
            $this->load->view('template/footer');
        } else {

            $this->aksiAdd();
        }
    }
    public function aksiAdd()
    {
        $this->m_jabatan->input_data();
        $this->session->set_flashdata('sukses', 'Ditambahkan !');
        redirect('jabatan');
    }
    public function edit($id)
    {
        $where = array('id_jabatan' => $id);

        $data['jabatan'] = $this->m_jabatan->edit_data($where, 'tbl_jabatan')->result();
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('jabatan/editJabatan', $data);
            $this->load->view('template/footer');
        } else {
            $this->update();
        }
    }

    public function update()
    {
        $id_jabatan = $this->input->post('id_jabatan', true);
        $nama_jabatan = $this->input->post('nama_jabatan', true);

        $data = array(
            'nama_jabatan' => $nama_jabatan,

        );

        $where = array(

            'id_jabatan' => $id_jabatan,

        );
        $this->session->set_flashdata('edit', 'Diubah !');
        $this->m_jabatan->update_data($where, $data, 'tbl_jabatan');
        redirect('jabatan');
    }

    function hapus($id)
    {
        $where = array('id_jabatan' => $id);
        $this->m_jabatan->hapus_data($where, 'tbl_jabatan');
        $this->session->set_flashdata('hapus', 'Dihapus !');

        redirect('jabatan');
    }
}
