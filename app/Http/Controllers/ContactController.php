<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::all();
        $search = $request->get("search");
        if (!(empty($search))) {
            $contacts = Contact::where('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('tel', 'like', '%' . $search . '%')
            ->orWhere('comment', 'like', '%' . $search . '%')
            ->get();
        }
        

        return view("contacts.index", ["contacts" => $contacts, "search" => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contacts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $inputs = $request->all();
        $inputs = $request->except("_token");
        $contact = new Contact;
        foreach ($inputs as $key => $value) {
            $contact->$key = $value;
        }
        $contact->save();
        return redirect(route("contacts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        // get the contact et l'envoyer avec la view
        return view("contacts.show", ["contact" => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view("contacts.edit", ["contact" => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $inputs = $request->except("_token", "_method");
        $updateContact = Contact::find($contact['id']);
        foreach ($inputs as $key => $value) {
            $updateContact->$key = $value;
        }
        $updateContact->save();

        return redirect(route("contacts.show", ["contact"=> $contact]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        print_r($contact["id"]);
        Contact::find($contact["id"])->delete();
        return redirect(route('contacts.index'));
    }

    public function details($id){
        $contact = Contact::find($id);
        return view('contacts.show', ['contact' => $contact]);
    }
}
