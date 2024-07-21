<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::get();
        return view('messages', compact('messages'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ], $messages);

        $message = Message::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);

        $mailData=$message->toArray();
        $mailData['theMessage'] = $data['message'];
        Mail::to('coffee@info.com')->send(new Contact($mailData));
        return redirect()->route('main')->with('success', 'Mail sent!');
    }
    /**
     * Get the error messages for the validation rules.
     */
    protected function errMsg()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'message.required' => 'The message field is required.',
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $oneMessage = Message::findOrFail($id);
        return view('showMessage', compact('oneMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Message::where('id',$id)->delete();
        return redirect('messages');
    }

   
}
