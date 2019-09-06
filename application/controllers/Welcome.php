<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$where = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$cek = $this->m_transaksi->cek_login('tbl_akun', $where);
		if ($cek->num_rows() > 0) {
			foreach ($cek->result() as $row) {
				$akses = $row->akses;
				$password = $row->password;
				$id_pegawai = $row->id_user;
			}

			$data_session = array(
				'nama' => $this->input->post('username'),
				'akses' => $akses,
				'pegawai' => $id_pegawai,
				'password' => $password,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			if ($this->session->userdata("akses") == 'Admin') {
				redirect('dashboard');
			} else {
				redirect('kasir');
			}
		} else {
			$link_address = 'http://localhost/workshop_smt4/';
			echo "Username dan password salah <a href='" . $link_address . "'>Kembali</a>";
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
