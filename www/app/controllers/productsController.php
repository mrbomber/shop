<?php

class productsController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
		$this->checkLogin();
	}

	public function index()
	{
		$data['title'] = $this->title . 'Products';

		$data['products'] = $this->model('Products')->getAllAdmin();


		$this->view('templates/header', $data);
		$this->view('products/index', $data);
		$this->view('templates/footer');
		unset($_SESSION['success']);
	}

	public function create()
	{

		$data['title'] = $this->title . 'Add Product';
		$data['token'] = $this->generateToken();

		$data['categories'] = $this->model('Categories')->getAll();
		$data['brands'] = $this->model('brands')->getAll();

		$this->view('templates/header', $data);
		$this->view('products/create', $data);
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
		$sku = $this->proteger($_POST['sku']);
		$brand_id  = $this->proteger($_POST['brand_id']);
		$description = $this->proteger($_POST['description']);
		$qty = $this->proteger($_POST['qty']);
		$price = $this->proteger(str_replace(',', '.', str_replace('.', '', $_POST['price'])));


		$img  = null;
		//file upload
		$img = $this->uploadImage('images/product/', 'file', $img, 'create');
		//end file upload


		$product_id =  $this->model('Products')->store($brand_id, $name, $sku, $description, $qty, $price, $img);

		$categories  = $_POST['categories'];

		foreach ($categories as &$value) {
			$category_id = $this->proteger($value);
			$this->model('ProductsCategories')->store($product_id, $category_id);
			$this->model('Logs')->store('store', 'products_categories', $product_id . ' - ' . $category_id, $_SESSION['login_user'], $this->get_client_ip());
		}


		$this->model('Logs')->store('store', 'products', $name . ' - ' . $sku . ' - ' . $description . ' - ' .  $qty . ' - ' . $price . ' - ' . $img, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('products');
	}

	public function edit($id)
	{
		$data['title'] = $this->title . 'Edit Product';
		$data['token'] = $this->generateToken();
		$data['product'] = $this->model('Products')->edit($id);
		$data['categories'] = $this->model('Categories')->getAll();
		$data['brands'] = $this->model('brands')->getAll();

		$products_categories = $this->model('ProductsCategories')->getCategories($id);

		$cats = array();
		foreach ($products_categories as &$value) {
			$cats[] = $value['category_id'];
		}
		$data['products_categories'] =  $cats;


		$this->view('templates/header', $data);
		$this->view('products/edit', $data);
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
		$brand_id  = $this->proteger($_POST['brand_id']);
		$sku = $this->proteger($_POST['sku']);
		$description = $this->proteger($_POST['description']);
		$qty = $this->proteger($_POST['qty']);
		$price = $this->proteger(str_replace(',', '.', str_replace('.', '', $_POST['price'])));
		$img  = $this->proteger($_POST['img']);
		//file upload
		$img = $this->uploadImage('images/product/', 'file', $img, 'update');
		//end file upload



		$this->model('Products')->update($id, $brand_id, $name, $sku, $description, $qty, $price, $img);

		$categories  = $_POST['categories'];

		$this->model('ProductsCategories')->destroy($id);

		foreach ($categories as &$value) {
			$category_id = $this->proteger($value);
			$this->model('ProductsCategories')->store($id, $category_id);
			$this->model('Logs')->store('store', 'products_categories', $id . ' - ' . $category_id, $_SESSION['login_user'], $this->get_client_ip());
		}

		$this->model('Logs')->store('update', 'products', $name . ' - ' . $sku . ' - ' . $description . ' - ' .  $qty . ' - ' . $price . ' - ' . $img, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('products');
	}

	public function destroy($id)
	{

		$this->model('Products')->destroy($id);
		$this->model('ProductsCategories')->destroyRelated('product_id', $id);
		$this->model('Logs')->store('delete', 'products', $id, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('products');
	}
}
