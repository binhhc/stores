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
        $data['app_id'] = Config::get('constants.facebook_app_id');
        $user_id = Session::get('user.id');
        $data['title_for_layout'] = "Quản lý sản phẩm của cửa hàng";
        $data['count_public_items'] = UserItem::where('user_id',$user_id)->where('public_flg', '1')->count();

        return View::make('userItem.item_management', $data);
    }

     /**
     * get item list
     * @author OanhHa
     * @since 2015/01/23
     */
 	public function getItemList() {

 		$url = '/files/' . $this->getUserId(). '/';
    	$user_id = Session::get('user.id');
    	$items = UserItem::where('user_id',$user_id)
					->orderBy('public_flg', 'desc')
					->orderBy('order', 'asc')
					->orderBy('updated_at', 'desc')
					->get();

		if(!empty($items)) {
			//$items = $items->toArray();
			foreach($items as &$value) {
				$item_quantity = UserItemQuantity::where('item_id', $value['id'])->get();
				$value['quantity'] = 0;
				$names_image = explode(',', $value['image_url']);
				$value['image_url'] = $url .$names_image[0] ;
				$value['price'] = UserItem::formatPrice($value['price']);
				$item_quantity = !empty($item_quantity) ? $item_quantity->toArray() : array();

				if(!empty($item_quantity)) {
	                foreach($item_quantity as $item){
	                    $value['quantity'] += (empty($item['quantity'])) ? 0 : $item['quantity'];
	                }
				}
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
					->update(array('public_flg' => 1, 'order' => 1,  'updated_user' => $user_id));
            // increase order of others items 1
            UserItem:: where('user_id', '=', $user_id)
            	->where('id', '!=', $id_item)
               ->where('public_flg','=',1)
               ->increment('order');
		} else {
			// private
			$item = UserItem::where('id', $id_item)->first()->toArray();
			$old_order = $item['order'];
			UserItem::where('id', $id_item)
					->update(array('public_flg' => 0, 'order' => 0, 'updated_user' => $user_id));
			UserItem:: where('user_id', '=', $user_id)
               ->where('public_flg','=',1)
               ->where('id', '!=', $id_item)
               ->where('order','>',$old_order)
               ->decrement('order');
		}
    }
    /**
     * Get all item by ajax
     * @author OanhHa
     * @since 2015/01/15
     */
    public function list_item_ajax() {
    	if(!$this->checkLogin()) {
            return Redirect::to('/');
        }
        $data['items'] = $this->getItemList();
        $user_id = Session::get('user.id');
        $data['count_public_items'] = UserItem::where('user_id',$user_id)->where('public_flg', '1')->count();
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
             $this->update_sort($item_id,$order_value, $up_down);
             $response = $this->list_item_ajax();
             return Response::json($response);
        }
    }
 	/**
     * sort item by sortable jquery
     * @author OanhHa
     * @since 2015/01/15
     */
    public function sortable_item() {
        if(Request::ajax())
        {
             $items_array = Input::get('items_array');
             $this->update_all_order($items_array);
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
             $item = UserItem::where('id', $item_id)->first()->toArray();
             // update order for items
             if($item['public_flg'] == 1) {
             	UserItem:: where('user_id', '=', $item['user_id'])
	               ->where('public_flg','=',1)
	               ->where('order','>',$item['order'])
	               ->decrement('order');
             }
             $images_name = explode(',',$item['image_url']);
             // delete image of item
             foreach ($images_name as $key) {
				@unlink( public_path() . '/files/'.$this->getUserId() . '/' . $key);
             }
             if(UserItem::where('id', $item_id)->delete()){
             	UserItemQuantity::where('item_id', $item_id)->delete();
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
        $category = UserCategory::where('user_id', $user['id'])->orderBy('order', 'asc')->get();
        return View::make('userItem.add_item')->with(array('title_for_layout' => 'Thêm mới mặt hàng', 'category' => $category));
    }

    /**
     * progress add item
     * @author Binh Hoang
     * @since 2015/01/26
     */
    public function add_item(){
        $input = Input::all();
        $image = $input['image_name'];
        $input['image_name'] = implode(',', $image);

        $v = UserItem::validate($input);
        if($v->passes()){
            //get user information from session
            $user = Session::get('user');

            $item = new UserItem;
            $item->user_id = $user['id'];
            if(!empty($input['category_id'])){
                $item->category_id = implode(',', $input['category_id']);
            }
            $item->name = $input['name'];
            $item->price = $input['price'];
            $item->image_url = $input['image_name'];

            $item->introduce = $input['description'];
            $item->save();
            //get id latest insert
            $lastInsertIdItem = $item->id;

            if(!empty($input['quality_single'])){
                $quality = new UserItemQuantity;
                $quality->item_id = $lastInsertIdItem;
                $quality->quantity = (isset($input['quality_single']) && (intval($input['quality_single']) != 0)) ? $input['quality_single'] : Config::get('constants.unlimitted_quantity');
                $quality->save();
            }else{
                for($i = 0; $i < count($input['size']); $i++){
                    $quality = new UserItemQuantity;
                    $quality->item_id = $lastInsertIdItem;
                    $quality->size_name = isset($input['size'][$i])?strtoupper($input['size'][$i]):null;
                    $quality->quantity = (isset($input['quality'][$i]) && (intval($input['quality'][$i]) != 0)) ? $input['quality'][$i] : Config::get('constants.unlimitted_quantity');
                    $quality->save();
                }
            }
        }
        return Redirect::to('/item_management')->with('success', 'Bạn đã tạo sản phẩm thành công!');
    }

    /**
     * show edit item
     * @author Binh Hoang
     * @since 2015/01/26
     */
    public function get_item($id = null){
        if(empty($id))
            return Redirect::to('/item_management');

        //check change id in address
        try{
            $id = Crypt::decrypt($id);
        }catch(Exception $e){
            return Redirect::to('/item_management');
        }

        $user = Session::get('user');
        $item = UserItem::where('id', '=', $id)->first();
        $item_quantity = UserItemQuantity::where('item_id', '=', $id)->get();

        $category = UserCategory::where('user_id', '=', $user['id'])->orderBy('order', 'asc')->get();
        return View::make('userItem.edit_item')
            ->with(array('title_for_layout' => 'Chỉnh sửa mặt hàng', 'category' => $category, 'item' => $item, 'url_image' =>  '/files/'.$this->getUserId(). '/' ,'item_quantity' => $item_quantity));
    }

    /**
     * progress edit item
     * @author Binh Hoang
     * @since 2015/01/26
     */
    public function edit_item(){
        $input = Input::all();
        $image = $input['image_name'];
        $input['image_url']  =  implode(',', $image);


        $v = UserItem::validate($input);
        if($v->passes()){
            //get user information from session
            $user_id = $this->getUserId();
            $item_id = Crypt::decrypt($input['id']);

            $category = '';
            if(!empty($input['category_id'])){
                $category = implode(',', $input['category_id']);
            }

            UserItem::where('id', $item_id)
                ->update(
                    array(
                        'user_id' => $user_id,
                        'category_id' => $category,
                        'name' => $input['name'],
                        'price' => $input['price'],
                        'introduce' => $input['description'],
                        'image_url' =>  $input['image_url'] ,
                    )
                );

            $old_quantity = UserItemQuantity::where('item_id', '=', $item_id)->delete();

            if(!empty($input['quality_single'])){
                $quality = new UserItemQuantity;
                $quality->item_id = $item_id;
                $quality->quantity = (isset($input['quality_single']) && (intval($input['quality_single']) != 0)) ? $input['quality_single'] : Config::get('constants.unlimitted_quantity');;
                $quality->save();
            }else{
                for($i = 0; $i < count($input['size']); $i++){
                    $quality = new UserItemQuantity;
                    $quality->item_id = $item_id;
                    $quality->size_name = isset($input['size'][$i])?strtoupper($input['size'][$i]):null;
                    $quality->quantity = (isset($input['quality'][$i]) && (intval($input['quality'][$i]) != 0)) ? $input['quality'][$i] : Config::get('constants.unlimitted_quantity');;
                    //$quality->quantity = isset($input['quality'][$i])?$input['quality'][$i]:null;
                    $quality->save();
                }
            }
        }
        return Redirect::to('/item_management')->with('success', 'Bạn đã chỉnh sửa thành công sản phẩm!');
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
	/**
     * sort category
     * @author OanhHa
     * @since 2015/03/02
     */
    public function sort_category() {
        if(Request::ajax())
        {
             $items_array = Input::get('items_array');
             if(!empty($items_array)) {
             	$this->update_category($items_array);
             }
             return Response::json('1');
        }
    }
    /**
     * Update order for category
     * @author OanhHa
     * @since 2015/03/02
     */
    public function update_category($items_array) {
    	$user_id = $this->getUserId();
    	$i = 0;
        foreach($items_array as $item) {
        	$i ++ ;
            UserCategory::where('id' ,  $item)
                    ->update(array('order' => $i,  'updated_user' => $user_id));

        }
    }
    /**
     * Upload image for item
     * @author OanhHa
     * @since 2015/03/03
     */
    public function upload_image_item() {
    	if(Request::ajax())
        {
        	 $input = Input::all();
        	 $image = isset($input[0]) ? $input[0] : $input['file'];
                $folder_user = public_path() . '/files/'.$this->getUserId();
                if(!is_dir($folder_user)){
                    mkdir($folder_user);
                    chmod($folder_user, 0777);
                }

                $filename = $image->getClientOriginalName();
                $upload = $image->move($folder_user, $filename);
                $newname = time(). $filename;
                rename($folder_user.'/'. $filename, $folder_user. '/' . $newname );
                $response = array(
                	'name' => $newname,
                	'source' => '/files/'.$this->getUserId(). '/' . $newname
                );
                return Response::json($response);
        }
    }
    /**
     * Remove item image
     * @author OanhHa
     * @since 2015/03/03
     */
    public function remove_image() {
	    if(Request::ajax())
	        {
	        	 $input = Input::all();
	        	 $image = $input['image_name'];
	             $filename = public_path() . '/files/'.$this->getUserId() . '/' . $image;
	             @unlink($filename);
	             echo 1;
	        }
    }
}