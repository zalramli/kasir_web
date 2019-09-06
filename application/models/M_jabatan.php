<?php
class M_jabatan extends CI_Model

{   
    function buat_kode()
    {
        $this->db->select('RIGHT(tbl_jabatan.id_jabatan,2) as kode', FALSE);
        $this->db->order_by('id_jabatan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_jabatan');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "JBT" . $kodemax;
        return $kodejadi;
    }
    function tampil_data()
    {
        return $this->db->get('tbl_jabatan');
    }

    function input_data()
    {
        $id_jabatan = $this->input->post('id_jabatan',true);
        $nama_jabatan = $this->input->post('nama_jabatan',true);
        
        $data= array(
            'id_jabatan'=>$id_jabatan,
            'nama_jabatan'=>$nama_jabatan,
            
        );
        $this->db->insert('tbl_jabatan', $data);
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