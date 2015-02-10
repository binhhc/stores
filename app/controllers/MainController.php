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
    public function referral($id = null) {
    	if(!$this->checkLogin()) {
            return Redirect::to('/');
        }
        $data['title_for_layout'] = '';
        $data['clientid'] = Config::get('constants.clientid');
        $data['redirecturi'] = Config::get('constants.redirecturi');
		if($id == 'gmail') {
			$data['gmail_account']  = Session::get('account_gmail');;
		}

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
    /**
     *
     * Send email to invitation by Gmail friends
     * @author OanhHa
     * @since 2015-02-09
     */
    public function send_email_list(){
     	if(Request::ajax())
        {

             $items_array = Input::get('user_emails');
             $data = array(
		            'domain' => Config::get('constants.domain'),
		            'name'  => '',
		        	'website_name' => Config::get('constants.website_name'),
		            'contact_email' => Config::get('constants.contact_email'),
		        );
             foreach($items_array as $item) {
             	$this->send_email($item, $data);

             }
             return Response::json('success');
        }

    }
    /**
     *
     * get gmail contact list
     * @author OanhHa
     * @since 2015-02-09
     */
    public function auth_gmail() {

    	/*$output_array = array(
    			 array( '0' => 'oanhha', '1' => 'binhhc@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'namnb@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'binhhc@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'namnb@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'binhhc@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'namnb@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'binhhc@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'namnb@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'binhhc@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'namnb@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht53@gmail.com'),
    			 array( '0' => 'oanhha', '1' => 'oanhht@leverages.jp'),
    			 array( '0' => 'oanhha', '1' => 'sangpm@leverages.jp'));*/
    	$authcode = $_GET["code"];


    	$clientid       = Config::get('constants.clientid');
		$clientsecret   = Config::get('constants.clientsecret');
		$redirecturi    = Config::get('constants.redirecturi');
		$maxresults     = Config::get('constants.maxresults'); // Number of mailid you want to display.
		$fields=array(
		'code'=> urlencode($authcode),
		'client_id'=> urlencode($clientid),
		'client_secret'=> urlencode($clientsecret),
		'redirect_uri'=> urlencode($redirecturi),
		'grant_type'=> urlencode('authorization_code') );

		$fields_string = '';
		foreach($fields as $key=>$value){ $fields_string .= $key.'='.$value.'&'; }
		$fields_string = rtrim($fields_string,'&');


		$ch = curl_init();//open connection
		 die;
		curl_setopt($ch,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token');
		curl_setopt($ch,CURLOPT_POST,5);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);

		var_dump($result); die;
		$response = json_decode($result);
		$accesstoken = $response->access_token;
		if( $accesstoken!='')
		$_SESSION['token']= $accesstoken;
		$xmlresponse= file_get_contents('https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&oauth_token='. $_SESSION['token']);

		$xml= new SimpleXMLElement($xmlresponse);
		$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
		$output_array = array();
		foreach ($xml->entry as $entry) {
		  foreach ($entry->xpath('gd:email') as $email) {
		    $output_array[] = array((string)$entry->title, (string)$email->attributes()->address);
		  }
		}

		var_dump($output_array);

		die;
		Session::put('account_gmail', $output_array);
    	return Redirect::to('/referral/gmail');


    }
}