<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\Friends;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = groups::orderBy('id', 'desc')->paginate(3);

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the Request...
        $request->validate([
            'name' => 'required|unique:groups|max:255',
            'description' => 'required',

        ]);
        
        $groups = new groups;

        $groups->name = $request->name;
        $groups->description = $request->description;
       

        $groups->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = groups::where('id', $id)->first();
        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = groups::where('id', $id)->first();
        return view('groups.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:groups|max:255',
            'description' => 'required',
        ]);

        groups::find($id)->update([
        'name' => $request->name,
        'description' => $request->description
        ]);

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        groups::find($id)->delete();

        return redirect('/groups');
    }
    public function addmember($id)
    {
        $friend = friends::where('groups_id', '=', 0)->get();
        $group = groups::where('id', $id)->first();
        return view('groups.addmember', ['group' => $group, 'friend' => $friend]);
    }
    public function updatemember(Request $request, $id)
{
        $friend = friends::where('id', $request->friend_id)->first();
        friends::find($friend->id )->update([
        'groups_id' => $id
     
        ]);

        return redirect('/groups');
    }
    public function deletemember(Request $request, $id)
{

        friends::find($friend->id)->update([
        'groups_id' => 0
     
        ]);

        return redirect('/groups');
    }


}
