<?php
class M_test extends CI_Model
{

    function get_all_blog()
    {
        $result = $this->db->get('tbl_barang');
        return $result;
    }

    function search_blog($title)
    {
        $this->db->like('id_barang', $title, 'both');
        $this->db->order_by('id_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tbl_barang')->result();
    }
}
