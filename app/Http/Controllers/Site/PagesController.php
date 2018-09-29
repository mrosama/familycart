<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use App;

class PagesController extends Controller {

    public function show($page_id) {
        $data['lang'] = App::getLocale();
        $data['page'] = Page::find($page_id);
        return view('site.page.show', $data);
    }

}
