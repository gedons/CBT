<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ModeStoreRequest;
use App\Models\Mode;

class ModeController extends Controller
{
    public function add()
    {
       return view('admin.mode.add');
    }

    public function save(ModeStoreRequest $request)
    {
  
        Mode::create([
            'name' => $request->name,
        ]);
        return Redirect(route('admin.mode'))->with('message', 'Mode of Study Created Successfully!!');

    }
}
