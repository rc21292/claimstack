<?php

namespace App\Http\Controllers\Employee\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function changePasswordForm()
    {
        $id = Auth::guard('employee')->id();
        $user = Employee::find($id);
        return view('employee.settings.change-password', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $id = Auth::guard('employee')->id();

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',

        ]);

        $user = Employee::find($id);

        if (Hash::check($request->get('current_password'), $user->password)) {

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('employee.password.form')->with('success', 'Password changed successfully!');
        } else {

            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        return redirect()->route('employee.password.form')->with('success', 'Password changed successfully');
    }
}
