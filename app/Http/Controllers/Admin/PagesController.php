<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use Redirect;

class PagesController extends Controller {

    public function index() {
        $data['pages'] = Page::all();
        return view('admin.pages.index', $data);
    }

    public function create() {
        return View('admin.pages.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'title_en' => 'required',
            'desc' => 'required',
            'desc_en' => 'required',
        ]);
        $input = $request->all();
        Page::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['page'] = Page::findOrFail($id);
        return view('admin.pages.edit', $data);
    }

    public function update(Request $request, $id) {

        $page = Page::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'title_en' => 'required',
            'desc' => 'required',
            'desc_en' => 'required',
        ]);
        $input = $request->all();
        $page->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
