<?php

class homeController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
	}

	public function index()
	{

		$data['title'] = $this->title . 'Dashboard';
		$data['products'] = $this->model('Products')->getAll();
		$data['token'] = $this->generateToken();

		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}
