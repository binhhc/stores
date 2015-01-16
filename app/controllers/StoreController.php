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
     */
    public function edit() {
        return View::make('store.edit');
    }

    /**
     * Save store layout
     *
     * @author Nguyen Hoang
     * @since 2015-01-08
     *
     * @return void
     */
    public function save() {
        $this->autoRender = false;
        if($this->request->is('ajax')){
            $data = $this->request->input('json_decode', true);

            echo 'Vào file edit_store.js dòng 8307 để đóng alert này ';
             pr($data);
        }

    }

    /**
     * Load items
     *
     * @author Nguyen Hoang
     * @since 2015-01-08
     * parameter status
     * @return json
     */
    public function items($status = '') {
        $this->autoRender = false;
        $this->response->type('json');

        //Lay data từ DB => Fields nào cần thêm PM Sang thêm vào DB cho
        //$items = ClassRegistry::init('UserItem')->getItemByUserIdWithQuantity($this->Store->getUserId());

        $items = array();
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
        $items[] = $item;

        if($this->request->is('ajax')){
            $json = json_encode($items);
            $this->response->body($json);
        }
    }

    /**
     * Load user style
     *
     * @author Nguyen Hoang
     * @since 2015-01-08
     * @return json
     */
    public function styles() {
        $this->autoRender = false;
        $this->layout = false;

        $style = array(
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
        );
        //$this->response->type('json');
        //$style = Configure::read('sys.store_style');
        //$style['name']  =  'hoangnn001';
//                array(
//            'name' => 'hoangnn001',
//            'store_font' => array
//            (
//                'style' => "'Allerta', sans-serif",
//                'type' => 'google',
//                'weight' => '400',
//                'size' => '54',
//            ),
//            'layout' => 'layout_a',
//            'background' => array
//            (
//                'color' => '#fff',
//                'repeat' => '',
//                'image' => '',
//            ),
//            'text_color' => array
//            (
//                'item' => '#000',
//                'store' => '#000'
//            ),
//            'display' => array
//            (
//                'frame' => 1,
//                'item' => 1
//            ),
//            'shipping_fee' => 0,
//            'logo' => ''
//        );

        /*if($this->request->is('ajax')){
            $json = json_encode($style);
            $this->response->body($json);
        }*/
        $json = json_encode($style);
        if (Request::ajax())
        {
            $json = json_encode($style);
            return $json;
        }

        echo json_encode($style);
    }

    /**
     * Load user categories
     *
     * @author Nguyen Hoang
     * @since 2015-01-08
     * @return json
     */
    public function categories() {
        $this->autoRender = false;
        $this->response->type('json');

        $categories = ClassRegistry::init('UserCategory')->getAllByUserId($this->Store->getUserId());

//        $categories = array(
//            array(
//                'id' => 1,
//                'name' => 'Điện máy'
//            ),
//            array(
//                'id' => 2,
//                'name' => 'Thời trang'
//            )
//        );

        if($this->request->is('ajax')){
            $json = json_encode($categories);
            $this->response->body($json);
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
        $this->response->type('json');
        $about = '';

        if($this->request->is('ajax')){
            $json = json_encode($about);
            $this->response->body($json);
        }
    }

     /**
     * Upload temp image
     *
     * @author Nguyen Hoang
     * @since 2015-01-08
     * @return json
     */
    public function upload_image() {
        $this->autoRender = false;
        if(!empty($_FILES['image'])){

            $file_name = time();
            $dir = APP . WEBROOT_DIR . DS . '_temp_files' . DS . $file_name.'.jpeg';
            move_uploaded_file($_FILES['image']['tmp_name'], $dir);
            $size = getimagesize($dir);

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
    	return View::make('store.store_setting');
    }
    /**
     * Set payment method for stores
     * @author OanhHa
     * @since 2015-01-09
     */
    public function payment_method() {
    	return View::make('store.payment_method');
    }
    /**
     * Set url for stores
     * @author OanhHa
     * @since 2015-01-09
     */
    public function store_url() {
    	return View::make('store.store_url');
    }
    /**
     * Set domain for stores
     * @author OanhHa
     * @since 2015-01-09
     */
    public function setting_domain() {
    	return View::make('store.setting_domain');
    }
    /**
     * About stores
     * @author OanhHa
     * @since 2015-01-09
     */
    public function store_about() {
    	return View::make('store.store_about');
    }
    /**
     * About commercial law
     * @author OanhHa
     * @since 2015-01-09
     */
    public function commercial_law() {
    	return View::make('store.commercial_law');
    }

    /**
     * About commercial law
     * @author OanhHa
     * @since 2015-01-09
     */
    public function dashboard($id=null) {
    	$first = isset($id) ? intval($id) : 0;
    	$data['first'] = $first;
    	$user= Session::get('user');
    	if(empty($user)) {
    		return  Redirect::to('/');
    	}
    	return View::make('store.dashboard', $data );
    }

    /**
     * About commercial law
     * @author  Sang PM
     * @since   2015-01-15
     */
    public function addon() {
        $data['addons'] = SysAddon::getAllSysData();

    	return View::make('store.addon',$data);
    }


}