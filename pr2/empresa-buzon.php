<!DOCTYPE html>
<html>
<?php include ('empresa-head.html'); ?>
  <body>
  <div id="container-empresa-buzon" class="container">
	<?php include ('empresa-menu.html'); ?>
	<?php include ('empresa-titlebar.html'); ?>
	<div id="content-empresa-buzon" class="content">
		<div id="empresa-buzon" class="buzon">
			<form class="form-buzon" id="form-buzon-empresa" action="" method="post">
			    <h2>Dejanos tus sugerencias y las leeremos cuanto antes</h2>
				<h1>¡Ayuda a mejorar Internprise!</h1>
				<fieldset>
      				<input placeholder="Asunto" type="text" tabindex="1"required autofocus>
    			</fieldset>
    			<fieldset>
      				<textarea placeholder="Texto explicativo..." tabindex="2" cols="100" rows="10" required></textarea>
    			</fieldset>
				<div>
					<input type="radio" name="motivo" value="Duda" checked="checked" /> Duda
					<input type="radio" name="motivo" value="Sugerencia" /> Sugerencia
					<input type="radio" name="motivo" value="Contacto" /> Contacto
					<input type="radio" name="motivo" value="Otro" /> Otro
				</div>
				<fieldset>
      				<button name="submit" type="submit" id="buzon-submit-empresa" data-submit="...Sending">Enviar</button>
    			</fieldset>
			</form>
		</div>
	</div>
  <?php include ('empresa-footer.html'); ?>
  </div>
  </body>
</html>