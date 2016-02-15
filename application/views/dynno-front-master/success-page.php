<?php
	$template = 'message-page';
	include 'includes/header_front.php';
?>

<div id="wrap-content">

	<section id="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xs-12"><a href="<?php echo base_url('welcome/index');?>">Inicio</a> / <a href="<?php echo base_url('welcome/index');?>">Registro éxitoso</a></div>
			</div>
		</div>
	</section>

	
		<div class="container">
			<div class="row">

				<div class="col-xs-12">
					<div class="message-success">
						<i class="icon-emoji-flirt"></i>
						<h1>Proceso exitoso</h1>
						<p>¡Eureka! Se termino correctamente el proceso. Revisa tu email y sigue las instrucciones.</p>
					</div>
				</div>

			</div>
		</div>
	

</div>

<?php include 'includes/footer_front.php'; ?>