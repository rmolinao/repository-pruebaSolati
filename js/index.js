// solicitud GET con Axios
const URL_estudiante = `http://localhost:3000/API/estudiantes.php`

axios.get(URL_estudiante)
    .then(response => registros(response.data))
    .catch(error => console.error(error))
    .then(() => console.log("Peticion Finalizada linea 6"))//esta instruccion siempre se ejcuta;

const registros = datos => {
    console.log(datos);
    let table = document.getElementById('tablaEstudiantes');
    const tbody = document.createElement('tbody');
    tr = datos.map(dato =>
        `<tr>
            <th scope="row">${dato.id}</th>
            <td>${dato.nombre}</td>
            <td>${dato.paterno}</td>
            <td>${dato.materno}</td>
            <td>${dato.email}</td>
        </tr>`
    );
    tbody.innerHTML  = tr;
    table.appendChild(tbody);
}