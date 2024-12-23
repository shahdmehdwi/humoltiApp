<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Customer\Customer;
use App\Models\Driver\Driver;
use Illuminate\Container\Attributes\DB;
use Illuminate\Routing\Controllers\Middleware;




   class   AuthController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware

{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth:guard', except: ['login']),
        ];
    } 

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth($this->getGuard($credentials['email']))->attempt($credentials))
         { 
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token, $this->getGuard($credentials['email']));
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('guard')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('guard')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token,$guard)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($guard)->factory()->getTTL() * 60,
            'User-type'=>$guard
        ]);
    }
    
private function getGuard($email)
{
    if(Customer::where('email', $email)->first())
{
    return 'customer';
}

else if(Driver::where('email', $email)->first())
{
    return 'driver';
}

else if(Admin::where('email', $email)->first())
{
    return 'admin';
}

}


}