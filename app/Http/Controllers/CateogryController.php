<?php

namespace App\Http\Controllers;

use App\Models\Cateogry;
use Illuminate\Http\Request;

class CateogryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Cateogry::paginate(2);
        return view('category.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|string|max:255',
            'status'=>'nullable',
        ]);
        Cateogry::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status==true?1:0,
        ]);
        return redirect('/category')->with('status'.'Category Created Succefully');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Cateogry $category)
    {
        return view('category.show',compact(('category')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cateogry $category)
    {
        //
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cateogry $cateogry)
    {
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|string|max:255',
            'status'=>'nullable',
        ]);

        $cateogry->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status==true?1:0,
        ]);
        return redirect('/category')->with('status'.'Category Updated Succefully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cateogry $cateogry)
    {
        //
        $cateogry->delete();
        return redirect('/category')->with('status','Category Deleted  Succefully');
    }
}
