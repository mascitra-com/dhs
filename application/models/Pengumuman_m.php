<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_m extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'pengumuman';
    }

    public function get_info()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("status = 1 AND (masa_aktif > now() OR masa_aktif is NULL OR masa_aktif = '')");
        $this->db->order_by('createdAt', 'DESC');
        return $this->db->get()->result();
    }
}