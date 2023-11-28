<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Upazila;
use App\Models\Zila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.pages.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zilas = Zila::all();
        return view('admin.pages.city.add', compact('zilas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cities = new City();
        $cities->exporter= $request ->input('exporter');
        $cities->importer= $request ->input('importer');
        $cities->factory= $request ->input('factory');
        $cities->zone= $request ->input('zone');
        $cities->zila_id= $request ->input('zila_id');
        $cities->zila_code= $request ->input('zila_code');
        $cities->upazila= $request ->input('upazila');
        $cities->upazila_code= $request ->input('upazila_code');
        $cities->union_name= $request ->input('union');
        $cities->union_code= $request ->input('union_code');
        $cities->mouza= $request ->input('mouza');
        $cities->mouza_code= $request ->input('mouza_code');
        $cities->farmer_id= $request ->input('farmer_id');
        $cities->hatchery= $request ->input('hatchery');
        $cities->mother_collection= $request ->input('mother_collection');
        $cities->fishing_ground= $request ->input('fishing_ground');
        $cities->date= $request ->input('date');

        $cities->save();


        Session::flash('success', 'Information Added');
        return Redirect::route('information.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        $zilas = Zila::all();
        return view('admin.pages.city.show', compact('city', 'zilas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::find($id);
        $zilas = Zila::all();
        return view('admin.pages.city.edit', compact('cities', 'zilas'));
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
        $cities = City::find($id);
        $cities->exporter= $request ->input('exporter');
        $cities->importer= $request ->input('importer');
        $cities->factory= $request ->input('factory');
        $cities->zone= $request ->input('zone');
        $cities->zila_id= $request ->input('zila_id');
        $cities->zila_code= $request ->input('zila_code');
        $cities->upazila= $request ->input('upazila');
        $cities->upazila_code= $request ->input('upazila_code');
        $cities->union_name= $request ->input('union');
        $cities->union_code= $request ->input('union_code');
        $cities->mouza= $request ->input('mouza');
        $cities->mouza_code= $request ->input('mouza_code');
        $cities->farmer_id= $request ->input('farmer_id');
        $cities->hatchery= $request ->input('hatchery');
        $cities->mother_collection= $request ->input('mother_collection');
        $cities->fishing_ground= $request ->input('fishing_ground');
        $cities->date= $request ->input('date');
        $cities ->update();
        Session::flash('success', 'Information Updated');
        return Redirect::route('information.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::find($id);
        $cities ->delete();
        Session::flash('warning', 'Information Deleted');
        return Redirect::route('information.index');
    }
}
