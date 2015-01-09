<?php
App::uses('AppController', 'Controller');
class StoresController extends AppController {

	public $uses = array();

    /**
     * Displays a store for edit
     *
     * @author Nguyen Hoang
     * @since 2015-01-08
     *
     * @return void
     */
	public function edit() {
		$this->layout = 'store_edit';
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
        $this->response->type('json');
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

		if($this->request->is('ajax')){
            $json = json_encode($style);
            $this->response->body($json);
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
        $this->autoRender = false;
        $this->response->type('json');
        $categories = array(
            array(
                'id' => 1,
                'name' => 'Điện máy'
            ),
            array(
                'id' => 2,
                'name' => 'Thời trang'
            )
        );

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
    	$this->layout = false;
    }
 	/**
     * Set payment method for stores
     * @author OanhHa
     * @since 2015-01-09
     */
  	public function payment_method() {
    	$this->layout = false;
    }
	/**
     * Set url for stores
     * @author OanhHa
     * @since 2015-01-09
     */
  	public function store_url() {
    	$this->layout = false;
    }
	/**
     * Set domain for stores
     * @author OanhHa
     * @since 2015-01-09
     */
  	public function setting_domain() {
    	$this->layout = false;
    }
	/**
     * About stores
     * @author OanhHa
     * @since 2015-01-09
     */
  	public function store_about() {
    	$this->layout = false;
    }
	/**
     * About
     * @author OanhHa
     * @since 2015-01-09
     */
  	public function store_about() {
    	$this->layout = false;
    }
}
