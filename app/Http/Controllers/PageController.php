<?php

namespace App\Http\Controllers;

use App\Page;
use App\Http\Controllers\Controller;
use App\Tag;

class PageController extends Controller
{
    /**
     * Show Page
     *
     * @param  Page $page
     * @return \BladeView|bool|\Illuminate\View\View
     */
    public function __invoke(Page $page)
    {
        $data['page_title'] = ucfirst($page->title);
        $data['page'] = $page;
        return view('frontend.page', $data);
        //return view("pages.page", compact("page"));
    }

    public function about(){
        $data['page_title'] = 'A propos de nous';
        return view('frontend.about', $data);
    }

    public function contact(){
        $data['menu'] = 'contact';
        $data['page_title'] = 'Nous contacter';
        if (get_buzzy_config('p_buzzycontact') != 'on') {
            return redirect()->route('home');
        }

        $data['labels'] = Tag::byType('maillabel')->pluck('name', 'id');
        return view('frontend.contact', $data);
    }
}
