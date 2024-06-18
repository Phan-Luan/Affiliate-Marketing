<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::where('user_id', users()->user()->id)->orderBy('id','DESC')->paginate(20);
        return view('user.contact.index')->with(compact('contacts'));
    }

    public function contact_view() {
        return view('web.pages.contact_user');
    }
    public function contact_post(Request $request) {
        $data = $request->only('name','phone','address','birth','type','note');
        if($request->user_phone) {
            $user = User::where('phone',$request->user_phone)->first();
            if($user) {
                $data['user_id'] = $user->id;
            } else {
                $data['user_id'] = 2;
            }
        } else {
            $data['user_id'] = 2;
        }
        Contact::create($data);
        session()->flash('success', 'Cảm ơn bạn đã để lại thông tin! Chúng tôi sẽ liên hệ với bạn sớm nhất!');
        return redirect()->back();
    }
}
