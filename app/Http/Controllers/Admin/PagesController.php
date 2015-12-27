<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFormRequest;
use App\Http\Requests\ArticleEditFormRequest;
use Illuminate\Support\Str;
use Input;
use Validator;

class PagesController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }
	
	public function lista($model,$sub='')
    {
        	
		$config 	 = config('admin.list.section.'.$model);
	    $modelClass  ='App\\'.$config['model'];
		$model       = new  $modelClass;
	    $articles    = $model::paginate(config('admin.list.item_per_pages'));
	    return view('admin.list', ['articles' => $articles,'pageConfig' => $config]);	
        
    }
	
	
	
	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($model)
	{
	    $config 	  = config('admin.list.section.'.$model);
	    $modelClass   ='App\\'.$config['model'];
		$article      = new  $modelClass;


		return view('admin.edit',['article' => $article,'pageConfig' => $config]);
	}


	
	public function store($model,AdminFormRequest $request)
	{
	    	
		    $config 	 = config('admin.list.section.'.$model);
		    $modelClass  ='App\\'.$config['model'];
			$models      = strtolower($config['model']).'s';
			$model       = new  $modelClass;
		   
			$article =   new $model;
	    	foreach($article->getFillable() as $a) {
				$article->$a 	= $request->get( $a );
		  	}
		    if (Input::hasFile('image') && Input::file('image')->isValid()) {
		        $destinationPath = 'uploads/images'; // upload path
		        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
		        $name = Input::file('image')->getClientOriginalName();
		      	$fileName = rand(11111,99999).'_'.$name; // renameing image
		        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
		        // sending back with message
		        $article->image 	    =  $fileName;
		        
		    }
			
			if (Input::hasFile('doc') && Input::file('doc')->isValid()) {
		        $destinationPath = 'uploads/doc'; // upload path
		        $extension = Input::file('doc')->getClientOriginalExtension(); // getting image extension
		        $name = Input::file('doc')->getClientOriginalName();
		      	$fileNameDoc = rand(11111,99999).'_'.$name; // renameing image
		        Input::file('doc')->move($destinationPath, $fileNameDoc); // uploading file to given path
		       // sending back with message
		        $article->doc 	        =  $fileNameDoc;
		    }
        	if( $request -> has('role')) $article -> saveRoles($request -> get('role'));


            $article->save();
            if( $request -> has('role')) $article -> saveRoles($request -> get('role'));
			if(isset($article->translatedAttributes ) && count($article->translatedAttributes )>1) {
				foreach (config('app.locales') as $locale => $value) {
					foreach($article->translatedAttributes as $attribute) {
						if( config('app.locale') !=  $locale) $article->translateOrNew($locale)->$attribute = $request->get($attribute.'_'.$locale);
						else $article->translateOrNew($locale)->$attribute = $request->get($attribute);
					}
					$article->save();
				}
			}
            $article->save();
		    return redirect(action('Admin\PagesController@edit', $models.'/'.$article->id))->with('status', 'The article has been updated!');
	}
	
	public function edit($model,$id)
    {
        	
		$config 	 = config('admin.list.section.'.$model);
	    $modelClass  ='App\\'.$config['model'];
		$model       = new  $modelClass;
		$article = $model::whereId($id)->firstOrFail();
	    return view('admin.edit',['article' => $article,'pageConfig' => $config]);
	}
	
	
	public function update($model,$id,AdminFormRequest $request)
	{
	    	
		    $config 	 = config('admin.list.section.'.$model);
		    $modelClass  ='App\\'.$config['model'];
			$models      = strtolower($config['model']).'s';
			$model       = new  $modelClass;
		   
			$article = $model::whereId($id)->firstOrFail();
	    	foreach($article->getFillable() as $a) {

				$article->$a 	= $request->get( $a );

		  	}
		    if (Input::hasFile('image') && Input::file('image')->isValid()) {
		        $destinationPath = 'uploads/images'; // upload path
		        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
		        $name = Input::file('image')->getClientOriginalName();
		      	$fileName = rand(11111,99999).'_'.$name; // renameing image
		        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
		        // sending back with message
		        $article->image 	    =  $fileName;
		        
		    }
			
			if (Input::hasFile('doc') && Input::file('doc')->isValid()) {
		        $destinationPath = 'uploads/doc'; // upload path
		        $extension = Input::file('doc')->getClientOriginalExtension(); // getting image extension
		        $name = Input::file('doc')->getClientOriginalName();
		      	$fileNameDoc = rand(11111,99999).'_'.$name; // renameing image
		        Input::file('doc')->move($destinationPath, $fileNameDoc); // uploading file to given path
		       // sending back with message
		        $article->doc 	        =  $fileNameDoc;
		    }
            $article->save();
			if( $request -> has('role')) $article -> saveRoles($request -> get('role'));
		    if(isset($article->translatedAttributes ) && count($article->translatedAttributes )>1) {
				foreach (config('app.locales') as $locale => $value) {
					foreach($article->translatedAttributes as $attribute) {
						if( config('app.locale') !=  $locale) $article->translateOrNew($locale)->$attribute = $request->get($attribute.'_'.$locale);
					 	else $article->translateOrNew($locale)->$attribute = $request->get($attribute);
					}
					 $article->save();
				}
			}
		    return redirect(action('Admin\PagesController@edit', $models.'/'.$article->id))->with('status', 'The article has been updated!');
	}
}
