<?php

namespace Modulos\vistas;

use Modulos\modelos\Alumno;


class VistaAlumnosFormUpdate  {

    public static function render(Alumno $alumno) {

        include("cabecera.php");
?>

        <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Modificar Alumno</h6>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2 col-10">

                        <form method="post" action="index.php" id="modificarAlumno">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?= $alumno->getNombre();?>" required>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->getApellidos();?>" required>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $alumno->getEmail();?>" required>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Edad</label>
                                <input type="number" class="form-control" name="edad" value="<?= $alumno->getEdad();?>" min="1" max="130" required>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Localidad</label>
                                <input type="text" class="form-control" name="localidad" value="<?= $alumno->getLocalidad();?>" required>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" value="<?= $alumno->getTelefono();?>" required>
                            </div>
                            
                            <input type="hidden" name="id" value="<?= $alumno->getId();?>">
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" form="modificarAlumno" name="modificarAlumno" class="btn bg-gradient-primary">Modificar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<?php
        include("pie.php");

    }

}