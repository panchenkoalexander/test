<h1>Авторизация</h1>
<?php
use \yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin();?>



<?= $form->field($login_model,'email')->textInput()->label('Ваша почта')?>
<?= $form->field($login_model,'password')->passwordInput()->label('Ваш пароль')?>
<div>
    <button type="submit" class="btn btn-success">Войти</button>
</div>

<?php
ActiveForm::end();
?>