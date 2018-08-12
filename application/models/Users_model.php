<?php

defined('BASEPATH') OR exit('No direct script access allowed');

  class Users_model extends CI_Model{

    public function getAllNews()
    {
      $query = $this->db->get('users');
      return $query->result_object();
    }

    public function countUsers()
    {
      // $query = $this->db->get('users');
      return $this->db->count_all('users');
    }

    public function paginatetUsers( $limit = 5, $start = 0 )
    {
      // $start = $start > 0 ? ($start-1) * $limit : $start;
      $this->db->limit($limit, $start);
      $query = $this->db->get('users');
      return $query->result_object();
    }
  }
