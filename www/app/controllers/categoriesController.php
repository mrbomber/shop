<?php

class categoriesController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
		$this->checkLogin();
	}

	public function index()
	{
		$data['title'] = $this->title . 'Categories';

		$data['categories'] = $this->model('Categories')->getAll();

		$this->view('templates/header', $data);
		$this->view('categories/index', $data);
		$this->view('templates/footer');
		unset($_SESSION['success']);
	}

	public function create()
	{

		$data['title'] = $this->title . 'Add Category';
		$data['token'] = $this->generateToken();

		$this->view('templates/header', $data);
		$this->view('categories/create', $data);
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
		$code = $this->proteger($_POST['code']);


		$this->model('Categories')->store($name, $code);
		$this->model('Logs')->store('store', 'categories', $name . ' - ' . $code, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('categories');
	}

	public function edit($id)
	{
		$data['title'] = $this->title . 'Edit Category';
		$data['token'] = $this->generateToken();
		$data['category'] = $this->model('Categories')->edit($id);

		$this->view('templates/header', $data);
		$this->view('categories/edit', $data);
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
		$code = $this->proteger($_POST['code']);

		$this->model('Categories')->update($id, $name, $code);
		$this->model('Logs')->store('update', 'categories', $name . ' - ' . $code, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('categories');
	}

	public function destroy($id)
	{

		$this->model('Categories')->destroy($id);
		$this->model('ProductsCategories')->destroyRelated('category_id', $id);
		$this->model('Logs')->store('delete', 'categories', $id, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('categories');
	}
}
