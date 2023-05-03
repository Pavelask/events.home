<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\EventFaqModel;
use App\Models\Admin\EventsModel;
use App\Models\Admin\MembersModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $Member = '';

        if($user->hasRole('Admin')){
            return redirect()->route('main.index');
        }

        $Event = EventsModel::where('status', 1)->orderBy('created_at', 'asc')->first();
        if($Event) {
            $Member = MembersModel::where('user_id', Auth::user()->id)->where('events_id', $Event->id)->first();
        }
        $faq = EventFaqModel::all();

        return view('dashboard',[
            'Event' => $Event,
            'FAQ' => $faq,
            'Member' => $Member
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
