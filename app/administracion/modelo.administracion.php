<?php

class modeloAdministracion extends MySQL {
    public function __construct(){
        parent::__construct();   
    }
    public function getExpositores(){
        $sql = "
                select ROW_NUMBER() Over(Order by id Asc) As RowNum,id as codigo,nombre+ ' ' +apellido_pat + ' ' +isnull(apellido_mat,'') as nombre,correo,isnull(modificado_por,creado_por) + ' - ' +
                CONVERT(VARCHAR(10),isnull(fecha_modificado,fecha_creado),103) + ' ' + 
                CONVERT(VARCHAR(10),isnull(fecha_modificado,fecha_creado),108) 
                as modificado_por,CASE WHEN (estado=1) THEN 'verde.png' 
                ELSE 'rojo.png' END as estado from tbl_expositor
                ";
        return $this->executeQuery($sql);
    }
    public function getAdministrador($administrador){
        $sql = "
                select ta.id as codigo,tp.nombre as nombre, tp.apellido_pat as apellido_pat,
                isnull(tp.apellido_mat,'') as apellido_mat,ta.nombre as 
                correo,ta.clave,tp.direccion,tp.telefono,tp.foto 
                from tbl_administrador ta inner join
                tbl_persona tp on ta.tbl_persona_id = tp.id
                where ta.id=$administrador
                ";
        return $this->executeQuery($sql);
    }
    public function getAdministradores(){
        $sql = "
                select ROW_NUMBER() Over(Order by ta.id Asc) As RowNum,
                ta.id as codigo,tp.nombre + ' ' + tp.apellido_pat + ' ' + isnull(tp.apellido_mat,'') as nombre,ta.nombre as correo,'****' as clave,isnull(ta.modificado_por,ta.creado_por) + ' - ' +
                CONVERT(VARCHAR(10),isnull(ta.fecha_modificado,ta.fecha_creado),103) + ' ' + 
                CONVERT(VARCHAR(10),isnull(ta.fecha_modificado,ta.fecha_creado),108) 
                as modificado_por,CASE WHEN (ta.estado=1) THEN 'verde.png' 
                ELSE 'rojo.png' END as estado from tbl_administrador ta inner join
                tbl_persona tp on ta.tbl_persona_id = tp.id";
        return $this->executeQuery($sql);
    }
    public function getExpositorEd($expositor){
        $sql ="
                select id as codigo, nombre, apellido_pat, isnull(apellido_mat,'') as apellido_mat,correo from tbl_expositor where id=$expositor
               ";
        return $this->executeQuery($sql);
    }
    public function getCursos() {
        $sql = "
                select ROW_NUMBER() Over(Order by id Asc) As RowNum,
                id as codigo, descripcion as curso, isnull(modificado_por,creado_por) + ' - ' +
                CONVERT(VARCHAR(10),isnull(fecha_modificado,fecha_creado),103) + ' ' + 
                CONVERT(VARCHAR(10),isnull(fecha_modificado,fecha_creado),108) 
                as modificado_por,CASE WHEN (estado=1) THEN 'verde.png' 
                ELSE 'rojo.png' END as estado from tbl_curso 
                ";
        return $this->executeQuery($sql);
    }
    public function getRespuesta($respuesta){
        $sql = "
                select ROW_NUMBER() Over(Order by orden Asc) As RowNum,id as codigo, respuesta,orden,case when(verdadero=1) then 'SI' ELSE 'NO' END AS verdadero,isnull(modificado_por,creado_por) + ' - ' +
                CONVERT(VARCHAR(10),isnull(fecha_modificado,fecha_creado),103) + ' ' + 
                CONVERT(VARCHAR(10),isnull(fecha_modificado,fecha_creado),108) 
                as modificado_por from tbl_testdetalle_respuesta where tbl_testdetalle_id=$respuesta
                ";
        return $this->executeQuery($sql);
    }
    public function getPregunta($test){
        $sql = "
                select tt.id as codigo,tc.id as codigoCurso,tc.descripcion as curso,tt.descripcion as pregunta from tbl_testdetalle tt inner join tbl_curso tc on tc.id=tt.tbl_curso_id where tt.id=$test
                ";
        return $this->executeQuery($sql);
    }
    public function getRespuestawithoudRow($respuesta){
        $sql = "
                select id as codigo,respuesta,orden,verdadero from tbl_testdetalle_respuesta where id=$respuesta
                ";
        return $this->executeQuery($sql);
    }
    public function getNomCurso($curso){
        $sql = "
                select id as codigo,descripcion as curso from tbl_curso
                where id=$curso
                ";
        return $this->executeQuery($sql);
    }
    public function updAdministrador($administrador){
        if ((isset($administrador['foto']) and $administrador['foto']['name'] != "")) 
        {
            $ruta_destino = RUTA_ACCESO . 'foto';
            //Comprobando si el archivo es imagen
            //$mime = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
            $mime = array('image/jpg', 'image/jpeg','image/png','image/gif');
            if (in_array($administrador['foto']['type'], $mime)) 
            {
                $error = $administrador['foto']['error'];
                if ($error == UPLOAD_ERR_OK) 
                {
                    $tmp_name = $administrador['foto']['tmp_name'];
                    $nombre = uniqid(microtime()) . $administrador['foto']['name'];
                    $ext = end(explode('.', $nombre));
                    $fielname = substr(md5($nombre), 0, 12);
                    $name = $fielname . '.' . $ext;
                    move_uploaded_file($tmp_name, "$ruta_destino/$name");
                    //$this->updateData('tbl_persona', array('foto' => $name), array('id' => $id_usuario));
                }
            }
        }
        if(!isset($name)){
            $name='';
        }
        if($name==''){
            $updatefoto = '';
        }else{
            $updatefoto="foto='".$name."',";
        }
        $_SESSION['usuario']['foto'] = $name;
        $administrador['nombre'] = $this->limpiarPalabras($administrador['nombre']);
        $administrador['apellido_pat'] = $this->limpiarPalabras($administrador['apellido_pat']);
        $administrador['apellido_mat'] = $this->limpiarPalabras($administrador['apellido_mat']);
        $administrador['clave'] = $this->limpiarPalabras($administrador['clave']);
        $administrador['telefono'] = $this->limpiarPalabras($administrador['telefono']);
        $administrador['direccion'] = $this->limpiarPalabras($administrador['direccion']);
        if(trim($administrador['nombre']) != '' && 
           trim($administrador['apellido_pat']) != '' && 
           trim($administrador['clave']) != ''){
            $sql = "
                    update tbl_persona set nombre='".$administrador['nombre']."',
                    apellido_pat='".$administrador['apellido_pat']."',
                    apellido_mat='".$administrador['apellido_mat']."',
                    direccion='".$administrador['direccion']."',telefono='".$administrador['telefono']."',
                    ".$updatefoto." modificado_por='".$administrador['modificado_por']."',
                    fecha_modificado=getdate() where id='".$administrador['id']."'

                    update tbl_administrador set clave='".$administrador['clave']."',
                    modificado_por='".$administrador['modificado_por']."',
                    fecha_modificado=getdate() where id='".$administrador['id']."'
                    ";

            $this->executeQuery($sql);    
        }
    }
    public function updCurso($curso){
        if(trim($curso['descripcion'])!=''){
            $sql = "
                    update tbl_curso set descripcion='".$curso['descripcion']."',
                    modificado_por='".$curso['modificado_por']."',
                    fecha_modificado=getdate()
                    where id=".$curso['id']."
                    ";

            $this->executeQuery($sql);    
        }
    }
    public function updRespuesta($respuesta){
        $respuesta['respuesta'] = $this->limpiarPalabras($respuesta['respuesta']);
        if(trim($respuesta['respuesta'])!=''){
            $sql = "
                    update tbl_testdetalle_respuesta set respuesta='".$respuesta['respuesta']."',
                    modificado_por='".$respuesta['modificado_por']."',
                    orden=".$respuesta['orden'].",
                    verdadero='".$respuesta['verdadero']."',
                    fecha_modificado=getdate()
                    where id=".$respuesta['id']."
                    ";

            $this->executeQuery($sql);    
        }
    }
    
