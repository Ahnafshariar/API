<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function newUser(Request $request){
        if($request->isMethod('post')){
           $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required'
           ]);

           if($validator->fails()){
               return response()->json([
                   'message' => 'Data validation Failed'
               ]);
           }
           else{
               $name = $request->input('name');
               $email = $request->input('email');

               $user_input = User::select('*')->where('name','=', $name)->get();
               if(count($user_input)==0){
                    $user = new User();
                    $user->name = $name;
                    $user->email = $email;

                    if($user->save()){
                        return response()->json([
                            'message' => 'Valoi cholcche hae ? Tow biye ta kobe korcchen? 😌😌😌😌',
                            'name' => $name,
                            'email' => $email
                        ]);
                    }
                    else{
                        return response()->json([
                            'message' => 'tor bou vaigga gese 😪😪😪'
                        ]);
                    }
               }else{
                        return response()->json([
                            'message' => 'Abar entry disos -_- ... Ja tor biya hoibo na 😡😡😡😡'
                        ]);
                    }       
           }
        }else{
            return response()->json([
                'message' => 'Biya hoibo tobe kalo meye r sathe 🤣🤣'
            ]);
        }
    }
}
