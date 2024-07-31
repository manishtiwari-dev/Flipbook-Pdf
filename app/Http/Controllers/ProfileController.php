<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     dd($request->all());
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();


    //     $validated = $request->validateWithBag('updatePassword', [
    //         'current_password' => ['required', 'current_password'],
    //         'password' => ['required', Password::defaults(), 'confirmed'],
    //     ]);

    //     $request->user()->update([
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }


    public function update(Request $request)
    {
       // dd($request->all());
        $user_id = Auth::user()->id;

    
        // // validation check
        // $validator = Validator::make($request->all(), [
        //     'first_name' => 'required|string|max:255',
        //     // 'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'contact' => 'required',
        //     'date_of_birth' => 'required|date',
        //     'gender' => 'required',
        // ], [
        //     'first_name.required' => 'NAME_REQUIRED',
        //     'first_name.max' => 'NAME_MAX',
        //     'contact.required' => 'CONTACT_REQUIRED',
        //     'date_of_birth.required' => 'DOB_REQUIRED',
        //     'gender.required' => 'GENDER_REQUIRED',
        // ]);


        $updateData = $request->only('name', 'email');
        if ($request->has('password') && !empty($request->password)) {
            $updateData['password'] = Hash::make($request->password);
        }

    
        $userInfo = User::find($user_id);


        $status = $userInfo->update($updateData);

       
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
