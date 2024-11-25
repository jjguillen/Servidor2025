
<!-- Modal -->
<div class="modal fade" id="modalfav" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Series TV</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Serie añadida correctamente a favoritos</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>

    window.onload = getSeries();

    async function getSeries(page=1) {
        const api_key = "a74c122b22807a76b7637ac1407a045e";
        const url = "https://api.themoviedb.org/3/tv/top_rated?language=es-ES&page="+page+"&api_key="+api_key;
        const series = await (await fetch(url)).json();
        //console.log(series.results);

        let component = '<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">';
        for (const serie of series.results) {

            component += `
        <div class="col mb-2">
            <div class="card" style="width: 18rem;">
              <img src="https://image.tmdb.org/t/p/w500${serie.poster_path}" height="450px" card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">${serie.name}</h5>
                <a href="#" class="btn btn-primary" accion="favorito" id="${serie.id}" name="${serie.name}" image="${serie.poster_path}">Añadir</a>
              </div>
            </div>
        </div>`;

            //console.log(serie.name + " - ");
        }

        component += '</div>';

        component += `<button class='btn btn-success me-2' id='prev' page='${page}'>Prev</button>`;
        component += `<button class='btn btn-success' id='next' page='${page}'>Next</button>`;

        document.getElementById("principal").innerHTML = component;

        document.getElementById("prev").addEventListener("click", async function(e)  {
            let pagina = e.target.getAttribute("page");
            //console.log(pagina);
            if (pagina > 1) {
                await getSeries(pagina-1);
            }
        });

        document.getElementById("next").addEventListener("click", async function(e)  {
            let pagina = e.target.getAttribute("page");
            //console.log(pagina);
            await getSeries(parseInt(pagina)+1);
        });

    }


    document.getElementById("principal").addEventListener("click", async function(e)  {
        let favorito = e.target.closest("a[accion=favorito]");
        if (favorito) {
            let id = favorito.getAttribute("id");
            let name = favorito.getAttribute("name");
            let image = favorito.getAttribute("image");
            let response = await(await fetch("index.php?accion=addfav&id="+id+"&name="+name+"&image="+image)).text();
            console.log(response);
            var myModal = new bootstrap.Modal(document.getElementById('modalfav'));
            myModal.show();
        }
    });

    document.getElementById("explorar").addEventListener("click", async function(e)  {
        getSeries();
    });

    document.getElementById("misSeries").addEventListener("click", async function(e)  {
        let misSeries = await(await fetch("index.php?accion=misSeries")).json();

        let component = '<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">';
        for (const serie of misSeries) {

            component += `
            <div class="col mb-2">
                <div class="card" style="width: 18rem;">
                  <img src="https://image.tmdb.org/t/p/w500${serie.image}" height="450px" card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">${serie.name}</h5>
                    <a href="#" class="btn btn-primary" id="detalles" value="${serie.id}">Detalles</a>
                    <a href="#" class="btn btn-danger" id="delete" value="${serie.id}">X</a>
                  </div>
                </div>
            </div>`;
        }
        component += '</div>';

        document.getElementById("principal").innerHTML = component;

    });

    document.getElementById("search").addEventListener("input", async function(e)  {
        const text = e.target.value;

        const api_key = "a74c122b22807a76b7637ac1407a045e";
        const url = "https://api.themoviedb.org/3/search/tv?query="+text+"&include_adult=false?language=es-ES&api_key="+api_key;
        const series = await (await fetch(url)).json();
        //console.log(series.results);

        let component = '<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">';
        for (const serie of series.results) {

            component += `
            <div class="col mb-2">
                <div class="card" style="width: 18rem;">
                  <img src="https://image.tmdb.org/t/p/w500${serie.poster_path}" height="450px" card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">${serie.name}</h5>
                    <a href="#" class="btn btn-primary" accion="favorito" id="${serie.id}" name="${serie.name}" image="${serie.poster_path}">Añadir</a>
                  </div>
                </div>
            </div>`;
        }

        component += '</div>';
        document.getElementById("principal").innerHTML = component;

    });




</script>
</body>
</html>
