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
        return !empty($user) ? true : false;
    }
    /**
     * Get id of login user
     * @author OanhHa
     * @since 2015/01/16
     */
    public function getUserId() {
        $user = Session::get('user');
        return !empty($user) ? $user['id'] : false;
    }

    /**
     * Encrypt string
     *
     * @author Binh Hoang
     * @since 2015.01.22
     */
    public function encrypt($string, $key) {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
    }

    /**
     * Decrypt string
     *
     * @author Binh Hoang
     * @since 2015.01.22
     */
    public function decrypt($encrypted, $key) {
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    }

}
