<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Exception;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class UserController extends Controller
{
    function get(Request $data)
    {
       $id = $data['id'];
       if ($id == null) {
          return User::get();
       } else {
          return User::findOrFail($id);
       }
    }
    function post(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $user = User::create([
             'name'=>$result['name'],
             'surname'=>$result['surname'],
             'email'=>$result['email'],
             'password'=>$result['password'],
             'identification_card'=>$result['identification_card'],
             'password'=>$result['password'],
             'description'=>$result['description'],
             'telephone'=>$result['telephone'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($user,200);
    }
    function put(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $user = User::where('id',$result['id'])->update([
            'name'=>$result['name'],
            'surname'=>$result['surname'],
            'email'=>$result['email'],
            'password'=>$result['password'],
            'identification_card'=>$result['identification_card'],
            'password'=>$result['password'],
            'description'=>$result['description'],
            'telephone'=>$result['telephone'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($user,200);
    }
    function delete(Request $data)
    {
       $result = $data->json()->all();
       $id = $result['id'];
       return User::destroy($id);
    }
}