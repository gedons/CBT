<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DeptStoreRequest;
use App\Models\Department;

class DeptController extends Controller
{
    public function add()
    {
       return view('admin.dept.add');
    }

    public function save(DeptStoreRequest $request)
    {
  
        Department::create([
            'name' => $request->name,
        ]);
        return Redirect(route('admin.department'))->with('message', 'Department Created Successfully!!');

    }
}
