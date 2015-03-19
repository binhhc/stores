<?php

class SangController extends BaseController {
    public function test(){
$p = Array("id"=>"blar","class"=>"myclass","onclick"=>"myJavascriptFunc()");

// Join Params
array_walk($p, create_function('&$i,$k','$i=" $k=\"$i\"";'));

$p_string = implode($p,"");

$fields=array(
            'code'      => 123,
            'client_id' => urlencode(Config::get('constants.clientid')),
            'client_secret' => urlencode(Config::get('constants.clientsecret')),
            'redirect_uri'  => urlencode(Config::get('constants.redirecturi')),
            'grant_type'    => urlencode('authorization_code') 
        );
$output = implode('&', array_map(function ($v, $k) { return $k . '=' . $v; }, $fields, array_keys($fields)));
        print "<pre>";
        var_dump($output);
        print "<pre>";
        exit();
    }
    public function testccccccc(){
        $img = array(
            'bg2_10.gif',
            'bg2_11.gif',
            'bg2_12.gif',
            'bg2_13.gif',
            'bg2_14.gif',
            'bg2_15.gif',
            'bg2_16.gif',
            'bg2_17.gif',
            'bg2_18.gif',
            'bg2_19.gif',
            'bg2_20.gif',
            'bg2_21.gif',
            'bg2_22.gif',
            'bg2_23.gif',
            'bg2_24.gif',
            'bg2_25.gif',
            'bg2_26.gif',
            'bg2_27.gif',
            'bg2_28.gif',
            'bg2_29.gif',
            'bg2_30.gif',
        );
         foreach($img as $key => $value)
        $temp[] = 
            array(
                'name' => $key,
                'image_url'=>$value
            );
            print "<pre>";
            print_r(SysBackgroundImage::insert($temp));
            print "<pre>";
            exit();
    }
    
