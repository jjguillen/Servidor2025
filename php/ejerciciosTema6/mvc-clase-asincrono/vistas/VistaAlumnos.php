<?php

namespace Modulos\vistas;

use Modulos\modelos\Alumno;

class VistaAlumnos  {

    public static function render($alumnos) {


?>

        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>Alumnos</h6>
                  <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevoAlumno">
                    Nuevo
                  </button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">

                    <table class="table align-items-center justify-content-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Apellidos</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Edad</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Localidad</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Teléfono</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Acciones</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

        <?php
          foreach($alumnos as $alumno) {
        ?>

                        <tr>
                          <td>
                            <div class="d-flex px-2">
                              <div class="my-auto">
                                <h6 class="mb-0 text-sm"><?= $alumno->getNombre(); ?></h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?= $alumno->getApellidos(); ?></p>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?= $alumno->getEmail(); ?></p>
                          </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?= $alumno->getEdad(); ?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?= $alumno->getLocalidad(); ?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?= $alumno->getTelefono(); ?></p>
                            </td>
                          <td class="align-middle text-center">
                            <div class="d-flex align-items-center justify-content-center">
                              <span class="me-2 text-xs font-weight-bold">
                                <a href="#" accion="borrarA" ida="<?= $alumno->getId(); ?>"><i class="fas fa-trash me-3"></i></a>
                                <a href="index.php?accion=modifAlumno&id=<?= $alumno->getId(); ?>"><i class="fas fa-pen me-3"></i></a>
                                <a href="index.php?accion=verMatriculas&id=<?= $alumno->getId(); ?>"><i class="fas fa-eye"></i></a>
                              </span>
                            </div>
                          </td>

                          <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0">
                              <i class="fa fa-ellipsis-v text-xs"></i>
                            </button>
                          </td>

                        </tr>
        <?php
          }
        ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>



            <!-- Modal Nuevo Alumno -->
            <div class="modal fade" id="modalNuevoAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Alumno</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="index.php" id="nuevoAlumno">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Edad</label>
                                    <input type="number" class="form-control" name="edad" min="1" max="132" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Localidad</label>
                                    <input type="text" class="form-control" name="localidad" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" required>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" form="nuevoAlumno" name="nuevoAlumno" class="btn bg-gradient-primary">Crear</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php


    }


    public static function renderTodo($alumnos) {

        include("cabecera.php");
        ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Alumnos</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevoAlumno">
                                Nuevo
                            </button>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">

                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Apellidos</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Edad</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Localidad</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Teléfono</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Acciones</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    foreach($alumnos as $alumno) {
                                        ?>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm"><?= $alumno->getNombre(); ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?= $alumno->getApellidos(); ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?= $alumno->getEmail(); ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?= $alumno->getEdad(); ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?= $alumno->getLocalidad(); ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?= $alumno->getTelefono(); ?></p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                              <span class="me-2 text-xs font-weight-bold">
                                <a href="#" accion="borrarA" ida="<?= $alumno->getId(); ?>"><i class="fas fa-trash me-3"></i></a>
                                <a href="index.php?accion=modifAlumno&id=<?= $alumno->getId(); ?>"><i class="fas fa-pen me-3"></i></a>
                                <a href="index.php?accion=verMatriculas&id=<?= $alumno->getId(); ?>"><i class="fas fa-eye"></i></a>
                              </span>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0">
                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                </button>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal Nuevo Alumno -->
            <div class="modal fade" id="modalNuevoAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Alumno</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="index.php" id="nuevoAlumno">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Edad</label>
                                    <input type="number" class="form-control" name="edad" min="1" max="132" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Localidad</label>
                                    <input type="text" class="form-control" name="localidad" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" required>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" form="nuevoAlumno" name="nuevoAlumno" class="btn bg-gradient-primary">Crear</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include("pie.php");

    }

}