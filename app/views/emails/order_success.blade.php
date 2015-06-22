<div style="padding:0;background-color:#fff;color:#333;font-size:12px;line-height:1.8;font-family:'\0030d2\0030e9\0030ae\0030ce\0089d2\0030b4  Pro W3','Hiragino Kaku Gothic Pro','\0030e1\0030a4\0030ea\0030aa',Meiryo,Osaka,'\00ff2d\00ff33  \00ff30\0030b4\0030b7\0030c3\0030af','MS PGothic',sans-serif"><div class="adM">
  </div><table width="100%" bgcolor="#ededed" align="center" style="padding:20px 0 40px 0">
    <tbody><tr>
        <td>
            <p style="width:630px;margin:0 auto;padding-bottom:15px;text-align:center;line-height:1.5;font-size:12px;color:#666">
                Mail này được gởi từ 「{{$domain_sub}}]
            </p>
            <table width="630" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff" align="center" style="font-size:13px;line-height:1.8;background-color:#fff">
                <tbody>
                    <tr>
                        <td style="padding:10px 30px 30px 30px;text-align:center" colspan="2">
                            <h1 style="margin-top:30px">
                                {{$store_name}}
                            </h1>

<div style="text-align:left">
    <p style="margin:30px 0 0 0;line-height:1.8;font-size:20px;font-weight:bold">Cảm ơn bạn đã mua hàng！</p>
    <p style="margin:10px 0 25px 0;line-height:1.8;font-size:16px">
        Mua hàng tại 「{{$store_name}}」<wbr></wbr>
        Nội dung đặt hàng của bạn như sau.。</p>
</div>

<table width="570" cellspacing="0" cellpadding="0" border="0" align="center" style="border-top:solid 1px #ddd;text-align:left">
    <tbody>
    @foreach ($items as $item)
    <tr>
        <td valign="middle" style="padding:15px;border-bottom:solid 1px #ddd" colspan="4">
            <table width="540" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody><tr>
                    <td width="70" valign="middle" style="padding:0 15px 0 0">
                        <a target="_blank" href="https://{{$domain_sub}}.{{Config::get('constants.domain')}}/#!/items/{{$item['item_id']}}">
                            <img width="70" height="70" src=
                                 "{{$item['image']['thumb_src']}}" alt="{{$item['name']}}" class="CToWUd">
                        </a>
                    </td>
                    <td valign="middle" style="font-size:14px;text-align:left;line-height:1.6">
                        <a target="_blank" style="color:#333;text-decoration:none"
                           href="https://{{$domain_sub}}.{{Config::get('constants.domain')}}/#!/items/{{$item['item_id']}}">
                            {{$item['name']}}
                        </a>
                    </td>
                    <td width="100" valign="middle" align="right" style="font-size:14px;line-height:1.6">Số lượng：{{$item['quantity']}}</td>
                    <td width="100" valign="middle" align="right" style="font-size:14px;line-height:1.6;font-weight:bold"><?php echo Config::get('constants.item.currency'); ?> {{$item['show_price']}}</td>
                </tr>
                </tbody></table>
        </td>
    </tr>
    @endforeach
</tbody></table>

<table width="220" cellspacing="0" cellpadding="0" border="0" align="right" style="margin-bottom:30px;font-size:14px;line-height:1.6;float:right">
    <tbody>
    <!-- <tr>
        <td style="border-bottom:solid 1px #ddd;padding:10px 0 5px 15px;text-align:left">Phí vận chuyển</td>
        <td style="border-bottom:solid 1px #ddd;text-align:right;font-weight:bold;padding:10px 15px 5px 0">VND 0</td>
    </tr> -->
    <tr>
        <td style="border-bottom:solid 1px #ddd;padding:10px 0 5px 15px;text-align:left">Tổng cộng（Thuế）</td>
        <td style="border-bottom:solid 1px #ddd;text-align:right;font-weight:bold;padding:10px 15px 5px 0">VND {{$total}}</td>
    </tr>
</tbody></table>

