<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(auth()->guest()){
        //     abort(403);
        // }

        // if(auth()->user()->username !== 'arif'){
        //     abort(403);
        // }

        // if(auth()->guest() || auth()->user()->username !== 'arif' ) {
        //     abort(403);
        // }
        
        // if(!auth()->check() || auth()->user()->username !== 'arif' ) {
        //     abort(403);
        // }

        // $this->authorize('admin');

        return view('dashboard.categories.index', [
            'title' => 'Categories',
            'categories' => Category::Paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => 'Create Categories',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:25|unique:categories',
            'slug' => 'required|max:25|unique:categories'
        ]);

        Category::create($validateData);

        return redirect('/dashboard/categories')->with('status', 'Data has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',[
            'title' => 'Edit Categories',
            'category' => $category,
            'categories' => Category::Paginate()->withQueryString()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:25|unique:categories'
        ];

        if($request->slug != $category->slug){
            $rules['slug'] = 'required|max:25|unique:categories';
        }

        $validateData = $request->validate($rules);

        Category::where('id', $category->id)->update($validateData);

        return redirect('/dashboard/categories')->with('status', 'Data has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('status', 'Data has been deleted!');
    }
}
