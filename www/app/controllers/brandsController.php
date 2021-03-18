<?php

class brandsController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
		$this->checkLogin();
	}

	public function index()
	{
		$data['title'] = $this->title . 'Brands';

		$data['brands'] = $this->model('Brands')->getAll();

		$this->view('templates/header', $data);
		$this->view('brands/index', $data);
		$this->view('templates/footer');
		unset($_SESSION['success']);
	}

	public function create()
	{

		$data['title'] = $this->title . 'Add Brand';
		$data['token'] = $this->generateToken();
	
		$this->view('templates/header', $data);
		$this->view('brands/create', $data);
		$this->view('templates/footer');
		unset($_SESSION['erro-danger']);
	}



	public function store()
	{
		if (!isset($_POST['token'])) {
			$this->mostraErro();
			$this->create();
		}

		$this->verificaToken($_POST['token']);

		$name  = $this->proteger($_POST['name']);
		
		 $this->model('Brands')->store($name);

		$this->model('Logs')->store('store', 'brands', $name , $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('brands');
	}

	public function edit($id)
	{
		$data['title'] = $this->title . 'Edit Brand';
		$data['token'] = $this->generateToken();
		$data['brand'] = $this->model('Brands')->edit($id);
		

		$this->view('templates/header', $data);
		$this->view('brands/edit', $data);
		$this->view('templates/footer');
		unset($_SESSION['success']);
	}

	public function update($id)
	{

		if (!isset($_POST['token'])) {
			$this->mostraErro();
			$this->create();
		}

		$this->verificaToken($_POST['token']);


		$name  = $this->proteger($_POST['name']);
		
		$this->model('Brands')->update($id, $name);

		

		$this->model('Logs')->store('update', 'brands', $name , $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('brands');
	}

	public function destroy($id)
	{

		$this->model('Brands')->destroy($id);	
		$this->model('Logs')->store('delete', 'brands', $id, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('brands');
	}
}
