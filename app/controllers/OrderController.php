<?php
class OrderController  extends BaseController {
    public function orders(){
     
        $data = [
            'customer' => [
                'last_name' => 'Sang ga',
                'first_name' => 'Ga',
                'address' => 'Sang ga',
                'tel'=>'tel',
                'email'=>'sangpm@leverages.jp',
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
                        'variation' => 'A',
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
                        'variation' => 'A',
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
        
        $this->sendMailOrder($data);
        exit();
    }
    
    public function sendMailOrder($data){
        $data['domain_sub'] = 'sangpm';
        $new_email = 'sang.pham.minh@leverages.jp';$data['customer']['email'];
        Mail::send('emails.order_success', $data, function($message) use($new_email) {
            $message->to($new_email, 'Đặt hàng')->subject('Đặt hàng thành công');
        });
      
    }
    
    public function formatTime(){
        $arr = array(
            'Mon' => 'Thứ Hai','Tue' => 'Thứ Ba','Wed' => 'Thứ Tư',
            'Thu' => 'Thứ Năm','Fri' => 'Thứ Sáu','Sat' => 'Thứ Bảy',
            'Sun' => 'Chủ Nhật');
        
        strtr(date($format,  strtotime($time)),$arr);
    }
}
