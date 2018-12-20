<?php
    if (isset($_GET['editar'])) {
        $editar_id = $_GET['editar'];
    
    $sqlEdit = "SELECT * FROM clientes where id ='$editar_id'";
    $resultadoEdit = $conn->query($sqlEdit);
    $rowEdit = $resultadoEdit->fetch_array();

    $nombre =$rowEdit['nombre'];
    $apellidos =$rowEdit['apellidos'];
    $email =$rowEdit['email'];
    $telefono =$rowEdit['telefono'];
    $direccion =$rowEdit['direccion'];
    $vendedor =$rowEdit['vendedor'];
    echo "<script>";
    echo "modal ='".$editar_id."'";
    echo "</script>";
    }
?>

<div class="container">
        <div class="row">
            <div class="col mt-3">
                <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" area-labelledby="edit-modal" area-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-header">
                                        <h4 class="modal-title">Editar cliente</h4>
                                        <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form action="" method="POST" >
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nombre">Nombre</label>
                                            <input required type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php echo $nombre;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidos">Apellidos</label>
                                            <input required type="text" class="form-control" id="apellidos" placeholder="Apellidos" name="apellidos" value="<?php echo $apellidos;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electronico</label>
                                        <input required type="email" class="form-control" id="email" placeholder="Correo electronico" name="email" value="<?php echo $email;?>">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="direccion">Direccion</label>
                                            <input required type="text" class="form-control" id="direccion" placeholder="Calle Av Cra 1234 # - " name="direccion" value="<?php echo $direccion;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="telefono">Telefono</label>
                                            <input required type="number" class="form-control" id="telefono" placeholder="Telefono" name="telefono" value="<?php echo $telefono;?>">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vendedor">Vendedores</label>
                                            <?php
                                                require('funciones/bd_conexion.php');
                                                $sqlVendedores="SELECT * from vendedores";
                                                $resultadoVendedores = $conn->query($sqlVendedores);
                                                $sqlV="SELECT * from clientes WHERE id='$editar_id'";
                                                $resultadoV = $conn->query($sqlV);
                                                $rr = $resultadoV->fetch_array();?>
                                            <select required id="vendedor" class="form-control" name="vendedor">
                                                <option><?php echo $rr['vendedor'];?></option>
                                                <?php
                                                
                                                while($vendedores = $resultadoVendedores->fetch_assoc()){
                                                ?>
                                                <option><?php echo $vendedores['nombre'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" name="btnEditar" class="btn btn-primary">Editar cliente</button>
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
    $email_act = $_POST['email'];
    $telefono_act = $_POST['telefono'];
    $direccion_act = $_POST['direccion'];
    $vendedor_act = $_POST['vendedor'];

    $sqlAct = "UPDATE clientes SET nombre = '$nombre_act', apellidos = '$apellidos_act', email = '$email_act', telefono = '$telefono_act', direccion = '$direccion_act', vendedor = '$vendedor_act' WHERE id='$editar_id'";
    $resultadoAct = $conn->query($sqlAct);
    
    if ($resultadoAct) {
        echo "<script>window.open('clientes.php','_self')</script>";
    }else{
        echo "<script>alert('No actualizacos')</script>";
    }
    }
?>

