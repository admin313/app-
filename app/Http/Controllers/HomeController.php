<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function sendMail()
    {
        $details['to'] = 'harsukh21@gmail.com';
        $details['name'] = 'Receiver Name';
        $details['subject'] = 'Hello Laravelcode';
        $details['message'] = 'Here goes all message body.';

        SendMailJob::dispatch($details);

        return response('Email sent successfully');
    }

    public function SetPhone()
    {

        return view('SetPhone');
    }

    public function SetPhoneSave(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone'=>'required',
        ]);
//        dd($request);

        $input = $request->all();
        $input['phone'] = $request->input('phone');
        $input['Check_phone'] = "1";
//        dd($input);
        $user=User::find(auth()->user()->id);
//        dd($user);
        $user->update($input);
        SendEmail::dispatch($user);
        return redirect()->to('/home');
    }
}
