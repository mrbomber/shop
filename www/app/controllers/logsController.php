<?php

class logsController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
		$this->checkLogin();
	}

	public function index()
	{
		$data['title'] = $this->title . 'Logs';

		$data['logs'] = $this->model('Logs')->getAll();

		$this->view('templates/header', $data);
		$this->view('logs/index', $data);
		$this->view('templates/footer');
	}
}
