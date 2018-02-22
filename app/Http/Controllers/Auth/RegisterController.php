<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = '/thanks';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()) 
        {
            $data = $this->create($input)->toArray();
            // return $input;
            $data['token'] = str_random(25);

            $user = User::find($data['id']);
            $user->token = $data['token'];
            $user->lastname = $input['lastname'];
            $user->phone = $input['phone'];
            $user->company = $input['company'];
            $user->address = $input['address'];
            $user->city = $input['city'];
            $user->postcode = $input['postcode'];
            $user->state = $input['state'];
            $user->country = $input['country'];
            $user->save();

            Mail::send('mails.confirmation', $data, function($message) use ($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
            return redirect(route('login'))->with('status', 'Confirmation email has been send. PLease check Your email. ');
        }
        return Redirect::back()->withErrors($validator);
        // return redirect(route('login'))->with('status', $validator->errors()->toArray());
    }

    public function confirmation($token)
    {
        $user = User::where('token',$token)->first();
        if (!is_null($user)) {
            $user->confirmed = 1;
            $user->token = '';
            $user->save();
            return redirect(route('login'))->with('status', 'Your Activation is complete.');
        }
        return redirect(route('login'))->with('status', 'Something went wrong.');
    }
    
}
