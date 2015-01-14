<?php

class UserItemController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';
    /**
     * List user item
     * @author OanhHa
     * @since 2015/01/14
     */
    public function item_management() {
    	$items = UserItem::all()->toArray();
    	$data['item'] = $items;
    	return View::make('userItem.item_management', $data);
    }
    public function set_status() {

    }



}