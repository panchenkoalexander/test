<?php

if (Yii::$app->user->isGuest)
{
    echo "<h1><center>you are not logged</h1></center>";
}
if (!Yii::$app->user->isGuest)
{
    echo "<h1><center>Привет " .Yii::$app->user->identity->name; echo "</h1></center>";
}