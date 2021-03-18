<?php

class usersController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
		$this->checkLogin();
	}

	public function index()
	{
		$data['title'] = $this->title . 'Users';

		$data['users'] = $this->model('Users')->getAll();

		$this->view('templates/header', $data);
		$this->view('users/index', $data);
		$this->view('templates/footer');
		unset($_SESSION['success']);
	}

	public function create()
	{

		$data['title'] = $this->title . 'Add User';
		$data['token'] = $this->generateToken();

		$this->view('templates/header', $data);
		$this->view('users/create', $data);
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

		$login  = $this->proteger($_POST['login']);
		$password  = $this->proteger($_POST['password']);
		$password = password_hash($password, PASSWORD_BCRYPT);


		$this->model('Users')->store($login, $password);
		$this->model('Logs')->store('store', 'users', $login, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('users');
	}

	public function edit($id)
	{
		$data['title'] = $this->title . 'Edit User';
		$data['token'] = $this->generateToken();
		$data['user'] = $this->model('Users')->edit($id);

		$this->view('templates/header', $data);
		$this->view('users/edit', $data);
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



		$password  = $this->proteger($_POST['password']);
		$password = password_hash($password, PASSWORD_BCRYPT);

		$this->model('Users')->update($id, $password);
		$this->model('Logs')->store('update', 'users', $id, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('users');
	}

	public function destroy($id)
	{

		$this->model('Users')->destroy($id);
		$this->model('Logs')->store('delete', 'users', $id, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('users');
	}
}
