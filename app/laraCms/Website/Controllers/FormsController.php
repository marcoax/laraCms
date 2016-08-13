<?php
namespace App\LaraCms\Website\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LaraCms\Website\Requests\WebsiteFormRequest;
use Input;
use Validator;
use App\Contact;
use App\LaraCms\Website\Repos\Article\ArticleRepositoryInterface;

class FormsController extends Controller
{

    protected $articleRepo;


    /**
     * @return mixed
     */

    public function __construct(ArticleRepositoryInterface $article)
    {
        $this->articleRepo = $article;
    }


    public function getContactUsForm( WebsiteFormRequest $request  ) {
        $slug = 'contact';
        $this->request = $request;
        $model = new  Contact;
        foreach ($model->getFillable() as $a) {
            $model->$a = $this->request->get($a);
        }
        $model->save();
        $article = $this->articleRepo->getBySlug($slug);;

        /****************** send confirm email ***************/
        $data = $request->only('name', 'email', 'surname','subject');
        $data['messageLines'] = explode("\n", $request->get('message'));
        $data['mailSubject']  = trans('website.mail_message.contact').':'.$data['name'].' '.$data['surname'];

        Mail::send('emails.contact', $data,function ($message) use ($data) {
            $message->subject( $data['mailSubject'] )
                ->to('userslaracms@gmail.com')
                ->replyTo($data['email']);
        });
        /******************** end email ***********************/
        flash()->success(trans('website.message.contact_feedback'));
        return view('website.feedback',compact('article'));
    }
}