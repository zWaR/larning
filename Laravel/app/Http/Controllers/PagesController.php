<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
    	$people = [
            'Taylor Otwell', 'Dayle Reese', 'Eric Barnes'
        ];
        // $people = [];

    	return view('about', compact('people'));
    }

    public function contact()
    {
        return view('pages/contact');
    }
}
