<?php
class Pelajar_model extends CI_Model
{
    public function daftar_pelajar()
    {
        $this->db->select('*');
        $this->db->from('tbl_pelajar');
        return $this->db->get();
    }

    public function detail($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelajar');
        $this->db->where($where);
        return $this->db->get();
    }

    public function delete_pelajar($where)
    {
        $this->db->where($where);
        $this->db->delete('tbl_pelajar');
    }

    public function update($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelajar');
        $this->db->where($where);
        return $this->db->get();
    }
}
