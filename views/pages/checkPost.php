<?php

echo $_SESSION['query'];

$idOrder = $_SESSION['query'];


$order= \R::dispense('takeorders');
$order->idOrder  = $idOrder;
$order->idUser = $_SESSION['user']['id'];
\R::store($order);

$orderUpdate = \R::load('package' , $idOrder);
$orderUpdate->approved = 2;
\R::store($orderUpdate);

\App\Services\Router::redirect('/profile');