<?php include_once 'includes/header.php' ?>
    
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <div class="modal fade" id="fm-modal" tabindex="-1" role="dialog" area-labelledby="fm-modal" area-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-header">
                                        <h4 class="modal-title">Crear cliente</h4>
                                        <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form action="clientes.php" method="POST" >
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nombre">Nombre</label>
                                            <input required type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidos">Apellidos</label>
                                            <input required type="text" class="form-control" id="apellidos" placeholder="Apellidos" name="apellidos">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electronico</label>
                                        <input required type="email" class="form-control" id="email" placeholder="Correo electronico" name="email">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="direccion">Direccion</label>
                                            <input required type="text" class="form-control" id="direccion" placeholder="Calle Av Cra 1234 # - " name="direccion">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="telefono">Telefono</label>
                                            <input required type="number" class="form-control" id="telefono" placeholder="Telefono" name="telefono">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vendedor">Vendedores</label>
                                            <select required id="vendedor" class="form-control" name="vendedor" placeholder="hhh">
                                            
                                            <?php
                                                require('funciones/bd_conexion.php');
                                                $sqlVendedores="SELECT nombre from vendedores";
                                                $resultadoVendedores = $conn->query($sqlVendedores);
                                                while($vendedores = $resultadoVendedores->fetch_assoc()){
                                                ?>
                                                <option ><?php echo $vendedores['nombre'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                        <button type="submit" name="enviar" class="btn btn-primary">Crear cliente</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $vendedor = $_POST['vendedor'];
        try{
            require_once('funciones/bd_conexion.php');
            $sqlInsert="INSERT INTO `clientes` (`id`,`nombre`,`apellidos`,`email`,`telefono`,`direccion`,`vendedor`)";
            $sqlInsert.="VALUES (NULL,'{$nombre}','{$apellidos}','{$email}','{$telefono}','{$direccion}','{$vendedor}')";
            $resultado = $conn->query($sqlInsert);
        } catch(Exception $e){
            $error = $e->getMessage();
        }
    }
    ?>

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-bordered table-hover  table-responsive">
                    <thead>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Apellidos
                            </th>
                            <th>
                                 Correo electronico 
                            </th>
                            <th>
                                Telefono
                            </th>
                            <th>
                                Direccion
                            </th>
                            <th>
                                Vendedor
                            </th>
                            <th>
                                Editar
                            </th>
                            <th>
                                Borrar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('funciones/bd_conexion.php');
                        $sqlSelect="SELECT * from clientes";
                        $resultadoSelect = $conn->query($sqlSelect);

                        while($clientes = $resultadoSelect->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $clientes['nombre'];?></td>
                            <td><?php echo $clientes['apellidos'];?></td>
                            <td><?php echo $clientes['email'];?></td>
                            <td><?php echo $clientes['telefono'];?></td>
                            <td><?php echo $clientes['direccion'];?></td>
                            <td><?php echo $clientes['vendedor'];?></td>
                            <td> <a href="clientes.php?editar=<?php echo $clientes['id'];?>"><i class="fal fa-user-edit"></i></a></td>
                            <td> <a href="clientes.php?borrar=<?php echo $clientes['id'];?>"><i class="fal fa-user-minus"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <button class="btn btn-primary" data-toggle="modal" data-target="#fm-modal">Crear nuevo cliente</button>
            </div>
        </div>
    </div>
    <?php
    if(isset($_GET['editar'])){
    include 'includes/editarc.php';
    };
    ?>
    <?php
    if(isset($_GET['borrar'])){
    $borrar_id = $_GET['borrar'];
    $sqlBorrar = "DELETE FROM clientes WHERE id = '$borrar_id'";
    $resultadoBorrar = $conn->query($sqlBorrar);
    if ($resultadoBorrar) {
        echo "<script>window.open('clientes.php','_self')</script>";
    }else{
        echo "<script>alert('No Eliminado')</script>";
    }
    };
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>