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

class AdminPagesController extends Controller
{


    protected $model;
    protected $models;
    protected $modelClass;
    protected $curObject;
    protected $request;
    protected $config;
    protected $id;


    public function init($model)
    {
        $this->model = $model;
        $this->config = config('admin.list.section.' . $this->model);
        $this->models = strtolower(str_plural($this->config['model']));
        $this->modelClass = 'App\\' . $this->config['model'];

    }

    public function home()
    {
        return view('admin.home');
    }

    /**
     * Show the index list of a model.
     *
     * @return Response
     */
    public function lista($model, $sub = '')
    {

        $this->init($model);
        $model = new  $this->modelClass;
        $sort = (isset($this->config->orderBy)) ? $this->config->orderBy : 'id';
        $sortType = (isset($this->config->orderType)) ? $this->config->orderType : 'asc';
        $articles = $model::orderby($sort, $sortType)->paginate(config('admin.list.item_per_pages'));
        return view('admin.list', ['articles' => $articles, 'pageConfig' => $this->config]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($model)
    {
        $this->init($model);
        $article = new $this->modelClass;
        return view('admin.edit', ['article' => $article, 'pageConfig' => $this->config]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($model, $id,$type=null)
    {
        $this->id = $id;
        $this->init($model);
        $model = new  $this->modelClass;
        $article = $model::whereId($this->id)->firstOrFail();
        return view('admin.edit'.$type, ['article' => $article, 'pageConfig' => $this->config]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */

    public function store($model, AdminFormRequest $request)
    {
        $this->init($model);
        $this->request = $request;
        $config = config('admin.list.section.' . $model);
        $model = new  $this->modelClass;
        $article = new $model;
        // input data Handler
        $this->requestFieldHandler($article);
        return redirect(action('Admin\AdminPagesController@edit', $this->models . '/' . $article->id))->with('status', 'The article has been updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update($model, $id, AdminFormRequest $request)
    {
        $this->init($model);
        $this->request = $request;
        $model = new  $this->modelClass;
        $article = $model::whereId($id)->firstOrFail();
        // input data Handler
        $this->requestFieldHandler($article);
        return redirect(action('Admin\AdminPagesController@edit', $this->models . '/' . $article->id))->with('status', 'The article has been updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Respons
     */
    public function destroy($model, $id)
    {
        $this->init($model);
        $this->id = $id;
        $model = new  $this->modelClass;
        $article = $model::whereId($this->id)->firstOrFail();
        $article->delete();
        return redirect(action('Admin\AdminPagesController@lista', $this->models))->with('status', 'The items ' . $article->title . ' has been deleted!');
    }


    public function requestFieldHandler($article)
    {
        foreach ($article->getFillable() as $a) {
            $article->$a = $this->request->get($a);
        }
        $this->functionMediadHandler($article, 'image');
        $this->functionMediadHandler($article, 'doc');


        $article->save();

        if ($this->request->has('role')) $article->saveRoles($this->request->get('role'));

        if (isset($article->translatedAttributes) && count($article->translatedAttributes) > 1) {
            foreach (config('app.locales') as $locale => $value) {
                foreach ($article->translatedAttributes as $attribute) {
                    if (config('app.locale') != $locale) $article->translateOrNew($locale)->$attribute = $this->request->get($attribute . '_' . $locale);
                    else $article->translateOrNew($locale)->$attribute = $this->request->get($attribute);
                }
                $article->save();
            }
        }
    }

    private function functionMediadHandler($article, $media)
    {


        if (Input::hasFile($media) && Input::file($media)->isValid()) {
            $newMedia  = Input::file($media);
            $mediaType = ( is_image( $newMedia->getMimeType()) == 'image') ? 'images':'docs';
            $destinationPath =  config('admin.path.repository').'/'.$mediaType; // upload path
            $extension 		 = $newMedia->getClientOriginalExtension(); // getting image extension
            $name 			 = $newMedia->getClientOriginalName();
            $fileName 		 = rand(11111,99999).'_'.$name; // renameing image
            $newMedia->move($destinationPath, $fileName); // uploading file to given path
            $article->$media = $fileName;
        }

    }
}
