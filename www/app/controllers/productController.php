<?php

class productController extends Controller
{
	public function __construct()
	{
		$this->title =  'Backend Test | ';
	}

	public function index($id)
	{


		$data['products'] = $this->model('Products')->getSingle($id);
		$data['title'] = $data['products']['name'];
		$data['new_price'] = null;

		if (isset($_POST['coupon'])) {
			//processa o cupon
			$this->verificaToken($_POST['token'], 'product/' . $id);


			$products_categories = $this->model('ProductsCategories')->getCategories($id);

			$cats = array();
			foreach ($products_categories as &$value) {
				$cats[] = $value['category_id'];
			}

			$cats =  implode(',', $cats);

			$valida_coupon = $this->model('Coupons')->getCoupon($_POST['coupon'], $cats, $data['products']['brand_id']);
			if ($valida_coupon != null) :
				if ($valida_coupon[0]['coupon_type'] == 1) :
					$data['new_price'] =  $data['products']['price'] - $valida_coupon[0]['value'];
				endif;

				if ($valida_coupon[0]['coupon_type'] == 2) :
					$data['new_price'] =  $data['products']['price'] - ($data['products']['price'] / 100 * $valida_coupon[0]['value']);
				endif;
			endif;
		}
		$data['new_price'] = number_format($data['new_price'], 2, ',', '');
		$data['token'] = $this->generateToken();
		$this->view('templates/header', $data);
		$this->view('product/index', $data);
		$this->view('templates/footer');
	}
}
