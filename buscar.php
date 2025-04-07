<?php
$busqueda = null;
if (isset($_GET["busqueda"])) {
# Y si hay, búsqueda, entonces cambiamos la consulta
# Nota: no concatenamos porque queremos prevenir inyecciones SQL
$busqueda = $_GET["busqueda"];
$consulta = "SELECT * FROM personas WHERE nombre = ?";
}
# Preparar sentencia e indicar que vamos a usar un cursor
$sentencia = $base_de_datos->prepare($consulta, [
PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
# Aquí comprobamos otra vez si hubo búsqueda, ya que tenemos que pasarle argumentos al ejecutar
# Si no hubo búsqueda, entonces traer a todas las personas (mira la consulta de la línea 5)
if ($busqueda === null) {
# Ejecutar sin parámetros
$sentencia->execute();
} else {
# Ah, pero en caso de que sí, le pasamos la búsqueda
# Un arreglo que nomás llevará la búsqueda con % al inicio y al final
$parametros = ["%$busqueda%"];
$sentencia->execute($parametros);
}
?>