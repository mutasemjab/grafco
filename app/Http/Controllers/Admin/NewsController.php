<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:news-index')->only('index');
        $this->middleware('permission:news-create')->only(['create','store']);
        $this->middleware('permission:news-edit')->only(['edit','update']);
        $this->middleware('permission:news-delete')->only('destroy');
    }

    public function index()
    {
        $items = News::latest()->paginate(20);
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_of_news'=>'required',
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
            'photo'=>'required|image'
        ]);

        $path = uploadImage('assets/admin/uploads', $request->photo);

        News::create([
            'date_of_news'=>$request->date_of_news,
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'photo'=>$path,
        ]);

        return redirect()->route('news.index')->with('success', __('messages.created_success'));
    }

    public function edit(News $news)
    {
        $item = $news;
        return view('admin.news.edit',compact('item'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'date_of_news'=>'required',
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
            'photo'=>'nullable|image'
        ]);

        $path = $news->photo;

        if($request->hasFile('photo')){
            $path = uploadImage('assets/admin/uploads', $request->photo);
        }

        $news->update([
            'date_of_news'=>$request->date_of_news,
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'photo'=>$path,
        ]);

        return redirect()->route('news.index')->with('success', __('messages.updated_success'));
    }

    public function destroy(News $news)
    {
        $news->delete();
        return back()->with('success', __('messages.deleted_success'));
    }
}
