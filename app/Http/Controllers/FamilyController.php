<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
        $family = Family::orderBy('id','asc')->paginate(10);
        return view('family.index',compact('family'));
    }
    public function create()
    {
        $family = Family::all();
        return view('family.create',compact('family'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'gender' => 'required',
            'status' => 'required',
            'parent' => 'sometimes'
        ]);
        Family::create([
            'name' => $request->name,
            'gender'=> $request->gender,
            'parent' => $request->parent,
            'status_family' => $request->status,
        ]);
        return redirect()->route('family.index');
    }
    public function edit(Family $family)
    {
        return view('family.edit',[
            'family'=> $family,
            'data'  => Family::all()
        ]);
    }
    public function update(Request $request,Family $family)
    {
        $request->validate([
            'name'   => 'required',
            'gender' => 'required',
            'status' => 'required',
            'parent' => 'sometimes'
        ]);
        if($request->status == 'Kepala keluarga'){
            $parent = null;
        } else {
            $parent = $request->parent;
        }
        $family->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'parent' => $parent,
            'status_family' => $request->status,
        ]);
        return redirect()->route('family.index');
    }
    public function destroy(Family $family)
    {
        $family->delete();
        return back();
    }
}
