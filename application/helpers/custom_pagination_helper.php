<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pagination_markup') )
{
  function pagination_markup(
    $total_results = 0,
    $url = '',
    $per_page = 5,
    $markup = []
   ) {
    $ci = get_instance();
    $ci->load->library('pagination');
    $ci->load->helper('url');

    $config['base_url'] =  base_url( $url );
    $config['total_rows'] = $total_results;
    $config['per_page'] = $per_page;
    $config["uri_segment"] = 2;
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 1;

    if (empty($markup)) {
      $mark['full'] = ['tag'=>'div', 'class'=>'custom-pagination'];
      $mark['num'] = ['tag'=>'span', 'class'=>'pagination-digets'];
      $mark['next'] = ['tag'=>'span', 'class'=>'pagination-next'];
      $mark['prev'] = ['tag'=>'span', 'class'=>'pagination-prev'];
      $mark['last'] = ['tag'=>'span', 'class'=>'pagination-last'];
      $mark['first'] = ['tag'=>'span', 'class'=>'pagination-first'];
      $mark['cur'] = ['tag'=>'b', 'class'=>'pagination-current'];
    }

    /* pagination markup */
		$config['full_tag_open'] = '<'. $mark['full']['tag'] .' class="'.$mark['full']['class'].'" >';
		$config['full_tag_close'] = '</'. $mark['full']['tag'] .'>';
		//
		$config['num_tag_open'] = '<'. $mark['num']['tag'] .' class="'.$mark['num']['class'].'" >';
		$config['num_tag_close'] = '</'. $mark['num']['tag'] .'>';
		//
		$config['next_tag_open'] = '<'. $mark['next']['tag'] .' class="'.$mark['next']['class'].'" >';
		$config['next_tag_close'] = '</'. $mark['next']['tag'] .'>';
		//
		$config['prev_tag_open'] = '<'. $mark['prev']['tag'] .' class="'.$mark['prev']['class'].'" >';
		$config['prev_tag_close'] = '</'. $mark['prev']['tag'] .'>';
		//
		$config['last_tag_open'] = '<'. $mark['last']['tag'] .' class="'.$mark['last']['class'].'" >';
		$config['last_tag_close'] = '</'. $mark['last']['tag'] .'>';
		//
		$config['first_tag_open'] = '<'. $mark['first']['tag'] .' class="'.$mark['first']['class'].'" >';
		$config['first_tag_close'] = '</'. $mark['first']['tag'] .'>';
		//
		$config['cur_tag_open'] = '<'. $mark['cur']['tag'] .' class="'.$mark['cur']['class'].'" >';
		$config['cur_tag_close'] = '</'. $mark['cur']['tag'] .'>';
		/* end */

    $ci->pagination->initialize($config);

    return $per_page;
  }

  function pagination_settings() {

  }
}
