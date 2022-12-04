<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $table = 'family';
    protected $fillable = ['name','gender','parent','status_family'];

    public function parentDetail()
    {
        if(!$this->parent){
            return null;
        } else {
            $family = Family::where('id',$this->parent)->pluck('name')[0];
            return $family ? $family : null;
        }
    }
}
