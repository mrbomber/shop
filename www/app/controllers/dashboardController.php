<?php


class dashboardController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
		$this->checkLogin();
	}

	public function index()
	{
		$this->checkLogin();
		$data['title'] = $this->title . 'Dashboard';

		$this->view('templates/header', $data);
		$this->view('dashboard/index');
		$this->view('templates/footer');
	}
}
