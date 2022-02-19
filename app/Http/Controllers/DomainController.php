<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DomainController extends Controller
{
    public function index(Request $request,$id)
    {
        if ($id == 0) { // show all
            Session::remove('domain');
            return redirect(route('home'));
        }
        $domain = Domain::find($id);
        Session::put('domain',$id);
        return view('domain.published')->with(['domain' => $domain]);
    }
}
