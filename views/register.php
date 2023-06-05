<?php
namespace app\views;
use app\core\form\Form;
?>

<h1 class="m-5">Register</h1>
<?php $form = Form::begin('', 'post', 'm-5')?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end()?>;

