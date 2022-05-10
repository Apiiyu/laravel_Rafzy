<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $hospital = Hospital::where('name', $request->name)->first();

        if ($hospital) {
            return redirect()->route('hospital.index');
        } else {
            return redirect()->back()->with('error', 'Hospital not found');
        }
    }
}
