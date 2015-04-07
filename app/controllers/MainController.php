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
    		$data['item_slides'] = array_chunk(SysAdver::getData(), 8);
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
        $data['clientid']    = Config::get('constants.clientid');
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
      if(Request::ajax()){
            $email  = trim(Input::get('email'));
            $name   = trim(Input::get('name'));
            $v      = User::validate_email_invitation(Input::all());
            $status = "success";
            if($v->fails()){
            	$mss = array();
            	foreach ($v->messages()->getMessages() as $field_name => $messages){
                    $mss[$field_name] = $messages;// messages are retrieved (publicly)
   				}
   				$status = $mss;
            } else {
                $this->send_email($email, $this->getSendMailInfo());
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
        Mail::send('emails.referral', $data, function($message) use($email) {
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
     	if(Request::ajax()){
            $items_array = Input::get('user_emails');
            $data        = $this->getSendMailInfo();

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
		$maxresults    = Config::get('constants.maxresults'); // Number of mailid you want to display.

		$fields=array(
            'code'          => $_GET["code"],
            'client_id'     => Config::get('constants.clientid'),
            'client_secret' => Config::get('constants.clientsecret'),
            'redirect_uri'  => Config::get('constants.redirecturi'),
            'grant_type'    => 'authorization_code'
        );

		$fields_string = implode('&', array_map(function ($v, $k) { return $k . '=' . urlencode($v); }, $fields, array_keys($fields)));

		$ch = curl_init();//open connection
		curl_setopt($ch, CURLOPT_URL,'https://accounts.google.com/o/oauth2/token');
		curl_setopt($ch, CURLOPT_POST,5);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$result      = curl_exec($ch);
		$response    = json_decode($result);
		$accesstoken = $response->access_token;

		if( $accesstoken != '')
            $_SESSION['token'] = $accesstoken;

		$xmlresponse= file_get_contents('https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&oauth_token='. $_SESSION['token']);

		$xml= new SimpleXMLElement($xmlresponse);
		$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');

		$output_array = array();
		foreach ($xml->entry as $entry) {
            foreach ($entry->xpath('gd:email') as $email) {
                $output_array[] = array((string)$entry->title, (string)$email->attributes()->address);
            }
		}

		Session::put('account_gmail', $output_array);
    	return Redirect::to('/referral/gmail');

    }
}