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
		$this->checkLogin();
		$user_id = $this->getUserId();
		$items = UserItem::where('user_id', '=', ''.$user_id)
					->orderBy('public_flg', 'asc')
					->orderBy('order', 'asc')
					->get();
		$data['items'] = $items;
		$queries = DB::getQueryLog();
		var_dump($queries);
		return View::make('userItem.item_management', $data);
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

			//$item = UserItem::get($id);
		} else {
			// private
			UserItem::where('id', $id_item)
					->update(array('public_flg' => 0, 'order' => 0, 'updated_user' => $user_id));
			//$item = UserItem::get($id);
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
			UserItem::where('id', $id_item)
			->update(array('order' => $order_value-2,  'updated_user' => $user_id));
		} else {
			UserItem::where('id', $id_item)
			->update(array('order' => $order_value + 2,  'updated_user' => $user_id));
		}


	}
	/**
	 * Get all item by ajax
	 * @author OanhHa
	 * @since 2015/01/15
	 */
	public function list_item_ajax() {
		$user_id = $this->getUserId();
		$items = UserItem::where('user_id',$user_id)
					->orderBy('public_flg', 'asc')
					->orderBy('order', 'asc')
					->get();
		$data['items'] = $items;

		//return View::make('elements.list_item_ajax', $data);
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
	/*public function update_all_order ($data = array()) {
		$user_id = $this->getUserId();
		foreach($data as $item) {
			$id = $item[0];
			$order = $item[1];
			UserItem::where('id' ,  $id)
					->update(array('order' => $order,  'updated_user' => $user_id));
		}
	}*/




}