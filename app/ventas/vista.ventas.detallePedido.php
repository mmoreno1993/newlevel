<div class="table">
	<table class="table table-responsive table-bordered">
		<thead>
			<tr class="primary">
				<td>Artículo</td>
				<td>Unidades</td>
				<td>Descuento</td>
				<td>Precio U.</td>
				<td>SubTotal</td>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($i=0; $i < count($_SESSION['cotizacionDetalle']) ; $i++) { 
			?>
			<tr id="<?php echo $_SESSION['cotizacionDetalle'][$i]['id'] ?>">
				<td><?php echo $_SESSION['cotizacionDetalle'][$i]['descripcion'] ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>