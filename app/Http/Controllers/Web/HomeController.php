<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
     * Home page
     */
    public function index()
    {
        // Set meta tags
        Meta::setTitle('Merion Academy | Home page')
            ->setCharset('utf-8')
            ->setDescription('Блог Merion Academy: интересное о разработке, DevOps, серверах, сетях и телефонии')
            ->addMeta('og:title', [
                'content' => 'Merion Academy | IT база знаний',
            ])
            ->addMeta('og:description', [
                'content' => 'Блог Merion Academy: интересное о разработке, DevOps, серверах, сетях и телефонии',
            ])
        ;
        return view('index');
    }

}
