<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    public function store(Request $request) {
        try {
            $opinion = new Opinion();
            $opinion->practice_id = $request->input('practice');
            $opinion->user_id = Auth::user()->id;
            $opinion->description = $request->input('opinion');
            $opinion->save();
            return redirect('/practices/'.$request->input('practice'))->with('success',"C'est noté!!");
        } catch (\Exception $e) {
            return redirect('/practices/'.$request->input('practice'))->with('error',"Petit malin!! Tu sais pourtant bien que tu n'as droit qu'à une opinion !!!");
        }
    }

    /**
     * Add a comment on an opinion
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function comment (Request $request)
    {
        $opinion = Opinion::find($request->input('opinion'));
        $opinion->comments()->attach(Auth::user(),['comment' => $request->input('comment'), 'points' => $request->input('vote')]);
        return redirect('/practices/'.$opinion->practice->id)->with('success',"C'est noté!!");
    }
}
