<?php

namespace App\Http\Controllers;

use App\Key;
use Illuminate\Http\Request;
use App\Property;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //return Key::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function show(Key $key)
    {
        return $key;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function edit(Key $key)
    {
        return null;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Key $key)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function destroy(Key $key)
    {
        //
    }

    public function toggle(Request $request, $keySlug) {
        $this->validateKey($keySlug);

        $proproperty = Property::where('slug', 'isOpened')->first();
        if($proproperty->value === "true") {
            $proproperty->value = "false";
        } else {
            $proproperty->value = "true";
        }

        $proproperty->save();
        return $proproperty;
    }

    public function open(Request $request, $keySlug) {
        $this->validateKey($keySlug);

        $proproperty = Property::where('slug', 'isOpened')->first();
        $proproperty->value = "true";
        $proproperty->save();
        return $proproperty;
    }

    public function close(Request $request, $keySlug) {
        $this->validateKey($keySlug);

        $proproperty = Property::where('slug', 'isOpened')->first();
        $proproperty->value = "false";
        $proproperty->save();
        return $proproperty;   
    }

    private function validateKey($keySlug) {
        $key = Key::where('hash', $keySlug)->first();
        if(!$key || !$key->active) { 
            abort(403, 'Unauthorized action.'); 
        }
    }


}
