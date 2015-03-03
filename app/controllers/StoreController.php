<?php

class StoreController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';


    public $components = array('Store');
    public $uses = array();

    /**
     * @author  Le Nhan Hau
     * @since   2015/02/03
     *
     * custom store
     */
    public function ownerStore($parameters) {
        $domain = Request::url();

        //preg_match('/http:.*'.$parameters.'\.(.+?)$/s', $domain, $url);
        preg_match('/(http|https):.*'.$parameters.'\.(.+?)$/s', $domain, $url);
        
        $data = array(
            'public_flg' => 1,
            'domain' => $domain,
            'sub'    => $parameters,
            'url'   => 'http://'.$url[2].'/store_setting',
            'prefecture' => json_encode(MsPrefecture::getJsonData())
        );
        
        return View::make('store.owner_store', $data);
    }

    /**
     * @since   2015/02/03
     *
     * display list item
     */
    public function index() {
        return View::make('store.index');
    }

    public function about_detail() {
        $this->layout = '';

        $aboutDetail = array(
            'detail' => 'haulenhan\u306e\u30cd\u30c3\u30c8\u30b7\u30e7\u30c3\u30d7\u3067\u3059\u3002'
        );

        if (Request::ajax())
        {
            $json = json_encode($aboutDetail);
            echo $json;
        }
    }

    /**
     * @author      Le Nhan Hau
     * @since       2015/02/05
     *
     * get user_stores detail
     */
    public function store_style($parameters) {
        $this->layout = '';

        //get user_id from domain
        $userId = UserStore::getUserStoreByDomain($parameters)->user_id;

        //tmp about
        $tmpUserStores = UserStore::where('user_id', '=', $userId)
            ->first();

        $userStores = array();
        if (!empty($tmpUserStores)) {
            $tmpSettings = $tmpUserStores->settings;
            if (!empty($tmpSettings)) {
                $settings = json_decode($tmpSettings);
                $stores = $settings->store;

                $userStores = array(
                    'name' => $stores->name,
                    'store_font' => array(
                        'style' => $stores->store_style->store_font_style,
                        'type' => $stores->store_style->store_font_type,
                        'weight' => $stores->store_style->store_font_weight,
                        'size' => $stores->store_style->store_font_size
                    ),
                    'layout' => $stores->store_style->layout,
                    'background' => array(
                        'color' => $stores->store_style->background_color,
                        'repeat' => '',
                        'image' => $stores->store_style->background_image
                    ),
                    'text_color' => array(
                        'item' => $stores->store_style->item_text_color,
                        'store' => $stores->store_style->store_text_color
                    ),
                    'display' => array(
                        'frame' => $stores->store_style->display_frame,
                        'item' => $stores->store_style->display_item
                    ),
                    'shipping_fee' => 0,
                    'logo' => $stores->store_style->logo_image
                );
            }
        }

        echo json_encode($userStores);
        //if (Request::ajax())
        //{
            //echo '{"name":"haulenhan","store_font":{"style":"\'Allerta\', sans-serif","type":"google","weight":"400","size":"44"},"layout":"layout_a","background":{"color":"#fff","repeat":null,"image":"/img/samples/bg2/bg2_3.gif"},"text_color":{"item":"#000","store":"#000"},"display":{"frame":false,"item":true},"shipping_fee":0,"logo":null}';
        //}
        exit;
    }

    public function current_user() {
        $this->layout = '';

        //if (Request::ajax())
        //{
            echo '{"name":"haulenhan","my_store":true,"is_following":false,"store_owner":"haulenhan","store_owner_id":"54c5c1a5391bb34148001feb"}';
        //}
        exit;
    }

    /**
     * @author      Le Nhan Hau
     * @since       2015/02/04
     *
     * @param       $parameters
     * get item from domain
     */
    public function items_pager($parameters) {
        $this->layout = '';
        //get user_id from domain
        $userId = UserStore::getUserStoreByDomain($parameters)->user_id;
        //get user_items from user_id
        $tmpUserItems = UserItem::getUserItemByUserId($userId);

        $lastpage = true;
        if(isset($_GET['page']))
            $lastpage = (intval($_GET['page']) >= $tmpUserItems->getLastPage())?true:false;

        $userItems = array(
            'cnt_items' => $tmpUserItems->getTotal(),
            'cnt_pages' => $tmpUserItems->getLastPage(),
            'last_page?' => $lastpage
        );
        if (!empty($tmpUserItems)) {
            foreach ($tmpUserItems as $key => $value) {
                //user_items_quatity
                $objItemQuatity = $value['userItemQuatity'];

                //image_url
                $imageUrl = array();
                if (!empty($value->image_url)) {
                    $tmpImageUrl = explode(',', $value->image_url);
                    foreach ($tmpImageUrl as $k => $v) {
                        $imageUrl[] = array('name' => $v);
                    }
                }

                //user_items
                $userItems['items'][] = array(
                    'id' => $value->id,
                    'name' => $value->name,
                    'description' => $value->introduce,
                    'status' => '',
                    'price' => $value->price,
                    'sale_flag' => '',
                    'digital_contents' => '',
                    'variations' => array(),
                    'quantity' => $objItemQuatity->count(),
                    'shared' => '',
                    'images' => $imageUrl
                );
            }
        }

        echo json_encode($userItems);

        //if (Request::ajax())
        //{
            /*echo '{"cnt_items":4,"cnt_pages":1,"last_page?":true,"items":
            [
            {"id":"54c743a4391bb3c77b000323","name":"hau_item_3","description":null,"status":"shown",
            "price":1000,"sale_flag":false,"digital_contents":null,"variations":[null],"quantity":1,
            "shared":null,"images":[{"name":"e88bba0f6140f640f184.jpeg"}],"sticker":""},
            {"id":"54c7443fef3377ef02000ffb","name":"hau_item_4","description":null,"status":"shown",
            "price":1000,"sale_flag":false,"digital_contents":null,"variations":[null],"quantity":1,
            "shared":null,"images":[{"name":"d441b9f0783875e27aa1.jpeg"},
            {"name":"962beeaa149f1fdd7ce4.gif"},{"name":"29e84b209611697bf840.gif"}],"sticker":""},
            {"id":"54c743603cd482db3900158b","name":"hau_item_2","description":null,"status":"shown",
            "price":1000,"sale_flag":false,"digital_contents":null,"variations":[null],"quantity":1,"shared":null,"images":[{"name":"f65759c93930eb8a5936.gif"}],"sticker":""},
            {"id":"54c6f71def3377ef02000165","name":"hau_item_1","description":null,"status":"shown","price":1000,"sale_flag":false,"digital_contents":null,"variations":[null],"quantity":1,"shared":null,"images":[{"name":"5390192f2e6903b717bc.jpeg"},{"name":"cfd787754654ad854bd8.jpeg"}],"sticker":""}
            ]
            }';*/
        //}
        exit;
    }

    /**
     * @since       2015/02/06
     *
     * show item detail
     */
    public function show() {
        return View::make('store.show');
    }


    /**
     * @since       2015/02/09
     *
     * get user_categories
     */
    public function storeCategories($parameters) {
        $this->layout = '';

        //get user_id from domain
        $userId = UserStore::getUserStoreByDomain($parameters)->user_id;

        //get user_categories
        $tmpUserCategories = UserCategory::getUserCaterogiesByUserId($userId);
        $userCategories = array();
        if (!empty($tmpUserCategories)) {
            foreach ($tmpUserCategories as $key => $value) {
                $userCategories[] = array(
                    'id' => $value->id,
                    'name' => $value->name
                );
            }
        }

        echo json_encode($userCategories);
        //if (Request::ajax())
        //{
            //echo '[{"id":"1","name":"hauaaaaa"}]';
        //}
        exit;
    }

    /**
     * @since       2015/02/05
     *
     * store about detail
     */
    public function storeAbout($parameters) {
        $this->layout = '';

        //get user_id from domain
        $userId = UserStore::getUserStoreByDomain($parameters)->user_id;

        //tmp about
        $tmpAbout = UserStore::where('user_id', '=', $userId)
            ->first();

        $about = array();
        if (!empty($tmpAbout)) {
            $setting_intros = json_decode($tmpAbout->setting_intros);

            $about = array(
                'detail' => isset($setting_intros->description) ? $setting_intros->description : '',
                'links' => array(
                    'twitter' => isset($setting_intros->twitter) ? $setting_intros->twitter : '',
                    'facebook' => isset($setting_intros->facebook) ? $setting_intros->facebook : '',
                    'website' => isset($setting_intros->homepage) ? $setting_intros->homepage : '',
                    'exblog' => null
                )
            );
        }

        echo json_encode($about);
        //if (Request::ajax())
        //{
            //echo '{"detail":"test stores test stores test stores","links":{"twitter":null,"facebook":null,"website":null,"exblog":null}}';
        //}
        exit;
    }

    public function virtual_store() {

        exit;
    }

    public function delivery_methods() {

        exit;
    }
    public function shipping_fee() {

        exit;
    }

    public function aboutDetail() {

        return View::make('store.about', array('data' => 'test'));
    }

    /**
     * @author      Le Nhan Hau
     * @since       2014/02/05
     *
     * @param $id   //item_id
     * get item detail
     */
    public function itemDetail($id) {
        $this->layout = '';

        //user_items
        $tmpUserItems = UserItem::getUserItemByItemId($id);

        $userItems = array();
        $itemQuantity = array();
        if (!empty($tmpUserItems)) {
            //user_item_quantity
            if (isset($tmpUserItems['userItemQuatity'])) {
                $userItemQuantity = $tmpUserItems['userItemQuatity'];

                foreach ($userItemQuantity as $key => $value) {
                    $itemQuantity[] = array(
                        'quantity' => $value->quantity,
                        'variation' => $value->size_name,
                        'infinite_status' => false
                    );
                }
            }

            //image_url
            $imageUrl = array();
            if (!empty($tmpUserItems->image_url)) {
                $tmpImageUrl = explode(',', $tmpUserItems->image_url);
                foreach ($tmpImageUrl as $k => $v) {
                    $imageUrl[] = array('name' => $v);
                }
            }

            $userItems = array(
                    'quantities' => $itemQuantity,
                    'images' => $imageUrl,
                    'digital_contents' => null,
                    'mybook_item' => false,
                    'group_id' => null,
                    'promotion_category' => null,
                    'delivery_method' => null,
                    'mall_large_category_id' => '',
                    'mall_medium_category_id' => '',
                    'mall_option_values' => array(),
                    'id' => $tmpUserItems->id,
                    'name' => $tmpUserItems->name,
                    'title' => '',
                    'quantity' => $itemQuantity,
                    'description' => $tmpUserItems->introduce,
                    'price' => $tmpUserItems->price,
                    'sale_flag' => false,
                    'review_count' => 0,
                    'avg_score' => null
                );
        }

        echo json_encode($userItems);

        /*echo '{"quantities":[{"quantity":1,"variation":null,"infinite_status":false}],
        "images":[{"name":"e88bba0f6140f640f184.jpeg"}],
        "digital_contents":null,"mybook_item":false,"group_id":null,
        "promotion_category":null,"delivery_method":null,
        "mall_large_category_id":"","mall_medium_category_id":"",
        "mall_option_values":{},"id":"54c743a4391bb3c77b000323",
        "name":"hau_item_3","title":"hau_item_3","quantity":[{"quantity":1,"variation":null,"infinite_status":false}],
        "description":null,"price":1000,"sale_flag":false,"review_count":0,"avg_score":null}';*/
        exit;
    }

    /**
     * @since       2015/02/09
     *
     * get profile
     */
    public function profile($id) {
        //get domain
        $url = Request::url();

        //get user_id from domain
        $userId = UserStore::getUserStoreByDomain($id)->user_id;
        //get user_profiles
        $tmpUserProfiles = UserProfile::getUserProfileByUserId($userId);

        $userProfiles = array();
        if (!empty($tmpUserProfiles)) {
            $userProfiles = array(
                'name' => $tmpUserProfiles->name,
                'profile_image' => array(
                    'name' => $tmpUserProfiles->image_url,
                    'src_url' => 'http://'.$_SERVER['HTTP_HOST'].'/files/'.$id.'/'.$tmpUserProfiles->image_url
                )
            );
        }else {
            $userProfiles = array(
                'name' => null,
                'profile_image' => array(
                    'name' => '',
                    'src_url' => 'http://'.$_SERVER['HTTP_HOST'].'/img/user_icon_01.png'
                )
            );
        }

        echo json_encode($userProfiles);
        //echo '{"name":null,"profile_image":{"name":"user_icon_01.png","src_url":"https://stores.jp/images/follow/user_icon/user_icon_01.png"}}';
        exit;
    }

    public function cart_popup($id) {
        return View::make('store.cart_popup', array('data' => 'test'));
    }

    public function favorite_item_button($id) {
        return View::make('store.favorite_item_button', array('data' => 'test'));
    }

    public function checkout($id) {
        return View::make('store.checkout', array('data' => 'test'));
    }

    public function payment_maintenance($id) {
        echo '{"convenience_store_payment":false,"credit":false}';
        exit;
    }

    public function enable_coupon($id) {
        echo false;
        exit;
    }

    public function payment_methods($id) {
        echo '{"credit":0,"convenience_store_payment":0,"bank_transfer":0}';
        exit;
    }

    public function follow_about($id) {
        return View::make('store.follow_about', array('data' => 'test'));
    }

    public function receive_method($id) {
        return View::make('store.receive_method', array('data' => 'test'));
    }

    public function checkout_card($id) {
        return View::make('store.checkout_card', array('data' => 'test'));
    }

    public function checkout_shipping($id) {
        return View::make('store.checkout_shipping', array('data' => 'test'));
    }

    public function checkout_other_shipping($id) {
        return View::make('store.checkout_other_shipping', array('data' => 'test'));
    }

    public function profile_address($id) {
        echo '{"first_name":null,"last_name":null,"email":"haulenhan@gmail.com","tel":null,"zip":null,"prefecture":null,"address":null}';
        exit;
    }

    public function user_cc($id) {

        exit;
    }

    public function orders($id) {
        echo '[]';
        exit;
    }

    public function checkout_confirm($id) {
        return View::make('store.checkout_confirm', array('data' => 'test'));
    }

    public function tokushoho($id) {
        return View::make('store.tokushoho', array('data' => 'test'));
    }
    
    public function inquiry($id) {
        return View::make('store.inquiry', array('data' => 'test'));
    }


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
				$input['domain'] = $domain;
				$v = UserStore::validate_unique_domain($input);
				if($v->fails()) {
					return Redirect::to('/store_domain')->withErrors($v)->withInput();
				}
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