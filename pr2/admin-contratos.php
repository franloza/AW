 <!DOCTYPE html>
<html>
<?php include ('admin-head.html'); ?>
  <body>
  <div id="container-historial" class="admin-container">
	<?php include ('admin-menu.html'); ?>
	<?php include ('admin-titlebar.html'); ?>
	<div id="content-historial" class="admin-content">
        <div id="filtros">
            <label>Estudios</label>
            <select class="filtro">
                <option value="ing-inf">Grado en Ingenier�a Inform�tica</option>
                <option value="ing-com">Grado en Ingenier�a de Computadores</option>
                <option value="ing-sof">Grado en Ingenier�a del Software</option>
                <option value="dbl-grad-inf-mat">Doble Grado Ingenier�a Inform�tica - Matem�ticas</option>
            </select>
        </div>

        <input type=image src="img/mover-a-la-anterior.jpg" width="25" height="15">
        <input type=image src="img/mover-a-la-siguiente.jpg" width="25" height="15">

	   <div id="tabla-historial">
        <table class="admin-table">
        <tr>
            <th>ID Contrato</th>
            <th>Empresa</th>
            <th>Nombre estudiante</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Puesto</th>
            <th>Accion</th>
        </tr>
        <tr>
            <td>0051299</td>
            <td>Everis</td>
            <td>Antonio P�rez S�nchez</td>
            <td>12/03/2014</td>
            <td>30/07/2014</td>
            <td>Programador Java</td>
            <td><a href="#">Ver</a></td>
        </tr>
        <tr>
            <td>0051100</td>
            <td>Everis</td>
            <td>Elvira Jurado P�rez</td>
            <td>12/03/2014</td>
            <td>30/07/2014</td>
            <td>Programador PHP</td>
            <td><a href="#">Ver</a></td>
        </tr>
        <tr>
            <td>0051101</td>
            <td>Indra</td>
            <td>Pedro Ramirez Garc�a</td>
            <td>13/03/2014</td>
            <td>31/12/2014</td>
            <td>Administrador de Sistemas</td>
            <td><a href="#">Ver</a></td>
        </tr>
        <tr>
            <td>0051101</td>
            <td>Iberdrola</td>
            <td>Javier Vega Rodriguez</td>
            <td>15/03/2014</td>
            <td>31/09/2014</td>
            <td>Analista de datos</td>
            <td><a href="#">Ver</a></td>
        </tr>
        </table>
        </div>

        <input type=image src="img/mover-a-la-anterior.jpg" width="25" height="15">
        <input type=image src="img/mover-a-la-siguiente.jpg" width="25" height="15">
        
	</div>
  </div>
  </body>
</html>
