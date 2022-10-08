<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $userEmail = User::where('email', $request->email)->first(); // Get the user with the same email as the request
        $userPassword = User::where('password', $request->password)->first(); // Get the user with the same password as the request
        //if the credentials match with the admin's credentials -> create token and send the response
        if ($userEmail && $userPassword) {
            $success['token'] =  $userEmail->createToken('user-token')->plainTextToken;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => "Identifiants incorrects"], 401); //Otherwise send an error message
        }
    }

    /**
     * Logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete(); //delete current token 

        return response()->json([
            'message' => 'Successfully logged out' // return response 
        ]);
    }
}
