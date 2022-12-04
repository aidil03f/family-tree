<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Family;

class FamilyController extends Controller
{
    use Response;

    public function get_family()
    {
        $query = Family::all();

        if($query->count() == 0){
            return response()->json(['status' => 'error','data'=> null]);
        } else {
            return response()->json(['status' => 'success','data' => $this->resultGetFamily($query)]);
        }
    }
    public function getChildBudi()
    {
        $query = Family::where('parent',1)->get();

        if($query->count() == 0){
            return response()->json(['status' => 'error','data'=> null]);
        } else {
            return response()->json(['status' => 'success','data' => $this->resultGetFamily($query)]);
        }
    }
    public function getGrandchildBudi()
    {
        $query = Family::where('parent','!=',1)->get();

        if($query->count() == 0){
            return response()->json(['status' => 'error','data'=> null]);
        } else {
            return response()->json(['status' => 'success','data' => $this->resultGetFamily($query)]);
        }
    }
    public function getGranddaughterBudi()
    {
        $query = Family::where([['parent','!=',null||1],['gender','!=','male']])->get();

        if($query->count() == 0){
            return response()->json(['status' => 'error','data'=> null]);
        } else {
            return response()->json(['status' => 'success','data' => $this->resultGetFamily($query)]);
        }
    }
    public function getAunt()
    {
        $query = Family::where('name','Dewi')->get();

        if($query->count() == 0){
            return response()->json(['status' => 'error','data'=> null]);
        } else {
            return response()->json(['status' => 'success','data' => $this->resultGetFamily($query)]);
        }
    }
    public function getMaleCousinFromHani()
    {
        $query = Family::where([['parent','!=',1],['parent','!=',4],['gender','!=','female']])->get();

        if($query->count() == 0){
            return response()->json(['status' => 'error','data'=> null]);
        } else {
            return response()->json(['status' => 'success','data' => $this->resultGetFamily($query)]);
        }
    }
}
