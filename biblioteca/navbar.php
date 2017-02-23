<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse">

        <ul class="nav navbar-nav">
            <li class="active"><a href="lista_libros.php">Libros</a></li>
        </ul> <!-- este botón sale siempre porque está por encima de session, es decir, que aunque no se abra la sesion aparece el boton-->

        <div class="navbar-right"> <!-- esto es para que se vaya todo para la derecha-->
    	   <?php
    		  if (isset($_SESSION["usuario"])):
            ?>
                <a href="cerrar_sesion.php" class="btn btn-default navbar-btn">Cerrar sesión</a>
                <p class="navbar-text">Bienvenido, <?= $_SESSION["usuario"]["nombre"] ?></p>
            <?php
                else:
            ?>
                <a href="index.php" class="btn btn-default navbar-btn">Identificarse</a>

            <?php
                endif;
            ?>
        </div>
    </div>
  </div>
</nav>