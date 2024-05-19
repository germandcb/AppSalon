<h1 class="nombre-pagina">Panel de Administración</h1>

<?php
include_once __DIR__ . '/../templates/barra.php'
    ?>

<h2>Buscar Citas</h2>

<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
                type="date"
                name="fecha"
                id="fecha"
            />
        </div>
    </form>
</div>

<div class="citas-admin">
    <ul class="ci">
        <?php
        $idCita = 0;
        foreach( $citas as $cita) {
            if($idCita !== $cita->id){
        ?>
        <li>
            <p>ID: <span><?php echo $cita->id; ?></span></p>
            <p>Hora: <span><?php echo $cita->hora; ?></span></p>
            <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
            <p>Email: <span><?php echo $cita->email; ?></span></p>

            <h3>Servicios</h3>
        <?php
            $idCita = $cita->id;
        } // Fin de if ?>

            <p class="servicio"><?php echo $cita->servicio . ' ' . $cita->precio; ?></p>
        </li>
        <?php } // Fin de Foreach ?>
    </ul>
</div>