<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;



class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('id', 'desc') // cara membuat id yang di buat terakhir  menjadi urutan pertama
                           ->paginate(3);
        return view('member.member', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required'
            ]);
            
            // -> cara ketiga create
            Member::create($request->all());
            return redirect('/member')->with('status', 'Data Mahasiswa berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {
        return view('member.edit', compact('member'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $member)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:members'
            ]);

        Member::where('id', $member->id)
        ->update([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
            'email'=> $request->email
            

        ]);

    return redirect('/member')->with('status', 'Data Mahasiswa berhasi di Edit');// ->flesh
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(member $member)
    {
        Member::destroy($member->id);
       return redirect('/member')->with('status', 'Data Mahasiswa berhasil di hapus!');// ->flesh
        //untu menghapus data dan tanpa menghilangkan data di database dengan soft delete
    }
}
