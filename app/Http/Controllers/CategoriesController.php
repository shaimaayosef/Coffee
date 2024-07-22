<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Beverage;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        $beverages = Beverage::get();
        return view('categories', compact('categories','beverages')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $Catdata = $request->validate([
            'category_name' => 'required|max:100|min:4',
        ], $messages);

        Category::create([
            'category_name' => $Catdata['category_name'],
        ]);
    
        return redirect('categories');
    }

    protected function errMsg()
    {
        return [
            'category_name.required' => 'A name is required',
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = $this->errMsg();
        $catdata = $request->validate([
            'category_name' => 'required|max:100|min:4',
        ],$message);
        Category::where('id', $id)->update($catdata);
        return redirect('categories');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $beverages = Beverage::get();
        $categoryID = $request->id;
        
        // Check if category_id exists in beverages
        $CheckOnBeverage = $beverages->where('category_id', $categoryID)->first();
        
        if ($CheckOnBeverage) {
            // Category_name exists in beverages, do not delete
            return redirect('categories')->with('error', 'Cannot delete category. Category is associated with a beverage.');
        }
        
        // Category_name does not exist in beverages, delete category
        Category::where('id', $categoryID)->delete();
        return redirect('categories')->with('success', 'Category deleted successfully.');
    }
}
