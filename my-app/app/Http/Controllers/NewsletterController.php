<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class NewsletterController extends Controller
{
   public function __invoke(Newsletter $newsletter)
   {
    request()->validate([
        'email' => 'required|email'
    ]);

    try{
        $newsletter->subscribe(request('email'));
    } catch(Exception $e) {
        throw ValidationValidationException::withMessages([
            'email' => "This email can't be added"
        ]);
    }
    return redirect('/')->with('success','You subscribe to the newsletter.');
   }
}
