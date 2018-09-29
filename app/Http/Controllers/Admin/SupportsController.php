<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Support;
use App\SupportQuestion;
use Redirect;

class SupportsController extends Controller {

    public function index() {
        $data['supports'] = Support::all();
        return view('admin.supports.index', $data);
    }

    public function create() {
        return View('admin.supports.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'name_en' => 'required',
            'logo' => 'required',
            'description' => 'required',
            'description_en' => 'required'
        ]);
        // upload   image
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $logoName = str_random(30) . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(
                    public_path() . '/images/supports/', $logoName
            );
            $data['logo'] = $logoName;
        }
        Support::create($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['support'] = Support::findOrFail($id);
        return view('admin.supports.edit', $data);
    }

    public function update(Request $request, $id) {
        $support = Support::findOrFail($id);

        // upload   image
        $data = $request->all();
        if ($request->hasFile('logo')) {
            if ($support->logo) {
                \File::delete(public_path() . '/images/supports/' . $support->logo);
            }
            $logoName = str_random(30) . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(
                    public_path() . '/images/supports/', $logoName
            );
            $data['logo'] = $logoName;
        }
        $support->fill($data)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح');
    }

    public function destroy($id) {
        $support = Support::findOrFail($id);
        $support->delete();
        if ($support->logo) {
            \File::delete(public_path() . '/images/supports/' . $support->logo);
        }
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

    public function showQuestions($id) {
        $data['support'] = Support::find($id);
        $data['SupportQuestions'] = SupportQuestion::all();
        return view('admin.supports.showQuestions', $data);
    }

    public function storeQuestion(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'title_en' => 'required',
            'details' => 'required',
            'details_en' => 'required'
        ]);
        SupportQuestion::create($request->all());
        return redirect()->back()->with('success', 'لقد تمت عملية الاضافة  بنجاح');
    }

    public function editQuestion($id) {
        $data['question'] = SupportQuestion::find($id);
        return view('admin.supports.editQuestion', $data);
    }

    public function updateQuestion(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'title_en' => 'required',
            'details' => 'required',
            'details_en' => 'required'
        ]);
        SupportQuestion::find($id)->update($request->all());
        return redirect()->back()->with('success', 'لقد تمت عملية التعديل  بنجاح');
    }

    public function deleteQuestion($id) {
        SupportQuestion::find($id)->delete();
        return view('admin.supports.editQuestion', $data);
    }

}
