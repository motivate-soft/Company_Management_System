<?php

namespace App\Http\Controllers\Auth;

use App\Model\Plugin;
use App\Model\SMSResponse;
use App\Model\VerifyUser;
use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'type' => true,
            'status' => false,
            'password' => Hash::make($data['password']),
        ]);
        $alsaad = Plugin::where('id', 1)->first();
        if ($alsaad) {
            $digits = 4;
            $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            VerifyUser::create([
                'user_id' => $user->id,
                'code' => $code
            ]);
            $message = "Verification Code: " . $code;
            $client = new Client();
            $url = 'http://www.alsaad2.net/api/sendsms.php?username=alsaad101&password=123456&message=' . $message . '&numbers=966' . $user->phone . '&sender=School&u%20nicode=e&Rmduplicated=1&return=json';

            $res = $client->post($url);
            $body = json_decode($res->getBody());

            SMSResponse::create([
                'code' => $body->Code,
                'message' => $body->MessageIs,
                'phone' => $data['phone'],
                'user_id' => $user->id,
            ]);
        }
        return $user;
    }

    protected function showRegistrationForm()
    {
        return view('frontend.themes.mobile_themes.theme_1.auth.register');
    }
}
