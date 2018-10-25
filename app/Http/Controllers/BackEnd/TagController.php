<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function listTag() {
        $tags = $this->tagRepository->all();
        return view('backend.listtag', compact('tags'));
    }

    public function addTag(Request $request) {
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();
        return back()->with('success', 'Thêm tag thành công!');
    }

    public function getEditTag($id) {
        $tags = $this->tagRepository->find($id);
        return view('backend.edittag', compact('tags'));
    }

    public function postEditTag(Request $request, $id) {
        $tag = $this->tagRepository->find($id);
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();
        return redirect()->route('tag-panel')->with('success', 'Chỉnh sửa thành công!');
    }
}