    public function saveBgColor() { 
        $color_bg = array(
            'background-color: rgb(229, 25, 25)',
            'background-color: rgb(229, 188, 25)',
            'background-color: rgb(102, 183, 20)',
            'background-color: rgb(25, 188, 229)',
            'background-color: rgb(20, 102, 183)',
            'background-color: rgb(188, 66, 188)',
            'background-color: rgb(107, 66, 188)',
            'background-color: rgb(188, 66, 65)',
            'background-color: rgb(188, 164, 66)',
            'background-color: rgb(102, 149, 52)',
            'background-color: rgb(66, 164, 188)',
            'background-color: rgb(52, 102, 150)',
            'background-color: rgb(164, 90, 164)',
            'background-color: rgb(115, 89, 164)',
            'background-color: rgb(255, 147, 147)',
            'background-color: rgb(255, 233, 147)',
            'background-color: rgb(189, 255, 126)',
            'background-color: rgb(183, 240, 254)',
            'background-color: rgb(126, 190, 255)',
            'background-color: rgb(233, 169, 233)',
            'background-color: rgb(190, 169, 233)',
            'background-color: rgb(251, 207, 207)',
            'background-color: rgb(251, 242, 207)',
            'background-color: rgb(224, 251, 197)',
            'background-color: rgb(207, 242, 251)',
            'background-color: rgb(196, 224, 251)',
            'background-color: rgb(242, 216, 242)',
            'background-color: rgb(225, 216, 242)',
            'background-color: rgb(75, 69, 69)',
            'background-color: rgb(75, 74, 69)',
            'background-color: rgb(57, 60, 54)',
            'background-color: rgb(69, 74, 76)',
            'background-color: rgb(55, 58, 60)',
            'background-color: rgb(74, 70, 74)',
            'background-color: rgb(71, 70, 74)',
            'background-color: rgb(0, 0, 0)',
            'background-color: rgb(51, 50, 51)',
            'background-color: rgb(102, 102, 102)',
            'background-color: rgb(128, 128, 128)',
            'background-color: rgb(153, 153, 153)',
            'background-color: rgb(204, 204, 204)',
            'background-color: rgb(255, 255, 255)',
        );
        foreach($color_bg as $key => $value)
            $temp[] = 
                array(
                    'name' => $key,
                    'color'=>$value
                );
        
            print "<pre>";
            print_r(SysBackgroundColor::insert($temp));
            print "<pre>";
            exit();
    }
    public function saveInde() { 
        $item_slide = array(
		array(
		 'href' => "https://anduamet.stores.jp/#!/" ,
		 'url' => 'img/main_page/anduamet.jpg',
		 'name'=> 'anduamet'
		),
		array(
		 'href' => "https://ironwork_mk.stores.jp/#!/" ,
		 'url' => 'img/main_page/ironwork_mk.jpg',
		 'name'=> 'ironwork_mk'
		),
		array(
		 'href' => "http://shippostore.com/#!/" ,
		 'url' => 'img/main_page/shippostore.jpg',
		 'name'=> 'ShippoSTORE'
		),
		array(
		 'href' => "https://fleeceleeve.stores.jp/#!/" ,
		 'url' => 'img/main_page/fleeceleeve.jpg',
		 'name'=> 'フリースリーブ'
		),
		array(
		 'href' => "https://chill-garden.stores.jp/#!/" ,
		 'url' => 'img/main_page/chill-garden.jpg',
		 'name'=> 'Chill Garden'
		),
		array(
		 'href' => "https://3355.stores.jp/#!/" ,
		 'url' => 'img/main_page/3355.jpg',
		 'name'=> '3355'
		),
		array(
		 'href' => "https://nakedhorse.stores.jp/#!/" ,
		 'url' => 'img/main_page/nakedhorse.jpg',
		 'name'=> 'nakedhorse'
		),
		array(
		 'href' => "https://tla.stores.jp/#!/" ,
		 'url' => 'img/main_page/tla.jpg',
		 'name'=> 'tla'
		),
		array(
		 'href' => "https://classico.stores.jp/#!/" ,
		 'url' => 'img/main_page/classico.jpg',
		 'name'=> 'classico'
		),
		array(
		 'href' => "https://patanica.stores.jp/#!/" ,
		 'url' => 'img/main_page/patanica.jpg',
		 'name'=> 'patanica'
		),
		array(
		 'href' => "https://ader.stores.jp/#!/" ,
		 'url' => 'img/main_page/ader.jpg',
		 'name'=> 'ader'
		),
		array(
		 'href' => "https://nohmask.stores.jp/#!/" ,
		 'url' => 'img/main_page/nohmask.jpg',
		 'name'=> 'nohmask'
		),
		array(
		 'href' => "https://butter.stores.jp/#!/" ,
		 'url' => 'img/main_page/butter.jpg',
		 'name'=> 'butter'
		),
		array(
		 'href' => "https://conix.stores.jp/#!/" ,
		 'url' => 'img/main_page/conix.jpg',
		 'name'=> 'conix'
		),
		array(
		 'href' => "https://milkjapon.stores.jp/#!/" ,
		 'url' => 'img/main_page/milkjapon.jpg',
		 'name'=> 'milkjapon'
		),
		array(
		 'href' => "http://papierlabo-store.com/#!/" ,
		 'url' => 'img/main_page/papierlabo-store.jpg',
		 'name'=> 'PAPIER LABO.'
		),
		array(
		 'href' => "https://nstore.stores.jp/#!/" ,
		 'url' => 'img/main_page/nstore.jpg',
		 'name'=> 'N STORE'
		),
		array(
		 'href' => "https://molansoda.stores.jp/#!/" ,
		 'url' => 'img/main_page/molansoda.jpg',
		 'name'=> 'molansoda'
		),
		array(
		 'href' => "https://1012.stores.jp/#!/" ,
		 'url' => 'img/main_page/1012.jpg',
		 'name'=> '1012'
		),
		array(
		 'href' => "https://shoesofprey.stores.jp/#!/" ,
		 'url' => 'img/main_page/shoesofprey.jpg',
		 'name'=> 'shoesofprey'
		),
		array(
		 'href' => "https://leather_labo.stores.jp/#!/" ,
		 'url' => 'img/main_page/leather_labo.jpg',
		 'name'=> 'leather_labo'
		),
		array(
		 'href' => "https://ciito.stores.jp/#!/" ,
		 'url' => 'img/main_page/ciito.jpg',
		 'name'=> 'ciito'
		),
		array(
		 'href' => "https://kotoriten.stores.jp/#!/" ,
		 'url' => 'img/main_page/kotoriten.jpg',
		 'name'=> 'kotoriten'
		),
		array(
		 'href' => "https://organics.stores.jp/#!/" ,
		 'url' => 'img/main_page/organics.jpg',
		 'name'=> 'organics'
		),
		array(
		 'href' => "https://drawingandmanual.stores.jp/#!/" ,
		 'url' => 'img/main_page/drawingandmanual.jpg',
		 'name'=> 'drawingandmanual'
		),
		array(
		 'href' => "https://feacoffee.stores.jp/#!/" ,
		 'url' => 'img/main_page/feacoffee.jpg',
		 'name'=> 'feacoffee'
		),
		array(
		 'href' => "https://no8vani.stores.jp/#!/" ,
		 'url' => 'img/main_page/no8vani.jpg',
		 'name'=> 'no8vani'
		),
		array(
		 'href' => "https://bowtie.stores.jp/#!/" ,
		 'url' => 'img/main_page/bowtie.jpg',
		 'name'=> 'bowtie'
		),
		array(
		 'href' => "https://handmadetights.stores.jp/#!/" ,
		 'url' => 'img/main_page/handmadetights.jpg',
		 'name'=> 'handmadetights'
		),
		array(
		 'href' => "https://neon.stores.jp/#!/" ,
		 'url' => 'img/main_page/neon.jpg',
		 'name'=> 'neon'
		),
		array(
		 'href' => "https://actroom.stores.jp/#!/" ,
		 'url' => 'img/main_page/actroom.jpg',
		 'name'=> 'actroom'
		),
		array(
		 'href' => "https://btfurniture.stores.jp/#!/" ,
		 'url' => 'img/main_page/btfurniture.jpg',
		 'name'=> 'btfurniture'
		),
		array(
		 'href' => "https://maru-bizen.stores.jp/#!/" ,
		 'url' => 'img/main_page/maru-bizen.jpg',
		 'name'=> 'maru-bizen style'
		),
		array(
		 'href' => "https://kanvas.stores.jp/#!/" ,
		 'url' => 'img/main_page/kanvas.jpg',
		 'name'=> 'kanvas'
		),
		array(
		 'href' => "https://1740avenue.stores.jp/#!/" ,
		 'url' => 'img/main_page/1740avenue.jpg',
		 'name'=> '1740 AVENUE'
		),
		array(
		 'href' => "https://quaela.stores.jp/#!/" ,
		 'url' => 'img/main_page/quaela.jpg',
		 'name'=> 'qua e la'
		),
		array(
		 'href' => "https://specialfresh.stores.jp/#!/" ,
		 'url' => 'img/main_page/specialfresh.jpg',
		 'name'=> 'SpecialFRESH'
		),
		array(
		 'href' => "https://shiroikuro.stores.jp/#!/" ,
		 'url' => 'img/main_page/shiroikuro.jpg',
		 'name'=> 'Shiroi Kuro'
		),
		array(
		 'href' => "https://yortz.stores.jp/#!/" ,
		 'url' => 'img/main_page/yortz.jpg',
		 'name'=> 'YORTZ'
		),
		array(
		 'href' => "https://amani.stores.jp/#!/" ,
		 'url' => 'img/main_page/amani.jpg',
		 'name'=> 'amani'
		),
		array(
		 'href' => "https://dolcedeco.stores.jp/#!/" ,
		 'url' => 'img/main_page/dolcedeco.jpg',
		 'name'=> 'Dolce Deco'
		),
		array(
		 'href' => "https://quaintdesign.stores.jp/#!/" ,
		 'url' => 'img/main_page/quaintdesign.jpg',
		 'name'=> 'Quaint Design'
		),
		array(
		 'href' => "https://dls.stores.jp/#!/" ,
		 'url' => 'img/main_page/dls.jpg',
		 'name'=> 'dls'
		),
		array(
		 'href' => "https://stereotennis.stores.jp/#!/" ,
		 'url' => 'img/main_page/stereotennis.jpg',
		 'name'=> 'STEREO TENNIS FANCY SHOP'
		),
		array(
		 'href' => "https://arcobaleno.stores.jp/#!/" ,
		 'url' => 'img/main_page/arcobaleno.jpg',
		 'name'=> 'arcobaleno'
		),
		array(
		 'href' => "https://sowxp.stores.jp/#!/" ,
		 'url' => 'img/main_page/sowxp.jpg',
		 'name'=> 'sowxp'
		),
		array(
		 'href' => "https://doramik.stores.jp/#!/" ,
		 'url' => 'img/main_page/doramik.jpg',
		 'name'=> 'DORAMIK'
		));
        print "<pre>";
        print_r(SysAdver::insert($item_slide));
        print "<pre>";
        exit();
    }
}