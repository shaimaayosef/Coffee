<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\Category;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the resource.
     */

    public function showInMain()
    {
        $categories = Category::with('beverages')->get();
        $beverages = Beverage::get();
        return view('main', compact('categories','beverages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('editUser', compact('user'));
    }

    public function addForm()
    {
        return view('addUser');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = $this->errMsg();
        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'username' => 'required|max:100|min:5',
            'email' => 'required|email:rfc',
        ],$message);
        $data['password'] = bcrypt($request->password);
        $data['active'] = isset($request->active);
        User::where('id', $id)->update($data);
        return redirect('home');
    }

    protected function errMsg()
{
    return [
        'name.required' => 'A name is required',
        'name.max' => 'The name may not be greater than 100 characters',
        'username.required' => 'A username is required',
        'username.max' => 'The username may not be greater than 100 characters',
        'username.min' => 'The username must be at least 5 characters',
        'email.required' => 'An email is required',
        'email.email' => 'The email must be a valid email address',
    ];
}

    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|max:100|min:5',
            'email' => 'required|email:rfc',
            'password' => 'required|max:100|min:5',
        ], $messages);
        $isActive = $request->has('active') ? 1 : 0;
        $hashedPassword = bcrypt($request->password);

        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $hashedPassword,
            'active' => $isActive,
        ]);
    
        return redirect('home');
    }

}
