<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $category = $this->cateRepository->all();
        return view('backend.category', compact('category'));
    } 

    public function store(AddCategoryRequest $request) {
        $fileName = $request->thumbnail->getClientOriginalName();
        $category = new Category;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->thumbnail = $fileName;
        $category->parent = $request->parent;
        $category->save();
        $request->thumbnail->move('upload/', $fileName);
        return back()->with('success', trans('messages.cate.'));
    }
    
    public function edit($id) {
        $category = $this->cateRepository->find($id);
        return view('backend.editcategory', compact('category'));
    }

    public function update(Request $request,$id) {
        $category = $this->cateRepository->find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->parent = $request->parent;
        if($request->hasFile('thumbnail')){
            $thumb = $request->thumbnail->getClientOriginalName();
            $category->thumbnail = $thumb;
            $request->thumbnail->move('upload/', $thumb);
        }
        $category->save();
        return redirect()->route('category-panel')->with('success', trans('messages.cate.'));

    }

    public function delete($id) {
        $this->cateRepository->delete($id);
        return redirect()->route('category-panel')->with('success', trans('messages.cate.'));
    }
}
