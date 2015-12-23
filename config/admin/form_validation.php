<?php
   
 return  [
	      'articles' => [
	          'title' => 'required',
        	  'description'=> 'required',
	      ],
	      'roles' => [
        	'name' => 'required',
        	'display_name' => 'required',
    	  ],
		 'socials' => [
				 'title' => 'required',
				 'link'=> 'required',
				 'icon'=> 'required',
		 ],
    	  'users' => [
	          'name' => 'required',
              'email'=> 'required',
          
              'password'=>'alpha_num|min:6|confirmed',
              'password_confirmation'=>'alpha_num|min:6',
	      ],
    
         
		];