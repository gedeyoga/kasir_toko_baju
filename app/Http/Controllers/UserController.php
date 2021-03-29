<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderByDesc('id')->get();
        return view('pages.user.index' , ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.add');
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
            'name' => 'required|string|min:2',
            'email' => 'required|string|min:2|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('user.index')->with('status','Berhasil menambahkan data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('pages.user.detail' , [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('pages.user.edit' , [
            'data' => $data
        ]);
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
        $validasi = [
            'name' => 'required|string|min:2',
        ];
        $data = [];
        if(!empty($request->password)){
            $validasi = [
                'name' => 'required|string|min:2',
                'password' => 'min:8|confirmed'
            ];
            $request->validate($validasi);
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
        }else{
            $request->validate($validasi);
            $data = $request->except('password');
        }
        User::find($id)->update($data);
        return redirect()->route('user.index')->with('status','Berhasil memperbaharui data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('status','Berhasil menghapus data !');
    }
}
