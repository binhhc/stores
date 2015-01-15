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
		$items = UserItem::orderBy('public_flg', 'asc')
					->orderBy('order', 'desc')
					->get();
		$data['items'] = $items;

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
		$flg = intval($flg);
		$id_item = intval($id);
		// public
		if($flg == 0) {
			UserItem::where('id', $id_item)
					->update(array('public_flg' => 1, 'order' => 0,  'updated_user' => 1));

			//$item = UserItem::get($id);
		} else {
			// private
			UserItem::where('id', $id_item)
					->update(array('public_flg' => 0, 'order' => -1, 'updated_user' => 1));
			//$item = UserItem::get($id);
		}
	echo $id; die;

	}
	/**
	 * sorting items
	 * @author OanhHa
	 * @since 2015/01/15
	 * @param unknown_type $id
	 * @param unknown_type $flg
	 */
	public function update_sort($id, $up_down) {
		$up_down = intval($up_down);
		$id_item = intval($id);
		UserItem::where('id', $id_item)
			->update(array('order' => $up_down,  'updated_user' => 1));

	}
	/**
	 * Get all item by ajax
	 * @author OanhHa
	 * @since 2015/01/15
	 */
	public function list_item_ajax() {
		$items = UserItem::orderBy('order', 'desc')
				->orderBy('updated_at', 'desc')
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

			 $input = Input::all();
			 $item_id = trim(Input::get('item_id'));
	    	 $up_down = trim(Input::get('order_value'));
	    	 $this->update_sort($item_id, $up_down);
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
			 $input = Input::all();
			 $item_id = trim(Input::get('item_id'));
	    	 $flg = trim(Input::get('public_flg'));
	    	 $this->update_status($item_id, $flg);
	    	 $response = $this->list_item_ajax();
	    	 return Response::json($response);
	    }

	}




}