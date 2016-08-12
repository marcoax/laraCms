<?php
return [
		'adminusers' => [
			'name' => 'required',
			'email' => 'required|Between:3,64|Email',
			'role' => 'required',
			'password' => 'alpha_num|min:6|confirmed',
			'password_confirmation' => 'alpha_num|min:6',
		],
		'articles' => [
				'title' => 'required',
				'description' => 'required',
		],
		'contacts' => [
			'name'	  => 'required',
			'surname' => 'required',
			'subject' => 'required',
			'message' => 'required',
			'email'   => 'required|Between:3,64|Email',
		],
        'countries' => [
            'name' => 'required',
            'country_code' => 'required|Between:1,3',
        ],
        'domains' => [
            'title'  => 'required',
            'domain' => 'required',
        ],
		'media' => [
			'title' => 'required',
     	],
		'hpsliders' => [
				'title' => 'required',
		],
		'news' => [
		'title' => 'required',
		],
		'tags' => [
			'title' => 'required',
		],
		'roles' => [
				'name' => 'required',
				'display_name' => 'required',
		],
        'settings' => [
            'value'  => 'required',
            'key' => 'required',
        ],
		'socials' => [
				'title' => 'required',
				'link' => 'required',
				'icon' => 'required',
		],
		'users' => [
				'name' => 'required',
				'email' => 'required|Between:3,64|Email',
			    //'role' => 'required',
				'password' => 'alpha_num|min:6|confirmed',
				'password_confirmation' => 'alpha_num|min:6',
		],
];