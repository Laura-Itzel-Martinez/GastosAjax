<?php
  include "../../clases/Gastos.php";
  $Gastos=new Gastos();

  $idGasto=$_POST['idGasto'];
  echo $Gastos->eliminarGastos($idGasto);
  
?>