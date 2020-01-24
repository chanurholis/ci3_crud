<?php
class Pelajar_model extends CI_Model
{
    public function daftar_pelajar()
    {
        $this->db->select('*');
        $this->db->from('tbl_pelajar');
        return $this->db->get();
    }
}
