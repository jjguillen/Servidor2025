<?php

namespace ModulosMG\vistas;

use ModulosMG\modelos\Modulo;


class VistaModulosFormUpdate  {

    public static function render(Modulo $modulo) {

        include("cabecera.php");
?>

        <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Modificar Modulo</h6>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2 col-10">

                        <form method="post" action="index.php" id="modificarModulo">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?= $modulo->getNombre();?>" required>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Ciclo</label>
                                <select class="form-control" name="ciclo" required>

                                    <?php
                                    if (strcmp($modulo->getCiclo(),"DAW")) {
                                        echo '<option value="DAW" selected>DAW</option>';
                                    } else {
                                        echo '<option value="DAW">DAW</option>';
                                    }
                                    if (strcmp($modulo->getCiclo(),"DAM")) {
                                        echo '<option value="DAM" selected>DAM</option>';
                                    } else {
                                        echo '<option value="DAM">DAM</option>';
                                    }
                                    if (strcmp($modulo->getCiclo(),"ASIR")) {
                                        echo '<option value="ASIR" selected>ASIR</option>';
                                    } else {
                                        echo '<option value="ASIR">ASIR</option>';
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Curso</label>
                                <select class="form-control" name="curso" required>

                                    <?php
                                    if ($modulo->getCurso() == 1) {
                                        echo '<option value="1" selected>1</option>';
                                    } else {
                                        echo '<option value="1">1</option>';
                                    }
                                    if ($modulo->getCurso() == 2) {
                                        echo '<option value="2" selected>2</option>';
                                    } else {
                                        echo '<option value="2">2</option>';
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Horas</label>
                                <input type="number" class="form-control" name="horas" value="<?= $modulo->getHoras();?>" min="1" max="12" required>
                            </div>

                            <input type="hidden" name="id" value="<?= $modulo->getId();?>">
                        </form>

                        <div class="modal-footer">
                            <button type="reset" form="modificarModulo" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Limpiar</button>
                            <button type="submit" form="modificarModulo" name="modificarModulo" class="btn bg-gradient-primary">Modificar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<?php
        include("pie.php");

    }

}