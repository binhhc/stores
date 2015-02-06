<?php

class MainController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';
  /**
     * Display the specified resource.
     *
     * @param  string $name Tag name
     * @return Response
     */
    public function main(){
    	if(!$this->checkLogin()) {
    		$data['title_for_layout'] = 'Chào mừng đến với stores.vn';
    		$item_slides = SysAdver::getData();
    		$data['item_slides'] = array_chunk($item_slides, 8);
    		return View::make('main.index', $data);
    	} else {
    		 return Redirect::to('/dashboard');
    	}
    }

    /**
     *
     * Set support for user
     * @author OanhHa
     * @since 2015-02-06
     */
    public function support() {
    	if(!$this->checkLogin()) {
            return Redirect::to('/');
        }
        $data['title_for_layout'] = 'Hỗ trợ người dùng';
        return View::make('main.support', $data);
    }

     /**
     *
     * Referral
     * @author OanhHa
     * @since 2015-02-06
     */
    public function referral() {
    	if(!$this->checkLogin()) {
            return Redirect::to('/');
        }
        $data['title_for_layout'] = '';
        return View::make('main.referral', $data);
    }
 	/**
     *
     * invitation
     * @author OanhHa
     * @since 2015-02-06
     */
    public function invitation() {
      if(Request::ajax())
        {
             $email = trim(Input::get('email'));
             $name = trim(Input::get('name'));
             $v = User::validate_email_invitation(Input::all());

            $status = "success";
            if($v->fails()){
            	$mss = array();
            	foreach ($v->messages()->getMessages() as $field_name => $messages)
    			{
       				 $mss[$field_name] = $messages;// messages are retrieved (publicly)
   				}
   				$status = $mss;
            } else {
            	 $data = array(
		            'domain' => Config::get('constants.domain'),
		            'name'  => $name,
		        	'website_name' => Config::get('constants.website_name'),
		            'contact_email' => Config::get('constants.contact_email'),
		        );
            	 $this->send_email($email, $data);
       		 }
       		 return Response::json($status);
   		}
    }
	/**
     * send email to inviting
     * @author OanhHa
     * @since 2015-02-06
     */
    public function send_email($email, $data) {
       $status = Mail::send('emails.referral', $data, function($message) use($email) {
                $message->to($email, 'Mời tham gia Stores')->subject('Thư mời tham gia Store');
       });

    }
}