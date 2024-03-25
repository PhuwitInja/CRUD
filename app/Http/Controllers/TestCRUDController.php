<?php

namespace App\Http\Controllers;
use App\Models\CRUD;
use Illuminate\Http\Request;

class TestCRUDController extends Controller
{
    //Create Index
    public function index(){
        $students = CRUD::orderBy('id', 'asc')->paginate(5);
        return view('info.index', compact('students'));
    }


    public function create(){
        return view('info.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $crud = new CRUD;
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->address = $request->address;
        $crud->save();
        return redirect() -> route('info.index') ->with('success', 'Student has been create succesfully');
    }

    public function edit($id){
        $info = CRUD::find($id);
        return view('info.edit', compact('info'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $crud = CRUD::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->address = $request->address;
        $crud->save();
        return redirect() -> route('info.index') ->with('success', 'Student has been updated succesfully');
    }

    public function destroy($id){
        $student = CRUD::find($id);
        $student->delete();
        return redirect() -> route('info.index') ->with('success', 'Student has been deleted succesfully');
    }
}
