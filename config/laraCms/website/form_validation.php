<?php
return [

		'contact' => [
			'name'	  => 'required',
			'surname' => 'required',
			'subject' => 'required',
			'message' => 'required',
			'privacy' => 'required',
			'email'   => 'required|Between:3,64|Email',

		],

];