<?php
  include "../../clases/Gastosphp";
  
  $Gasto=new Gastos();
  $datos=array(

    "id_gasto"=>$_POST['idGasto'],
    "id_categoria"=>$_POST['idCategoriaU'],
    "monto"=>$_POST['montoU'],
    "descripcion"=>$_POST['descripcionU'],
    "fecha"=>$_POST['fechaU'],
  );
  echo $Gasto->actualizarGasto($datos);
?>