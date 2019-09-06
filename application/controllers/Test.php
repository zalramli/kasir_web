<?php
class Test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_test');
        error_reporting(0);
    }
    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->m_kasir->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'            => $row->id_barang,
                        'description'    => $row->harga,
                    );
                echo json_encode($arr_result);
            }
        }
    }
    public function index()
    {
        $this->load->view("test");
    }
}
