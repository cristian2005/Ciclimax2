<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina_PrincipalModels extends CI_Model {


public function IniciarSesion($correo,$clave)
{
   $resutado= $this->db->select('*')->where(array("Correo"=>$correo,"Clave"=>$clave))->
   get('usuarios')->result_object();
   //Datos correcto
   if($resutado!=null)
   {
    session_start();
    $_SESSION['idusuarios']=$resutado[0]->idusuarios;
    $_SESSION['Apodo']=$resutado[0]->Apodo;
    $_SESSION['Clave']=$resutado[0]->Clave;
    $_SESSION['Correo']=$resutado[0]->Correo;
    $_SESSION['Tipo_usuarios']=$resutado[0]->Tipo_usuarios;
    echo "<script>window.location='".base_url()."';</script>";
   }
   //datos incorrecto
   else
   {
    echo "<script>alert('datos incorrecto.');window.location='".base_url()."';</script>";
   }
    
}
public function Registro()
{
    $resultado=$this->db->insert('usuarios',$_POST);
    if($resultado==1)
    {
        $this->IniciarSesion($_POST["Correo"],$_POST["Clave"]);
    }
    else
    {
    echo "<script>alert('Ha ocurrido un error al registrar el usuario, intente lo mas tarde.');window.location='".base_url()."';</script>";
    }
}
}

/* End of file ModelName.php */
