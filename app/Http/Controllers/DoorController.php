<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class DoorController extends Controller
{
    public function toggleDoor() {
        $proproperty = Property::where('slug', 'isOpened')->first();
        if($proproperty->value === "true") {
            $proproperty->value = "false";
        } else {
            $proproperty->value = "true";
        }

        $proproperty->save();
    }

    public function openDoor() {
        $proproperty = Property::where('slug', 'isOpened')->first();
        $proproperty->value = "true";
        $proproperty->save();
    }

    public function closeDoor() {
        $proproperty = Property::where('slug', 'isOpened')->first();
        $proproperty->value = "false";
        $proproperty->save();   
    }
}
