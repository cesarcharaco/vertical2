<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Alert;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Bitacora;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        $cont=count($user);
        //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Listando usuarios registrados";
            $bitacora->save();
            //---------fin de registro en bitacora---------------
        return view('usuarios.index',compact('user','cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //dd("aaaa");
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->pregunta=$request->pregunta;
        $user->respuesta=$request->respuesta;
        $user->tipo_usuario=$request->tipo_usuario;
        $user->save();
        //----- asignando privilegios.

switch ($request->tipo_usuario) {
        case 'Telecomunicaciones':
                // vertical
                        //empleados
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 1
                    ]);
                    for ($i=6; $i <= 8; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
                        //agenda
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 33
                    ]);
                    for ($i=38; $i <= 40; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                    // horario
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 97
                    ]);
                    for ($i=102; $i <= 104; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
                   // mantentenimiento clientes
                    for ($i=81; $i <= 82; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
                   for ($i=85; $i <= 88; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
                break;

    case 'Deporte':
            //atleta
                \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 10
                    ]);
                    for ($i=13; $i <= 16; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
            //agenda
                   \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 33
                    ]);
                    for ($i=38; $i <= 40; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

            //horarios

                \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 97
                    ]);
                    for ($i=102; $i <= 104; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
                break;
    case 'Administración':
                // vertical empleaos
           //empleados
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 1
                    ]);
                    for ($i=6; $i <= 8; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
                        //agenda
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 33
                    ]);
                    for ($i=38; $i <= 40; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                    // horario
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 97
                    ]);
                    for ($i=102; $i <= 104; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                   //mantenimiento - cargos

                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 65
                    ]);
                    for ($i=66; $i <= 72; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                   //asistencias

                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 105
                    ]);
                    for ($i=106; $i <= 112; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }  

                   //visitas

                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 89
                    ]);
                    for ($i=90; $i <= 96; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                break; 

    case 'Coordinación':
       
    // vertical
                        //empleados
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 1
                    ]);
                    for ($i=2; $i <= 8; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
                        //agenda
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 33
                    ]);
                    for ($i=34; $i <= 40; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                    // horario
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 97
                    ]);
                    for ($i=98; $i <= 104; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                   //inventario

                   \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 17
                    ]);
                    for ($i=18; $i <= 24; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                   // solicitudes

                   \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 25
                    ]);
                    for ($i=26; $i <= 32; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                   // vistas

                   \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 89
                    ]);
                    for ($i=90; $i <= 96; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
                   //asistencias

                   \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 105
                    ]);
                    for ($i=106; $i <= 112; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                   //graficas
                   \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 120
                    ]);

        break;


    case 'Recepción':

                       // vistas

                   \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 89
                    ]);
                    for ($i=90; $i <= 96; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                    }                   
                                       //asistencias

                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 105
                    ]);
                    for ($i=106; $i <= 112; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }

                        //agenda
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 33
                    ]);
                    for ($i=34; $i <= 40; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                     }
                    // horario
                    \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => 97
                    ]);
                    for ($i=98; $i <= 104; $i++) { 
                       \DB::table('usuarios_has_privilegios')->insert([
                        'id_usuario' => $user->id,
                        'id_privilegio' => $i
                    ]);
                   }
               
               
                break;
    }

        // ----------------------------------------- 





        //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="registrado usuario con id ".$user->id." correo ".$request->email;
            $bitacora->save();
            //---------fin de registro en bitacora---------------
       flash('<i class="icon-circle-check"></i> Usuario registrado exitosamente!')->success()->important();
       return redirect()->to('usuarios');        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=User::find($id);

        return view('usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {
        //dd($request->all());
        $buscar_email=User::where('email',$request->email)->where('id','<>',$id)->first();

        if (!empty($buscar_email)) {
            flash('El Email ya se encuentra registrado!', 'error');
                return redirect()->back();
        } else {
            if($request->password!=""){
                if ($request->password==$request->password_confirmation) {
                    $password=bcrypt($request->password);

                    $usuario=User::find($id);
                    $usuario->name=$request->name;
                    $usuario->email=$request->email;
                    $usuario->password=$password;
                    $usuario->pregunta=$request->pregunta;
                    $usuario->respuesta=$request->respuesta;
                    $usuario->tipo_usuario=$request->tipo_usuario;
                    $usuario->save();
                    //---------------registrando en bitacora------------
                    $bitacora=new Bitacora();
                    $bitacora->id_usuario=\Auth::getUser()->id;
                    $bitacora->operacion="Actualización de datos de usuario con id ".$id;
                    $bitacora->save();
                    //---------fin de registro en bitacora--------------- 
                    flash('Actualización de datos de usuario exitosa!', 'success');
                    return redirect()->to('usuarios');
                } else {
                    flash('Las contraseñas no coinciden!', 'warning');
                    return redirect()->back();
                }
                
            }else{
                $usuario=User::find($id);
                $usuario->name=$request->name;
                $usuario->email=$request->email;
                $usuario->pregunta=$request->pregunta;
                $usuario->respuesta=$request->respuesta;
                $usuario->tipo_usuario=$request->tipo_usuario;
                $usuario->save();
                //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Actualización de datos de usuario con id ".$id;
                $bitacora->save();
                //---------fin de registro en bitacora--------------- 
                flash('Actualización de datos de usuario exitosa!', 'success');
                return redirect()->to('usuarios');
            }
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $usuario=User::where('tipo_usuario','Admin')->first();

        if(\Hash::check($request->clave, $usuario->password)){        
            //dd($request->all());
        $usuario=User::find($request->id_usuario);
        $id=$usuario->id;
        if ($usuario->delete()) {
            //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Eliminación de datos de usuario con id ".$id;
            $bitacora->save();
            //---------fin de registro en bitacora--------------- 
            flash('Registro eliminado exitosamente!', 'success');
                return redirect()->back();
        } else {
            flash('<i class="icon-circle-check"></i> No se pudo eliminar el registro, posiblemente esté siendo usada su información en otra área!')->warning()->important();
            
                return redirect()->back();
        }
        } else {
            flash('<i class="icon-circle-check"></i> Clave de usuario admin incorrecta!')->error()->important();
                return redirect()->back();                
        }
    }
}
