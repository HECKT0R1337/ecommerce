<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class AdminController extends Controller
{

    public function list()
    {
        //Alert::info('Success Title', 'Success Message');
        $data = ['header_title' => 'Admins List'];
        $admins = User::where('is_admin', 1)->paginate(5);
        return view('admin.admin.list', ['admins' => $admins], $data);
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function create(CreateAdminRequest $request)
    {
        $hashedPassword = Hash::make($request->password);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'is_admin' => 1
        ];
        $create = User::create($data);
        if ($create) {
            // return redirect()->route('admin.list')->with('success', 'Admin created successfully');
            // return redirect()->route('admin.list')->withSuccess('Admin created successfully');
            // return redirect()->route('admin.list')->withToastSuccess('Admin created successfully');
            return redirect()->route('admin.list')->with('toast_success', 'Admin created successfully');

            // All available toast types 
            // toast_error toast_success toast_info toast_warning toast_question.

        } else {
            // Alert::error('Error title', 'Errrorrrrrrr Message');
            // alert()->error('Success Title', 'Success Messagessssssssssssssssssaa111111111');
            // return redirect()->back()->with('error', 'Something went wrong');
            return back()->with('toast_error', 'Something went wrong!')->withInput();
        }
    }


    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admin.edit', ['admin' => $admin]);
    }

    // select * from _refobjcommon where codename128 like ''

    public function update(UpdateAdminRequest $request)
    {

        if (!empty($request->password)) {
            $hashedPassword = Hash::make($request->password);
        } else {
            $hashedPassword = $request->old_password;
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'is_admin' => 1
        ];
        $update = User::where('id', $request->id)->update($data);
        if ($update) {
            return redirect()->route('admin.list')->with('toast_success', 'Admin updated successfully');
        } else {
            return back()->with('toast_error', 'Something went wrong!')->withInput();
        }
    }

    public function delete($id)
    {
        $admin = User::findOrFail($id)->delete();
        return redirect()->back()->with('toast_success', 'Admin deleted successfully');
    }
}
