<?php
$idOrder = $_SESSION['query'];

$orderUpdate = \R::load('package' , $idOrder);
$orderUpdate->approved = 3;
\R::store($orderUpdate);


\App\Services\Router::redirect('/profile');