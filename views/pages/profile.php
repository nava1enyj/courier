<?php
use App\Services\Page;

if(!$_SESSION['user']){
    \App\Services\Router::redirect('/login');
}
?>
<html>
<?php
Page::par('head');
?>
<body>
<?php
Page::par('navbar');
?>
<div class="container-xxl">
    <h3>Личный кабинет</h3>
    <hr>
    <p class="fs-5">Привет <?= $_SESSION['user']['name'] ?></p>

   <?php
   if($_SESSION['user']['group'] === '1'){

       $packages = \R::findAll('package', "iduser = ? ORDER BY `approved` DESC" , [$_SESSION['user']['id']]);
       foreach ($packages as $package) {
       ?>
           <p>Откуда: <?=$package->first_address; ?></p>
           <p>Куда: <?=$package->last_address; ?></p>
           <p>Цена: <?=$package->price; ?></p>
           <?php
           if ($package->approved==='1'){
               ?>
               <p class="text-danger">Статус: обработка заказа</p>
               <?php
           }
           elseif ($package->approved==='2'){
               ?>
               <p class="text-primary">Статус: в пути</p>
               <?php
           }
           elseif ($package->approved==='3'){
               ?>
               <p class="text-success">Статус: Доставленно</p>
               <?php
           }
           ?>

           <hr>
        <?php
       }
   }

   if($_SESSION['user']['group'] === '2'){
       $packages = \R::findAll('package', "`price` < ?" , [500]);
       foreach ($packages as $package){
           ?>
           <div class="row align-items-start">
               <div class="col mb-3">
                   <p>Откуда: <?=$package->first_address; ?></p>
                   <p>Куда:  <?=$package->last_address; ?></p>
                   <p>Цена: <?=$package->price; ?></p>
                   <a class="" href="">Забрать заказ</a>
               </div>
               <div class="col">
                   One of three columns
               </div>
           </div>

            <?php
       }
   }
   ?>
</div>

</body>
</html>