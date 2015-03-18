<?php
class OrderController  extends BaseController {
    public function orders(){
        
        $data = [
            'customer' => [
                'last_name' => 'Sang ga',
                'first_name' => 'Ga',
                'address' => 'Sang ga',
                'tel'=>'tel',
                'email'=>'sang.pham.minh@leverages.jp',
                'note'=>'sangpm@leverages.jp',
                'prefecture' => 'prefecture'
            ],
            'items'=>
                [
                    [
                        'item_id' => 10,
                        'name' => 'Test',
                        'price' => '2000',
                        'quantity' =>1,
                        'variation' => '11',
                        'variation_name' => 'Va1',
                        'image'=> [
                            'name' => '1426131785index.jpg',
                            'original_src' => 'http://sangpm.stores.dev/files/1/1426131785index.jpg',
                            'sp_big_src' => 'http://sangpm.stores.dev/files/1/1426131785index_500x0.jpg',
                            'preview_src' => 'http://sangpm.stores.dev/files/1/1426131785index.jpg',
                            'thumb_src' => 'http://sangpm.stores.dev/files/1/1426131785index.jpg',
                            'src' => 'http://sangpm.stores.dev/files/1/1426131785index.jpg'
                        ],
                        'digital_contents' => '',
                        'mybook_item' => '',
                        'delivery_method_id' => '',
                    ],
                    [
                        'item_id' => 11,
                        'name' => 'Test',
                        'price' => '2000',
                        'quantity' =>2,
                        'variation' => '12',
                        'variation_name' => 'Va2',
                        'image'=> [
                            'name' => '1426131785index.jpg',
                            'original_src' => 'http://sangpm.stores.dev/files/1/1426131785index.jpg',
                            'sp_big_src' => 'http://sangpm.stores.dev/files/1/1426131785index_500x0.jpg',
                            'preview_src' => 'http://sangpm.stores.dev/files/1/1426131785index.jpg',
                            'thumb_src' => 'http://sangpm.stores.dev/files/1/1426131785index.jpg',
                            'src' => 'http://sangpm.stores.dev/files/1/1426131785index.jpg'
                        ],
                        'digital_contents' => '',
                        'mybook_item' => '',
                        'delivery_method_id' => '',
                    ],
                ]
            ];
        
        $account = 'sangpm';
        $data['domain_sub'] = $account;
        $store = UserStore::getUserStoreByDomain($account);
        $data['customer']['store_id'] = $store->id;
        
        $settings = json_decode($store->settings);
        $data['store_name']= $settings->store->name;
        $data['date_line']  = $this->formatTime();
        
        ;
        print "<pre>";
        print_r(Order::saveOrder($data));
        print "<pre>";
        exit();
        $this->sendMailOrder($data);
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
