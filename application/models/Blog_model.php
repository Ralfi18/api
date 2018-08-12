<?php

defined('BASEPATH') OR exit('No direct script access allowed');

  class Blog_model extends CI_Model{

    public function getAllNews()
    {
      $query = $this->db->get('blog');
      return $query->result_object();
    }

    public function countBlog()
    {
      // $query = $this->db->get('users');
      return $this->db->count_all('blog');
    }

    public function paginateBLog( $limit, $start )
    {

      $start = $start > 0 ? ($start-1) * $limit : $start;
      $this->db->limit($limit, $start);
      $query = $this->db->get('blog');
      return $query->result_object();
    }
  }
