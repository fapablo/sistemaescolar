<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

function unique_id($l = 10)
{
	return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

$id_generate = 'tchr' . unique_id(6);
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Agregar</h1>
	</div>
	<div class="body">
		<form name="form-add-teachers" action="insert.php" method="POST">
			<div class="wrap">
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input class="text" style=" display: none;" type="text" name="txtuserid" value="<?php echo $id_generate; ?>" maxlength="50" required />
					<input id="txtuserid" class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="" placeholder="Nombre" maxlength="30" required autofocus />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="" placeholder="Apellidos" maxlength="50" required />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectgender" required>
						<option value="">Seleccioné</option>
						<option value="mujer">Mujer</option>
						<option value="hombre">Hombre</option>
						<option value="otro">Otro</option>
						<option value="nodecirlo">Prefiero no decirlo</option>
					</select>
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
					<label for="txtusercurp" class="label">CURP</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="" placeholder="CURP" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required />
				</div>
				<div class="last">
					<label for="txtuserrfc" class="label">RFC</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="" placeholder="XAXX010101000" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserphone" class="label">Telefono</label>
					<input id="txtuserphone" class="text" type="number" name="txtphone" value="" placeholder="9998887766" min="0" max="9999999999" maxlength="10" required />
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="" placeholder="Domicilio" maxlength="200" required />
					<label for="selectusercareer" class="label">Facultad</label>
					<select id="selectusercareer" class="select" name="selectcareer" required>
						<option value="">Seleccioné</option>
						<?php
						$i = 0;

						$sql = "SELECT * FROM careers ORDER BY name";

						if ($result = $conexion->query($sql)) {
							while ($row = mysqli_fetch_array($result)) {
								echo "<option value='" . $row['career'] . "'>" . $row['name'] . "</option>";

								$i += 1;
							}
						} else {
							$_SESSION['msgbox_info'] = 0;
							$_SESSION['msgbox_error'] = 1;
							$_SESSION['text_msgbox_error'] = 'No existen registros en el modulo de carreras.';

							header('Location: /modules/students');
						}
						?>
					</select>
					<label for="selectuserlevelstudies" class="label">Nivel de estudios</label>
					<select id="selectuserlevelstudies" class="select" name="selectlevelstudies" required>
						<option value="">Seleccioné</option>
						<option value="Licenciatura">Licenciatura</option>
						<option value="Ingenieria">Ingenieria</option>
						<option value="Maestria">Maestria</option>
						<option value="Doctorado">Doctorado</option>
					</select>
					<label for="selectuserspecialty" class="label">Especialidad</label>
					<input id="selectuserspecialty" class="text" type="text" name="txtspecialty" value="" placeholder="Especialidad" maxlength="100" required />
				</div>
			</div>
			<button id="btnBack" class="btn back icon" type="button">arrow_back</button>
            <button id="btnNext" class="btn icon" type="button">arrow_forward</button>
            <button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php
	include_once "../sections/options-disabled.php";
	?>
</div>
<script src="/js/modules/administratives.js" type="text/javascript"></script>