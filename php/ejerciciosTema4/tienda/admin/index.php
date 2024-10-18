<?php
  include "cabecera.php";

  //Obtener todos los productos de la BBDD
  $productos = consultarProductos();
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Productos</h6>
              <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevoProducto">
                Nuevo
              </button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Producto</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Precio</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Categoría</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Acciones</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

<?php
      foreach($productos as $producto) {   
?>

                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../web/img/<?= $producto['imagen']; ?>" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?= $producto['nombre']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?= $producto['precio']; ?></p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?= $producto['categoria']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">
                            <a href="controlador.php?accion=borrarProducto&id=<?= $producto['id']; ?>"><i class="fas fa-trash me-3"></i></a>
                            <a href="controlador.php?accion=modifProducto&id=<?= $producto['id']; ?>"><i class="fas fa-pen"></i></a>
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


<!-- Modal Nuevo Producto -->
<div class="modal fade" id="modalNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="controlador.php" id="nuevoProducto" enctype="multipart/form-data">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Precio</label>
                <input type="number" class="form-control" name="precio"  min="1" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Categoria</label>
                <select class="form-control" name="categoria" required>
                  <option value="electronica">Eléctronica</option>
                  <option value="hogar">Hogar</option>
                  <option value="gaming">Gaming</option>
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" required>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripción</label>
                <textarea class="form-control" name="descripcion"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" form="nuevoProducto" name="nuevoProducto" class="btn bg-gradient-primary">Crear</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  

<?php
  include "pie.php";
?>