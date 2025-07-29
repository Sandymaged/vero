<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Repositories\OfferRepository;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;
use App\ValueObjects\PasswordValueObject;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    private $userRepository;
    private $uploadRepository;
    private $roleRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository, UploadRepository $uploadRepository, OfferRepository $roleRepository)
    {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
        $this->uploadRepository = $uploadRepository;
        $this->roleRepository = $roleRepository;
        $this->redirectTo = app()->getLocale() . '/' . config('app.admin_path') . $this->redirectTo;

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
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->name =  $data['name'];
        $user->email =  $data['email'];
        $user->password = new PasswordValueObject($data['password']);
        $user->api_token = str_random(60);
        $user->save();

        $defaultOffers = $this->roleRepository->findByField('default', '1');
        $defaultOffers = $defaultOffers->pluck('name')->toArray();
        $user->assignOffer($defaultOffers);

        if(copy(public_path('images/avatar_default.png'),public_path('images/avatar_default_temp.png'))){
            $user->addMedia(public_path('images/avatar_default_temp.png'))
                ->withCustomProperties(['uuid' => bcrypt(str_random())])
                ->toMediaCollection('avatar');
        }

        return $user;
    }
}
