<?php
return [

		'contacts' => [
			'name'	  => 'required',
			'surname' => 'required',
            'company' => 'required',
            'subject' => 'required',
			'message' => 'required',
			'privacy' => 'required',
			'email'   => 'required|Between:3,64|Email',
		],

		'newsletter' => [
			'email'   => 'required|Between:3,64|Email|unique:newsletters',
		]
		
];
