<form method="POST" action="doLogin.php">
    <p>
        Usuario <input type="text" name="usuario">
    </p>
    <p>
        Clave <input type="password" name="clave">
    </p>
    <?php 
        $err = 0;
        if(isset($_GET['err'])) {
            $err = $_GET['err'];
        }

        if($err==1) {
            echo '<p><b>Usuario/clave incorrectos</b></p>';
        }
    ?>
    <p>
        <input type="submit" value="Iniciar">
    </p>
</form>