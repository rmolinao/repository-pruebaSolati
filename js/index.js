// solicitud GET con Axios
const URL_estudiante = `http://localhost:3000/API/estudiantes.php`


const mostrarTabla = () =>
    {
        axios.get(URL_estudiante)
            .then(response => createTbody(response.data))
            .catch(error => console.error(error))
            .then(() => console.log("Peticion GET Finalizada"))//esta instruccion siempre se ejcuta;
    }

var table
const createTbody = datos =>
    {
        table = document.getElementById('tablaEstudiantes');

        if (table.querySelector('tbody')) {
            //ya existe un tbody
            table.querySelector('tbody').remove();
        }

        let tbody = document.createElement('tbody');

        cadena = ''
        datos.forEach(dato =>
            cadena += `<tr>
                <th scope="row">${dato.id}</th>
                <td>${dato.nombre}</td>
                <td>${dato.paterno}</td>
                <td>${dato.materno}</td>
                <td>${dato.email}</td>

                <td>
                    <a class="text-success" href="#">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>

                <td>
                    <a class="text-danger" href="#" onclick="eliminar(${dato.id})">
                        <i class="bi bi-trash3"></i>
                    </a>
                </td>

            </tr>`
        );

        tbody.innerHTML  = cadena;
        table.appendChild(tbody);
    }

mostrarTabla();

//enviar formulario
const limpiarCampos = target =>
    {
        target.nombre.value = '';
        target.paterno.value = '';
        target.materno.value = '';
        target.email.value = '';
    }

formEstudiantes = document.getElementById('form-estudiantes');

formEstudiantes.addEventListener('submit', element => {
    element.preventDefault();
    const target = element.target;

    data =
    {
        "nombre": target.nombre.value,
        "paterno": target.paterno.value,
        "materno": target.materno.value,
        "email": target.email.value
    }

    //peticion HTTP
    axios.post(URL_estudiante,data)
    .then(response => console.log(response))
    .catch(error => console.error(error))
    .then(() => console.log("Peticion POST Finalizada"))

    limpiarCampos(target);
    mostrarTabla();
})

const eliminar = id =>
{
    console.log(`eliminar el elemento ${id}`)
        //peticion HTTP
        axios.delete(URL_estudiante +`?id=${id}`)
        .then(response => console.log(response))
        .catch(error => console.error(error))
        .then(() => console.log("Peticion DELETE Finalizada"))
        mostrarTabla();
};
