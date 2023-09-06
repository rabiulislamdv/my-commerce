<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use function Ramsey\Collection\Map\get;

class CategoryController extends Controller
{
    private $category;
    private $categories;

    public function index()
    {
        return view('admin.category.index');
    }
public function create(Request $request)
{
   Category::newCategory($request);
    return back()->with('msg',' category info create successfully');
}
    public function manage()
    {
        return view('admin.category.manage',['categories' => Category::all()]);
    }
    public function edit($id)
    {
        return view('admin.category.edit',['category' => Category::find($id)]);
    }
    public function update(Request $request, $id)
    {
        Category:: updateCategory($request, $id);
        return redirect('/category/manage')->with('message','Category Info Updated Successfully');
    }
    public function delete($id)
    {
    Category::deleteCategory($id);
    return redirect('/category/manage')->with('message','Cetegory Info Deleted Successfully');
    }
}
