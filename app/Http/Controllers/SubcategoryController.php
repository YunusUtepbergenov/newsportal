<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id','>', 0)->paginate(5);
        return view('admin.subcategory.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::where('parent_id', 0)->get();
        return view('admin.subcategory.create')->withParents($parents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|unique:categories|max:15',
            'name_ru' => 'required|unique:categories|max:15',
            'parent_id' => 'required'
        ]);
        $category = Category::insert($validated);
        return Redirect()->route('subcategory.index')->with('message', 'Subcategory created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $parents = Category::where('parent_id', 0)->get();

        return view('admin.subcategory.edit')->withCategory($category)->withParents($parents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_en' => 'required|max:15',
            'name_ru' => 'required|max:15',
            'parent_id' => 'required'
        ]);
//dd($validated);
        $category = Category::find($id);
        $category->name_en = $validated['name_en'];
        $category->name_ru = $validated['name_ru'];
        $category->parent_id = $validated['parent_id'];

        $category->save();

        return Redirect()->route('subcategory.index')->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return Redirect()->route('subcategory.index')->with('message', 'Category deleted successfully');
    }
}
