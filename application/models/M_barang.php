<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Model Class
 * to provide basic query
 */
class M_barang extends CI_Model
{
    /**
     * The constructor of M_general 
     */
    function __construct()
    {
        parent::__construct();
    }

   function get_master_member($params = array())
    {
         if(!empty($params['id']))
            $this->db->where('mm.id', $params['id']);
        if(!empty($params['name']))
            $this->db->like('name', $params['name']);
        if(!empty($params['username']))
            $this->db->like('mm.username', $params['username']);
        if(!empty($params[' passwd']))
            $this->db->like('mm.passwd', $params['passwd']);

        $this->db->select('mm.id as mm_id, mm.name, mm.username, mm.passwd, mm.idcard_no, mm.attachment_id, mm.dept_id, mm.join_date, md.dept_name');
        $this->db->from('master_member mm');
        $this->db->join('master_department md', 'md.id = mm.dept_id');
        $query = $this->db->get();

        if(!empty($params['id']))
            return $query->row();
        else
            return $query->result();
    }

    function department()
    {
        $buffer = array('' => '- pilih Department-');

        // Select record
        $this->db->select('id, dept_name');
        $query = $this->db->get('master_department')->result();

        foreach($query as $q) {
            $buffer[$q->id] = $q->dept_name;
        }

        return $buffer;
    }

    function get_master_barang($params = array())
    {
         if(!empty($params['id']))
            $this->db->where('id', $params['id']);
        if(!empty($params['nama']))
            $this->db->like('nama', $params['nama']);
        if(!empty($params['stock_masuk']))
            $this->db->like('stock_masuk', $params['stock_masuk']);
        if(!empty($params[' stock_keluar']))
            $this->db->like('stock_keluar', $params['stock_keluar']);

        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();

        if(!empty($params['id']))
            return $query->row();
        else
            return $query->result();
    }

    function validate_member() 
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('passwd', md5($this->input->post('passwd')));

        $query = $this->db->get("master_member");

        if( $query->num_rows() == 1 )  {
            return true;
        }
    }
}