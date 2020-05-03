<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\RespuestaRequest;
use App\Http\Requests\PasswordRequest;
class ForgotPasswordController extends Controller
{
    
    public function form_reset()
    {
    	//lleva la vista a ingresar el email
    	return view('auth.passwords.form-reset');
    }

    public function form_question(EmailRequest $request)
    {
    	//dd($request->all());
    	//lleva a la vista de ingresar la respuesta
    	$datos=User::where('email',$request->email)->first();
    	//dd(empty($datos));
    	if (!empty($datos)) {
    		$question=$datos->pregunta;
    		$id_user=$datos->id;
	    	return view('auth.passwords.form-question',compact('question','id_user'));
    	} else {
    		flash('<i class="icon-circle-check"></i> Correo no registrado!')->warning()->important();
    		return redirect()->back();
    	}
    	
    }

    public function reset(RespuestaRequest $request)
    {
    	//lleva a la vista a ingresar la nueva clave
    	//dd($request->all());
    	$datos=User::find($request->id_user);
    	if (!empty($datos)) {
    		//dd("1");
    		if ($datos->respuesta==$request->respuesta) {
    			$id_user=$datos->id;
    			return view('auth.passwords.reset',compact('id_user'));
    		} else {
    			flash('<i class="icon-circle-check"></i> La respuesta no coincide con los registros!')->warning()->important();
    		return redirect()->to('form_reset');
    		}
    	} else {
    		//dd("2");
    		flash('<i class="icon-circle-check"></i> Usuario no registrado!')->warning()->important();
    		return redirect()->to('login');
    		
    	}
    	
    }

    public function reset_password(Request $request)
    {
    	//dd($request->all());
        $this->validator($request->all());
    	

        if($request->password==$request->password_confirmation){
    		
    	$usuario = User::find($request->id_user);

    	$usuario->password=bcrypt($request->password);
    	$usuario->save();
    	flash('<i class="icon-circle-check"></i> Clave cambiada exitosamente!')->success()->important();
    		return redirect()->to('login');
    	} else {
    		flash('<i class="icon-circle-check"></i> Las claves no conciden!')->warning()->important();
    		return redirect()->to('form_reset');
    	}
    	
    }
    protected function validator(array $data)
   {
   return \Validator::make($data, [
   'password' => 'required|regex:/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/'
   ]);
   }
}
