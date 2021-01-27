<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friends::orderBy('id', 'desc')->paginate(2);
        return view('friends.index', compact('friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('friends.create');
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
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $friends = new Friends;
        $friends->nama = $request->nama;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;
        $friends->groups_id = $request->groups_id;

        $friends->save();

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
        $friends = Friends::where('id', $id)->first();
        return view('friends.show', ['friend' => $friends]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $friends = Friends::where('id', $id)->first();
        return view('friends.edit', ['friend' => $friends]);
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
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        Friends::find($id)->update([
        'nama' => $request->nama,
        'no_tlp' => $request->no_tlp,
        'alamat' => $request->alamat,
        'groups_id' => $request->groups_id,
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Friends::find($id)->delete();
        return redirect('/');
    }
}
