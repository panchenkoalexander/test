<h1>Регистрация</h1>
<?php
use \yii\widgets\ActiveForm;
use \yii\widgets\MaskedInput;

?>

<?php
    $form = ActiveForm::begin(['class'=>'form-horizontal']);
?>
<?php //<?= $form->field($model,'phone')->(    )?>

<?= $form->field($model,'name')->textInput()->label('Ваше имя')?>
<?= $form->field($model,'lastname')->textInput()->label('Ваша фамилия')?>
<?= $form->field($model,'email')->textInput()->label('Ваша почта')?>
<?=$form->field($model, 'phone')->widget(MaskedInput::className(),['mask' => '+(999) 999-999999'])->label('Ваш телефон')?>
<?=$form->field($model,'password')->passwordInput()->label('Ваш пароль')?>
<div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</div>

<?php
    ActiveForm::end();
?>

