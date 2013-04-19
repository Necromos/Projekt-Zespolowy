<?php
$auth=Yii::app()->authManager;

$auth->createOperation('submitArticle');
$auth->createOperation('updateArticle');
$auth->createOperation('readArticle');
$auth->createOperation('deleteArticle');
$auth->createOperation('commentArticle');
$auth->createOperation('approveArticle');

$role=$auth->createRole('author');


$role=$auth->createRole('reviewer');


$role=$auth->createRole('editor');


$role=$auth->createRole('sectionEditor');


$role=$auth->createRole('manager');


?>