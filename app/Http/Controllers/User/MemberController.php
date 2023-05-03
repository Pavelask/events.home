<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserMemberRequest;
use App\Models\Admin\EventsModel;
use App\Models\Admin\FederalDistrictModel;
use App\Models\Admin\MembersModel;
use App\Models\Admin\MemberStatusModel;
use App\Models\Admin\TerritorialOrganizationsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class MemberController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['role:User']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(EventsModel $event)
    {

        $Member = MembersModel::where('user_id', Auth::user()->id)->where('events_id', $event->id)->first();

        if (!$Member) {
            return redirect()->route('member.create', [
                'event' => $event->id,
            ]);
        }

        if ($Member->user_id != Auth::user()->id) {
            return redirect('404');
        }

        return redirect()->route('member.show', ['event' => $event->id, 'member' => $Member->id ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(EventsModel $event)
    {

        $Member = MembersModel::where('user_id', Auth::user()->id)->where('events_id', $event->id)->get();

//        dd($event);
        $name_to = TerritorialOrganizationsModel::all();
        $Federal = FederalDistrictModel::all();
//
        return view('user.member.add', [
            'Event' => $event,
            'Name_to' => $name_to,
            'Federal' => $Federal
        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserMemberRequest $request)
    {
        $User = User::find(Auth::user()->id);
        $Member = MembersModel::where('user_id', $User->id)->where('events_id', $request->events_id)->first();

        $defaultValue = 1;

        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $validated['confirmation'] = $validated['confirmation'] ?? $defaultValue;

        if(!$Member){
            $Member = $User->member()->updateOrCreate($validated);
        }

        Toast::title('Анкета добавлена!')
            ->autoDismiss(7);

        return redirect()->route('member.show', [
            'event' => $Member->events_id,
            'member' => $Member->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventsModel $event, MembersModel $member)
    {
        if ($member->user_id != Auth::user()->id) {
            return redirect('404');
        }

        $Federal = FederalDistrictModel::find($member->region);
        $name_to = TerritorialOrganizationsModel::find($member->name_to);
        $Mstatus = MemberStatusModel::find($member->confirmation);

        // dd($member->confirmation);

        return view('user.member.show', [
            'Member' => $member,
            'NameTO' => $name_to,
            'Federal' => $Federal,
            'MemberStatus' => $Mstatus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventsModel $event, MembersModel $member)
    {
        if(!$member){
            return redirect('404');
        }

        if($member->user_id != Auth::user()->id){
            return redirect('404');
        }

        $event = EventsModel::where('id', $member->events_id)->first();
        $name_to = TerritorialOrganizationsModel::all();
        $federal = FederalDistrictModel::all();

//        dd(URL::signedRoute('handbook.index', ['user' => 23]));
        return view('user.member.edit', [
            'Member' => $member,
            'event' => $event,
            'name_to' => $name_to,
            'federal' => $federal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserMemberRequest $request, $event, MembersModel $member)
    {

//        dd($request, $member);
        $validator = $request->validated();
        $member->update($validator);

        Toast::title('Анкета обновлена!')
            ->autoDismiss(5);

        return redirect()->route('member.show', [
            'event' => $member->events_id,
            'member' => $member->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
