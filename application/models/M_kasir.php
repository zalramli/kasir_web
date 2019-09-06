<?php
class M_kasir extends CI_Model
{
	public function get_kategori_all()
	{
		$query = $this->db->get('tbl_kategori');
		return $query->result_array();
	}
	public function get_produk_kategori($kategori)
	{
		$query = $this->db->get_where('tbl_barang', array('id_kategori' => $kategori));
		return $query->result_array();
	}
	function buat_kodePelanggan()
	{
		$this->db->select('RIGHT(tbl_pelanggan.id_pelanggan,2) as kode', FALSE);
		$this->db->order_by('id_pelanggan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_pelanggan');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = "PLG" . $kodemax;
		return $kodejadi;
	}
	function buat_kodeTransaksi()
	{
		$this->db->select('RIGHT(tbl_transaksi.id_transaksi,2) as kode', FALSE);
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_transaksi');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = "TRS" . $kodemax;
		return $kodejadi;
	}
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function detailPemesanan($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
}
