<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	/**
	 * Check login function
	 * @author OanhHa
	 * @since 2015/01/16
	 */
	public function checkLogin() {
		$user = Session::get('user');
		if(empty($user)) {
    		return false;
    	} else {
    		return true;
    	}
	}
	/**
	 * Get id of login user
	 * @author OanhHa
	 * @since 2015/01/16
	 */
	public function getUserId() {
		$user = Session::get('user');
		if(empty($user)) {
    		return false;
    	} else {
    		return $user['id'];
    	}
	}

}
