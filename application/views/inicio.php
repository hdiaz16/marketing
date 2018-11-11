<!--Main layout-->
    <main>


        <section id="bienvenida" class="mt-2 text-center">

            <h1>Bienvenido al Sistema de Marketing Digital <strong><br><?php echo $this->session->userdata['usuario']['nombres']." ".$this->session->userdata['usuario']['apellidos'] ?></strong></h1>
            
        <br>
 
		<?php if($this->session->userdata['perfil-actual']['rol_id'] == 1) {?>
			<section id="resumen-administrador">
				<button onclick=""></button>
			</section>
 		<?php } ?>
 
		<?php if($this->session->userdata['perfil-actual']['rol_id'] == 1) {?>
 		<section id="resumen-root">
 			<div class="container">
 				<div class="row">
 					<div class="col-12 col-md-6">
 						<div class="administradores card-header white-text font-weight-bold">
 							<h3>Administradores</h3>
 						</div>
 						<div class="row">
 							<?php foreach ($administradores as $posicion => $administrador) { ?>
 								<div class="col-12">
 									<div class="card">
										<div class="row">
											<div class="mx-4 mt-2 col-12">
												<p class="mr-5  font-weight-bold">
												<?php  echo $administrador['nombres']." ".$administrador['apellidos'];?> > <i class="font-weight-bold"><?php echo $administrador['correo'] ?></i>
												</p>
												<p class="mb-2">Editado por última vez: <span class="blue-text"><?php echo $administrador['_update']; ?></span></p>
											</div>
										</div>
 									</div>
 								</div>

 							<?php } ?>
 						</div>
 					</div>
 					<div class="col-12 col-md-6">
 						<div class="empresas card-header white-text font-weight-bold">
 							<h3>Empresas</h3>
 						</div>

 						<div class="row">
 							<?php foreach ($empresas as $posicion => $empresa) { ?>
 								<div class="col-12">
 									<div class="card">
	 									<div class="row">
	 										<div class="mx-4 mt-2 col-12">
	 											<p class="m-0 mr-4 font-weight-bold">
	 											<?php  echo $empresa['razon_social'];?> > 
	 											<?php
	 											$contacto = json_decode($empresa['contacto']);  
	 											?>

	 											<?php if(isset($contacto)) {?>
													<span>{ <i><?php echo (isset($contacto->nombre) ? $contacto->nombre : "").", ".(isset($contacto->correo) ? $contacto->correo : "").", ".(isset($contacto->telefono) ? $contacto->telefono : "") ?></i> }</span>
	 											 <?php }?>
	 											</p>
	 											<p>Editado por última vez: <span class="blue-text"><?php echo $empresa['_update']; ?></span></p>
	 										</div>
	 									</div>
 									</div>
 								</div>

 							<?php } ?>
 						</div>
 					</div>
 				</div>
 			</div>
 		</section>
 		<?php } ?>


    </main>
    <!--Main layout-->

<script>
	
</script>

           

