<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consumo</title>
</head>
<body>
<?php

    // obteniendo elementos de la Lista
        $url = 'http://localhost:8088/PruebaSolati/API/estudiantes.php';
        $file = file_get_contents($url);
        $array = json_decode($file,true);

?>

<?php
    if
    (
        isset($_POST["nombre"]) && !empty($_POST["nombre"])
        && isset($_POST["paterno"]) && !empty($_POST["paterno"])
        && isset($_POST["materno"]) && !empty($_POST["materno"])
        && isset($_POST["email"]) && !empty($_POST["email"])

        )
    {

        // echo $_POST["nombre"];
        // echo $_POST["paterno"];
        // echo $_POST["materno"];
        // echo $_POST["email"];


        $array1 = [
            "nombre" => $_POST["nombre"],
            "paterno" =>$_POST["paterno"],
            "materno" =>$_POST["materno"],
            "email" =>  $_POST["email"]
        ];
        print_r('<pre>');
        print_r($array1);
        print_r('</pre>');

        $url = 'http://localhost:8088/PruebaSolati/API/estudiantes.php';
        $ch = curl_init($url);
        $data = http_build_query($array1);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);


        if (curl_error($ch)) {
            echo curl_error($ch);
        }else{
            $decode = json_decode($response,true);
        }

        // print_r('<pre>');
        // print_r($decode);
        // print_r('</pre>');

        foreach ($decode as $index => $value) {
            echo "$index : $value <br>";
        }

        curl_close($ch);
    }

?>
<form action="" method="POST">
    <label for="nombre">nombre</label>
    <input type="text"  name="nombre" placeholder="nombre" required>
    <label for="paterno">Primer Nombre</label>
    <input type="text"  name="paterno" placeholder="" required>
    <label for="materno">Segundo Nombre</label>
    <input type="text"  name="materno" placeholder="" required>
    <label for="email">Correo</label>
    <input type="text"  name="email" placeholder="" required>
    <input type="submit" value="enviar">

</form>
<hr>
<table>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Corrreo</th>
    </tr>
    <?php foreach ($array as $registro) { ?>
    <tr>
        <td><?php echo $registro["id"];?></td>
        <td><?php echo $registro["nombre"];?></td>
        <td><?php echo $registro["paterno"];?></td>
        <td><?php echo $registro["materno"];?></td>
        <td><?php echo $registro["email"];?></td>
    </tr>
<?php } ?>

</table>



</body>
</html>