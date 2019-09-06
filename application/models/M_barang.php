<?php
class M_barang extends CI_Model
{
    function buat_kode()
    {
        $this->db->select('RIGHT(tbl_barang.id_barang,2) as kode', FALSE);
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_barang');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "BRG" . $kodemax;
        return $kodejadi;
    }
    function tampil_data()
    {
        return $this->db->get('tbl_barang');
    }
    public function tampil_kategori()
    {
        return $this->db->get('tbl_kategori');
    }
    public function tampil_merk()
    {
        return $this->db->get('tbl_merk');
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
}
