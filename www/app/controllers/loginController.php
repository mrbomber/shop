<?php

class loginController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';		
	}

	public function index()
	{
		$data['title'] = $this->title . 'Login';
		$data['products'] = $this->model('Products')->getAll();
		$data['token'] = $this->generateToken();

		$this->view('templates/header', $data);
		$this->view('login/index', $data);
		$this->view('templates/footer');
		unset($_SESSION['erro_login']);
	}

	public function check()
	{
		if (!isset($_POST['token'])) {
			$this->mostraErro();
			$this->index();
		}

		$this->verificaToken($_POST['token']);

		if (!isset($_POST['login'])) {
			$this->redirect('login');
		} else {
			$login  = $this->proteger($_POST['login']);
			$password  = $this->proteger($_POST['password']);

			$user = $this->model('Users')->getLogin($login);

			if (password_verify($password, $user['password'])) {
				$_SESSION["logged"] = true;
				$_SESSION["login_user"] = $user['login'];

				$this->model('Logs')->store('login', 'users', $user['login'], $_SESSION['login_user'], $this->get_client_ip());


				$this->redirect('dashboard');
			} else {

				$this->showErrorLogin();

				$this->redirect('login');
			}
		}
	}
	public function logout()
	{
		unset($_SESSION['logged']);
		unset($_SESSION['login_user']);
		$this->redirect('./');
	}
}
