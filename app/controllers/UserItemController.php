<?php

class UserItemController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.master';
	/**
	 * List user item
	 * @author OanhHa
	 * @since 2015/01/14
	 */
	public function item_management() {
		if(!$this->checkLogin()) {
			return Redirect::to('/');
		}
		$data['items'] = $this->getItemList();
		/*$queries = DB::getQueryLog();
		var_dump($queries);*/
		$data['title_for_layout'] = "Quản lý sản phẩm của cửa hàng";
		return View::make('userItem.item_management', $data);
	}

	 /**
     * get item list
     * @author OanhHa
     * @since 2015/01/23
     */
 	public function getItemList() {
 		$image_url =  User::getNameStore();
 		$url = '/files/' . $image_url['USER_NAME']. '/';
    	$user_id = Session::get('user.id');
    	$items = UserItem::where('user_id',$user_id)
					->orderBy('public_flg', 'asc')
					->orderBy('order', 'asc')
					->orderBy('updated_at', 'desc')
					->get();
		foreach($items as &$value) {
			$item_quantity = UserItemQuatity::where('item_id', $value['id'])->get();
			$value['quantity'] = 0;
			$value['image_url'] = $url . $value['image_url'];
			$item_quantity = !empty($item_quantity) ? $item_quantity->toArray() : array();
			if(!empty($item_quantity)) {
				$value['quantity'] = array_sum(array_column( $item_quantity, 'quantity'));
			}
		}
		return $items;

    }

	/**
	 * update public flag
	 * @author OanhHa
	 * @since 2015/01/15
	 * @param unknown_type $id
	 * @param unknown_type $flg
	 */
	public function update_status($id, $flg) {
		$user_id = $this->getUserId();
		$flg = intval($flg);
		$id_item = intval($id);
		// public
		if($flg == 0) {
			UserItem::where('id', $id_item)
					->update(array('public_flg' => 1, 'order' => -1,  'updated_user' => $user_id));
		} else {
			// private
			UserItem::where('id', $id_item)
					->update(array('public_flg' => 0, 'order' => 0, 'updated_user' => $user_id));
		}

	}
	/**
	 * sorting items
	 * @author OanhHa
	 * @since 2015/01/15
	 * @param unknown_type $id
	 * @param unknown_type $flg
	 */
	public function update_sort($id,$order_value, $up_down) {
		$user_id = $this->getUserId();
		$order_value = intval($order_value);
		$id_item = intval($id);
		if($up_down == 'up') {
			UserItem::where('order', $order_value -1)
			->update(array('order' => $order_value,  'updated_user' => $user_id));
			UserItem::where('id', $id_item)
			->update(array('order' => $order_value-1,  'updated_user' => $user_id));

		} else {
			UserItem::where('order', $order_value + 1)
			->update(array('order' => $order_value,  'updated_user' => $user_id));
			UserItem::where('id', $id_item)
			->update(array('order' => $order_value + 1,  'updated_user' => $user_id));
		}


	}
	/**
	 * Get all item by ajax
	 * @author OanhHa
	 * @since 2015/01/15
	 */
	public function list_item_ajax() {
		$data['items'] = $this->getItemList();
		$view =  View::make('elements.list_item_ajax', $data)->render();
		$response = array(
					'status' => 'success',
					'html' => $view,
					);
		return $response;
	}
	/**
	 * sort item
	 * @author OanhHa
	 * @since 2015/01/15
	 */
	public function sort_item() {
		if(Request::ajax())
	    {

			 $item_id = trim(Input::get('item_id'));
	    	 $order_value = trim(Input::get('order_value'));
	    	 $up_down = Input::get('up_down');
	    	 $items_array = Input::get('items_array');
	    	 $this->update_all_order($items_array);
	    	 $this->update_sort($item_id,$order_value, $up_down);
	    	 $response = $this->list_item_ajax();
			 return Response::json($response);
	    }
	}

	/**
	 * set status by ajax
	 * @author OanhHa
	 * @since 2015/01/15
	 */
	public function set_status() {
		if(Request::ajax())
	    {
			 $item_id = trim(Input::get('item_id'));
	    	 $flg = trim(Input::get('public_flg'));
	    	 $this->update_status($item_id, $flg);
	    	 $response = $this->list_item_ajax();
	    	 return Response::json($response);
	    }
	}
	/**
	 * Update order for all items in user_items table
	 * @author OanhHa
	 * @since 2015/01/16
	 */
	public function update_all_order ($data = array()) {
		$user_id = $this->getUserId();
		$data_save = array();
		foreach($data as $item) {
			$temp['id'] = $item[0];
			$temp['order'] = $item[1];
			$temp['updated_user'] = $user_id;
			UserItem::where('id', $temp['id'])->update(array('order' => $temp['order'], 'updated_user' => $temp['updated_user']));
		}
	}
	/**
	 * delete item
	 * @author OanhHa
	 * @since 2015/01/15
	 */
	public function delete_item() {
		if(Request::ajax())
	    {
			 $item_id = trim(Input::get('item_id'));
			 $success = 0;
			 if(UserItem::where('id', $item_id)->delete()){
				$success = 1;
			 }
	    	 $html = $this->list_item_ajax();
	    	 $response = array('sucess' => $success, 'html' => $html);
			 return Response::json($response);
	    }
	}
}