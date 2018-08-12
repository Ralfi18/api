<?php

$this->load->view('/templates/header');
$this->load->view('/pages/'. $page_name, $data );
$this->load->view('/templates/footer');
