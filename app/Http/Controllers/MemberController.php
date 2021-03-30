<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Alert;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        $data = [
            'members' => $members,
        ];
        return view('admin.management.members.index', $data);
    }

    public function create()
    {
        $cities = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32'); //Provinsi Jabar
        $cities = json_decode($cities->body())->kota_kabupaten;
        $data = [
            'cities' => $cities
        ];
        return view('admin.management.members.create', $data);
    }

    public function store(Request $request)
    {
        Validator::validate($request->all(), [
            'fullname' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'min:3', 'max:100', 'unique:members,email'],
            'password' => ['required', 'min:5', 'max:100'],
            'address' => ['required'],
            'city' => ['required'],
            'gender' => ['required'],
            'phone_number' => ['required', 'numeric', 'min:8'],
        ]);

        $member = new Member([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone_number'),
        ]);

        if ($member->save()) {
            Alert::success('Create Member', 'Success create member');
            return redirect()->route('admin.member.index');
        } else {
            Alert::error('Create Member', 'Failed create member');
            return redirect()->back();
        }
    }

    public function show(Member $member)
    {
        //
    }

    public function edit(Member $member)
    {
        $cities = Http::get('http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32'); //Provinsi Jabar
        $cities = json_decode($cities->body())->kota_kabupaten;
        
        $data = [
            'member' => $member,
            'cities' => $cities
        ];
        return view('admin.management.members.edit', $data);
    }

    public function update(Request $request, Member $member)
    {
        Validator::validate($request->all(), [
            'fullname' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'min:3', 'max:100', 'unique:members,email,' . $member->id],
            'address' => ['required'],
            'city' => ['required'],
            'gender' => ['required'],
            'phone_number' => ['required', 'numeric', 'min:8'],
        ]);

        $member->fullname = $request->input('fullname');
        $member->email = $request->input('email');
        $member->address = $request->input('address');
        $member->city = $request->input('city');
        $member->gender = $request->input('gender');
        $member->phone = $request->input('phone_number');

        if (!empty($request->input('password'))) {
            $member->password = $request->input('password');
        }

        if ($member->save()) {
            Alert::success('Update Member', 'Success update member');
            return redirect()->route('admin.member.index');
        } else {
            Alert::error('Update Member', 'Failed update member');
            return redirect()->back();
        }
    }

    public function destroy(Member $member)
    {
        if ($member->delete()) {
            Alert::success('Delete Member', 'Success delete member');
        } else {
            Alert::error('Delete Member', 'Failed delete member');
        }

        return redirect()->route('admin.member.index');
    }
}
