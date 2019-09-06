<?php
class M_pegawai extends CI_Model

{   
    function buat_kode()
    {
        $this->db->select('RIGHT(tbl_pegawai.id_pegawai,2) as kode', FALSE);
        $this->db->order_by('id_pegawai', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pegawai');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PGW" . $kodemax;
        return $kodejadi;
    }
    function getJoinJabatan()
    {
        $this->db->select('*');
        $this->db->join('tbl_jabatan', 'tbl_pegawai.id_jabatan = tbl_jabatan.id_jabatan');
        $this->db->from('tbl_pegawai');

        $query =$this->db->get();
        return $query->result();

    }

    function getJabatan()
    {
        return $this->db->get('tbl_jabatan');
    }
    function tampil_data()
    {
        return $this->db->get('tbl_pegawai');
    }

    function input_data($data, $table)
    {
   
        $this->db->insert($table, $data);
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }   

}


?>