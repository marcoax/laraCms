<?php
   
return [
	/**
	 * Generic values are filled when when neither package was able to guess out the value.
	 *
	 * @var array
	 */
	 'item_per_pages' => 15,
	 'section' => [
     
	   'articles' => [
	        'model'=>'Article',
	        'title'=>'Pages',
			'icon' =>'newspaper-o',
            'fieldLabel' =>'ID,Parent,Image,Title,Slug,Pub,Show Top menu,Sort,Created At,Updated At',
            'field'      =>['id'      ,
            				'parent'  => ['type' => 'relation','relation' => 'parentPage','field' => 'title', 'class' =>'col-sm-1'],
            				'image'   => ['type' => 'image','field' => 'image', 'class' =>'col-sm-1 list-image'],
            				'title',
            				'slug',
            				'pub' 	   => ['type' => 'boolean','field' => 'pub', 'class' =>'col-sm-1 text-center'],
            				'top_menu' => ['type' => 'boolean','field' => 'top_menu', 'class' =>'col-sm-1 text-center'],
            				'sort'     => ['type' => 'editable','field' => 'sort', 'class' =>'col-sm-1'],
            			
            				'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
            				'updated_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
            			   ],
            'edit'       =>'1',
            'delete'     =>'1',
            'create'     =>'1',
            'copy'       =>'1',
            'preview'    =>'0',
            'view'    	 =>'0',
            'selectable' =>'1'
            
        ],
		 'news' => [
			 'model'=>'News',
			 'title'=>'News',
			 'icon' =>'comment',
			 'fieldLabel' =>'ID,Date,Image,Title,Slug,Pub,Sort,Created At,Updated At',
			 'field'      =>['id'      ,
				 'date' ,
				 'image'   => ['type' => 'image','field' => 'image', 'class' =>'col-sm-1 list-image'],
				 'title',
				 'slug',
				 'pub' 	   => ['type' => 'boolean','field' => 'pub', 'class' =>'col-sm-1 text-center'],

				 'sort'     => ['type' => 'editable','field' => 'sort', 'class' =>'col-sm-1'],

				 'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
				 'updated_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
			 ],
			 'edit'       =>'1',
			 'delete'     =>'1',
			 'create'     =>'1',
			 'copy'       =>'1',
			 'preview'    =>'0',
			 'view'    	 =>'0',
			 'selectable' =>'1'

		 ],
		 'hpsliders' => [
				 'model'=>'HpSlider',
				 'title'=>'Home page sliders',
				 'icon' =>'images',
				 'fieldLabel' =>'ID,Image,Title,Slug,Pub,Sort,Created At,Updated At',
				 'field'      =>['id'      ,
						 'image'   => ['type' => 'image','field' => 'image', 'class' =>'col-sm-1 list-image'],
						 'title',
						 'slug',
						 'is_active' 	   => ['type' => 'boolean','field' => 'is_active', 'class' =>'col-sm-1 text-center'],
						 'sort'     => ['type' => 'editable','field' => 'sort', 'class' =>'col-sm-1'],

						 'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
						 'updated_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
				 ],
				 'edit'       =>'1',
				 'delete'     =>'1',
				 'create'     =>'1',
				 'copy'       =>'1',
				 'preview'    =>'0',
				 'view'    	 =>'0',
				 'selectable' =>'1'

		 ],
        'roles' => [
            'model'=>'Role',
			'icon' =>'graduation-cap',
	        'title'=>'Roles',
            'fieldLabel' =>'ID,Name,DisplayName, Description,Created At,Updated At',
            'field'      =>['id',
                            'name'         => ['type' => 'editable','field' => 'name', 'class' =>'col-sm-2'],
            				'display_name' => ['type' => 'editable','field' => 'display_name', 'class' =>'col-sm-2'],
            				'description'  => ['type' => 'text','field' => 'description', 'class' =>'col-sm-2'],
            				
            			    'created_at'   => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
            				'updated_at'   => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
            			   ],
            'edit'       =>'1',
            'delete'     =>'1',
            'create'     =>'1',
            'copy'       =>'1',
            'preview'    =>'0',
            'view'    	 =>'0',
            'selectable' =>'1'
            
        ],
		 'socials' => [
				 'model'=>'Social',
				 'icon' =>'users',
				 'title'=>'Socialize',
				 'fieldLabel' =>'ID,Social,Icon,Link,Active,Created At,Updated At',
				 'field'      =>['id',
						 'title'      => ['type' => 'editable','field' => 'title', 'class' =>'col-sm-2'],
						 'icon'       => ['type' => 'editable','field' => 'icon', 'class' =>'col-sm-2'],
						 'link'  	  => ['type' => 'text' ,'field' => 'link', 'class' =>'col-sm-2'],
						 'is_active'  => ['type' => 'boolean' ,'field' => 'is_active', 'class' =>'col-sm-1 text-center'],
						 'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
						 'updated_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
				 ],
				 'edit'       =>'1',
				 'delete'     =>'1',
				 'create'     =>'1',
				 'copy'       =>'1',
				 'preview'    =>'0',
				 'view'    	 =>'0',
				 'selectable' =>'1',


		 ],
        'users' => [
            'model'=>'User',
			'icon' =>'users',
	        'title'=>'Users',
            'fieldLabel' =>'ID,Email,Name,Password,Active,Created At,Updated At',
            'field'      =>['id',
            				'email'      => ['type' => 'editable','field' => 'email', 'class' =>'col-sm-2'],
            				'name'       => ['type' => 'editable','field' => 'name', 'class' =>'col-sm-2'],
							'real_password'  => ['type' => 'text' ,'field' => 'real_password', 'class' =>'col-sm-2'],
            				'is_active'  => ['type' => 'boolean' ,'field' => 'is_active', 'class' =>'col-sm-1 text-center'],
            			    'created_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
            				'updated_at' => ['type' => 'date', 'field' => 'created_at', 'class' =>'col-sm-1'],
            			   ],
            'edit'       =>'1',
            'delete'     =>'1',
            'create'     =>'1',
            'copy'       =>'1',
            'preview'    =>'0',
            'view'    	 =>'0',
            'selectable' =>'1',
			'password'	 =>1
            
        ],

    ],
	
];