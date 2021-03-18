<?php

class couponsController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
		$this->checkLogin();
	}

	public function index()
	{
		$data['title'] = $this->title . 'Coupons';

		$data['coupons'] = $this->model('Coupons')->getAllAdmin();

		$this->view('templates/header', $data);
		$this->view('coupons/index', $data);
		$this->view('templates/footer');
		unset($_SESSION['success']);
	}

	public function create()
	{

		$data['title'] = $this->title . 'Add Coupon';
		$data['token'] = $this->generateToken();

		$data['coupons_types'] = $this->model('CouponsTypes')->getAll();
		$data['categories'] = $this->model('Categories')->getAll();
		$data['brands'] = $this->model('brands')->getAll();

		$this->view('templates/header', $data);
		$this->view('coupons/create', $data);
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
		$coupon_type = $this->proteger($_POST['coupon_type']);
		$value = $this->proteger(str_replace(',', '.', str_replace('.', '', $_POST['value'])));



		$coupon_id =  $this->model('Coupons')->store($name, $coupon_type, $value);

		$categories  = $_POST['categories'];

		foreach ($categories as &$value) {
			$category_id = $this->proteger($value);
			$this->model('CouponsRelationed')->store($coupon_id, $category_id, null);			
		}


		$brands  = $_POST['brands'];

		foreach ($brands as &$value) {
			$brand_id = $this->proteger($value);
			$this->model('CouponsRelationed')->store($coupon_id, null, $brand_id);			
		}


		$this->model('Logs')->store('store', 'products', $coupon_id . ' - ' . $name, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('coupons');
	}

	public function edit($id)
	{
		$data['title'] = $this->title . 'Edit Coupon';
		$data['token'] = $this->generateToken();
		$data['coupon'] = $this->model('Coupons')->edit($id);
		$data['coupons_types'] = $this->model('CouponsTypes')->getAll();
		$data['categories'] = $this->model('Categories')->getAll();
		$data['brands'] = $this->model('Brands')->getAll();

		$coupons_categories = $this->model('CouponsRelationed')->getCategories($id);
		$coupons_brands = $this->model('CouponsRelationed')->getBrands($id);

		$cats = array();
		foreach ($coupons_categories as &$value) {
			$cats[] = $value['category_id'];
		}
		$data['coupons_categories'] =  $cats;
	


		$brands = array();
		foreach ($coupons_brands as &$value) {
			$brands[] = $value['brand_id'];
		}
		$data['brands_related'] =  $brands;


		$this->view('templates/header', $data);
		$this->view('coupons/edit', $data);
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
		$coupon_type = $this->proteger($_POST['coupon_type']);
		$value = $this->proteger(str_replace(',', '.', str_replace('.', '', $_POST['value'])));


		$this->model('Coupons')->update($id, $name, $coupon_type, $value);

		$this->model('CouponsRelationed')->destroy($id);

		$categories  = $_POST['categories'];

		foreach ($categories as &$value) {
			$category_id = $this->proteger($value);
			$this->model('CouponsRelationed')->store($id, $category_id, null);			
		}


		$brands  = $_POST['brands'];

		foreach ($brands as &$value) {
			$brand_id = $this->proteger($value);
			$this->model('CouponsRelationed')->store($id, null, $brand_id);			
		}




	

		$this->model('Logs')->store('update', 'coupons', $name , $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('coupons');
	}

	public function destroy($id)
	{

		$this->model('Coupons')->destroy($id);
		$this->model('CouponsRelationed')->destroyRelated('coupon_id', $id);
		$this->model('Logs')->store('delete', 'coupons', $id, $_SESSION['login_user'], $this->get_client_ip());
		$this->mostraSucess();
		$this->redirect('coupons');
	}
}
