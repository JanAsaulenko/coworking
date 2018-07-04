<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Mail\MailClass;
use Illuminate\Http\Request;
use Illuminate\Notifications\Channels\MailChannel;
use Illuminate\Support\Facades\Mail;

class SendContactsController extends Controller
{
    use ValidatesRequests;
    public function send_form(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'theme'=>'required',
            'message'=>'required'
        ]);

        $name=$request->name;
        $email=$request->email;
        $theme=$request->theme;
        $messages=$request->message;

        Mail::send('contacts.contact_mail', array('name' => $name,
                                        'email'=>$email,
                                        'theme'=>$theme,
                                        'messages'=>$messages), function($message)
        {
            $message->to('intita.hr@gmail.com', 'Dear admin')->subject( "Нове повідомлення з сайту");
        });

        return redirect('contacts') ;
    }

}
