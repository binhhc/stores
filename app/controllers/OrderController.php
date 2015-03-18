<?php
class OrderController  extends BaseController {
    public function orders($account){
        
        $data = Input::get('data');
      
        $data['domain_sub'] = $account;
        $store              = UserStore::getUserStoreByDomain($account);
        $data['customer']['store_id'] = $store->id;
        
        $settings           = json_decode($store->settings);
        $data['store_name'] = $settings->store->name;
        $data['date_line']  = $this->formatTime();
        $data['order_id']   = Order::saveOrder($data);
   
        $this->sendMailOrder($data);
        echo json_encode(array('rs' =>$data));
        exit();
    }
    
    public function sendMailOrder($data){
        $total  = 0;
        
        if($data['items'])
            foreach($data['items'] as $key =>$value){
                $total += $value['price']*$value['quantity'];
                $data['items'][$key]['show_price'] = number_format($value['price']*$value['quantity']);
            }
            
        $data['total']  = number_format($total);
        
        $new_email = $data['customer']['email'];
        Mail::send('emails.order_success', $data, function($message) use($new_email) {
            $message->to($new_email, 'Đặt hàng')->subject('Đặt hàng thành công');
        });
      
    }
    
    public function formatTime(){
        $str_time = strtotime("+2 day");
        $arr = array(
            'Mon' => 'Thứ Hai','Tue' => 'Thứ Ba','Wed' => 'Thứ Tư',
            'Thu' => 'Thứ Năm','Fri' => 'Thứ Sáu','Sat' => 'Thứ Bảy',
            'Sun' => 'Chủ Nhật','/'=>'Ngày','@'=>'tháng','#'=>'năm');
        
        return strtr(date('/ d @ m # Y （D）',  $str_time),$arr);
    }
}
