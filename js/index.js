// solicitud GET con Axios
const URL_estudiante = `http://localhost:3000/API/estudiantes.php`


const mostrarTabla = () =>
    {
        axios.get(URL_estudiante)
            .then(response => createTbody(response.data))
            .catch(error => console.error(error))
            .then(() => console.log("Peticion GET Finalizada"))//esta instruccion siempre se ejcuta;
    }


const createTbody = datos =>
    {
        const table = document.getElementById('tablaEstudiantes');

        if (table.querySelector('tbody')) {
            console.log('ya exite un tbody')
            table.querySelector('tbody').remove();
        }

        let tbody = document.createElement('tbody');


        tr = datos.map(dato =>
            `<tr>
                <th scope="row">${dato.id}</th>
                <td>${dato.nombre}</td>
                <td>${dato.paterno}</td>
                <td>${dato.materno}</td>
                <td>${dato.email}</td>
            </tr>`
        );

        //dibujo en una cadena de texto HTML las tablas
        cadena = ''
        tr.forEach(element => {
            cadena = cadena + element;
        });

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
    console.log(target.nombre.value);
    console.log(target.paterno.value);
    console.log(target.materno.value);
    console.log(target.email.value);
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



