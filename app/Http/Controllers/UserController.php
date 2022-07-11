<?php

namespace App\Http\Controllers;

use App\Models\Qtoken;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function verifyToken($token): View|Factory|Application|RedirectResponse
    {
        session()->flash('token',$token);
        Qtoken::where('token', $token)->update([
            'is_qr' => 1
        ]);

        return view('verify');
    }

    public function verify(): RedirectResponse
    {
            $token = session('token');
            $tokens = Qtoken::where([
                'token' => $token,
            ])->update([
                'user_id' => \auth()->user()->id,
                'yes_time' => Carbon::now()
            ]);
            if ($tokens) {
                return redirect()->route('dashboard');
            }
            return back();
        }

}
