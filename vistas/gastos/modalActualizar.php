<?php
    $sql = "SELECT id_categoria, nombre FROM t_cat_categorias ORDER BY nombre";
    $respuesta = mysqli_query($conexion, $sql);
?>
<form id="frmActualizar" method="POST" onsubmit="return actualizarGasto()">
    <div id="GastosExistentesUpdate"></div>
        <input type="text" id="idGasto" name="idGasto" hidden="">
    <div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">actualizar Gasto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="idCategoriaU">Categoria</label>
                    <select name="idCategoriaU" id="idCategoriaU" class="form-control" required>
                        <option value=""></option>
                    <?php while($mostrar = mysqli_fetch_array($respuesta)): ?>
                        <option value="<?php echo $mostrar['id_categoria'] ?>"><?php echo $mostrar['nombre'] ?></option>
                    <?php endwhile; ?>
                    </select>
                    
                    <label for="montoU">Monto</label>
                    <input type="number" name="montoU" id="montoU" class="form-control" required>
                    <label for="descripcionU">Descripción</label>
                    <input type="text" name="descripcionU" id="descripcionU" class="form-control" required>
                    <label for="fechaU">Fecha</label>
                    <input type="date" name="fechaU" id="fechaU" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
                    <button class="btn btn-primary">actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>