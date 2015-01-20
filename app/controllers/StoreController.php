<?php

class StoreController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';


    public $components = array('Store');
    public $uses = array();

    /**
     *
     * @author  Le Nhan Hau
     * @since   2015/01/14
     *
     * @return void
     * get information store
     */
    public function edit() {
        //get user login
        $userInfos = User::getNameStore();
        //sys_colors
        $sysLayouts = array();
        $tmpSysLayouts= SysLayout::getSysLayouts();
        if (!empty($tmpSysLayouts)) {
            foreach ($tmpSysLayouts as $key => $value) {
                $sysLayouts[] = array('name' => $value);
            }
        }

        //system text color
        $sysTextColor = SysTextColor::getSysTextColor();

        //system background color
        $tmp_sysBackgroundColor = SysBackgroundColor::getSysBackgroundColor();
        $max1 = 14; $sysBackgroundColor = array();
        $index = 0; $j = 0;

        if (!empty($tmp_sysBackgroundColor)) {
            foreach ($tmp_sysBackgroundColor as $key => $value) {
                if($index == $max1) {
                    $j ++; $index = 0;
                    $sysBackgroundColor[$j] = array();
                }
                $sysBackgroundColor[$j][] = $value;
                $index++;
            }
        }

        //system background image
        $tmp_sysBackgroundImage = SysBackgroundImage::getSysBackgroundImages();
        $max = 5; $sysBackgroundImage = array();
        $index = 0; $j = 0;

        if (!empty($tmp_sysBackgroundImage)) {
            foreach ($tmp_sysBackgroundImage as $key => $value) {
                if($index == $max) {
                    $j ++; $index = 0;
                    $sysBackgroundImage[$j] = array();
                }
                $sysBackgroundImage[$j][] = 'img/samples/bg2/'.$value;
                $index++;
            }
        }

        return View::make('store.edit', array(
            'userInfos' => $userInfos,
            'sysLayouts' => $sysLayouts,
            'sysTextColor' => $sysTextColor,
            'sysBackgroundColor' => $sysBackgroundColor,
            'sysBackgroundImage' => $sysBackgroundImage
        ));
    }

    /**
     * Save store layout
     *
     * @author Le Nhan Hau
     * @since 2015-01-08
     *
     * @return void
     */
    public function save() {
        $this->layout = '';

        if (Request::ajax())
        {
            //request data
            $data = Input::all();

            //get layout id
            $layout = $data['store']['store_style']['layout'];
            $layouts = SysLayout::getSysLayoutsIdByLayout($layout);
            $layoutId = $layouts->id;

            //get background color id
            $background_color_code = $data['store']['store_style']['background_color'];
            $systemBackgroundColors = SysBackgroundColor::getSysBackgroundColorIdByColorCode($background_color_code);
            $systemBackgroundColorId = !empty($systemBackgroundColors) ? $systemBackgroundColors->id : '';

            //get item_text_color
            $item_text_color_code = $data['store']['store_style']['item_text_color'];
            $itemTextColors = SysTextColor::getSysTextColorIdByColorCode($item_text_color_code);
            $itemTextColorId = !empty($itemTextColors) ? $itemTextColors->id : '';

            //get store_text_color
            $store_text_color_code = $data['store']['store_style']['store_text_color'];
            $storeTextColors = SysTextColor::getSysTextColorIdByColorCode($store_text_color_code);
            $storeTextColors = !empty($storeTextColors) ? $storeTextColors->id : '';

            //embed data
            $data['store']['store_style']['layout_id'] = $layoutId;
            $data['store']['store_style']['background_color_id'] = $systemBackgroundColorId;
            $data['store']['store_style']['item_text_color_id'] = $itemTextColorId;
            $data['store']['store_style']['store_text_color_id'] = $storeTextColors;

            //get user login
            $userInfos = User::getNameStore();
            //copy file upload
            $file_name = $data['store']['store_style']['logo_image'];
            $tmpPath = public_path() . '/_temp_files/'. $file_name;
            //$folder_user = public_path() . '/files/hoangnn001';
            $folder_user = public_path() . '/files/'.$userInfos['USER_NAME'];
            if(!is_dir($folder_user)){
                mkdir($folder_user);
            }
            $destinationPath = $folder_user.'/'.$file_name;
            copy($tmpPath, $destinationPath);

            $json = json_encode($data);

            //init data
            $userStore = new UserStore;
            $userStore->user_id = Session::get('user.id');
            $userStore->domain = 'hauln@leverages.jp';
            $userStore->settings = $json;

            //save store
            $userStore->save();
        }
    }

    /**
     * Load items
     *
     * @author Le Nhan Hau
     * @since 2015-01-08
     * parameter status
     * @return json
     */
    public function items($status = '') {
        $this->layout = '';

        //test data
        /*$items = array();
        $item = array(
            'id' => '54ade2be86b1889a7900144f',
            'name' => 'Điện máy',
            'description' => '',
            'status' => 'shown',
            'price' => '20000',
            'sale_flag' => '',
            'digital_contents' => '',
            'variations' => array
            (
                '0' => 'S',
                '1' => 'M',
            ),
            'quantity' => '2',
            'shared' => '',
            'images' => array
            (
                '0' => array
                (
                    'name' => '76eb0d20782bdab37aa8.jpeg'
                )

            ),
            'sticker' => ''

        );
        $items[] = $item;*/

        //get user_item from user_id
        $items = array();
        $userItems = UserItem::getUserItemFromUserId();

        if (!empty($userItems)) {
            foreach ($userItems as $key => $value) {
                $value->images[]['name'] = $value->image_url;
                unset($value->image_url);
                $items[] = $value;
            }
        }

        if (Request::ajax())
        {
            $json = json_encode($items);
            echo $json;
        }
    }

    /**
     * Load user style
     *
     * @author Le Nhan Hau
     * @since 2015-01-08
     * @return json
     */
    public function styles() {
        $this->layout = '';

        //test data
        /*$style = array(
            'name' => 'hoangnn001',
            'store_font' => array
            (
                'style' => "'Allerta', sans-serif",
                'type' => 'google',
                'weight' => '400',
                'size' => '54',
            ),
            'layout' => 'layout_a',
            'background' => array
            (
                'color' => '#fff',
                'repeat' => '',
                'image' => '',
            ),
            'text_color' => array
            (
                'item' => '#000',
                'store' => '#000'
            ),
            'display' => array
            (
                'frame' => 1,
                'item' => 1
            ),
            'shipping_fee' => 0,
            'logo' => ''
        );*/

        //get user_stores from user_id
        $userStores = UserStore::getUserStoreByUserId();
        if (Request::ajax()) {
            $style = array();
            if (!empty($userStores)) {
                $settings = $userStores->settings;
                $tmpSetting = json_decode($settings);
                $store = $tmpSetting->store;
                $style['name'] = $store->name;
                $style['store_font'] = array(
                    'style' => $store->store_style->store_font_style,
                    'type' => $store->store_style->store_font_type,
                    'weight' => $store->store_style->store_font_weight,
                    'size' => $store->store_style->store_font_size
                );
                $style['layout'] = $store->store_style->layout;
                $style['background'] = array(
                    'color' => $store->store_style->background_color,
                    'repeat' => '',
                    'image' => $store->store_style->background_image
                );
                $style['text_color'] = array(
                    'item' => $store->store_style->item_text_color,
                    'store' => $store->store_style->store_text_color
                );
                $style['display'] = array(
                    'frame' => $store->store_style->display_frame,
                    'item' => $store->store_style->display_item
                );
                $style['shipping_fee'] = 0;
                $style['logo'] = $store->store_style->logo_image;

                $json = json_encode($style);
                echo $json;
            }
        }
    }

    /**
     * Load user categories
     *
     * @author Nguyen Hoang
     * @since 2015-01-08
     * @return json
     */
    public function categories() {
        $this->layout = '';

        //$categories = ClassRegistry::init('UserCategory')->getAllByUserId($this->Store->getUserId());
        /*$categories = array(
            array(
                'id' => 1,
                'name' => 'Điện máy'
            ),
            array(
                'id' => 2,
                'name' => 'Thời trang'
            )
        );*/
        //$categories = array();
        //get user_categories from user_id
        $userCategories = UserCategory::getUserCaterogiesFromUserId();

        foreach ($userCategories as $key => $value) {
            $categories[] = $value;
        }
        //exit;
        if (Request::ajax())
        {
            $json = json_encode($categories);
            $response = Response::json($json);
            $response->header('Content-Type', 'application/json');
            return $response;
        }
    }

    /**
     * Load user about
     *
     * @author Nguyen Hoang
     * @since 2015-01-08
     * @return json
     */
    public function about() {
        $this->autoRender = false;
        $this->layout = '';
        $about = '';

        if (Request::ajax())
        {
            $json = json_encode($about);
            $response = Response::json($json);
            $response->header('Content-Type', 'application/json');
            return $response;
        }
    }

     /**
     * Upload temp image
     *
     * @author Le Nhan Hau
     * @since 2015-01-15
     * @return json
     */
    public function upload_image() {
        $this->layout = '';
        if (!empty($_FILES['image'])) {
            $file_name = time();
            $destinationPath = public_path() . '/_temp_files/'. $file_name.'.jpeg';
            move_uploaded_file($_FILES['image']['tmp_name'], $destinationPath);
            $size = getimagesize($destinationPath);
            $logo = array(
                'name' => $file_name.'.jpeg',
                'src' => '/_temp_files/'.$file_name,
                'ext' => '.jpeg',
                'org_w' => $size[0],
                'org_h' => $size[1]
            );
            echo json_encode($logo);
        }
    }
    /**
     * Store setting
     * @author OanhHa
     * @since 2015-01-09
     */
    public function store_setting() {
	if(!$this->checkLogin()) {
		return Redirect::to('/');
	}
    	return View::make('store.store_setting');
    }
    /**
     * Set payment method for stores
     * @author OanhHa
     * @since 2015-01-09
     */
    public function payment_method() {
		if(!$this->checkLogin()) {
			return Redirect::to('/');
		}
    	return View::make('store.payment_method');
    }
    /**
     * Set domain for stores
     * @author OanhHa
     * @since 2015-01-09
     */
    public function setting_domain() {
		if(!$this->checkLogin()) {
    		return Redirect::to('/');
    	}
    	return View::make('store.setting_domain');
    }
    /**
     * About stores
     * @author OanhHa
     * @since 2015-01-09
     */
    public function store_about() {
    	if(!$this->checkLogin()) {
    		return Redirect::to('/');
    	}
    	$user_id = $this->getUserId();
    	$user_store = UserStore::where('user_id', $user_id)->first(array('setting_intros'))->toArray();
    	$data = array();
    	if(!empty($user_store)) {
			var_dump($user_store['setting_intros']);
    		$des = json_decode($user_store['setting_intros']);
    		var_dump($des);
die;
			$data['description'] = isset($des['description']) ? $des['description'] : '';

			$data['facebook'] = isset($des['facebook']) ? $des['facebook'] : '';
			$data['twitter'] = isset($des['twitter']) ? $des['twitter'] : '';
			$data['homepage'] = isset($des['homepage']) ? $des['homepage'] : '';
    	} else {
    		$data = array('description' => '', 'homepage' => '', 'facebook' => '', 'twitter' => '');
    	}

    	return View::make('store.store_about', $data);
    }
    /**
     * About commercial law
     * @author OanhHa
     * @since 2015-01-09
     */
    public function commercial_law() {
    	if(!$this->checkLogin()) {
    		return Redirect::to('/');
    	}
    	$user_id = $this->getUserId();

    	$user_store = UserStore::where('user_id', $user_id)->first(array('setting_trade_law'))->toArray();
    	if(!empty($user_store)) {
    		if(!empty($data['setting_trade_law'])) {
				$data['setting_trade_law'] = json_decode($user_store['setting_trade_law']);
    		} else {
    			$data['setting_trade_law'] = '';
    		}

    	} else {
    		$data['setting_trade_law'] = '';
    	}

    	return View::make('store.commercial_law', $data);
    }

    /**
     * About commercial law
     * @author OanhHa
     * @since 2015-01-09
     */
    public function dashboard($id=null) {
		if(!$this->checkLogin()) {
    		return Redirect::to('/');
    	}
    	$user_id = $this->getUserId();
    	$token_accout = User::where('id', $user_id)->first(array('account_token'))->toArray();
    	$data['account_token'] = $token_accout['account_token'];
    	return View::make('store.dashboard', $data );
    }

	/**
     * Set url for stores
     * @author OanhHa
     * @since 2015-01-09
     */
    public function store_domain(){
    	if(!$this->checkLogin()) {
    		return Redirect::to('/');
    	}
    	$user_id = $this->getUserId();
    	$user_store = UserStore::where('user_id', $user_id)->first(array('domain'));
    	if(!empty($user_store)) {
			$data['domain'] = $user_store['domain'];
    	} else {
    		$data['domain'] = '';
    	}



    	return View::make('store.store_domain', $data);
    }
    /**
     * Save change domain
     * @author OanhHa
     * @since 2015-01-19
     */
    public function save_domain(){
    	$v = UserStore::validate_domain(Input::all());
    	$user_id = $this->getUserId();
    	$user_store = UserStore::where('user_id', $user_id)->first();
		$domain = Input::get('domain');
		if(isset($user_store['domain']) && $domain != '' && ($domain==$user_store['domain'])) {
			UserStore::where('user_id', $user_id)
        				->update(array('domain' => $domain,  'updated_user' => $user_id));
        	$success =  "Bạn đã chỉnh sửa thành công tên miền";
	        return Redirect::to('/store_setting')->with('success', $success);
		} else {
			 if($v->fails()){
	            return Redirect::to('/store_domain')->withErrors($v)->withInput();
	        } else {
	        	if(!empty($user_store)) {
	        		UserStore::where('user_id', $user_id)
	        				->update(array('domain' => $domain,  'updated_user' => $user_id));
	        	} else {
	        		$user = new UserStore;
	        		$user->user_id = $user_id;
	        		$user->domain = $domain;
	        		$user->created_user = $user_id;
	        		$user->save();
	        	}
	        	$success =  "Bạn đã chỉnh sửa thành công tên miền";
	        	 return Redirect::to('/store_setting')->with('success', $success);
	        }
		}

    }
    /**
     * Save change store about
     * @author OanhHa
     * @since 2015-01-19
     */
    public function save_store_about(){
    	$v = UserStore::validate_about(Input::all());
    	$user_id = $this->getUserId();
        if($v->fails()){
            return Redirect::to('/store_about')->withErrors($v)->withInput();
        } else {
        	$store_about = Input::all();
        	$setting_intros = json_encode($store_about);
        	$user_store = UserStore::where('user_id', $user_id)->first()->toArray();
        	if(!empty($user_store)) {
        		UserStore::where('user_id', $user_id)
        				->update(array('setting_intros' => $setting_intros,  'updated_user' => $user_id));
        	} else {
        		$user = new UserStore;
        		$user->user_id = $user_id;
        		$user->setting_intros = $setting_intros;
        		$user->created_user = $user_id;
        		$user->save();
        	}
        	Input::flashOnly('success', "Bạn đã chỉnh sửa thành công");
        	return Redirect::to('/store_setting')->withInput();

        }
    }

}