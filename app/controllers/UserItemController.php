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
        foreach($data as $item) {
            $id = $item[0];
            $order = $item[1];
            UserItem::where('id' ,  $id)
                    ->update(array('order' => $order,  'updated_user' => $user_id));
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

    /**
     * show add item
     * @author Binh Hoang
     * @since 2015/01/26
     */
    public function show_add_item(){
        $user = Session::get('user');
        $category = UserCategory::where('user_id', $user['id'])->get();
        return View::make('userItem.add_item')->with(array('title_for_layout' => 'Thêm mới mặt hàng', 'category' => $category));
    }

    /**
     * progress add item
     * @author Binh Hoang
     * @since 2015/01/26
     */
    public function add_item(){
        $input = Input::all();

        $v = UserItem::validate($input);
        if($v->fails())
            return Redirect::to('/item_management');

        //get user information from session
        $user = Session::get('user');

        $item = new UserItem;
        $item->user_id = $user['id'];
        if(!empty($input['category_id'])){
            $item->category_id = implode($input['category_id'], ',');
        }
        $item->name = $input['name'];
        $item->price = $input['price'];
        $image = Input::file('image_url');
        if(Input::file('image_url')){ // not change image_url
            $folder_name = User::getNameStore();
            $folder_user = public_path() . '/files/'.$folder_name['USER_NAME'];
            if(!is_dir($folder_user)){
                mkdir($folder_user);
                chmod($folder_user, 0777);
            }

            $filename = $image->getClientOriginalName();
            $upload = Input::file('image_url')->move($folder_user, $filename);

            $item->image_url = $filename;
        }

        $item->introduce = $input['description'];
        $item->save();
        //get id latest insert
        $lastInsertIdItem = $item->id;

        if(!empty($input['size'])){
            for($i = 0; $i < count($input['quality']); $i++){
                $quality = new UserItemQuatity;
                $quality->item_id = $lastInsertIdItem;
                $quality->size_name = $input['size'][$i];
                $quality->quantity = $input['quality'][$i];
                $quality->save();
            }
        }else{
            $quality = new UserItemQuatity;
            $quality->item_id = $lastInsertIdItem;
            $quality->quantity = isset($input['quality_single'])?$input['quality_single']:null;
            $quality->save();
        }

        return Redirect::to('/item_management');
    }

    /**
     * Add item by ajax
     *
     * @author Binh Hoang
     * @since 2015/01/29
     */
    public function create_category(){
        if(Request::ajax()){
            $result = array();
            $input = Input::all();

            $user = Session::get('user');

            $v = UserCategory::validate($input);

            $category_info = UserCategory::where('id', $input['id'])->first();
            $id = '';
            $name = '';
            $action = '';
            if($v->passes()){
                if(empty($category_info)){
                    $category = new UserCategory();
                    $category->user_id = $user['id'];
                    $category->name = trim($input['name']);

                    $category->save();
                    $id = $category->id;
                    $action = 'add';
                }else{
                    UserCategory::where('id', $input['id'])
                        ->update(array('name' => $input['name']));

                    $id = $input['id'];
                    $action = 'edit';
                }
                $result = array(
                    'id' => $id,
                    'name' => $input['name'],
                    'action' => $action,
                    'success' => 1
                );
                return Response::json($result);
            }
        }
    }

    /**
     * Delete category by ajax
     *
     * @author Binh Hoang
     * @since 2015/01/30
     */
    public function delete_category(){
        $id = Input::get('id');
        $name = Input::get('name');

        $user = Session::get('user');

        $category = UserCategory::where('id', $id)
                        ->where('name', $name)
                        ->where('user_id', $user['id'])->first();
        $success = 0;
        if(!empty($category)){
            $cate = UserCategory::find($id);
            $cate->delete();
            $success = 1;
        }

        return Response::json($success);
    }
}