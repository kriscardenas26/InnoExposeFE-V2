<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('index');
    }
    public function store(Request $request){
        $correo = new ContactMail($request->all());
    Mail::to('innoexpose@gmail.com')->send($correo);
    return view('contactanos');
    }
}
