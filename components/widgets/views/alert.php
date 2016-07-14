<?php

$dS = '<div class="alert alert-success">';
$dD = '<div class="alert alert-danger">';
$dE = '</div>';

if(\Yii::$app->session->hasFlash('success_delete_image'))
{
    echo $dS.\Yii::$app->getSession()->getFlash('success_delete_image').$dE;
}

if(\Yii::$app->session->hasFlash('error_delete_image'))
{
    echo $dS.\Yii::$app->getSession()->getFlash('success_delete_image').$dE;
}

if(\Yii::$app->session->hasFlash('error_save'))
{
    echo $dD.\Yii::$app->params['error_save'].$dE;
}

if(\Yii::$app->session->hasFlash('success_save'))
{
    echo $dS.\Yii::$app->params['success_save'].$dE;
}

if(\Yii::$app->session->hasFlash('success_delete'))
{
    echo $dS.\Yii::$app->session->getFlash('success_delete').$dE;
}

if(\Yii::$app->session->hasFlash('error_delete'))
{
    echo $dD.\Yii::$app->session->getFlash('error_delete').$dE;
}