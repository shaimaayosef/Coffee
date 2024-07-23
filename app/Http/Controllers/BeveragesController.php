<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\Category; // Add this line
use App\Models\Message; // Add this line
use Illuminate\Http\Request;


class BeveragesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::get();
        $unreadMessages = Message::where('is_read', false)->count();
        $beverages = Beverage::get();
        return view('beverages', compact('beverages','messages','unreadMessages'));
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
            'title' => 'required|max:100',
            'content' => 'max:200',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
        ], $messages);
        $isPublished = $request->has('published') ? 1 : 0;
        $isSpecial = $request->has('is_special') ? 1 : 0;
    
        $imgExt = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $path = 'assets/admin/images';
        $request->image->move($path, $fileName);

        Beverage::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'price' => $data['price'],
            'image' => $fileName,
            'category_id' => $data['category_id'],
            'published' => $isPublished,
            'is_special' => $isSpecial,  
        ]);
    
        return redirect('beverages');
    }
    
    /**
     * Get the error messages for the validation rules.
     */
    protected function errMsg()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than :max characters.',
            'content.max' => 'The content may not be greater than :max characters.',
            'price.required' => 'The price field is required.',
            'category_id.required' => 'The category name field is required.',
        ];
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
       
        $messages = Message::get();
        $unreadMessages = Message::where('is_read', false)->count();
        $categories = Category::all();
        return view('addBeverage', compact('categories','messages','unreadMessages'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $messages = Message::get();
        $unreadMessages = Message::where('is_read', false)->count();
        $beverage = Beverage::findOrFail($id);
        $categories = Category::all();
        return view('editBeverage', compact('beverage', 'categories','messages','unreadMessages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $beverage = Beverage::findOrFail($id);
        $messages = $this->errMsg();
        $bevdata = $request->validate([
            'title' => 'required|max:100|min:4',
            'content' => 'max:200',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
        ],$messages);
        $isPublished = $request->has('published') ? 1 : 0;
        $isSpecial = $request->has('is_special') ? 1 : 0;
        $imgExt = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $path = 'assets/admin/images';
        $request->image->move($path, $fileName);
        Beverage::where('id', $id)->update([
            'title' => $bevdata['title'],
            'content' => $bevdata['content'],
            'price' => $bevdata['price'],
            'category_id' => $bevdata['category_id'],
            'published' => $isPublished,
            'is_special' => $isSpecial,
            'image' => $fileName,
        ]);
        if (isset($data['image'])) {
            $beverage->image = $data['image']; 
            $beverage->save();
        }
        return redirect('beverages');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Beverage::where('id',$id)->delete();
        return redirect('beverages');
    }
    
}
