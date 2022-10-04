<html>
<body>
<?php
require('verifica.php');

if ($_SESSION["usuarioTipo"] != "ADM") echo "<script>alert('Você não é Administrador');top.location.href='index.php';</script>"; 

?>


</body>
</html>
