<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function register(Request $request)
    {
        $hasher= app()->make('hash');
        $name= $request->input('name');
        $email= $request->input('email');
        $surname= $request->input('surname');
        $identification_card= $request->input('identification_card');
        $description= $request->input('description');
        $telephone= $request->input('telephone');
        $password= $hasher->make($request->input('password'));

        $register = user::create([
            'name'=> $name,
            'email'=> $email,
            'surname'=> $surname,
            'identification_card'=> $identification_card,
            'description'=> $description,
            'telephone'=> $telephone,
            'password'=> $password,

        ]);
        if($register){
            $res['success']=true;
            $res['result']="Success Register";
            return response($res);
        }else{
            $res['success']=false;
            $res['result']="Failed to Register";
            return response($res);
        }
    }

    public function getUser(Request $request, $id){

        $user = user::where('id',$id)->get();
        if($user){
            $res['success']=true;
            $res['result']=$user;
            return response($res);
        }else{
            $res['success']=false;
            $res['result']="No se encontro user";
            return response($res);
        }
    }
}