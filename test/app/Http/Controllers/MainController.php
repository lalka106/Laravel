<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function login()
    {
        return view('login');
    }


    public function review()
    {
        $reviews = new Contact();
        return view('review', ['reviews' => $reviews->all()]);
    }

    public function showContactForm()
    {
        return view('contact_form');
    }

    public function contactForm(ContactFormRequest $request)
    {
        Mail::to("edik66948@gmail.com")->send(new ContactForm($request->validated()));
        return redirect(route("contacts"));
    }

}
