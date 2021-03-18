<?php

class Controller
{
	public function view($view, $data = [])
	{

		require_once '../app/views/' . $view . '.php';
	}

	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}

	public function redirect($url)
	{
		header('Location: ' . BASEURL . '/' . $url);
		exit;
	}
	public function proteger($str)
	{
		/*** Função para retornar uma string/Array protegidos contra SQL/Blind/XSS Injection*/
		if (!is_array($str)) {
			$str = preg_replace('/(from|select|insert|delete|where|drop|union|order|update|database)/i', '', $str);
			$str = preg_replace('/(&lt;|<)?script(\/?(&gt;|>(.*))?)/i', '', $str);
			$tbl = get_html_translation_table(HTML_ENTITIES);
			$tbl = array_flip($tbl);
			$str = addslashes($str);
			$str = strip_tags($str);
			return strtr($str, $tbl);
		} else {
			return array_filter($str, "protect");
		}
	}
	public function generateToken()
	{
		$token = $_SESSION['token'] = bin2hex(random_bytes(32));
		return  $token;
	}
	public function verificaToken($token)
	{
		if ($token != $_SESSION['token']) {
			$this->redirect('./');
		}
	}
	public function verificaTokenProduct($token, $url)
	{
		if ($token != $_SESSION['token']) {
			$this->redirect('../' . $url);
		}
	}

	public function mostraErro()
	{
		return	$_SESSION["erro-danger"] = time() + 3;
	}

	public function mostraSucess()
	{
		return	$_SESSION["success"] = time() + 3;
	}

	public function showErrorLogin()
	{
		return	$_SESSION["erro_login"] = time() + 3;
	}

	public function checkLogin()
	{
		if (!isset($_SESSION["logged"])) :
			$this->redirect('./login');
		endif;
	}
	public $extIMG = array(
		'jpeg',
		'jpg',
		'png',
		'bmp',

	);
	public function uploadImage($dir, $file, $img_old, $method)
	{
		if ($_FILES[$file]['size'] > 0) {

			$file = $_FILES[$file]['name'];

			$extension = pathinfo($file, PATHINFO_EXTENSION);


			if (in_array($extension, $this->extIMG)) {

				$ext = strrchr($file, '.');
				$imagem =  md5(uniqid(time()))  . $ext;
				echo $imagem;

				$uploaddir = $dir;
				$uploadfile = $uploaddir . $imagem;
				if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
					$this->$method;
				}
			}


			return $img = $imagem;
		} else {
			return $img = $img_old;
		}
	}
	function get_client_ip()
	{
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if (isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
}
