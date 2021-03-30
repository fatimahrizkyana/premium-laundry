<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
Use Alert;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::all();
        $data = [
            'outlets' => $outlets,
        ];
        return view('admin.management.outlets.index', $data);
    }

    public function create()
    {
        $cities = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32'); //Provinsi Jabar
        $cities = json_decode($cities->body())->kota_kabupaten;
        $data = [
            'cities' => $cities
        ];
        return view('admin.management.outlets.create', $data);
    }

    public function store(Request $request)
    {
        Validator::validate($request->all(), [
            'outlet_name' => ['required', 'min:3', 'max:100'],
            'phone_number' => ['required', 'numeric', 'min:8'],
            'address' => ['required'],
            'city' => ['required'],
            'status' => ['required'],
        ]);

        $outlet = new Outlet([
            'name' => $request->input('outlet_name'),
            'phone' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'status' => $request->input('status'),
        ]);

        if ($outlet->save()) {
            Alert::success('Create Outlet', 'Success create outlet');
            return redirect()->route('admin.outlet.index');
        } else {
            Alert::error('Create Outlet', 'Failed create outlet');
            return redirect()->back();
        }
    }

    public function show(Outlet $outlet)
    {
        //
    }

    public function edit(Outlet $outlet)
    {
        $cities = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32'); //Provinsi Jabar
        $cities = json_decode($cities->body())->kota_kabupaten;
        
        $data = [
            'outlet' => $outlet,
            'cities' => $cities
        ];
        return view('admin.management.outlets.edit', $data);
    }

    public function update(Request $request, Outlet $outlet)
    {
        Validator::validate($request->all(), [
            'outlet_name' => ['required', 'min:3', 'max:100'],
            'phone_number' => ['required', 'numeric', 'min:8'],
            'address' => ['required'],
            'city' => ['required'],
            'status' => ['required'],
        ]);
        
        $outlet->name = $request->input('outlet_name');
        $outlet->phone = $request->input('phone_number');
        $outlet->address = $request->input('address');
        $outlet->city = $request->input('city');
        $outlet->status = $request->input('status');

        if ($outlet->save()) {
            Alert::success('Update Outlet', 'Success update outlet');
            return redirect()->route('admin.outlet.index');
        } else {
            Alert::error('Update Outlet', 'Failed update outlet');
            return redirect()->back();
        }
    }

    public function destroy(Outlet $outlet)
    {
        if ($outlet->delete()) {
            Alert::success('Delete Outlet', 'Success delete outlet');
        } else {
            Alert::error('Delete Outlet', 'Failed delete outlet');
        }

        return redirect()->route('admin.outlet.index');
    }
}
