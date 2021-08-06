<?php
  include "../../clases/Gastos.php";

  $Gasto=new Gastos();
  $idGasto=$_POST['idGasto'];
  echo json_encode($Gasto->obtenerDatos($idGasto));
?>