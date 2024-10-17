<?php
  include "cabecera.php";
?>

    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Registro</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
<?php
    if (isset($_GET['error'])) {
      echo "<p class='text-danger'>Email ya registrado</p>";
    }
?>
              <section>
                <div class="page-header min-vh-75">
                  <div class="container">
                    <div class="row">
                      <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-2">
                          <div class="card-body">
                            <form role="form" method="POST" action="controlador.php">
                              <label>Email</label>
                              <div class="mb-2">
                                <input type="email" name="email" required class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                              </div>
                              <label>Password</label>
                              <div class="mb-2">
                                <input type="password" name="password" required minlength="8" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                              </div>
                              <label>Nombre</label>
                              <div class="mb-2">
                                <input type="text" name="nombre" required class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="nombre-addon">
                              </div>
                              <label>Apellidos</label>
                              <div class="mb-2">
                                <input type="text" name="apellidos" required    class="form-control" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="apellidos-addon">
                              </div>
                              <label>Ciudad</label>
                              <div class="mb-2">
                                <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" aria-label="Ciudad" aria-describedby="ciudad-addon">
                              </div>
                              <label>Teléfono móvil</label>
                              <div class="mb-2">
                                <input type="text" name="movil" class="form-control" placeholder="Teléfono móvil" aria-label="Movil" aria-describedby="movil-addon">
                              </div>
                              <label>Fecha nacimiento</label>
                              <div class="mb-2">
                                <input type="date" name="fechaN" class="form-control" placeholder="Fecha Nacimiento" aria-label="Fecha Nacimiento" aria-describedby="fechan-addon">
                              </div>
                              <div class="text-center">
                                <input type="submit" class="btn bg-gradient-info w-100 mt-2 mb-0" name="registro"></input>
                              </div>
                            </form>
                          </div>
                      
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                          <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
          
              </div>
            </div>
          </div>
        </div>
      </div>


<?php
  include "pie.php";
?>