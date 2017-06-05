<?php
/**
 * Created by untitled.
 * User: chalosalvador
 * Date: 30/5/17
 * Time: 17:39
 */


$conn = new mysqli('localhost', 'root', '', 'clase7');

if($conn->connect_error) {
    echo 'Error! ' . $conn->connect_error;
    exit;
}

echo 'Conexión exitosa!<br>';

echo '<br>';

if($_POST) {

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$usuario = $_POST['usuario'];
	$clave = md5($_POST['clave']);


	$sql = "INSERT INTO cliente
      (nombre, apellido, usuario, clave)
      VALUES
      ('$nombre', '$apellido', '$usuario', '$clave')";

	$res1 = $conn->query($sql);

	if($conn->error) {
		echo 'Ocurrió un error: ' . $conn->error;
	} else {
		echo 'Registro insertado correctamente';
	}
}

$sql = "SELECT * FROM cliente";
$res = $conn->query($sql);
?>


<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Clave</th>
        </tr>
    </thead>
    <tbody>
<?php if($res->num_rows > 0) : ?>
    <?php while($row = $res->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['nombre'] ?></td>
            <td><?php echo $row['apellido'] ?></td>
            <td><?php echo $row['usuario'] ?></td>
            <td><?php echo $row['clave'] ?></td>
        </tr>
    <?php endwhile; ?>
<?php endif; ?>
    </tbody>
</table>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1>Insertar usuario</h1>
<form action="" method="post">
    <div>
    <label for="">Nombre</label>
        <input type="text" name="nombre">
    </div>

    <div>
        <label for="">Apellido</label>
        <input type="text" name="apellido">
    </div>

    <div>
        <label for="">Usuario</label>
        <input type="text" name="usuario">
    </div>

    <div>
        <label for="">Clave</label>
        <input type="password" name="clave">
    </div>

    <div>
        <button>Enviar</button>
    </div>
</form>
</body>
</html>
