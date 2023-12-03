<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchased;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchased::all();
        return view('admin.pages.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        return view('admin.pages.purchase.add',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchases = new Purchased();
        $purchases->student_id= $request ->input('student_id');
        $purchases->book= $request ->input('book');
        $purchases->b_amount= $request ->input('b_amount');
        $purchases->uniform= $request ->input('uniform');
        $purchases->u_amount= $request ->input('u_amount');
        $purchases->save();

        Session::flash('success', 'Puechase Information Added');
        return Redirect::route('purchase.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Students::all();
        $purchases = Purchased::find($id);
        return view('admin.pages.purchase.edit',compact('students', 'purchases'));
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
        $purchases = Purchased::find($id);
        $purchases->student_id= $request ->input('student_id');
        $purchases->book= $request ->input('book');
        $purchases->b_amount= $request ->input('b_amount');
        $purchases->uniform= $request ->input('uniform');
        $purchases->u_amount= $request ->input('u_amount');
        $purchases ->update();
        Session::flash('success', 'Information Updated');
        return Redirect::route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchases = Purchased::find($id);
        $purchases ->delete();
        Session::flash('warning', 'Information Deleted');
        return Redirect::route('purchase.index');
    }
}
