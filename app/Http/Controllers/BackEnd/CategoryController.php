<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function listCategory() {
        $category = $this->cateRepository->all();
        return view('backend.category', compact('category'));
    } 

    public function postAddCate(AddCategoryRequest $request) {
        $fileName = $request->thumbnail->getClientOriginalName();
        $category = new Category;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->thumbnail = $fileName;
        $category->parent = $request->parent;
        $category->save();
        $request->thumbnail->move('upload/', $fileName);
        return back()->with('success', 'Thêm danh mục thành công');
    }
    
    public function getEditCate($id) {
        $category = $this->cateRepository->find($id);
        return view('backend.editcategory', compact('category'));
    }

    public function postEditCate(Request $request,$id) {
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
        return redirect()->route('category-panel')->with('success', 'Sửa danh mục thành công!');

    }

    public function deleteCategory($id) {
        $this->cateRepository->delete($id);
        return back()->with('success', 'Xóa danh mục thành công');
    }
}
