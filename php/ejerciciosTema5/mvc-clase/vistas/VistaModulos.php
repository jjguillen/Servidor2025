<?php

namespace Modulos\vistas;

class VistaModulos  {

    public static function render($modulos) {

        include("cabecera.php");
?>

        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>Módulos</h6>
                  <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevoProducto">
                    Nuevo
                  </button>
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
                              <span class="me-2 text-xs font-weight-bold">
                                <a href="index.php?accion=borrarProducto&id=<?= $modulo->getId(); ?>"><i class="fas fa-trash me-3"></i></a>
                                <a href="index.php?accion=modifProducto&id=<?= $modulo->getId(); ?>"><i class="fas fa-pen"></i></a>
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


<?php
        include("pie.php");

    }

}