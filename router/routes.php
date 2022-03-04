<?php

use App\Services\Router;
use App\Controllers\Auth;
use App\Controllers\Package;

Router::page('/login' , 'login');
Router::page('/register' , 'register');
Router::page('/' , 'home');
Router::page('/profile' , 'profile');
Router::page('/order' , 'order');
Router::page('/acceptpay' , 'acceptpay');
Router::page('/successpackageapplication' , 'successpackageapplication');

Router::post('/auth/register' , Auth::class , 'register' , true);
Router::post('/auth/login' , Auth::class , 'login' , true);
Router::post('/auth/logout' , Auth::class , 'logout');
Router::post('/send/package' , Package::class , 'package', true);

Router::get('/checkPost','checkPost');
Router::get('/orderComplete','orderComplete');


Router::enable();