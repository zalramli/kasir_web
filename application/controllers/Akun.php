<?php
class Akun extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_akun');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['ak'] = $this->m_akun->getJoinPegawai();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('akun/dataAkun', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$data['kode'] = $this->m_akun->buat_kode();
		$data['peg'] = $this->m_akun->getPegawai()->result();
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('akun/inputAkun', $data);
			$this->load->view('template/footer');
		} else {
			$this->aksiAdd();
		}
	}

	public function aksiAdd()
	{
		$id_akun = $this->input->post('id_akun');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses = $this->input->post('Akses');
		$id_user = $this->input->post('id_user');

		$data = array(
			'id_akun' => $id_akun,
			'username' => $username,
			'password' => $password,
			'akses' => $akses,
			'id_user' => $id_user
		);
		$this->session->set_flashdata('sukses', 'Ditambahkan !');
		$this->m_akun->input_data($data, 'tbl_akun');
		redirect('akun');
	}


	public function edit($id)

	{
		$where = array('id_akun' => $id);
		$data['peg'] = $this->m_akun->getPegawai()->result();


		$data['ak'] = $this->m_akun->edit_data($where, 'tbl_akun')->result();
		$data['kode'] = $this->m_akun->buat_kode();
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('akun/editAkun', $data);
			$this->load->view('template/footer');
		} else {
			$this->update();
		}
	}

	public function update()

	{
		$id_akun = $this->input->post('id_akun');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses = $this->input->post('Akses');
		$id_user = $this->input->post('id_user');

		$data = array(
			'username' => $username,
			'password' => $password,
			'akses' => $akses,
			'id_user' => $id_user
		);

		$where = array(

			'id_akun' => $id_akun,

		);

		$this->m_akun->update_data($where, $data, 'tbl_akun');
		$this->session->set_flashdata('edit', 'Diubah !');
		redirect('akun');
	}
	function hapus($id)
	{
		$where = array('id_akun' => $id);
		$this->m_akun->hapus_data($where, 'tbl_akun');
		$this->session->set_flashdata('hapus', 'Dihapus !');

		redirect('akun');
	}
}
