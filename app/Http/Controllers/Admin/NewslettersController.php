<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Newsletter;
use Mail;

class NewslettersController extends Controller {

    public function index() {
        $data['newsletters'] = Newsletter::all();
        return view('admin.newsletters.index', $data);
    }

    public function create_letter() {
        return view('admin.newsletters.create_letter');
    }

    public function send_letter(Request $request) {
        $emails = Newsletter::select('email')->get();
        $details = $request->get('details');
        foreach ($emails as $row) {
            $email = $row->email;
            Mail::send('emails.newsletter', $data = ['details' => $details , 'email' => $email ] , function ($message) use($email) {
                $message->from('malky@gmail.com', 'Malky');
                $message->to($email)->subject('النشرة البريدية - موقع المالكي');
            });
        }
        return redirect()->back()->with('success', 'لقد تمت عملية الاسال بنجاح');
    }

    public function destroy($id) {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
