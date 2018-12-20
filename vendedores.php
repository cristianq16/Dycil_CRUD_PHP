<?php include_once 'includes/header.php' ?>
    
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <div class="modal fade" id="fm-modal" tabindex="-1" role="dialog" area-labelledby="fm-modal"
                    area-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-header">
                                    <h4 class="modal-title">Crear vendedor</h4>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="vendedores.php" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nombre">Nombre</label>
                                            <input required type="text" class="form-control" id="nombre" placeholder="Nombre"
                                                name="nombre">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellido">Apellidos</label>
                                            <input required type="text" class="form-control" id="apellido" placeholder="Apellidos"
                                                name="apellidos">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electronico</label>
                                        <input required type="email" class="form-control" id="email" placeholder="Correo electronico"
                                            name="email">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="genero">Genero</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <div class="form-check">
                                                <input required class="form-check-input" type="radio" name="genero" value="masculino">
                                                <label class="form-check-label" for="masculino">
                                                    Maculino
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="form-check">
                                                <input required class="form-check-input" type="radio" name="genero" value="femenino">
                                                <label class="form-check-label" for="femenino">
                                                    Femenino
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="direccion">Documento de identidad</label>
                                            <input required type="numer" class="form-control" id="documentoI" placeholder="Documento de identidad" name="documentoI">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fecha">Fecha de ingreso</label>
                                            <input required class="form-control" type="date" value="" id="fecha" name="fecha">
                                        </div>
                                    </div>
                                    <button type="submit" name="enviar" class="btn btn-primary">Crear vendedor</button>
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
        $docIdent = $_POST['documentoI'];
        $email = $_POST['email'];
        $genero = $_POST['genero'];
        $fecha = $_POST['fecha'];
        try{
            require('funciones/bd_conexion.php');
            $sql="INSERT INTO `vendedores` (`id`,`nombre`,`apellidos`,`docIdent`,`email`,`genero`,`fecha`)";
            $sql.="VALUES (NULL,'{$nombre}','{$apellidos}','{$docIdent}','{$email}','{$genero}','{$fecha}')";
            $resultado = $conn->query($sql);
        } catch(Exception $e){
            $error = $e->getMessage();
        }
    }
    ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table table-responsive">
                    <thead>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Apellidos
                            </th>
                            <th>
                                Documento de identidad
                            </th>
                            <th>
                                Correo electronico
                            </th>
                            <th>
                                Genero
                            </th>
                            <th>
                                Fecha de ingreso
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
                        $sqlSelect="SELECT * from vendedores";
                        $resultadoSelect = $conn->query($sqlSelect);

                        while($vendedores = $resultadoSelect->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $vendedores['nombre'];?></td>
                            <td><?php echo $vendedores['apellidos'];?></td>
                            <td><?php echo $vendedores['docIdent'];?></td>
                            <td><?php echo $vendedores['email'];?></td>
                            <td><?php echo $vendedores['genero'];?></td>
                            <td><?php echo $vendedores['fecha'];?></td>
                            <td> <a href="vendedores.php?editar=<?php echo $vendedores['id'];?>"><i class="fal fa-user-edit"></i></a></td>
                            <td> <a href="vendedores.php?borrar=<?php echo $vendedores['id'];?>"><i class="fal fa-user-minus"></i></a></td>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#fm-modal">Crear nuevo vendedor</button>
            </div>
        </div>
    </div> 
    <?php
    if(isset($_GET['editar'])){
    include 'includes/editarv.php';
    };
    ?>
    <?php
    if(isset($_GET['borrar'])){
    $borrar_id = $_GET['borrar'];
    $sqlBorrar = "DELETE FROM vendedores WHERE id = '$borrar_id'";
    $resultadoBorrar = $conn->query($sqlBorrar);
    if ($resultadoBorrar) {
        echo "<script>window.open('vendedores.php','_self')</script>";
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