<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\Category; // Add this line
use Illuminate\Http\Request;


class BeveragesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beverages = Beverage::get();
        return view('beverages', compact('beverages'));
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
            'category_name' => 'required|max:100',
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
            'category_name' => $data['category_name'],
            'published' => $isPublished,
            'is_special' => $isSpecial,
            'image' => $fileName,
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
            'category_name.required' => 'The category name field is required.',
            'category_name.max' => 'The category name may not be greater than :max characters.',
        ];
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
       
        $categories = Category::all();
        return view('addBeverage', compact('categories'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $beverage = Beverage::findOrFail($id);
        return view('editBeverage', compact('beverage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $bevdata = $request->validate([
            'title' => 'required|max:100|min:4',
            'content' => 'max:200',
            'price' => 'required',
            'published' => true,
            'is_special' => false,
            'image' => 'required',
            'category_name' => 'required|max:100',
        ],$messages);
        $bevdata['published'] = isset($request->published);
        $bevdata['is_special'] = isset($request->is_special);
        $imgExt = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $path = 'assets/admin/images';
        $request->image->move($path, $fileName);
        $data['image'] = $fileName;
        Beverage::where('id', $id)->update($bevdata);
        return redirect('beverages');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
