<?php

namespace App\Http\Controllers;

use App\models\Contact;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function confirm(ClientRequest $request){
        $inputs = $request->all();
        return view('contact.confirm', ['inputs' => $inputs]);
    }

    public function send(Request $request){
        if($request->action){
            Contact::create([
                'fullname'      =>  $request->get('family-name').$request->get('given-name'),
                'gender'        =>  $request->get('gender'),
                'email'         =>  $request->get('email'),
                'postcode'      =>  $request->get('postcode'),
                'address'       =>  $request->get('address'),
                'building_name' =>  $request->get('building-name'),
                'opinion'       =>  $request->get('opinion'),
            ]);
            return view('contact.thanks');
        }
        else{
            return redirect()->route('contact.index')->withInput();
        }
    }

    public function management(Request $request){
        $params = $request->query();
        if($params){
            $contacts = Contact::search($params)->paginate(10);
            return view('management', ['contacts' => $contacts, 'params' => $params]);
        }
        else{
            return view('management');
        }
    }

    public function delete(Contact $contact){
        $contact->delete();
        return redirect()->back();
    }
}
