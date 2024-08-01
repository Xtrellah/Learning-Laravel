<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function getAllCatagories()
    {
        $catagories = Catagory::all()->makeHidden(['created_at', 'updated_at']);

        return $catagories;
    }
}
