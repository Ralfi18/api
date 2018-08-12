<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('blog_model');
		// $this->load->library('pagination');
		$this->load->helper('custom_pagination');
		$this->load->helper('app');
	}

	public function index()
	{
		$data['page_name'] = 'home';
		$data['data'] = [];
		$this->load->view('templates/page', $data);
	}

	public function blog( $page_name = 'blog' )
	{
		//$data['data']['users'] = $this->users_model->getAllNews();
		$count = $this->blog_model->countBlog();
		$data['data']['blog_count'] = $count;
	  $data['page_name'] = $this->uri->segment(1);
		// pagination function (total rows, base url, per page)
		$pagination = pagination_markup( $count, 'blog', 5 );
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['data']['blog'] = $this->blog_model->paginateBLog($pagination, $page);
	  $this->load->view('templates/page', $data);
	}

	public function api_users()
	{
		// $username = $this->input->post();
		// $passowrd = $this->input->post('passowrd');
		$json = json_decode($this->input->post('credentials'));
		$userName = $json->username;
		$userPass = $json->password;
		$selectedPage = $json->page;

		if ( $userName == 'rali' && $userPass == 'rali123' ) {
			// $users = $this->users_model->getAllNews();
			$countUsers = $this->users_model->countUsers();
			$limit = 10;
			$resultsToReturn = ($selectedPage-1)*$limit;
			$users =  $this->users_model->paginatetUsers($limit, $resultsToReturn);
		} else {
			$users = 'error';
		}

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header('Content-Type: application/json');
    echo json_encode( [$countUsers,$users] );
	}

}
