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
        //get fonts default
        $fontDefaults = Config::get('constants.fonts');

        //get font family default
        $fontFamily = Config::get('constants.sys_css');

        //get item sample
        $tmpItemSample = UserItem::getItemSample();
        $itemSample = array();
        foreach ($tmpItemSample as $item => $sample) {
            $itemSample[] = array(
                'name' => $sample->name,
                'price' => $sample->price,
                'path' => 'img/samples/products/'.$sample->image_url
            );
        }

        //get image url sample
        $imgurlSampleBackground = UserStore::getImageUrlEditStore();

        //get user login
        $userInfos = User::getNameStore();

        //sys_colors
        $sysLayouts = array();
        $tmpSysLayouts= SysLayout::getSysLayouts();
        if (!empty($tmpSysLayouts)) {
            foreach ($tmpSysLayouts as $key => $value) {
                $sysLayouts[] = array(
                    'name' => $value->layout_css,
                    'first' => $value->first,
                    'other' => $value->other
                );
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
                $sysBackgroundImage[$j][] = $imgurlSampleBackground.$value;
                $index++;
            }
        }

        return View::make('store.edit', array(
            'fontFamily' => $fontFamily,
            'fontDefaults' => $fontDefaults,
            'itemSample' => $itemSample,
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
            $storeTextColorId = !empty($storeTextColors) ? $storeTextColors->id : '';

            //embed data
            $data['store']['store_style']['layout_id'] = $layoutId;
            $data['store']['store_style']['background_color_id'] = $systemBackgroundColorId;
            $data['store']['store_style']['item_text_color_id'] = $itemTextColorId;
            $data['store']['store_style']['store_text_color_id'] = $storeTextColorId;

            //get user login
            $userInfos = User::getNameStore();
            //copy file upload
            if (!empty($data['store']['store_style']['logo_image']) || !empty($data['store']['store_style']['background_image'])) {
                if (!empty($data['store']['store_style']['logo_image'])) {
                    $file_name = $data['store']['store_style']['logo_image'];
                    $this->moveCopyImage($file_name);
                }
                if (!empty($data['store']['store_style']['background_image'])) {
                    $file_name = $data['store']['store_style']['background_image'];
                    $this->moveCopyImageBackground($file_name);
                }
            }

            //json_encode data
            $json = json_encode($data);

            //init data
            $userStore = new UserStore;
            $userStore->user_id = Session::get('user.id');
            $userStore->domain = $userInfos['USER_NAME'];
            $userStore->settings = $json;

            //check exist user_stores
            $userStoresExist = UserStore::where('user_id' , '=', Session::get('user.id'))
                ->select('id')
                ->first();

            //save or edit user_stores
            if (empty($userStoresExist)) {
                $userStore->save();
            }else {
                $userStore->where('id', '=', $userStoresExist->id)->update(array('settings' => $json));
            }
        }
    }


    /**
     * copy background_image
     *
     * @author Le Nhan Hau
     * @since 2015-01-08
     *
     * @return void
     */
    public function moveCopyImageBackground($file_name) {
        //get image url sample
        $imgurlSampleBackground = UserStore::getImageUrlEditStore();
        $match = strpos($file_name, $imgurlSampleBackground);
        if ($match === false) {
            $this->moveCopyImage($file_name);
        }
    }

    /**
     * copy background_image and logo_image
     *
     * @author Le Nhan Hau
     * @since 2015-01-08
     *
     * @return void
     */
    public function moveCopyImage($file_name) {
        //get user login
        $userInfos = User::getNameStore();

        $tmpPath = public_path() . '/_temp_files/'. $file_name;
        $folder_user = public_path() . '/files/'.$userInfos['USER_NAME'];
        if(!is_dir($folder_user)){
            mkdir($folder_user);
            chmod($folder_user, 0777);
        }
        $destinationPath = $folder_user.'/'.$file_name;
        return copy($tmpPath, $destinationPath);
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

        //get user login
        $userInfos = User::getNameStore();
        
        //styles sample
        $tmpStyle = Config::get('constants.edit_store_style_sample');
        $tmpStyle['name'] = $userInfos['USER_NAME'];
        
        //get user_stores from user_id
        $userStores = UserStore::getUserStoreByUserId();
        if (Request::ajax()) {
            $style = array();
            if (!empty($userStores)) {
                $settings = $userStores->settings;
                if (!empty($settings)) {
                    $tmpSetting = json_decode($settings);
                    $store = $tmpSetting->store;
                    $style['name'] = !empty($store->name) ? $store->name : $userInfos['USER_NAME'] ;
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
                }else {
                    $style = $tmpStyle;
                }
            }else {
                $style = $tmpStyle;
            }

            $json = json_encode($style);
            echo $json;
        }
    }

    /**
     * Load user categories
     *
     * @author      Le Nhan Hau
     * @since       2015-01-20
     * @return json
     */
    public function categories() {
        $this->layout = '';

        //test data
        /*$categories = array();
        $categories = array(
            array(
                'id' => 1,
                'name' => 'Điện máy'
            ),
            array(
                'id' => 2,
                'name' => 'Thời trang'
            )
        );*/

        //get user_categories from user_id
        $userCategories = UserCategory::getUserCaterogiesFromUserId();

        $categories = array();
        if (!empty($userCategories)) {
            foreach ($userCategories as $key => $value) {
                $categories[] = array(
                    'id' => $value->id,
                    'name' => $value->name
                );
            }
        }

        if (Request::ajax())
        {
            $json = json_encode($categories);
            echo $json;
        }
    }

    /**
     * Load user about
     *
     * @author Le Nhan Hau
     * @since 2015-01-08
     * @return json
     */
    public function about() {
        $this->layout = '';
        $about = array();

        //get setting_intros of user_stores
        $tmpUserStore = UserStore::getUserStoreByUserId();
        
        if (!empty($tmpUserStore)) {
            $about = $tmpUserStore->setting_intros;
        }
        
        if (Request::ajax())
        {
            echo $about;
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
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_name = time();

            $destinationPath = public_path() . '/_temp_files/'. $file_name.'.'.$ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $destinationPath);
            $size = getimagesize($destinationPath);
            $logo = array(
                'name' => $file_name.'.'.$ext,
                'src' => '/_temp_files/'.$file_name,
                'ext' => '.'.$ext,
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
		$user_id = $this->getUserId();
		$user_store = UserStore::where('user_id', $user_id)->first();
		$user_store = !empty($user_store) ? $user_store->toArray() : array();
		$setting_postage = !empty($user_store['setting_postage']) ? json_decode($user_store['setting_postage']) : '';
		$data['setting_postage'] = $setting_postage;
		$data['user_store'] = !empty($user_store) ? $user_store : '';
		$data['title_for_layout'] = "Cài đặt cửa hàng";
		return View::make('store.store_setting', $data);
	}

	/**
	 * Setting shipping
	 * @author OanhHa
	 * @since 2015-01-21
	 */
	public function ship_setting() {
		if(Request::ajax())
	    {

			 $circle = trim(Input::get('circle'));
	    	 $check_free_ship = trim(Input::get('check_free_ship'));
	    	 $free_ship = Input::get('free_ship');
	    	 $free_ship = ($check_free_ship == 0) ? '' : $free_ship;
	    	 $setting_postage = json_encode(array('circle' => $circle, 'check_free_ship' => $check_free_ship, 'free_ship' => $free_ship));
	    	 $user_id = $this->getUserId();
	    	 $user_store = UserStore::where('user_id', $user_id)->first();
			 if(!empty($user_store)) {
			 	$user_store = $user_store->toArray();
				UserStore::where('id', $user_store['id'])
						->update(array('setting_postage' => $setting_postage,  'updated_user' => $user_id));
			} else {
				$user = new UserStore;
				$user->user_id = $user_id;
				$user->setting_postage = $setting_postage;
				$user->created_user = $user_id;
				$user->save();
			}
			$success =  "1";
			return Response::json($success);
	    }

	}
	/**
	 * set public flag for store
	 * @author OanhHa
	 * @since 2015-01-21
	 */
	public function set_public_flag() {
		if(Request::ajax())
	    {

			 $store_id = trim(Input::get('store_id'));
	    	 $public_flg = trim(Input::get('public_flg'));
	    	 $user_id = $this->getUserId();
			 if(!empty($store_id)) {
				UserStore::where('id', $store_id)
						->update(array('public_flg' => $public_flg,  'updated_user' => $user_id));
			} else {
				$user = new UserStore;
				$user->user_id = $user_id;
				$user->public_flg = $public_flg;
				$user->created_user = $user_id;
				$user->save();
			}
			$success =  "1";
			return Response::json($success);
	    }
	}
	/**
	 * set store follow
	 * @author OanhHa
	 * @since 2015-01-21
	 */
	public function set_store_follow() {
		if(Request::ajax())
	    {

			 $store_id = trim(Input::get('store_id'));
	    	 $store_follow = trim(Input::get('store_follow'));
	    	 $user_id = $this->getUserId();
			 if(!empty($store_id)) {
				UserStore::where('id', $store_id)
						->update(array('follow' => $store_follow,  'updated_user' => $user_id));
			} else {
				$user = new UserStore;
				$user->user_id = $user_id;
				$user->follow = $store_follow;
				$user->created_user = $user_id;
				$user->save();
			}
			$success =  "1";
			return Response::json($success);
	    }
	}
	/**
	 * set promotion
	 * @author OanhHa
	 * @since 2015-01-21
	 */
	public function set_promotion() {
		if(Request::ajax())
	    {
			 $store_id = trim(Input::get('store_id'));
	    	 $promotion = trim(Input::get('promotion'));
	    	 $user_id = $this->getUserId();
			 if(!empty($store_id)) {
				UserStore::where('id', $store_id)
						->update(array('promotion' => $promotion,  'updated_user' => $user_id));
			} else {
				$user = new UserStore;
				$user->user_id = $user_id;
				$user->promotion = $promotion;
				$user->created_user = $user_id;
				$user->save();
			}
			$success =  "1";
			return Response::json($success);
	    }
	}
	/**
	 * delete store about
	 * @author OanhHa
	 * @since 2015-01-21
	 */
	public function delete_store_about() {
		if(Request::ajax())
	    {

			 $store_id = trim(Input::get('store_id'));
			 $user_id = $this->getUserId();
			 if(!empty($store_id)) {
				UserStore::where('id', $store_id)
						->update(array('setting_intros' => '',  'updated_user' => $user_id));
			}
			$success =  "1";
			return Response::json($success);
	    }
	}
	/**
	 * delete trade law
	 * @author OanhHa
	 * @since 2015-01-21
	 */
	public function delete_trade_law() {
		if(Request::ajax())
	    {
			 $store_id = trim(Input::get('store_id'));
			 $user_id = $this->getUserId();
			 if(!empty($store_id)) {
				UserStore::where('id', $store_id)
						->update(array('setting_trade_law' => '',  'updated_user' => $user_id));
			}
			$success =  "1";
			return Response::json($success);
	    }
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
		$data['title_for_layout'] = "Cài đặt phương thức thanh toán";
		return View::make('store.payment_method', $data);
	}
	/**
	 * Set domain
	 * @author OanhHa
	 * @since 2015-01-09
	 */
	public function setting_domain() {
		if(!$this->checkLogin()) {
			return Redirect::to('/');
		}
		$data['title_for_layout'] = "Cài đặt tên miền của riêng bạn";
		return View::make('store.setting_domain', $data);
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
		$user_store = UserStore::where('user_id', $user_id)->first(array('setting_intros'));
		$user_store = !empty($user_store) ? $user_store->toArray() : array();
		$data = array();
		if(!empty($user_store)) {
			$des = json_decode($user_store['setting_intros']);
			$data['description'] = isset($des->description) ? $des->description : '';

			$data['facebook'] = isset($des->facebook) ? $des->facebook : '';
			$data['twitter'] = isset($des->twitter) ? $des->twitter : '';
			$data['homepage'] = isset($des->homepage) ? $des->homepage : '';
		} else {
			$data = array('description' => '', 'homepage' => '', 'facebook' => '', 'twitter' => '');
		}
		$data['title_for_layout'] = "Mô tả cửa hàng";
		return View::make('store.store_about', $data);
	}
	/**
	 * About commercial law
	 * @author OanhHa
	 * @since 2015-01-09
	 */
	public function trade_law() {
		if(!$this->checkLogin()) {
			return Redirect::to('/');
		}
		$user_id = $this->getUserId();

		$user_store = UserStore::where('user_id', $user_id)->first(array('setting_trade_law'));
		$user_store = !empty($user_store) ? $user_store->toArray() : array();
		if(!empty($user_store)) {
			$setting_trade_law = json_decode($user_store['setting_trade_law']);
			$data['price'] = isset($setting_trade_law->price) ? $setting_trade_law->price : Config::get('constants.trade_law.price');

			$data['charge'] = isset($setting_trade_law->charge) ? $setting_trade_law->charge : Config::get('constants.trade_law.charge');
			$data['time_ship'] = isset($setting_trade_law->time_ship) ? $setting_trade_law->time_ship : Config::get('constants.trade_law.time_ship');
			$data['contract'] = isset($setting_trade_law->contract) ? $setting_trade_law->contract : Config::get('constants.trade_law.contract');
			$data['contact'] = isset($setting_trade_law->contact) ? $setting_trade_law->contact : Config::get('constants.trade_law.contact');

		} else {
			$data = array('price' => Config::get('constants.trade_law.price'), 'charge' => Config::get('constants.trade_law.charge'), 'contract' => Config::get('constants.trade_law.contract'), 'contact' => Config::get('constants.trade_law.contact'), 'time_ship' => Config::get('constants.trade_law.time_ship'));
		}
		$data['title_for_layout'] = "Chỉnh sửa luật thương mại";
		return View::make('store.commercial_law', $data);
	}

	/**
	 * Save comercial law
	 * @author OanhHa
	 * @since 2015/01/20
	 */

	public function save_trade_law(){
		$user_id = $this->getUserId();
		$store_about = Input::all();
		$setting_trade_law = json_encode($store_about);
		$user_store = UserStore::where('user_id', $user_id)->first();
		if(!empty($user_store)) {
			UserStore::where('user_id', $user_id)
					->update(array('setting_trade_law' => $setting_trade_law,  'updated_user' => $user_id));
		} else {
			$user = new UserStore;
			$user->user_id = $user_id;
			$user->setting_trade_law = $setting_trade_law;
			$user->created_user = $user_id;
			$user->save();
		}
		$success =  "Bạn đã chỉnh sửa luật thương mại thành công ";
		return Redirect::to('/store_setting')->with('success', $success);
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
		$user_id    = $this->getUserId();
		$accout     = User::where('id', $user_id)->first(array('account_active'))->toArray();
		$data['account_active']     = $accout['account_active'];
		$data['title_for_layout']   = "Bảng điều khiển cửa hàng";
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
		$user_store = !empty($user_store) ? $user_store->toArray() : array();
		$data['domain'] = (!empty($user_store)) ?  $user_store['domain'] :  '';
		$data['title_for_layout'] = "Cài đặt tên miền cho cửa hàng";
		return View::make('store.store_domain', $data);
	}
	/**
	 * Save change domain
	 * @author OanhHa
	 * @since 2015-01-19
	 */
	public function save_domain(){
		$input = Input::all();
		$input['domain'] = 'http://'. Input::get('domain'). '.'. Config::get('constants.domain');
		$v = UserStore::validate_domain($input);
		$user_id = $this->getUserId();
		$user_store = UserStore::where('user_id', $user_id)->first();
		$user_store = !empty($user_store) ? $user_store->toArray() : array();
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
			$user_store = UserStore::where('user_id', $user_id)->first();
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
			$success =  "Bạn đã chỉnh sửa mô tả cửa hàng thành công ";
			return Redirect::to('/store_setting')->with('success', $success);
		}
	}

}