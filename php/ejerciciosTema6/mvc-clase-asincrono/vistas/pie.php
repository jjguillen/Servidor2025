
    </div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by JJ
              </div>
            </div>
            
          </div>
        </div>
      </footer>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="./vistas/assets/js/core/popper.min.js"></script>
  <script src="./vistas/assets/js/core/bootstrap.min.js"></script>
  <script src="./vistas/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./vistas/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./vistas/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

  <!-- SPA ------------------------------------------------------------------->
  <script>

        document.getElementById("mostrarAlumnos").onclick = async function () {
            console.log("mostrar alumnos");
            const contenido = await (await fetch("index.php?accion=mostrarAlumnos")).text();
            document.getElementById("principal").innerHTML = contenido;
        }

        document.getElementById("mostrarModulos").onclick = async function () {
            console.log("mostrar modulos");
            const contenido = await (await fetch("index.php?accion=mostrarModulos")).text();
            document.getElementById("principal").innerHTML = contenido;
        }

        //Botón de borrrar Modulo y Alumno
        document.getElementById("principal").addEventListener("click", async function(e)  {
            let aBorrarM = e.target.closest("a[accion=borrarM]");
            if (aBorrarM) {
                let idM = aBorrarM.getAttribute("idm");
                console.log(idM);
                const response = await (await fetch("index.php?accion=borrarModulo&id="+idM)).text();
                document.getElementById("principal").innerHTML = response;
            }

            let aBorrarA = e.target.closest("a[accion=borrarA]");
            if (aBorrarA) {
                let idA = aBorrarA.getAttribute("ida");
                console.log(idA);
                const response = await (await fetch("index.php?accion=borrarAlumno&id="+idA)).text();
                document.getElementById("principal").innerHTML = response;
            }
        });




  </script>


</body>

</html>