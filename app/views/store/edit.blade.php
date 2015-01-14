@extends('layouts.store_edit')
@section('content')
<div id="pallet">
    <div id="pallet_wrap">
        <div id="navi">
            <ul>
              <li class="back"><a href="/">Hủy</a></li>
              <li class="save"><a href="" ng-click="save()">Lưu</a></li>
            </ul>
        </div>
        <div class="wrap">
            <div class="opened_icon"></div>
            <h3 class="panel_btn"><span class="about">Giới thiệu</span></h3>
            <div class="store_font" ng-mouseover="font_change_mouseover()" ng-mouseleave="font_change_mouseleave()">
             
                <div class="slider_wrapper">
                    <div id="slider"></div>
                </div>
                <div id="font_scroll">
                    <ul class="font">
                      <li ng-repeat="font in preset.fonts.en" ng-class="{deactive: store_name_ja_only, active: select_font_name==font.name}" ng-show="font_language_show=='en'" ng-click="store.change_store_font(font.name, font.type, font.font_family2, font.font_weight)" ng-style="{ 'font-family': font.name, 'font-weight': font.font_weight }">MyStore</li>
                    </ul>
                </div>
            </div>
            <div class="panels">
                <div class="inner">
                    <div class="heading">
                        <h4 class="name fl_l">Tên cửa hàng</h4>
                    </div>
                    <div class="store_name spb">
                        <input type="text" ng-model="store.name" ng-change="store_name_change()" placeholder="Tên cửa hàng">
                        <p class="font_change" ng-mouseover="font_change_mouseover()" ng-mouseleave="font_change_mouseleave()"><a href="">Đổi font chữ</a></p>
                    </div>
                    <div class="heading">
                        <h4 class="logo fl_l">Logo cửa hàng</h4>
                    </div>
                    <div class="store_mark">
                        <dl class="inner_list" ng-show="styles.show_logo_switch">
                            <dt>Chỉ dùng logo</dt>
                            <dd>
                                <div class="switch">
                                    <p class="logo toggle_btn active" ng-show="styles.logo" ng-click="store.toggle_display('logo')"><span class="active">ON</span></p>
                                    <p class="logo toggle_btn deactive" ng-hide="styles.logo" ng-click="store.toggle_display('logo')"><span>OFF</span></p>
                                    <p class="grip"></p>
                                </div>
                            </dd>
                        </dl>
                        <div class="file_up">
                            <p class="hide_file">
                                <input type="file" id="file_logo_image" name="image" accept="image/jpeg,image/png,image/gif">
                            </p>
                            <label for="file_logo_image" id="label_logo_image" class="label_button">Upload logo</label>
                            <input type="submit" class="hide_submit" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap">
        <div class="opened_icon"></div>
            <h3 class="panel_btn"><span class="design">Tùy chỉnh cửa hàng</span></h3>
            <div class="panels">
                <div class="inner">
                    <div class="heading">
                      <h4 class="layout fl_l">Bố cục</h4>
                    </div>
                    <style>
                        #layout div ul li:nth-child(4n) {
                        margin-right: 0 !important;
                        }
                    </style>
                    <div id="layout">
                      <div class="mask">
                        <ul class="layout">
                          <li ng-repeat="l in preset.layouts" ng-class="'l'+($index+1)" ng-click="store.change_layout(l.name)" onclick="change_active_element(this, '#layout div ul li.active')" onmouseover="$(this).css({opacity: 0.5})" onmouseout="$(this).css({opacity: 1})"></li>
                        </ul>
                      </div>
                    </div>
                    <div class="heading">
                        <h4 class="bg_icon fl_l">Nền</h4>
                    </div>
                    <div id="bg_default">
                        <div id="bgcolor">
                            <ul class="scroll">
                              <li class="l"></li>
                              <li class="r"></li>
                            </ul>
                            <style>
                              .btn_bgcolor dd ul li:nth-child(7n) {
                                margin-right: 0 !important;
                              }
                            </style>
                            <div class="mask">
                                <dl class="bg_c btn_bgcolor">
                                    <dd ng-repeat="n in [0,1,2]">
                                        <ul>
                                            <li ng-repeat="color in preset.background_colors[n]" ng-style="util.generate_background_color_style(color)" ng-click="store.change_background_color(color)" onclick="change_active_element(this, '.btn_bgcolor dd ul li.active')" onmouseover="$(this).css({opacity: 0.5})" onmouseout="$(this).css({opacity: 1})">
                                                <span></span>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div id="bgpattern">
                            <ul class="scroll">
                                <li class="l"></li>
                                <li class="r"></li>
                            </ul>
                            <div class="mask">
                                <dl class="bg_pt btn_bgpattern">
                                    <dd ng-repeat="patterns in preset.background_patterns">
                                        <ul>
                                            <li ng-repeat="pattern in patterns" ng-style="util.generate_image_style(pattern)" ng-click="store.change_background_image(pattern)" onclick="change_active_element(this, '.bg_pt dd ul li.active')"><span></span></li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div id="bg_original" class="spb">
                      <dl class="inner_list">
                        <dt>Hình khác</dt>
                        <dd>
                          <div class="switch">
                            <p class="bg_original toggle_btn active" ng-show="styles.original_background_image" ng-click="store.toggle_display('original_background_image')"><span class="active">ON</span></p>
                            <p class="bg_original toggle_btn deactive" ng-hide="styles.original_background_image" ng-click="store.toggle_display('original_background_image')"><span>OFF</span></p>
                            <p class="grip"></p>
                          </div>
                        </dd>
                      </dl>
                      <div class="cont">
                        <div class="file_up">
                          <p class="hide_file">
                            <input type="file" id="file_background_image" name="image" accept="image/jpeg,image/png,image/gif">
                          </p>
                          <label for="file_background_image" id="label_background_image" class="label_button">Chọn hình</label>
                          <input type="submit" class="hide_submit" value="">
                        </div>
                        <p class="pt" ng-hide="!store.background.image || store.background.image[0] == '/'"><input id="bpt" type="checkbox" ng-model="store.background.repeat" ng-change="store.toggle_display('background_repeat')" ng-true-value="repeat" ng-false-value="no-repeat"><label for="bpt">Hình nền lát gạch</label></p>
                      </div>
                    </div>
                    <div class="heading">
                        <h4 class="bgcolor fl_l">Màu chữ</h4>
                    </div>
                    <div id="textcolor" class="spb">
                        <dl id="textcolor_store" class="inner_list">
                            <dt>Tên cửa hàng/menu</dt>
                            <dd ng-repeat="color in preset.text_colors" ng-class="'t'+($index+1)" ng-click="store.change_store_text_color(color)" onclick="change_active_element(this, '#textcolor_store dd')"><span></span></dd>
                        </dl>
                        <dl id="textcolor_item" class="inner_list">
                            <dt>Sản phẩm/giá</dt>
                            <dd ng-repeat="color in preset.text_colors" ng-class="'t'+($index+1)" ng-click="store.change_item_text_color(color)" onclick="change_active_element(this, '#textcolor_item dd')"><span></span></dd>
                        </dl>
                    </div>
                    <div class="heading">
                        <h4 class="iteminfo fl_l">Tùy chọn hiển thị</h4>
                    </div>
                    <div id="item_info">
                        <dl class="inner_list">
                            <dt>Tên sản phẩm/giá</dt>
                            <dd>
                                <div class="switch">
                                    <p class="item_txt toggle_btn active" ng-click="store.toggle_display('item')" ng-show="store.display.item"><span class="active">ON</span></p>
                                    <p class="item_txt toggle_btn deactive" ng-click="store.toggle_display('item')" ng-hide="store.display.item"><span>OFF</span></p>
                                    <p class="grip"></p>
                                </div>
                            </dd>
                        </dl>
                        <dl class="inner_list">
                            <dt>Khung</dt>
                            <dd>
                                <div class="switch">
                                    <p class="item_frame toggle_btn active" ng-click="store.toggle_display('frame')" ng-show="store.display.frame" ><span class="active">ON</span></p>
                                    <p class="item_frame toggle_btn deactive" ng-click="store.toggle_display('frame')" ng-hide="store.display.frame"><span>OFF</span></p>
                                    <p class="grip"></p>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop