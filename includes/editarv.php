<?php
    if (isset($_GET['editar'])) {
        $editar_id = $_GET['editar'];
    
    $sqlEdit = "SELECT * FROM vendedores where id ='$editar_id'";
    $resultadoEdit = $conn->query($sqlEdit);
    $rowEdit = $resultadoEdit->fetch_array();

    $nombre =$rowEdit['nombre'];
    $apellidos =$rowEdit['apellidos'];
    $docIdent =$rowEdit['docIdent'];
    $email =$rowEdit['email'];
    $genero =$rowEdit['genero'];
    $fecha =$rowEdit['fecha'];
    echo "<script>";
    echo "modal ='".$editar_id."'";
    echo "</script>";
    }
?>

<div class="container">
        <div class="row">
            <div class="col mt-3">
                <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" area-labelledby="edit-modal"
                    area-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar vendedor</h4>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nombre">Nombre</label>
                                            <input required type="text" class="form-control" id="nombre" placeholder="Nombre"
                                                name="nombre" value="<?php echo $nombre;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellido">Apellidos</label>
                                            <input required type="text" class="form-control" id="apellido" placeholder="Apellidos"
                                                name="apellidos" value="<?php echo $apellidos;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electronico</label>
                                        <input required type="email" class="form-control" id="email" placeholder="Correo electronico"
                                            name="email" value="<?php echo $email;?>">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="genero">Genero</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <div class="form-check">
                                                <input required class="form-check-input" type="radio" name="genero" value="masculino"
                                                <?php
                                                if ($genero=='masculino') {
                                                    echo "checked";
                                                }
                                                ?>
                                                >
                                                <label class="form-check-label" for="masculino">
                                                    Maculino
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="form-check">
                                                <input required class="form-check-input" type="radio" name="genero" value="femenino"
                                                <?php
                                                if ($genero=='femenino') {
                                                    echo "checked";
                                                }
                                                ?>
                                                >
                                                <label class="form-check-label" for="femenino">
                                                    Femenino
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="direccion">Documento de identidad</label>
                                            <input required type="numer" class="form-control" id="documentoI" placeholder="Documento de identidad" name="documentoI" value="<?php echo $docIdent;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fecha">Fecha de ingreso</label>
                                            <input required class="form-control" type="date" id="fecha" name="fecha" value="<?php echo $fecha;?>">
                                        </div>
                                    </div>
                                    <button type="submit" name="btnEditar" class="btn btn-primary">Editar vendedor</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    if(isset($_POST['btnEditar'])){
    $nombre_act = $_POST['nombre'];
    $apellidos_act = $_POST['apellidos'];
    $docIdent_act = $_POST['documentoI'];
    $email_act = $_POST['email'];
    $genero_act = $_POST['genero'];
    $fecha_act = $_POST['fecha'];

    $sqlAct = "UPDATE vendedores SET nombre = '$nombre_act', apellidos = '$apellidos_act', docIdent = '$docIdent_act', email = '$email_act', genero = '$genero_act', fecha = '$fecha_act' WHERE id='$editar_id'";
    $resultadoAct = $conn->query($sqlAct);
    
    if ($resultadoAct) {
        echo "<script>window.open('vendedores.php','_self')</script>";
    }else{
        echo "<script>alert('No actualizacos')</script>";
    }
    }
?>

