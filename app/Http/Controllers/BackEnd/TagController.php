<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function index() {
        $tags = $this->tagRepository->all();
        return view('backend.listtag', compact('tags'));
    }

    public function store(Request $request) {
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();
        return back()->with('success', trans('messages.tag.'));
    }

    public function edit($id) {
        $tags = $this->tagRepository->find($id);
        return view('backend.edittag', compact('tags'));
    }

    public function update(Request $request, $id) {
        $tag = $this->tagRepository->find($id);
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();
        return redirect()->route('tag-panel')->with('success', trans('messages.tag.'));
    }

    public function delete($id) {
        $this->tagRepository->delete($id);
        return redirect()->route('tag-panel')->with('success', trans('messages.tag.'));
    }
}
