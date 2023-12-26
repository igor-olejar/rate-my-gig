<?php

namespace App\Http\Controllers;

use App\Enums\AccountType;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Town;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $towns = Town::all(['id', 'name', 'county'])->sortBy('name');
        $availableTowns = [];

        foreach ($towns as $town) {
            $availableTowns[] = ['id' => $town->id, 'name' => $town->name.', '.$town->county];
        }

        $accountTypes = array_column(AccountType::cases(), 'name', 'value');

        return view('profile.edit', [
            'user' => $request->user(),
            'availableTowns' => $availableTowns,
            'accountTypes' => $accountTypes,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
