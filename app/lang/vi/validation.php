<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "The :attribute may only contain letters and numbers.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => array(
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	),
	"boolean"              => "The :attribute field must be true or false.",
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "The :attribute must be a valid email address.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => array(
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	),
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "The :attribute must be a number.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => ":attribute không thể trống.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'email' => array(
			'required' => 'Địa chỉ email không thể trống.',
			'email' => 'Địa chỉ email không đúng định dạng',
			'unique' => 'Địa chỉ email đã tồn tại trong hệ thống'
		),
		'password' => array(
			'required' => 'Mật khẩu không thể trống.',
			'alpha_num' => 'Mật khẩu không thể chứa kí tự đặc biệt.',
			'min' => 'Mật khẩu chứa ít nhất 6 kí tự.',
			'max' => 'Mật khẩu chứa nhiều nhất 30 kí tự.'
		),
        'domain_url' =>array(
            'required'  => 'Vui lòng nhập tên miền.',
            'url'       => 'Vui lòng nhập một địa chỉ trang web đúng định dạng.'
        ),
		'domain' => array(
			'unique' => 'Tên miền của bạn đã tồn tại trong hệ thống.',
            'exists' => 'Tên miền của bạn đã tồn tại trong hệ thống.',
            'regex'  => 'Nhập vào đúng định dạng tên miền.',
            'not_in' => 'Tên miền không hợp lệ.',
			'url'    => 'Vui lòng nhập một địa chỉ trang web đúng định dạng.'
		),
		 'price' => array(
		 	'required' => 'Vui lòng nhập giá của sản phẩm.',
		 	 'numeric' => 'Giá của sản phẩm phải ở dạng số.',
		 	 'min:100' => 'Giá sản phẩm nhỏ nhất là 100'
		),
		'facebook' => array(
			'url' => 'Địa chỉ url của facebook không đúng.'
		),
		'twitter' => array(
			'url' => 'Địa chỉ url của twitter không đúng.'
		),
		'homepage' => array(
			'url' => 'Địa chỉ url của trang web không đúng.'
		),
		'name' => array(
			'required' => 'Bạn phải nhập tên người giới thiệu.'
		)
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
