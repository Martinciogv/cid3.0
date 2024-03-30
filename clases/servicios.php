<?php

class servicios
{
    public function registroServicios($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "INSERT INTO `servicios`(
                 `id_usuario`,
                  `id_cliente`,
                  `fec_entrega`,
                  `fol_dis`,
                  `servicios`,
                  `document`,
                  `ubicacion`,
                  `esp`,
                  `anticipo`,
                  `estado`
                 )
                    values (
                    '$datos[0]',
                    '$datos[1]',
                    '$datos[2]',
                    '$datos[3]',
                    '$datos[4]',
                    '$datos[5]',
                    '$datos[6]',
                    '$datos[7]',
                    '$datos[8]',
                    '$datos[9]'
                    )";
        return mysqli_query($conexion, $sql);
    }


    public function obtenDatosServicios($idservicios)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT `id_servicios`, `id_usuario`, `id_cliente`,
    `fec_entrega`, `fol_dis`, `servicios`, `document`,
    `ubicacion`, `esp`, `anticipo`, `estado`
    FROM `servicios` WHERE  id_servicios='$idservicios'";

        $result = mysqli_query($conexion, $sql);
        $mosS = mysqli_fetch_row($result);

        $dato = array(
            'id_servicios' => $mosS[0],
            `id_usuario` => $mosS[1],
            'id_cliente' => $mosS[2],
            'fec_entrega' => $mosS[3],
            'fol_dis' => $mosS[4],
            'servicios' => $mosS[5],
            'document' => $mosS[6],
            'ubicacion' => $mosS[7],
            'esp' => $mosS[8],
            `anticipo`  => $mosS[9],
            'estado' => $mosS[10],

        );
        return $dato;
    }
    public function actualizaServicio($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
       
            $sql = "UPDATE `servicios` SET `fol_dis`='$datos[7]',
                                         `servicios`='$datos[1]',
                                         `document`='$datos[2]',
                                         `ubicacion`='$datos[3]',
                                         `esp`='$datos[4]',
                                         `anticipo`='$datos[5]',
                                         `estado`='$datos[6]'
                            where id_servicios='$datos[0]'";
            mysqli_query($conexion, $sql);
     
    }

    public function finalizarServicio($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        if ($datos[4] == "1") {
            $sql1 = "UPDATE servicios set estado='$datos[1]'
                            where id_servicios='$datos[0]'";
            mysqli_query($conexion, $sql1);

            $sql2 = "UPDATE orden set estado='$datos[3]'
                            where id_orden='$datos[2]'";
            mysqli_query($conexion, $sql2);
        } else {
            $sql = "UPDATE servicios set estado='$datos[1]'
                            where id_servicios='$datos[0]'";
            mysqli_query($conexion, $sql);
        }
    }



    public function envioServicios($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $T1 = $datos[5];
        $T2 = $datos[8];
        $T3 = $datos[9];
        $T4 = $datos[7];
        $T5 = $datos[6];
        $T6 = $datos[11];
        $T7 = $datos[13];
        $E1 = ' ';
        $IT = ' IMPRESIONES TAMAÑO ';
        $espe = $T1 . $IT . $T2 . $E1 . $T3 . $E1 . $T4 . $E1 . $T5 . $E1 . $T6 . $E1 . $T7;

        $sql = "INSERT INTO `servicios`(
                      `id_usuario`,
                      `id_cliente`,
                      `fec_entrega`,
                      `fol_dis`,
                      `servicios`,
                      `document`,
                      `ubicacion`,
                      `esp`,
                      `anticipo`,
                      `estado`
                         )
            values (
            '$datos[0]',
            '$datos[1]',
            '$datos[4]',
            '$datos[2]',
            '$datos[3]',
            '$datos[14]',
            '$datos[12]',
            '$espe',
            '$datos[15]',
            '$datos[10]'
            )";
        return mysqli_query($conexion, $sql);
    }
}