    public function updExpositor($expositor){
        $expositor['nombre'] = $this->limpiarPalabras($expositor['nombre']);
        $expositor['apellido_pat'] = $this->limpiarPalabras($expositor['apellido_pat']);
        $expositor['apellido_mat'] = $this->limpiarPalabras($expositor['apellido_mat']);
        $expositor['correo'] = $this->limpiarPalabras($expositor['correo']);
        if(
                trim($expositor['nombre'])!='' && 
                trim($expositor['apellido_pat'])!='' && 
                trim($expositor['correo'])!=''
          )
        {
            $sql = "
                    update tbl_expositor set nombre='".$expositor['nombre']."',
                    apellido_pat='".$expositor['apellido_pat']."',
                    apellido_mat = '".$expositor['apellido_mat']."',correo = '".$expositor['correo']."',
                    modificado_por='".$expositor['modificado_por']."',
                    fecha_modificado=getdate()
                    where id=".$expositor['id']."
                    ";
            $this->executeQuery($sql);
        }
    }
    public function updTema($tema){
        $tema['descripcion'] = $this->limpiarPalabras($tema['descripcion']);
        if(
                trim($tema['descripcion'])!='' && 
                trim($tema['video_caso'])!='' && 
                trim($tema['video'])!=''
          )
        {
            $sql = "
                    update tbl_tema set descripcion='".$tema['descripcion']."',
                    tbl_expositor_id=".$tema['tbl_expositor_id'].",
                    orden = ".$tema['orden'].",video = '".$tema['video']."',
                    video_caso = '".$tema['video_caso']."',
                    modificado_por='".$tema['modificado_por']."',
                    fecha_modificado=getdate()
                    where id=".$tema['id']."
                    ";
            $this->executeQuery($sql);
        }
    }
    public function updTest($test){
        $test['descripcion'] = $this->limpiarPalabras($test['descripcion']);
        if(
                trim($test['descripcion'])!='' && 
                trim($test['orden'])!='' && 
                trim($test['multiple'])!=''
          )
        {
            $sql = "
                    update tbl_testdetalle set descripcion='".$test['descripcion']."',
                    orden = ".$test['orden'].",
                    multiple = ".$test['multiple'].",
                    modificado_por='".$test['modificado_por']."',
                    fecha_modificado=getdate()
                    where id=".$test['id']."
                    ";
            $this->executeQuery($sql);
        }
    }
    public function getExpositor(){
        $sql = "
                select id as codigo,nombre+ ' ' + 
                isnull(apellido_pat,'') as expositor from 
                tbl_expositor
                ";
        return $this->executeQuery($sql);
    }
    public function cambiarEstadoCurso($curso){
        $sql = "
                update tc set tc.estado=".$curso['estado'].",
                tc.modificado_por='".$curso['modificado_por']."',
                tc.fecha_modificado=getdate()
                from tbl_curso tc inner join tbl_tema tt 
                on tc.id=tt.tbl_curso_id inner join tbl_testdetalle ted
                on ted.tbl_curso_id = tc.id inner join tbl_testdetalle_respuesta ter
                on ter.tbl_testdetalle_id = ted.id where tc.id=".$curso['id']."
                and tt.estado<>0 and ted.estado<>0";
        $this->executeQuery($sql);
    }
    public function cambiarEstadoTema($tema){
        $sql = "
                update tbl_tema set estado=".$tema['estado'].",
                modificado_por='".$tema['modificado_por']."',fecha_modificado=getdate() where id=".$tema['id']."
                ";
        $this->executeQuery($sql);
    }
    public function cambiarEstadoAdministrador($administrador){
        $sql = "
                update tbl_administrador set estado=".$administrador['estado'].",
                modificado_por='".$administrador['modificado_por']."',fecha_modificado=getdate() where id=".$administrador['id']."
                ";
        $this->executeQuery($sql);
    }
    public function regCurso($curso){
        $curso['descripcion'] = $this->limpiarPalabras($curso['descripcion']);
        if(trim($curso['descripcion']) != ''){
            $sql =  "
                    insert into tbl_curso 
                    values(NULL,'".$curso['descripcion'].
                    "','".$curso['creado_por'].
                    "',getdate(),null,".$curso['estado'].",null)
                    ";
            $this->executeQuery($sql);    
        }
    }
    public function regAdministrador($administrador){
        if ((isset($administrador['foto']) and $administrador['foto']['name'] != "")) 
        {
            $ruta_destino = RUTA_ACCESO . 'foto';
            //Comprobando si el archivo es imagen
            //$mime = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
            $mime = array('image/jpg', 'image/jpeg','image/png','image/gif');
            if (in_array($administrador['foto']['type'], $mime)) 
            {
                $error = $administrador['foto']['error'];
                if ($error == UPLOAD_ERR_OK) 
                {
                    $tmp_name = $administrador['foto']['tmp_name'];
                    $nombre = uniqid(microtime()) . $administrador['foto']['name'];
                    $ext = end(explode('.', $nombre));
                    $fielname = substr(md5($nombre), 0, 12);
                    $name = $fielname . '.' . $ext;
                    move_uploaded_file($tmp_name, "$ruta_destino/$name");
                    //$this->updateData('tbl_persona', array('foto' => $name), array('id' => $id_usuario));
                }
            }
        }
        if(!isset($name)){
            $name='';
        }
        $_SESSION['usuario']['foto'] = $name;
        $administrador['nombre'] = $this->limpiarPalabras($administrador['nombre']);
        $administrador['apellido_pat'] = $this->limpiarPalabras($administrador['apellido_pat']);
        $administrador['apellido_mat'] = $this->limpiarPalabras($administrador['apellido_mat']);
        $administrador['clave'] = $this->limpiarPalabras($administrador['clave']);
        $administrador['telefono'] = $this->limpiarPalabras($administrador['telefono']);
        $administrador['direccion'] = $this->limpiarPalabras($administrador['direccion']);
        $administrador['correo'] = $this->limpiarPalabras($administrador['correo']);
        if(trim($administrador['nombre']) != '' && 
           trim($administrador['apellido_pat']) != '' && 
           trim($administrador['clave']) != '' && 
           trim($administrador['correo']) != ''){
            $sql =  "
                    insert into tbl_persona(nombre,apellido_pat,
                    apellido_mat,direccion,telefono,correo,foto,
                    creado_por,fecha_creado,estado)
                    values('".$administrador['nombre']."','".$administrador['apellido_pat']."',
                    '".$administrador['apellido_mat']."','".$administrador['direccion']."',
                    '".$administrador['telefono']."','".$administrador['correo']."',
                    '".$name."','".$administrador['creado_por']."',
                    getdate(),".$administrador['estado'].")
                    insert into tbl_administrador(tbl_persona_id,nombre,
                    clave,creado_por,fecha_creado,estado)
                    values((select max(id) from tbl_persona),'".$administrador['correo']."',
                    '".$administrador['clave']."',
                    '".$administrador['creado_por']."',getdate(),
                    ".$administrador['estado'].")
                    ";
            $this->executeQuery($sql);    
        }
    }
    public function actualizarFotoAdmin($id_usuario) {
        if ((isset($_FILES['foto']) and $_FILES['foto']['name'] != "")) 
        {
            $ruta_destino = RUTA_ACCESO . 'foto';
            //Comprobando si el archivo es imagen
            //$mime = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
            $mime = array('image/jpg', 'image/jpeg');
            if (in_array($_FILES['foto']['type'], $mime)) 
            {
                $error = $_FILES['foto']['error'];
                if ($error == UPLOAD_ERR_OK) 
                {
                    $tmp_name = $_FILES['foto']['tmp_name'];
                    $nombre = uniqid(microtime()) . $_FILES['foto']['name'];
                    $ext = end(explode('.', $nombre));
                    $fielname = substr(md5($nombre), 0, 12);
                    $name = $fielname . '.' . $ext;
                    move_uploaded_file($tmp_name, "$ruta_destino/$name");
                    $this->updateData('tbl_persona', array('foto' => $name), array('id' => $id_usuario));
                    $_SESSION['usuario']['foto'] = $name;
                }
            }
        }
        //return $resul;
    }
    public function regRespuesta($respuesta){
        $respuesta['respuesta'] = $this->limpiarPalabras($respuesta['respuesta']);
        if(trim($respuesta['respuesta']) != ''){
            $sql =  "
                    insert into tbl_testdetalle_respuesta(tbl_testdetalle_id,respuesta,orden,verdadero,creado_por,fecha_creado,estado) values(".$respuesta['tbl_testdetalle_id'].",'".$respuesta['respuesta']."',".$respuesta['orden'].",".$respuesta['verdadero'].",'".$respuesta['creado_por']."',getdate(),".$respuesta['estado'].")
                    ";
            $this->executeQuery($sql);    
        }
    }
    public function regTema($tema){
        $tema['descripcion'] = $this->limpiarPalabras($tema['descripcion']);
        $tema['video'] = $this->limpiarPalabras($tema['video']);
        $tema['video_caso'] = $this->limpiarPalabras($tema['video_caso']);
        if(trim($tema['descripcion']) != ''){
            $sql =  "
                    insert into tbl_tema values
                    (".$tema['tbl_curso_id'].",".$tema['tbl_expositor_id'].",
                    ".$tema['orden'].",'".$tema['descripcion']."',
                    '".$tema['video']."','".$tema['creado_por']."',
                    getdate(),null,1,null,'".$tema['video_caso']."')
                    ";
            $this->executeQuery($sql);    
        }
    }
    public function regExpositor($expositor){
        $expositor['nombre'] = $this->limpiarPalabras($expositor['nombre']);
        $expositor['apellido_pat'] = $this->limpiarPalabras($expositor['apellido_pat']);
        $expositor['apellido_mat'] = $this->limpiarPalabras($expositor['apellido_mat']);
        $expositor['correo'] = $this->limpiarPalabras($expositor['correo']);
        if(
                trim($expositor['nombre'])!='' && 
                trim($expositor['apellido_pat'])!='' && 
                trim($expositor['correo'])!=''
          ){
            $sql =  "
                    insert into tbl_expositor(nombre,apellido_pat,apellido_mat,correo,estado,creado_por,fecha_creado) values
                    ('".$expositor['nombre']."','".$expositor['apellido_pat']."',
                    '".$expositor['apellido_mat']."','".$expositor['correo']."',
                    ".$expositor['estado'].",'".$expositor['creado_por']."',
                    getdate())
                    ";
            $this->executeQuery($sql);    
        }
    }
    
    public function regTest($test){
        $test['descripcion'] = $this->limpiarPalabras($test['descripcion']);
        if(trim($test['descripcion']) != ''){
            $sql =  "
                    insert into tbl_testdetalle values
                    (".$test['tbl_curso_id'].",
                    '".$test['descripcion']."',".$test['orden'].",
                    ".$test['multiple'].",
                    '".$test['creado_por']."',
                    getdate(),null,1,null)
                    ";
            $this->executeQuery($sql);    
        }
    }
    public function remCurso($curso){
        $sql =  "
                delete from tbl_curso where id=".$curso."
                ";
        $this->executeQuery($sql);
    }
    public function remExpositor($expositor){
        $sql =  "
                delete from tbl_expositor where id=".$expositor."
                ";
        $this->executeQuery($sql);
    }
    public function remAdministrador($administrador){
        $sql =  "
                delete from tbl_administrador where id=".$administrador." and id<>".$_SESSION['admin']['id']."
                delete from tbl_persona where id=".$administrador." and id<>".$_SESSION['admin']['id']."
                ";
        $this->executeQuery($sql);
    }
    public function remRespuesta($respuesta){
        $sql =  "
                delete from tbl_testdetalle_respuesta where id=".$respuesta."
                ";
        $this->executeQuery($sql);
    }
    public function remTema($tema){
        $sql =  "
                delete from tbl_tema where id=".$tema."
                ";
        $this->executeQuery($sql);
    }
    public function remTest($test){
        $sql =  "
                delete from tbl_testdetalle_respuesta where tbl_testdetalle_id=".$test."
                delete from tbl_testdetalle where id=".$test."
                ";
        $this->executeQuery($sql);
    }
    public function getTest($curso){
        $sql = "
                select ROW_NUMBER() Over(Order by ttd.orden Asc) As RowNum,
                ttd.id as codigo, ttd.descripcion as pregunta, 
                ttd.orden,CASE WHEN(ttd.multiple=1) THEN 'SI' ELSE 'NO' END AS multiple,
                isnull(ttd.modificado_por, ttd.creado_por) + ' - ' +
                CONVERT(VARCHAR(10),isnull(ttd.fecha_modificado,ttd.fecha_creado),103) + ' ' + 
                CONVERT(VARCHAR(10),isnull(ttd.fecha_modificado,ttd.fecha_creado),108) 
                as modificado_por,CASE WHEN (ttd.estado=1) THEN 'verde.png' 
                ELSE 'rojo.png' END as estado  from tbl_testdetalle ttd 
                inner join tbl_curso tt on
                tt.id=ttd.tbl_curso_id where tt.id = ".$curso."
                
               ";
        return $this->executeQuery($sql); 
    }
    public function getTemas($curso){
        $sql = "
                select ROW_NUMBER() Over(Order by te.orden Asc) As RowNum,
                te.id as codigo ,te.descripcion as tema,orden,isnull(te.modificado_por,
                te.creado_por) + ' - ' +
                CONVERT(VARCHAR(10),isnull(te.fecha_modificado,te.fecha_creado),103) + ' ' + 
                CONVERT(VARCHAR(10),isnull(te.fecha_modificado,te.fecha_creado),108) 
                as modificado_por,CASE WHEN (te.estado=1) THEN 'verde.png' 
                ELSE 'rojo.png' END as estado from tbl_tema te inner join 
                tbl_curso tc on te.tbl_curso_id=tc.id left join tbl_expositor tx 
                on tx.id = te.tbl_expositor_id where te.tbl_curso_id = ".$curso."
                ";
        return $this->executeQuery($sql);
    }
    public function getTema($tema){
        $sql ="
                select id as codigo,tbl_expositor_id, orden,descripcion,video,isnull(video_caso,'') as video_caso from tbl_tema where id=$tema
              ";
        return $this->executeQuery($sql);
    }
    public function getTest2($test){
        $sql ="
                select id as codigo,descripcion as test,orden,multiple from tbl_testdetalle where id=$test
              ";
        return $this->executeQuery($sql);
    }
}

?>