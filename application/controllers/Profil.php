<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	
	}
	public function index()
	{
	
		$data['title'] = "Profil";
		$data['user'] = $this->User_model->getBy();
		$this->load->view('layouts/header', $data);
		$this->load->view('profil/vw_profil', $data);
		$this->load->view('layouts/footer', $data);
	}
}