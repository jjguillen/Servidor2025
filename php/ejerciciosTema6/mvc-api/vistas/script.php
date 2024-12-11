<!-- SPA ------------------------------------------------------------------->
<script>

    window.onload = cargarPilotos();

    async function cargarPilotos() {
        //const response = await (await fetch("index.php?accion=llamarAPI")).text();

        const response = await (await fetch("http://ergast.com/api/f1/2024/20/driverStandings.json")).json();

        var text_html = `
                <h2>Pilotos</h2>
                <div class='table-responsive small'>
                    <table class='table table-striped table-sm'>
                        <thead>
                        <tr>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Escudería</th>
                            <th scope='col'>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
            `;

        const pilotos = response.MRData.StandingsTable.StandingsLists[0].DriverStandings;
        var pilotoName;
        var pilotoEscuderia;
        for(const piloto of pilotos) {
            pilotoName = piloto.Driver.givenName + " " + piloto.Driver.familyName;
            pilotoEscuderia = piloto.Constructors[0].name;
            text_html += `<tr>`;
            text_html += `<td>${pilotoName}</td>`;
            text_html += `<td>${pilotoEscuderia}</td>`;
            text_html += `<td><a href='index.php?accion=addPiloto&pn=${pilotoName}&ps=${pilotoEscuderia}' class='btn'>+</a></td>`;
            text_html += `</tr>`;
        }

        text_html += `</tbody></table></div>`;

        document.getElementById("principal").innerHTML = text_html;

    }

</script>

</body>
</html>