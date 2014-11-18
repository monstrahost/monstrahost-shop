<?php

// Admin Navigation: add new item
Navigation::add(__('<i class=\'glyphicon glyphicon-shopping-cart\'></i>&nbsp;&nbsp;Easy Shop', 'shop'), 'content', 'shop', 20);

// Add actions
Action::add('admin_themes_extra_index_template_actions','ShopAdmin::formComponent');
Action::add('admin_themes_extra_actions','ShopAdmin::formComponentSave');


class ShopAdmin extends Backend {


	/**
	 * Shop Form content
	 *
	 * @var string
	 */
	public static $shop_form = '';


	/**
	 * Main Shop admin function
	 */
	public static function main() {

		// Get shop table
		$shop = new Table('shop');

		// Select all products
		$products = $shop->select(null, 'all');

		// Add Product


		// Add new product
		if (Request::post('save_product')) {

			// Get post data
			$title = Request::post('shop_title');
			$image    = Request::post('shop_image');
			$description  = Request::post('shop_description');
			$price = Request::post('shop_price');
			$shipping = Request::post('shop_shipping');
			$shipping2 = Request::post('shop_shipping2');
			$sku = Request::post('shop_sku');
			$item_id = Request::post('product_id');

			$errors = array();
			
			$target_dir = "/public/uploads/";

			if (Security::check(Request::post('csrf'))) {

				if ( $title == '' || !is_numeric($price)) {
					Notification::setNow('errors', __('Price must be a number', 'shop'));
					$errors['shop_empty_fields'] = __('There are invalid fields', 'shop');
					
					
				}

				if (count($errors) == 0) {
					if (Request::post('item_id') == '') {
						$shop->insert(array('title' => $title, 'image' => $image, 'description' => $description, 'price' => $price, 'shipping' => $shipping, 'shipping2' => $shipping2, 'sku' => $sku ));
						Notification::set('success', __('New Item Saved', 'shop'));
						Request::redirect('index.php?id=shop');
					}
					else {
						$shop->updateWhere('[id="'.Request::post('item_id').'"]',
							array(
								'image'     => Html::toText($image),
								'title'       => Html::toText($title),
								'description' => $description,
								'price'       => Html::toText($price),
								'shipping'		=> Html::toText($shipping),
								'shipping2'		=> Html::toText($shipping2),
								'sku'			=> Html::toText($sku),	

							));
						Notification::set('success', __('Edited Item Saved', 'shop'));
						Request::redirect('index.php?id=shop');
					}

				} 

			} else { die('csrf detected!'); }

		}


		// New Product Creation
		
		if (Request::get('action') &&  Request::get('action') == 'add_product') {



			if (Security::check(Request::get('token'))) {
			
			// Get form view
			$shop_form = View::factory('shop/views/backend/form')

			->display();



			 
			} else { die('csrf detected!'); }
		}
		
		
		
		// Load product for editing
		
		if (Request::get('action') &&  Request::get('action') == 'edit_product' && Request::get('product_id')) {

			$item = $shop->select('[id="'.Request::get('product_id').'"]', null);
			$image         = $item['image'];
			$title          = $item['title'];
			$description    = $item['description'];
			$price          = $item['price'];
			$shipping		= $item['shipping'];
			$shipping2		= $item['shipping2'];
			$sku			= $item['sku'];
			$item_id  = Request::get('product_id');

			if (Security::check(Request::get('token'))) {
			
			// Get form view
			$shop_form = View::factory('shop/views/backend/form')
			->assign('title', $title)
			->assign('image', $image)
			->assign('description', $description)
			->assign('price', $price)
			->assign('shipping', $shipping)
			->assign('shipping2', $shipping2)
			->assign('sku', $sku)
			->assign('item_id', $item_id)
			->assign('errors', $errors)
			->display();



			 
			} else { die('csrf detected!'); }
		}


		// Delete product
		if (Request::get('action') &&  Request::get('action') == 'delete_product' && Request::get('product_id')) {

			if (Security::check(Request::get('token'))) {

				$shop->delete((int)Request::get('product_id'));
				Request::redirect('index.php?id=shop');

			} else { die('csrf detected!'); }
		}




		if (Request::get('action') == '') {
		// Display view
		View::factory('shop/views/backend/index')
		->assign('products', $products)
		->display();
		}


	}

	/**
	 * Form Component Save
	 */
	public static function formComponentSave() {
		if (Request::post('shop_component_save')) {
			Option::update('shop_template', Request::post('shop_form_template'));
			Request::redirect('index.php?id=themes');
		}
	}


	/**
	 * Form Component
	 */
	public static function formComponent() {

		$_templates = Themes::getTemplates();
		foreach($_templates as $template) $templates[basename($template, '.template.php')] = basename($template, '.template.php');

		echo (
			Form::open().
			Form::label('shop_form_template', __('Shop Template', 'shop')).
			Form::select('shop_form_template', $templates, Option::get('shop_template'), array('class' => 'form-control')).
			Html::br().
			Form::submit('shop_component_save', __('Save', 'shop'), array('class' => 'btn btn-block btn-primary')).
			Form::close()
		);
	}

}