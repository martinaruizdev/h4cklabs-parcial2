<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use Illuminate\Support\Facades\Redis;

class LevelVerificationController extends Controller
{
    public function show(int $id){
        return view('machines.level-verification', [
            'machine' => Machine::findOrFail($id)
        ]);
    }

    public function save(Request $request, int $id){
        $request->session()->put('level-verified', true);

        return to_route('machines.view', ['machine' => $id]);
    }
}
