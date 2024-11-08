<?php

namespace Modulos\vistas;

class VistaMatriculas  {

    public static function render($modulos, $alumno) {

        include("cabecera.php");
?>

        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>Módulos en los que está matriculado <?= $alumno->getNombre();?> </h6>
                  <a href="index.php?accion=matricular&idAlumno=<?= $alumno->getId();?>" type="button" class="btn btn-outline-primary btn-sm">
                    Matricular
                  </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">

                    <table class="table align-items-center justify-content-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ciclo</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Curso</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Horas</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Acciones</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

        <?php
          foreach($modulos as $modulo) {
        ?>

                        <tr>
                          <td>
                            <div class="d-flex px-2">
                              <div class="my-auto">
                                <h6 class="mb-0 text-sm"><?= $modulo->getNombre(); ?></h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?= $modulo->getCiclo(); ?></p>
                          </td>
                          <td>
                            <span class="text-xs font-weight-bold"><?= $modulo->getCurso(); ?></span>
                          </td>
                            <td>
                                <span class="text-xs font-weight-bold"><?= $modulo->getHoras(); ?></span>
                            </td>
                          <td class="align-middle text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="index.php?accion=borrarMatricula&idModulo=<?= $modulo->getId(); ?>&idAlumno=<?= $alumno->getId();?>"><i class="fas fa-trash me-3"></i></a
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



            <!-- Modal Nuevo Modelo -->
            <div class="modal fade" id="modalNuevoModulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Modulo</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="index.php" id="nuevoModulo">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Ciclo</label>
                                    <select class="form-control" name="ciclo" required>
                                        <option value="DAW">DAW</option>
                                        <option value="DAM">DAM</option>
                                        <option value="ASIR">ASIR</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Curso</label>
                                    <select class="form-control" name="curso" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Horas</label>
                                    <input type="number" class="form-control" name="horas" value="1" min="1" max="12" required>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" form="nuevoModulo" name="nuevoModulo" class="btn bg-gradient-primary">Crear</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
        include("pie.php");

    }

}