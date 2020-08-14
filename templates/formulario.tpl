{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2" />
        <title>Listado de Autores</title>
	</head>
	
    <body>
		<h1>{$titulo} AUTOR</h1>
		<form method="post" action="grabar.php" enctype="multipart/form-data">
			<input type="hidden" name="accion" value="{$accion}"/>
			<input type="hidden" name="id" value="{$datos.id}"/>
			<table>
				<tr>
					<td align="rigth"><strong>NOMBRE: </strong></td>
					<td align="left">
						<input type="text" name="nombre" value="{$datos.nombre}"/>
					</td>
				</tr>
				<tr>
					<td align="rigth"><strong>ESPECIALIDAD: </strong></td>
					<td align="left">
						<input type="text" name="especialidad" value="{$datos.especialidad}"/>
					</td>
				</tr>
				<tr>
					<td align="rigth"><strong>CARGO: </strong></td>
					<td align="left">
						<input type="text" name="cargoqueocupa" value="{$datos.cargoqueocupa}"/>
					</td>
				</tr>
				<tr>
					<td align="rigth"><strong>FOTO: </strong></td>
					<td align="left">
						<input type="file" name="fotoArchivo">
						<input type="hidden" name="foto" value="{$datos.foto}"/>
					</td>
				</tr>				
			</table>
			<input type="submit" value="GRABAR"/>
		</form>
    </body>

</html>
