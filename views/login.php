<?php 

namespace app\views;
use app\core\form\Form;

?>
<link rel="stylesheet" href="css/loginStyle.css" >
<div class="container-fluid d-flex justify-content-center align-items-center h-100 p-0">
    <div class="row align-items-center m-5 container-t p-0">
        <div class="col-5 h-100 p-0">
            <img src="images/school-child.png" class="fit-image" alt="">
        </div>
        <div class="col-7 d-flex flex-column align-items-center">
            <h1 class="align-self-center m-3 fs-3">LOGIN</h1>
            <?php $form = Form::begin('', 'post', 'align-self-center m-3 d-flex flex-column')?>
                <?php echo $form->field($model, 'Nama_Siswa') ?>
                <br>
                <?php echo $form->field($model, 'ID_Siswa')->passwordField() ?>
                <button class="btn btn-primary p-2 m-auto w-25" type="submit" name="submit">Submit</button>
            <?php Form::end()?>
        </div>
    </div>
</div>
