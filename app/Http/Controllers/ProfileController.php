<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function editProfile(){
        $user = User::with('userDetail')->find(auth()->user()->id);
        return view('admin.editProfile.home', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'work_at' => 'nullable|string|max:255',
            'profesi' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('users', 'username')->ignore($request->id),
                'regex:/^[a-zA-Z0-9]+$/',
            ],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            // return redirect()->back()->with('error', 'User not found.');
        }

        $user = User::find($request->id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
    
        $userDetail = UserDetail::firstOrNew(['user_id' => $request->id]);
        $userDetail->work_at = $request->work_at;
        $userDetail->profesi = $request->profesi;
        $userDetail->about = $request->about;
        $userDetail->no_hp = $request->no_hp;
        $userDetail->tgl_lahir = Carbon::createFromFormat('Y-m-d', $request->tanggal_lahir);
    
        if ($request->hasFile('cv')) {
            if ($userDetail->cv) {
                Storage::disk('public')->delete($userDetail->cv);
            }
    
            $cvPath = $request->file('cv')->store('cvs/'.$user->username, 'public');
            $userDetail->cv = $cvPath;
        }
    
        if ($request->hasFile('photo')) {
            if ($userDetail->photo) {
                Storage::disk('public')->delete($userDetail->photo);
            }
    
            $photoPath = $request->file('photo')->store('photos/'.$user->username, 'public');
            $userDetail->photo = $photoPath;
        }
    
        $userDetail->save();
    
        return redirect()->route('editProfile')->with('success', 'User detail updated successfully!');
    }
}
