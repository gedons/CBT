<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LevelStoreRequest;
use App\Models\Level;

class LevelController extends Controller
{
    public function add()
    {
       return view('admin.level.add');
    }

    public function save(LevelStoreRequest $request)
    {
  
        Level::create([
            'name' => $request->name,
        ]);
        return Redirect(route('admin.level'))->with('message', 'Level of Study Created Successfully!!');

    }
}
