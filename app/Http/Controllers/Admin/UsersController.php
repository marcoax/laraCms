<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $articles = User::all();
    	$config = config('admin.list.section.users');
	    return view('admin.list', ['articles' => $articles,'pageConfig' => $config]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    	$article = new user;   
        $roles = Role::all();
		 $selectedRoles = $article->roles->lists('id')->toArray();
        return view('admin.users.create', compact('article','roles', 'selectedRoles'));
	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserEditFormRequest $request)
    {
        //
		$user = new user;
		foreach ($user->getFillable() as $a) {
			$user -> $a = $request -> get($a);
		}
		$password = $request -> get('password');
		if ($password != "") {
			$user -> password = Hash::make($password);
		}
		$user -> save();
		$user -> saveRoles($request -> get('role'));

		return redirect(action('Admin\UsersController@edit', $user -> id)) -> with('status', 'The user has been created!');

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
        $article = User::whereId($id)->firstOrFail();
	    return view('admin.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, UserEditFormRequest $request)
{
    $user = User::whereId($id)->firstOrFail();
    foreach($user->getFillable() as $a) {
		 $user->$a 	= $request->get( $a );
  	}
    $password = $request->get('password');
    if($password != "") {
        $user->password = Hash::make($password);
    }
    $user->save();
    $user->saveRoles($request->get('role'));

    return redirect(action('Admin\UsersController@edit', $user->id))->with('status', 'The user has been updated!');
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
