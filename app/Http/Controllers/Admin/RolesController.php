<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleFormRequest;
use App\Http\Requests\RoleEditFormRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RoleFormRequest	 $request)
	{
    $role = new Role(array(
        'name' => $request->get('name'),
        'display_name' => $request->get('display_name'),
        'description' => $request->get('description')
    ));

    $role->save();

    return redirect('/admin/roles/create')->with('status', 'A new role has been created!');
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
        //
        $article = Role::whereId($id)->firstOrFail();
        return view('admin.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RoleFormRequest $request, $id)
    {
        //
        $article = role::whereId($id)->firstOrFail();
	    foreach($article->getFillable() as $a) {
			$article->$a 	= $request->get( $a );
  		}
		$article->save();
    	//$article->categories()->sync($request->get('categories'));
	    return redirect(action('Admin\RolesController@edit', $article->id))->with('status', 'The article has been updated!');
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
         $article = user::whereId($id)->firstOrFail();
   		 $article->delete();
    	 return redirect(action('Admin\PagesController@lista','users'))->with('status', 'The pages '.$article->title.' has been deleted!');
    }
}
