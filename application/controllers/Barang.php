<?php
class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
    }
    public function index()
    {
        $data['barang'] = $this->m_barang->tampil_data()->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('barang/dataBarang', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        $data['kode'] = $this->m_barang->buat_kode();
        $data['kategori'] = $this->m_barang->tampil_kategori()->result();
        $data['merk'] = $this->m_barang->tampil_merk()->result();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('barang/inputBarang', $data);
        $this->load->view('template/footer');
    }
    public function store()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['file_name'] = $_FILES['gambar']['name'];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) //sesuai dengan name pada form 
        {
            echo 'anda gagal upload';
        } else {
            //tampung data dari form
            $id_barang = $this->input->post('id_barang');
            $nama_barang = $this->input->post('nama_barang');
            $file = $this->upload->data();
            $gambar = $file['file_name'];
            $stok_real = $this->input->post('stok');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $id_kategori = $this->input->post('id_kategori');
            $id_merk = $this->input->post('id_merk');

            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $nama_barang,
                'foto' => $gambar,
                'stok_real' => $stok_real,
                'stok_sementara' => 0,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'id_kategori' => $id_kategori,
                'id_merk' => $id_merk
            );
            $this->m_barang->input_data($data, 'tbl_barang');
            redirect('barang');
        }
    }
    public function edit($id)
    {
        $where = array('id_barang' => $id);
        $data['ambil_kategori'] = $this->m_barang->tampil_kategori()->result();
        $data['ambil_merk'] = $this->m_barang->tampil_merk()->result();
        $data['barang'] = $this->m_barang->edit_data($where, 'tbl_barang')->row_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('barang/editBarang', $data);
        $this->load->view('template/footer');
    }
    public function update()
    {
        if (empty($_FILES['gambar']['name'])) {
            $id_barang = $this->input->post('id_barang');
            $nama_barang = $this->input->post('nama_barang');
            $stok_real = $this->input->post('stok');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $id_kategori = $this->input->post('id_kategori');
            $id_merk = $this->input->post('id_merk');

            $data = array(
                'nama_barang' => $nama_barang,
                'stok_real' => $stok_real,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'id_kategori' => $id_kategori,
                'id_merk' => $id_merk
            );
            $where = array(
                'id_barang' => $id_barang
            );

            $this->m_barang->update_data($where, $data, 'tbl_barang');
            redirect('barang');
        } else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['file_name'] = $_FILES['gambar']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) //sesuai dengan name pada form 
            {
                echo 'anda gagal upload';
            } else {
                //tampung data dari form
                $id_barang = $this->input->post('id_barang');
                $nama_barang = $this->input->post('nama_barang');
                $file = $this->upload->data();
                $gambar = $file['file_name'];
                $stok_real = $this->input->post('stok');
                $harga = $this->input->post('harga');
                $deskripsi = $this->input->post('deskripsi');
                $id_kategori = $this->input->post('id_kategori');
                $id_merk = $this->input->post('id_merk');

                $data = array(
                    'nama_barang' => $nama_barang,
                    'foto' => $gambar,
                    'stok_real' => $stok_real,
                    'harga' => $harga,
                    'deskripsi' => $deskripsi,
                    'id_kategori' => $id_kategori,
                    'id_merk' => $id_merk
                );
                $where = array(
                    'id_barang' => $id_barang
                );

                $this->m_barang->update_data($where, $data, 'tbl_barang');
                redirect('barang');
            }
        }
    }
    public function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->m_barang->hapus_data($where, 'tbl_barang');
        redirect('barang');
    }
}
