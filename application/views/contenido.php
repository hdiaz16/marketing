<main>
    <section class="mt-2">
        <h3 class="text-center"><strong>Creacion de Contenido</strong></h3>

        <section class="text-right">

            <button class="btn-floating btn-lg green" data-toggle="modal"
                    data-target="#modalLRFormDemo"
                    onclick="editarContenido()">
                <i class="fa fa-plus"></i>
            </button>

            <button class="btn-floating btn-lg warning-color">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red" onclick="">
                <i class="fa fa-minus"></i>
            </button>

        </section>
    </section>

    <br>

    <div class="row">
        <div class="col-6  offset-3">
            <select id="select_subtarea" class='mdb-select' >
                <option value="0">Selecciona una tarea</option>
                <?php foreach($subtareas as $subtarea) { ?>
                    <option tarea_id="<?php echo $subtarea['tarea_id'] ?>"
                            publicacion_id="<?php echo $subtarea['publicacion_id'] ?>"
                            value="<?php echo $subtarea['id'] ?>">
                        <?php echo $subtarea['nombre_campania'] ?>
                    </option>
                <?php } ?>
            </select>
            <textarea id="post_body" class="md-textarea z-depth-1" rows="1" cols="60" value="">
            </textarea>
            <br />
            <input id="post_link" class="form-control" type="text" placeholder="Link">
        </div>
    </div>
</main>
<!--Main layout-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/contenido.js"></script>
