<?php namespace App\LaraCms\Website\Controllers;


use App\LaraCms\Website\Requests\WebsiteFormRequest;
use App\LaraCms\Mailers\SystemMailer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\FaqCategory;
use App\Article;
use App\Contact;
use App\Product;
use Validator;
use Input;

class WebsiteFormController extends Controller
{
    /**
     * @var SystemMailer
     */
    protected $mailer;

    /**
     * WebsiteFormController constructor.
     *
     * @param SystemMailer $mailer
     */
    public function __construct(SystemMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     *  Contact Form  Handler
     *
     * @param WebsiteFormRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContactUsForm(WebsiteFormRequest $request)
    {
        $slug = 'contacts';
        $this->request = $request;
        $model = new Contact;

        foreach ($model->getFillable() as $a) {
            $model->$a = sanitizeParameter($this->request->get($a));
        }
        $model->save();
        $article = Article::where('slug', '=', $slug)->first();

        /****************** send confirm email ***************/
        $data = $request->only('name','surname', 'email', 'company', 'subject', 'request_product_id');

        $data['messageLines'] = explode("\n", $model->message);
        $data['mailSubject'] = trans('website.mail_message.contact') . ': ' . $model->name . ' ' . $model->company;

        if ($model->request_product_id) {
            $product_name = Product::where('id', $model->request_product_id)->first();
            $product_name = $product_name->title;

        } else {
            $product_name = "";
        }

        $data['product'] = $product_name;

        $this->mailer
            ->to(config('laraCms.website.option.app.email'))
            ->replyTo($data['email'])
            ->notifyContactFormSubmission($data['mailSubject'], $data)
            ->queue();

        /******************** end email ***********************/

        flash()->success(trans('website.message.contact_feedback'));

        return view('website.feedback', compact('article'));
    }

    /**
     *
     *  File upload  Handlaer
     *  TODO  to be imporved
     *
     * @param $model
     * @param $media
     */
    private function mediaHandler($model, $media)
    {
        //$UM = new UploadManager;
        //$UM->init($media,$model);

        if (Input::hasFile($media) && Input::file($media)->isValid()) {
            $newMedia  = Input::file($media);
            $model_name = strtolower(class_basename($model));
            $destinationPath =  config('laraCms.admin.path.user_upload').'/'.$model_name; // upload path
            $extension 		 = $newMedia->getClientOriginalExtension(); // getting image extension
            $name 			 = basename($newMedia->getClientOriginalName(),'.'.$extension);
            $fileName 		 = str_slug(time().'_'.$name).".".$extension; // renameing image
            $newMedia->move($destinationPath, $fileName); // uploading file to given path
            $model->$media = $model_name.'/'.$fileName;
        }
    }
}