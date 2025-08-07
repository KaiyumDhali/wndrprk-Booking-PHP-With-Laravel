<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{


    public function index()
    {
        $data['pages'] = Page::orderby('id', 'asc')->paginate(10);
        return view('pages.pages.index', $data)->with('i', (request()->input('pages', 1) - 1) * 5);
    }





    public function create()
    {
        return view('pages.pages.create');
    }


    public function store(Request $request)
    {
        $page = new Page();

        if ($request->hasfile('banner_image')) {
            $request->validate([
                'banner_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image = $request->file('banner_image');
            $name = date('d-m-Y-H-i-s') . '-' . $image->getClientOriginalName();
            $image_path_folder = $image->storeAs('public/images/banner', $name);
            $page->banner_image = 'images/banner/' . $name;

        }

        $page->name = $request->name;
        $page->status = $request->status;
        $page->save();

        return redirect()->route('pages.index')->with('success', 'Created sucessfully.');
    }


    public function show(Page $page)
    {
        //
    }


    public function edit($id)
    {

        $page = Page::find($id);
        return view('pages.pages.edit', compact('page'));
    }


    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        if ($request->hasfile('banner_image')) {
            $request->validate([
                'banner_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image = $request->file('banner_image');
            $name = date('d-m-Y-H-i-s') . '-' . $image->getClientOriginalName();
            $image_path_folder = $image->storeAs('public/images/banner', $name);
            $page->banner_image = 'images/banner/' . $name;
        }

        $page->name = $request->name;
        $page->status = $request->status;
        $page->save();

        return redirect()->route('pages.index')->with('success', 'Created sucessfully.');
    }

    public function bannerDestroy($id)
    {
        $page = Page::find($id);
        if ($page->banner_image != Null) {
            // dd($aboutUs->image);
            Storage::delete($page->banner_image);
            $page->banner_image = Null;
            $page->save();
        }
        return redirect()->route('pages.edit', $page->id)->with('success', 'Image storage successfully deleted.');
    }


    public function destroy($id)
    {
        $page = Page::find($id);
        if ($page->file != Null) {
            Storage::delete($page->file);
        }
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Successfully deleted.');
    }
}
