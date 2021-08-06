<?php
    include "Conexion.php";

    class Gastos extends Conexion {
        public function agregarNuevoGasto($idUsuario, $idCategoria, $monto, $descripcion, $fecha) {
            $conexion = Conexion::conectar();

            $sql = "INSERT INTO t_gastos (id_categoria,
                                            id_usuario,
                                            monto,
                                            descripcion,
                                            fecha) 
                    VALUES ('$idCategoria',
                            '$idUsuario',
                            '$monto',
                            '$descripcion',
                            '$fecha')";
            $respuesta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);

            return $respuesta;
        }
        public function eliminarGastos($idGasto) {
			$conexion= Conexion::conectar();
            $sql="DELETE FROM t_gastos WHERE id_gasto='$idGasto'";
            $respuesta=mysqli_query($conexion,$sql);
            return $respuesta;
		}
        public function obtenerDatos($idGasto){
            $conexion= Conexion::conectar();
            $sql = "SELECT 	
                            id_gasto
                            id_categoria
                            monto
                            descripcion
                            fecha

                          FROM t_gastos
                          WHERE id_gasto = '$idGasto'";
      
                  $result = mysqli_query($conexion, $sql);
                  $Gasto = mysqli_fetch_array($result);
                  $datos = array(
                              "id_gasto" => $Gasto['id_gasto'],
                              "id_categoria" => $Gasto['id_categoria'],
                              "monto" => $Gasto['monto'],
                              "descripcion" => $Gasto['descripcion'],
                              "fecha" => $Gasto['fecha'] 
                                  );
                  return $datos;
        }
      
          public function actualizarGasto($datos){
            $conexion= Conexion::conectar();
            $sql = "UPDATE t_gastos 
            SET 
                id_categoria=?,
                monto=?,
                descripcion=?,
                fecha=?,
                id_gasto=?
            WHERE id_gasto = ?";
            $query=$conexion->prepare($sql);
            $query->bind_param('isssi',$datos['id_categoria'],
                                        $datos['monto'],
                                        $datos['descripcion'],
                                        $datos['fecha'],
                                        $datos['id_gasto']
            );
            $respuesta=$query->execute();
            return $respuesta;
          }
        }
    