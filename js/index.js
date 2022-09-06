let url = 'http://localhost:8088/PruebaSolati/API/estudiantes.php';
let estudiantes = [];

console.log('index.js');
function obtenerEstudiantes() {
    axios({
        method:'GET',
        url:url,
        responseType:'json'
    }).then( res =>
        {
            console.log(res.data)
            // this.estudiantes = res.data;
        })
    .catch(error=>{console.error(error)});
}
obtenerEstudiantes();
