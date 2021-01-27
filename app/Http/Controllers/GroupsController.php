<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Friends;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderBy('id', 'desc')->paginate(2);
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
        $request->validate([
            'name' => 'required|unique:groups|max:255',
            'description' => 'required|numeric',
        ]);

        $groups = new Groups;
        $groups->name = $request->name;
        $groups->description = $request->description;

        $groups->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = Groups::where('id', $id)->first();
        return view('groups.show', ['group' => $groups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Groups::where('id', $id)->first();
        return view('groups.edit', ['groups' => $groups]);
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

        Groups::find($id)->update([
        'name' => $request->name,
        'description' => $request->description,
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
        Groups::find($id)->delete();
        return redirect('/');
    }

    public function addmember($id)
    {
        $friends = Friends::where('groups_id', '=', 0)->get();
        $groups = Groups::where('id', $id)->first();
        return view('groups.addmember', ['group' => $groups, 'friends' => $friends]);
    }

    public function updatemember(request $request, $id)
    {
        $friends = Friends::where('id', $request->friends_id)->first();
        Friends::find($friends->id)->update([
            'groups_id' => $id
        ]);

        return redirect('/groups/addmember/' . $id);
    }

    public function deletemember(Request $request, $id)
    {
        Friends::find($id)->update([
            'groups_id' => 0
        ]);
        
        return redirect('/groups');
    }
}
