<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

use Laravel\Lumen\Routing\Controller as BaseController;

class AuthController extends BaseController
{
  //Function untuk Login
  function login(Request $request) {
    $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required|min:6'
      ]);

      $email = $request->input('email');
      $password = $request->input('password');

      $user = User::select('email','first_name','last_name','token','password')->where('email', $email)->first();
      if (!$user) {
          return response()->json(['message' => 'Login failed'], 401);
      }

      $isValidPassword = Hash::check($password, $user->password);
      if (!$isValidPassword) {
        return response()->json(['message' => 'Login failed'], 401);
      }

      $generateToken = bin2hex(random_bytes(40));
      $user->update([
          'token' => $generateToken
      ]);

      $data = new \stdClass();
      $data->data = $user;

      return response()->json($data);
  }

  //Function untuk Register
  public function register(Request $request)
  {
      $this->validate($request, [
          'email' => 'required|unique:users|email',
          'password' => 'min:6|required_with:confirmpass|same:confirmpass',
          'confirmpass' => 'min:6'
      ]);

      $email = $request->input('email');
      $first_name = $request->input('first_name');
      $last_name = $request->input('last_name');
      $password = Hash::make($request->input('password'));

      $user = [
          'email' => $email,
          'first_name' => $first_name,
          'last_name' => $last_name,
          'password' => $password
      ];

      if (User::create($user)) {
        $out = [
            "message" => "register_success",
            "code"    => 201,
        ];
    } else {
        $out = [
            "message" => "vailed_regiser",
            "code"   => 404,
        ];
    }
    return response()->json($out, $out['code']);
  }
}
