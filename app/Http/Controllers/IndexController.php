<?php

    namespace App\Http\Controllers;

    use App\Models\Qtoken;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Support\Facades\Auth;

    class IndexController extends Controller
    {
        //
        public function index(): Factory|View|Application
        {
            $token = md5(Carbon::now());
            $tokens = Qtoken::create([
                'user_id' => null,
                'token' => $token,
                'yes_time' => null,
            ]);

            return view('index', [
                'url' => \request()->url().'/verify/'.$tokens->token,
                'token' => $tokens->token
            ]);
        }

        public function Q_login(): JsonResponse
        {
            if (!\request()->has('token')) {
                return response()->json(['code' => 2004, 'message' => 'token不存在']);
            }
            $tokens = Qtoken::where('token', \request('token'))->first();
            if (!empty($tokens->token)) {
                $user = User::find($tokens->user_id);
                if (!$user){
                    return response()->json(['code' => 2004, 'message' => '未登录']);
                }
                Auth::login($user);
                \request()->session()->regenerate();
                return response()->json(['code' => 2001, 'message' => '授权成功', 'url' => route('dashboard')]);
            }
            return response()->json(['code' => 2004, 'message' => '未授权，或授权失败']);
        }


    }
