<div class="campo">
    <label for="nombre">Nombre</label>
    <input 
        type="text"
        id="nombre"
        placeholder="Nombre del servicio"
        name="nombre"
        value="<?php echo $servicio->nombre; ?>"
    />
</div>

<div class="campo">
    <label for="precio">Precio</label>
    <input 
        type="numbre"
        id="precio"
        placeholder="Precio del servicio"
        name="precio"
        value="<?php echo $servicio->precio; ?>"
    />
</div>