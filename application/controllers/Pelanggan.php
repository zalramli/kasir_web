<?php
class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
    }
    public function index()
    {
        $data['pelanggan'] = $this->m_pelanggan->tampil_data()->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('pelanggan/dataPelanggan', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('pelanggan/inputPelanggan');
            $this->load->view('template/footer');
        } else {
            $this->store();
        }
    }
    public function store()
    {
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $data = array(
            'nama_pelanggan' => $nama_pelanggan,
            'email' => $email,
            'alamat' => $alamat,
            'no_hp' => $no_hp
        );
        $this->m_pelanggan->input_data($data, 'tbl_pelanggan');
        $this->session->set_flashdata('sukses', 'Ditambahkan !');
        redirect('pelanggan');
    }
    public function edit($id)
    {
        $where = array('id_pelanggan' => $id);
        $data['pelanggan'] = $this->m_pelanggan->edit_data($where, 'tbl_pelanggan')->result();
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('pelanggan/editPelanggan', $data);
            $this->load->view('template/footer');
        } else {
            $this->update();
        }
    }
    public function update()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nama_pelanggan' => $nama_pelanggan,
            'email' => $email,
            'alamat' => $alamat,
            'no_hp' => $no_hp
        );

        $where = array(
            'id_pelanggan' => $id_pelanggan
        );

        $this->m_pelanggan->update_data($where, $data, 'tbl_pelanggan');
        $this->session->set_flashdata('edit', 'Diubah !');
        redirect('pelanggan');
    }
    function hapus($id)
    {
        $where = array('id_pelanggan' => $id);
        $this->m_pelanggan->hapus_data($where, 'tbl_pelanggan');
        $this->session->set_flashdata('hapus', 'Dihapus !');
        redirect('pelanggan');
    }
}
