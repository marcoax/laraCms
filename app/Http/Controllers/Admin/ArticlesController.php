<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Support\Str;
use App\Http\Requests\ArticleFormRequest;
use App\Http\Requests\ArticleEditFormRequest;
use Input;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   	public function index()
	{
	    	
		$config = config('admin.list.section.articles');
	
	    $articles = Article::all();
	     return view('admin.list', ['articles' => $articles,'pageConfig' => $config]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
	{
	    $roles   = article::all();
        $selectedRoles = '';

		$config 	  = config('admin.list.section.article');
		$article = new article;
	    return view('admin.articles.create',['article' => $article,'pageConfig' => $config]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleFormRequest $request)
{
     	
		$article  = new Article;
     	foreach($article->getFillable() as $a) {
		 $article->$a 	= $request->get( $a );
  		}
	
	
	    if (Input::hasFile('image') && Input::file('image')->isValid()) {
	        echo $destinationPath = 'uploads/images'; // upload path
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
	    $article->slug 		    =  Str::slug($request->get('title'), '-');
		$article->id_parent 	=  $request->get('id_parent');
	
	    //$article->pub = 1;
		//$article->top_menu = 1;

        $article->save();
  
	
		return redirect(action('Admin\ArticlesController@edit', $article->id))->with('status', 'The article has been created!');
   
    
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       
	   
	    $article = article::whereId($id)->firstOrFail();
	    return view('admin.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, ArticleEditFormRequest $request)
{
    $article = article::whereId($id)->firstOrFail();
	
	
	
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
    $article->slug 		    =  Str::slug($request->get('title'), '-');
	$article->id_parent 	=  $request->get('id_parent');
	$article->save();

    return redirect(action('Admin\ArticlesController@edit', $article->id))->with('status', 'The article has been updated!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
         $article = article::whereId($id)->firstOrFail();
   		 $article->delete();
    	 return redirect(action('Admin\PagesController@lista','articles'))->with('status', 'The pages '.$article->title.' has been deleted!');
    }
}
