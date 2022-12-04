<?php

namespace App\Http\Traits;

use App\Models\Family;

trait Response
{
    public function resultGetFamily($data)
    {
        foreach($data as $item){
            $results[] = [
                'id' => $item->id,
                'name' => $item->name,
                'gender' => $item->gender,
                'parent' => $item->parent == null ? null : Family::find($item->parent)->name,
                'statusFamily' => $item->status_family,
                'DateCreated' => $item->created_at->format('d/m/Y'),
                'DateUpdated' => $item->updated_at->format('d/m/Y')
            ];
        }
        return $results;
    }
}