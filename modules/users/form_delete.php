<?php
    require_once($_SESSION['raiz'].'/modules/sections/role-access-admin.php');
    
    $id = $_POST['id'];
    $userimage = $_POST['userimage'];

    echo'
        <div class="form-data">
            <div class="head">
                <h1>Atención</h1>
            </div>
            <div class="delete">
                <h1>¿Estas seguro?</h1>
                <h2>¡Se borrará de forma permanente!</h2>
                <form name="form-delete-users" action="delete.php" method="POST">
                    <input style="display: none;" type="text" name="txtuserid" value="'.$id.'" />
                    <input style="display: none;" type="text" name="txtuserimage" value="'.$userimage. '" />
                    <button class="btn-si icon" type="submit" autofocus>check</button>
                </form>
                <form action="#" method="POST">
                    <button class="btn-no icon" name="btn" value="form_default" type="submit">close</button>
                </form>
            </div>
        </div>
        ';
echo '<div class="content-aside">';
	include_once "../sections/options-disabled.php";
echo '</div>';