<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class   driverAuthController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware

{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth:driver', except: ['login']),
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
 
         if (! $token = auth('driver')->attempt($credentials)) {
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
         return response()->json(auth('driver')->user());
     }
 
     /**
      * Log the user out (Invalidate the token).
      *
      * @return \Illuminate\Http\JsonResponse
      */
     public function logout()
     {
         auth('driver')->logout();
 
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
             'expires_in' => auth('driver')->factory()->getTTL() * 60
         ]);
     }
    }