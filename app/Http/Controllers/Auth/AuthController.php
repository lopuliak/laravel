<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
    // }
class AuthController extends Controller {
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect()->route('login');
        }
        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);
        return redirect()->route('home');
    }
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => 'password',
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
