<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Http\Request;
use Artisan;
use Log;
use Storage;
use App\Bitacora;
use App\User;
class BackupController extends Controller
{
    public function index()
    {
        $backups = Storage::allFiles('public/backups');
        //dd($backups);
        return view("backup.backups")->with(compact('backups'));
    }

    public function create()
    {
        $filename = "backup-VERTICAL".date("d-m-Y-H-i-s").".sql";
        $mysqlPath = "C:\\xampp/mysql/bin/mysqldump";
        //$mysqlPath = "C:\\wamp64/bin/mysql/mysql5.7.21/bin/mysqldump";
        try {
            
            $command = "$mysqlPath --add-drop-database --user=root --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " --extended-insert=false vertical  > " . storage_path() . "/app/public/backups/" . $filename."  2>&1";
            $returnVar = NULL;
            $output  = NULL;
            
            exec($command, $output, $returnVar);
             //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Backup de base de datos realizado";
            $bitacora->save();
            //---------fin de registro en bitacora---------------
            flash('NUEVO RESPALDO CREADO!', 'success');

            return redirect()->back();

        } catch(\Exception $e) {

            flash('ERROR AL CREAR RESPALDO!', 'error');

            return redirect()->back();
        }
    }

    public function restore($file)
    {
        //$mysqlPath = "C:\\wamp64/bin/mysql/mysql5.7.21/bin/mysqldump";
        $mysqlPath = "C:\\xampp/mysql/bin/mysql";
        try {

            $command = "$mysqlPath --user=root --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " vertical < " . storage_path() . "/app/public/backups/" . $file."  2>&1";
            $returnVar = NULL;
            $output  = NULL;
            
            $x=exec($command, $output, $returnVar);
            //dd($x);
             //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Restauración de la base de datos";
            $bitacora->save();
            //---------fin de registro en bitacora---------------
            flash('BASE DE DATOS RESTAURADA!', 'success');

            return redirect()->back();
            
        } catch (\Exception $e) {

            flash('ERROR AL RESTAURAR BASE DE DATOS!', 'error');

            return redirect()->back();
        } 
    }

    /**
     * Downloads a backup zip file.
     *
     * TODO: make it work no matter the flysystem driver (S3 Bucket, etc).
     */
    public function download($filename)
    {
        
        $path = storage_path()."/app/public/backups/$filename";
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Descarga de respaldo (".$filename.")";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        return response()->download($path);
    }

    /**
     * Deletes a backup file.
     */
    public function delete(Request $request)
    {
        $usuario=User::Where('tipo_usuario','Admin')->first();

      if(\Hash::check($request->clave, $usuario->password)){
        $filename=$request->archivo;
        \File::delete(storage_path() . "/app/public/backups/$filename");
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Eliminación de respaldo (".$filename.")";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        flash('RESPALDO ELIMINADO!', 'success');

        return redirect()->back();
    }else{
        
            flash('<i class="icon-circle-check"></i> Clave de usuario admin incorrecta!')->error()->important();
                return redirect()->back();

    }
    }
}
