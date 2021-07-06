<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Newsletter;
use App\Http\Requests\NewsletterRequest;
use Newsletter;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request){
     
        $validated = $request->validated();

        //$subscriber = new Newsletter();

       // $subscriber->email = $request->email;
       // $subscriber->save();

        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email);
        }

       return redirect()->back()->with(['status' => 'подписка на рассылку успешно']);
    }
}
