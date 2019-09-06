<?php
class M_transaksi extends CI_Model
{
    function buat_kode()
    {
        $this->db->select('RIGHT(tbl_kategori.id_kategori,2) as kode', FALSE);
        $this->db->order_by('id_kategori', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_kategori');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "KTG" . $kodemax;
        return $kodejadi;
    }
    function tampil_data()
    {
        $this->load->database();

        $sql = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_pegawai USING(id_pegawai) JOIN tbl_pelanggan USING(id_pelanggan) ");
        return $sql;
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
