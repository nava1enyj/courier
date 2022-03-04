<?php

namespace App\Controllers;
use App\Services\ValidationCheck;

class Package
{

    public function package($data){
        $errorFields = [];
        $price = ValidationCheck::protectionAgainstXss($data['price']);
        $checkbook = ValidationCheck::protectionAgainstXss($data['checkbookForFuture']);
        $firstAddress = ValidationCheck::protectionAgainstXss($data['firstAddress']);
        $lastAddress = ValidationCheck::protectionAgainstXss($data['lastAddress']);
        $numberCard = ValidationCheck::protectionAgainstXss($data['numberCard']);
        $timeCard = ValidationCheck::protectionAgainstXss($data['timeCard']);
        $cvvCard = ValidationCheck::protectionAgainstXss($data['cvvCard']);


        if($price === '0'){
            $errorFields[] =  'flexRadioDefault1';
            $errorFields[] =  'flexRadioDefault2';
            $errorFields[] =  'flexRadioDefault3';

        }

        if($checkbook === '0'){
            $errorFields[] =  'checkBook';
        }

        if($firstAddress === '' || strlen($firstAddress) < 12){
            $errorFields[] =  'firstAddress';
        }

        if($lastAddress === '' || strlen($lastAddress) < 12){
            $errorFields[] =  'lastAddress';
        }

        if($numberCard === '' || strlen($numberCard) < 16 || strlen($numberCard) > 17|| preg_match( '/[^0-9]/', $numberCard)){
            $errorFields[] =  'numberCard';
        }
        if($timeCard === '' || strlen($timeCard) < 4){
            $errorFields[] =  'timeCard';
        }

        if($cvvCard === '' || strlen($cvvCard) < 2 ||  strlen($cvvCard) > 5 || preg_match( '/[^0-9]/', $cvvCard)){
            $errorFields[] =  'cvvCard';
        }



        if(!empty($errorFields)){
            $response = [

                'status' => false,
                'type' => 1, //валидация плохая
                'massage' => 'УПС! Проверьте правильность полей',
                'fields' => $errorFields

            ];

            echo json_encode($response);


            die();
        }



        $package = \R::dispense('package');
        $package->iduser = $_SESSION['user']['id'];
        $package->price = $price;
        $package->firstAddress = $firstAddress;
        $package->lastAddress = $lastAddress;
        $package->numberCard = $numberCard;
        $package->timeCard = $timeCard;
        $package->cvvCard = $cvvCard;
        $package->approved = 1;//1 - нет
        \R::store($package);

        $response = [
            'status' => true
        ];

        echo json_encode($response);

        die();
    }

}