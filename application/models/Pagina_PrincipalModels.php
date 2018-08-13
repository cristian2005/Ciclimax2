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
public function GuardarImagen($ruta)
{
    $idanuncio=$this->db->select('max(idanuncios)+1 as anuncio')->get('anuncios')->row()->anuncio;
    if($idanuncio==null)
    {
        $idanuncio=1;
    }
   $this->db->insert('imagen',array("Url"=>$ruta,"Id_anuncio"=>$idanuncio));
}
public function InsertarAnuncios()
{
    $idusuario=$_SESSION["idusuarios"];
    $fecha_vencimien=date("Y-m-d H:i",strtotime("+ 45 days",time()));
    $this->db->insert('anuncios',array_merge($_POST,array("Id_usuario"=>$idusuario,"Fecha_vencimiento"=>$fecha_vencimien)));

    $id = $this->db->insert_id();
    $tareas=json_decode(file_get_contents(mdate('%Y-%m-%d', now()+86400).".json"), true);
    $tareas[$id] = mdate('%Y-%m-%d', now()+(45 * 24 * 60 * 60));
     $datos = json_encode($tareas);
     file_put_contents(mdate('%Y-%m-%d', now()+86400).".json", $datos); 

}
public function Obtener_Sub_categoria($id)
{
    return $this->db->where("id_categorias",$id)->get('subcategorias')->result_object();
}
public function Obtener_Anuncio($filtro="")
{
    $resultado=$this->db->select('anuncios.*,usuarios.Apodo,usuarios.Fecha_registro,subcategorias.Nombre_subcategoria')->from('anuncios')
    ->join('subcategorias',' anuncios.Id_subcategoria= subcategorias.idsubcategorias')->
    join('usuarios',"anuncios.Id_usuario=usuarios.idusuarios")->like('Titulo',$filtro)->limit(10)
    ->get()->result_object();
    $imagen=$this->Obtener_imagen();
    return array("Anuncios"=>$resultado,"Imagenes"=>$imagen);
}
public function Obtener_imagen()
{
    return $this->db->select('Url,Id_anuncio')->get('imagen')->result_object();
}

public function Eliminar_anuncio($id)
{
   $this->db->where('idanuncios', $id);
   $this->db->delete('anuncios');
}

public function Middleware($task=null)
{
  if ($task=="vencimiento") {

      $file = mdate('%Y-%m-%d', now()).".json";
        if (file_exists($file)) {
                //analiza si hay un archivo con la fecha actual, sino es porque ya se realizaron las tareas para ese dia
                //y el nombre del archivo ya cambio a la fecha del dia siguiente

            $tareas=json_decode(file_get_contents($file), true);
            //error_reporting(E_ERROR | E_PARSE);
            foreach ($tareas as $key => $value) {
              if ($value==mdate('%Y-%m-%d', now())) {
                //aqui se pone la accion a realizar con la tarea antes de eliminarla con el unset
                   $this->Eliminar_anuncio($key);
                 unset($tareas[$key]);
              }              
            }

                $datos = json_encode($tareas);
                file_put_contents(mdate('%Y-%m-%d', now()+86400).".json", $datos); 
                unlink($file);
        }

  }
  
}


public function Obtener_Anuncio_porcategoria()
{
 return $this->db->select('count(id_categoria) as Num_categorias')->group_by('id_categoria')->order_by('id_categoria')->
 get('anuncios')->result_object();
}

}

