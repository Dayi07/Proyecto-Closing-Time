<?php
 
class DocumentoController extends Database{
    
    protected $TipoArc="";
    protected $FechaHora="";		
    protected $Archivo="";
    protected $NomArchivo="";
    protected $Estado="";


    public function insertarArchivo($id, $TipoArc, $FechaHora, $NomArchivo, $Estado){
        $sql = "INSERT INTO documentos (Usuario_id, Fecha_Hora_entrega, Tipo_documento, Archivo, Estado) VALUES ($id, '$FechaHora', '$TipoArc','$NomArchivo', '$Estado') ";
        $res = mysqli_query($this->con, $sql);

        if($res){
              return true;
        }else{
            return false;
        }		
    }


    public function documentos($Idusuario){
        $sql = "SELECT * FROM Documentos WHERE Usuario_id = $Idusuario";
        $res = mysqli_query($this->con, $sql);

        return $res;
  }

    public function eliminarDocumento($Id){
        $sql = "DElETE FROM documentos WHERE Codigo_documento = $Id";
        $res = mysqli_query($this->con, $sql);

        if($res){
              return true;
        }else{
            return false;
        }		

    }

    public function modificar($TipoArc, $Estado, $id){
        
        $sql = "UPDATE Documentos SET Estado='$Estado', Tipo_documento='$TipoArc' WHERE Codigo_documento = $id";
        $res = mysqli_query($this->con, $sql);
        
        if($res){
              return true;
        }else{
            return false;
        } 

    }

    public function buscarDocumento($id){
        $sql = "SELECT * FROM Documentos WHERE Codigo_documento = $id";
        $res = mysqli_query($this->con, $sql);

        if($res){
            return $res;
      }else{
          return false;
      } 

    }


}

?>