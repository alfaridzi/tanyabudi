<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use App\payment;
use Illuminate\Auth\Events\Registered;

use Illuminate\Foundation\Auth\RegistersUsers;
class RegisterController extends Controller
{
     /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */



       use RegistersUsers;


    public function activating($token)
	{
	    $model = User::where('token_register', $token)->where('status', 0)->firstOrFail();
	    $model->status = 1;
	    $model->save();
	    return Redirect('/')->withSuccess('Konfirmasi berhasil Silahkan login!');
	}


	public function uploadtf($id) {

		$user = User::find($id);
		$data = request()->all();
		$data['id_user'] = $user->id;
		$data['id_prod'] = $user->paket;


		$cek = Payment::orderBy('counter','asc')->get()->last();
		if(is_null($cek)) {
			$last = 1;
		} else {
			$last = $cek->counter + 1;
		}

		
		$imageName = time().'.'.request()->foto->getClientOriginalExtension();
		$data['foto'] = $imageName;
		$data['id'] = 'TRX'.$last.$id.'.'.date('Ymd').'.'.$user->id;
		$data['counter'] = $last;
        request()->foto->move(public_path('bukti-tf'), $imageName);
        payment::create($data);
        return Redirect('/')->withSuccess('Silahkan menunggu konfirmasi admin dalam 1x24 jam.');
	}

	public function upload($token)
	{
	    $model = User::where('token_register', $token)->where('status', 0)->firstOrFail();
	    return view('registermail', compact('model'));
	}

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nohp' => 'required|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
        	$ids = $request->tipe_user;
			if($ids == 2) {
				return Redirect('register?view=agen')->withErrors($validator->errors())->withInput(Input::all());
			} else {
				return Redirect('register?view=user')->withErrors($validator->errors())->withInput(Input::all());
			}
                  
        }
        $input = $request->all();
        if($request->type == '2') {
        	$input['referal_main'] = rand(10,11);
        } else {
        	$input['referal_main'] = NULL;
        }
        $input['password'] = bcrypt($input['password']);
        $input['token_register'] = str_random(190);
        event(new Registered($user = User::create($input)));

        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;


        return Redirect('/')->withSuccess('Register berhasil silahkan cek email anda.');
			
        // if api
        //return $this->sendResponse($success, 'User register successfully.');
    }
}
