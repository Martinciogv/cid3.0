<?php 

class usuarios{
		public function registroUsuario($datos){
			$c=new conectar();
			$conexion=$c->conexion();

            $fecha=date('Y-m-d');
        
            $sql="INSERT into usuarios (nombre,
            password, `priv`,
            fechaCaptura)
    values ('$datos[0]',
            '$datos[2]',
            '$datos[1]',
            '$fecha')";
return mysqli_query($conexion,$sql);
}
public function loginUser($datos){
    $c=new conectar();
    $conexion=$c->conexion();
    $password=sha1($datos[1]);

    $_SESSION['usuario']=$datos[0];
    $_SESSION['iduser']=self::traeID($datos);
    $_SESSION['priv']=self::traePriv($datos);

    $sql="SELECT * from usuarios where nombre='$datos[0]' and password='$password'";
    $result=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($result) > 0){
        return 1;
    }else{
        return 0;
    }
}
public function traeID($datos){
    $c=new conectar();
    $conexion=$c->conexion();

    $password=sha1($datos[1]);

    $sql="SELECT id_usuario from usuarios 
            where nombre='$datos[0]' and password='$password'"; 
    $result=mysqli_query($conexion,$sql);

    return mysqli_fetch_row($result)[0];
}
public function traePriv($datos){
    $c=new conectar();
    $conexion=$c->conexion();

    $password=sha1($datos[1]);

    $sql="SELECT priv from usuarios 
            where nombre='$datos[0]' and password='$password'"; 
    $result=mysqli_query($conexion,$sql);

    return mysqli_fetch_row($result)[0];
}
public function mostrar($idusuario)
    {
            $c = new conectar();
			$conexion = $c->conexion();
			$sql = "SELECT `id_usuario`, `nombre`, `priv` FROM `usuarios` WHERE id_usuario=$idusuario";
			$result = mysqli_query($conexion,$sql);
            return $result; 
    }
public function obtenDatosUsuario($idusuario){

    $c=new conectar();
    $conexion=$c->conexion();

    $sql="SELECT `id_usuario`, `nombre`, `priv` from usuarios where id_usuario='$idusuario'";
    $result=mysqli_query($conexion,$sql);
    $ver=mysqli_fetch_row($result);

    $datos=array(
                'id_usuario' => $ver[0],
                    'nombre' => $ver[1],
                    'priv' => $ver[2],
                );

    return $datos;
}
public function actualizaUsuario($datos){
    $c= new conectar();
    $conexion=$c->conexion();
    $sql="UPDATE `usuarios` SET 
    
    `nombre`='$datos[1]',
    `priv`='$datos[2]'
     WHERE id_usuario='$datos[0]'";
    return mysqli_query($conexion,$sql);
}

public function eliminaUsuario($idusuario){
    $c=new conectar();
    $conexion=$c->conexion();

    $sql="DELETE from usuarios 
            where id_usuario='$idusuario'";
    return mysqli_query($conexion,$sql);
}
}

?>