<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        return view('admin.pages.student.index',compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::all();
        return view('admin.pages.student.add', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Students();
        $students->name= $request ->input('name');
        $students->class_id= $request ->input('class_id');
        $students->f_name= $request ->input('f_name');
        $students->m_name= $request ->input('m_name');
        $students->address= $request ->input('address');
        $students->phone= $request ->input('phone');

        $students->save();
        Session::flash('success', 'Student Added');
        return Redirect::route('students.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Students::find($id);
        $classes = Classes::all();
        return view('admin.pages.student.edit', compact('students', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $students = Students::find($id);
        $students->name= $request ->input('name');
        $students->class_id= $request ->input('class_id');
        $students->f_name= $request ->input('f_name');
        $students->m_name= $request ->input('m_name');
        $students->address= $request ->input('address');
        $students->phone= $request ->input('phone');
        $students ->update();
        Session::flash('success', 'Student Information Updated');
        return Redirect::route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Students::find($id);
        $students ->delete();
        Session::flash('warning', 'Information Deleted');
        return Redirect::route('students.index');
    }
}
