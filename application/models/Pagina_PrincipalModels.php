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
public function Obtener_Anuncio_porcategoria()
{
 return $this->db->select('count(id_categoria) as Num_categorias')->group_by('id_categoria')->order_by('id_categoria')->
 get('anuncios')->result_object();
}
}

/* End of file ModelName.php */
