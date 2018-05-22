<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function show(Request $request, $slug)
    {
        $property = Property::where('slug', $slug)->first();

        if(!$property) { 
            abort(403, 'Unauthorized action.'); 
        }

        if(!$request->input('getObject')) {
            return $property->value;
        } 

        return $property;
    }
}