<table width="570" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody><tr>
        <td style="padding:10px 16px 8px 16px;background:#ddd;font-size:16px;font-weight:bold;text-align:left">Thông tin khách hàng</td>
    </tr>
    <tr>
        <td>
            <table width="570" cellspacing="0" cellpadding="0" border="0" align="center" style="border:solid 1px #ddd;font-size:14px;line-height:1.8;padding:15px;text-align:left">
                <tbody>
                <tr>
                    <td style="width:30%;font-weight:bold">Đơn hàng số</td>
                    <td style="width:70%">{{$order_id}}</td>
                </tr>
                <tr>
                    <td style="width:30%;font-weight:bold">Tên khách hàng</td>
                    <td style="width:70%">(Anh/Chị) {{$customer['last_name']}} {{$customer['first_name']}}</td>
                </tr>
                <tr>
                    <td style="width:30%;font-weight:bold">Địa chỉ</td>
                    <td style="width:70%">
                        {{$customer['address']}} Tp.{{$customer['prefecture']}}
                    </td>
                </tr>
                <tr>
                    <td style="width:30%;font-weight:bold">Điện thoại</td>
                    <td style="width:70%">{{$customer['tel']}}</td>
                </tr>
                <tr>
                    <td style="width:30%;font-weight:bold">Thanh toán</td>
                    <td style="width:70%">Chuyển khoản</td>
                </tr>
        </tbody></table>
      </td>
    </tr>
</tbody></table>

<table width="570" cellspacing="0" cellpadding="0" border="0" align="center" style="border:solid 1px #ddd;margin-top:10px;font-size:14px;line-height:1.8;padding:15px;text-align:left">
    <tbody><tr>
        <td>
            <p style="font-weight:bold">Tham khảo</p>
            <p><a target="_blank" href="mailto:{{$customer['email']}}">{{$customer['email']}}</a></p>
        </td>
    </tr>
</tbody></table>

<table width="570" cellspacing="0" cellpadding="0" border="0" align="center" style="border:solid 1px #ddd;margin-top:10px;font-size:14px;line-height:1.6;padding:15px 15px 10px 15px;text-align:left">
  <tbody><tr>
    <td>
        <p style="margin:0">
            Mặt hàng này được mua bởi "chuyển khoản".<br>
            Theo dõi nhận thanh toán, bạn có thể chuyển số tiền mua hàng của bạn là<wbr>
        </p>
        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="margin:20px 0 5px 0;font-size:14px;line-height:1.6;padding:10px 15px;background-color:#f2f2f2">
            <tbody><tr>
                <td style="font-weight:bold;width:40%">Tài khoản ngân hàng</td>
                <td style="width:60%">VietCombank</td>
            </tr>
            <tr style="width:60%">
                <td style="font-weight:bold;width:40%">Tên chi nhánh</td>
                <td style="width:60%">Số 2 Hải Triều</td>
            </tr>
            <tr>
                <td style="font-weight:bold;width:40%">Tài khoản loại</td>
                <td style="width:60%">Công ty</td>
            </tr>
            <tr>
                <td style="font-weight:bold;width:40%">Số tài khoản</td>
                <td style="width:60%">015742344433</td>
            </tr>
            <tr>
                <td style="font-weight:bold;width:40%">Công ty</td>
                <td style="width:60%">Leverages Vn</td>
            </tr>
        </tbody></table>
        <p style="margin:0">
            Thời hạn thanh toán : {{$date_line}}trước 15 giờ<br>
        </wbr>
        </p>
    </td>
  </tr>
</tbody></table>





<div style="text-align:left">
    <p style="padding:25px 0 10px 0;line-height:1.8;font-size:16px">
          Đối với dữ liệu không đúng với đặt hàng,
          <a target="_blank" style="color:#217fbe;text-decoration:none" href="https://{{$domain_sub}}.{{Config::get('constants.domain')}}/#!/inquiry">
              Liên hệ với hệ thống mua hàng của chúng tôi</a>
    </p>
    <p style="padding-bottom:30px;line-height:1.8;font-size:16px">
          Khách hàng nên mua sắm tại「{{$store_name}}」,<wbr></wbr>
          Cảm ơn bạn rất nhiều.<wbr>
    </p>
    <div style="padding-bottom:30px;text-align:right">
        <p style="margin:10px 0;font-size:16px">
            {{$domain_sub}}<br>
            <a target="_blank" style="color:#217fbe;text-decoration:none" href="https://{{$domain_sub}}.{{Config::get('constants.domain')}}">https://{{$domain_sub}}.{{Config::get('constants.domain')}}</a>
        </p>
    </div>
</div>


                <div>
                  <p style="margin-top:10px"><a target="_blank" href="http://hayamise.com">
                          <img alt="hayamise.com" src="hinh_footer.jpg" class="CToWUd"></a></p>

                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody></table><div class="yj6qo"></div><div class="adL">
</div></div>