<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\PublicationState;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function show(Request $request, $id)
    {
        $practice = Practice::find($id);
        if ($request->user()->cannot('view',$practice)) return redirect(route('home')); // TODO remove this test on slug that doesn't belong here! define a policy instead

        return view('practice.show')->with(['practice' => $practice]);
    }

    public function showAll()
    {
        if (! Gate::allows('list-all-practices', Auth::user())) {
            abort(403);
        }
        return view('practice.list_all')->with(['practices' => Practice::all()]);
    }

    /**
     * Publish a practice
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function publish(Request $request)
    {
        $practice = Practice::find($request->input('practice'));
        if ($request->user()->cannot('publish', $practice)) {
            abort(403);
        }
        $practice->publish();
        return redirect(route('home'))->with('success',"Pratique publiée");
    }
}
