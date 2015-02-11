<?php
class TextController extends BaseController {


    /**
     *
     * Feature for user
     *
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function feature(){
    	$data['title_for_layout'] = "Chức năng chính trong stores";
    	$data['content'] = Config::get('constants.feature');
        return View::make('text.feature', $data);
    }
	/**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function price(){
        $data['title_for_layout'] = "Giá cả";
        $data['content'] = Config::get('constants.price');
        return View::make('text.price', $data);
    }
	/**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function support_stores(){
        $data['title_for_layout'] = "Hỗ trợ";
        $data['content'] = Config::get('constants.support_stores');
        return View::make('text.support', $data);
    }
    /**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function interview(){
    	$data['title_for_layout'] = "Phỏng vấn";
    	$data['content'] = Config::get('constants.interview');
        return View::make('text.interview', $data);
    }
	/**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function faq(){
    	$data['title_for_layout'] = "FAQ";
    	$data['content'] = Config::get('constants.faq');
        return View::make('text.faq', $data);
    }
	/**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function category(){
    	$data['title_for_layout'] = "Phân loại";
    	$data['content'] = Config::get('constants.category');
        return View::make('text.category', $data);
    }
    	/**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function notification(){
    	$data['title_for_layout'] = "Thông báo";
    	$data['content'] = Config::get('constants.notification');
        return View::make('text.notification', $data);
    }

    	/**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function law(){
    	$data['title_for_layout'] = "Luật thương mại";
    	$data['content'] = Config::get('constants.law');
        return View::make('text.law', $data);
    }

    	/**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function privacy_policy(){
    	$data['title_for_layout'] = "Chính sách bảo mật";
    	$data['content'] = Config::get('constants.privacy_policy');
        return View::make('text.privacy_policy', $data);
    }

    /**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function terms(){
    	$data['title_for_layout'] = "Điều khoản sử dụng";
    	$data['content'] = Config::get('constants.terms');
        return View::make('text.terms', $data);
    }
	/**
     *
     * Feature for user
     * @param  null
     * @return Response
     * @author OanhHa
     * @since 2015-02-10
     */
    public function contact(){
    	$data['title_for_layout'] = "Liên hệ";
    	$data['content'] = Config::get('constants.contact');
        return View::make('text.contact', $data);
    }

}