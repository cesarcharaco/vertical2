<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Solicitudes;
/*use App\Quotations;
*/
class Adjuntar extends Mailable{
    use Queueable, SerializesModels;
    public $sector;
    public $motivos="";

    public function __construct($sector,$motivos){
        $this->sector=$sector;
        if (!isset($motivos)) {
            $this->motivos="";
        }else{
            $this->motivos=$motivos;
        }
        
    }

    public function build(){
        
        ini_set('max_execution_time', 360); //3 minutes 
        $solicitud=Solicitudes::find($this->sector);
         $email = $this->view('solicitudes.mensaje',compact('solicitud','motivos'))->subject('Estado de Solicitud de Espacio');

	    // $archivosadjuntos es una matriz con rutas de archivos de archivos adjuntos
        /* $archivosadjuntos = Files::where('quotation_id',$this->sector)->get();
	    foreach($archivosadjuntos as $rutaArchivo){
	        $email->attach(public_path().'/'.$rutaArchivo->url_file);
	    }*/
	    return $email;
    }
}