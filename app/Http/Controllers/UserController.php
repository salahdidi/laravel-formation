<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        return DB::select("SELECT * FROM users");
    }
        
   public function addListUsers(Request $request)
   {
        $name = Request('name','test');
        $email = Request('email','test@example.com');
        $password = $request->password ?? 'password';
        return User::create(['name' => $name, 
        'email' => $email,
        'password' => Hash::make($password)]);
   }
   public function updateListUsers(Request $request)
   {
        $user = User::find($request->id);
        if($request->has('name'))
        {
            $user->name = $request->name;
        }
        if($request->has('email'))
        {
            $user->email = $request->email;
        }
        if($request->has('password'))
        {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        return $user;
   }
   public function deleteUsers(Request $request)
   {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            
        ],[
            'id.required' => 'The id field is required.',
            'id.integer' => 'The id must be an integer.',]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }


        $user = User::where('id',$request->id)->delete();
        return response('deleted', 200);
   }
 
}
