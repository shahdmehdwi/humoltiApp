<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;


class   adminAuthController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware

{
    
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth:admin', except: ['login']),
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
 
         if (! $token = auth('admin')->attempt($credentials)) {
             return response()->json(['error' => 'Unauthorized'], 401);
         }
 
         return $this->respondWithToken($token);
     }
 
     /**
      * Get the authenticated User.
      *
      * @return \Illuminate\Http\JsonResponse
      */
     public function me()
     {
         return response()->json(auth('admin')->user());
     }
 
     /**
      * Log the user out (Invalidate the token).
      *
      * @return \Illuminate\Http\JsonResponse
      */
     public function logout()
     {
         auth('admin')->logout();
 
         return response()->json(['message' => 'Successfully logged out']);
     }
 
     /**
      * Get the token array structure.
      *
      * @param  string $token
      *
      * @return \Illuminate\Http\JsonResponse
      */
     protected function respondWithToken($token)
     {
         return response()->json([
             'access_token' => $token,
             'token_type' => 'bearer',
             'expires_in' => auth('admin')->factory()->getTTL() * 60
         ]);
     }
 
    

}
