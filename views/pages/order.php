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
        <h3>Заказы</h3>
        <hr>
        <form>
            <div class="mb-2">
                <label for="" class="form-label">Откуда</label>
                <input type="text" class="form-control" aria-describedby="" id="firstAddress">
                <div id="" class="form-text">Полный адресс отправителя(откуда забрать)</div>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Куда</label>
                <input type="text" class="form-control" id="lastAddress">
                <div id="" class="form-text">Точный адресс получателя(куда принести)</div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Соседний город</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Недалекая перевозка</h6>
                                    <p class="card-text">Выберите этот пункт если вести надо не далеко</p>
                                    <h5>320 рублей</h5>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Соседний регион</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Средней дальности перевозка</h6>
                                    <p class="card-text">Выберите этот пункт если вести надо средне</p>
                                    <h5>420 рублей</h5>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check mb-2">
                        <input class="form-check-input"  type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Другая страна</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Далекая перевозка</h6>
                                    <p class="card-text">Далеко ехать придется. Морозная тумманая дорога(</p>
                                    <h5>1420 рублей</h5>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">Номер карты</label>
                    <input type="text" class="form-control" id="numberCard" aria-describedby="">
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">Срок действия</label>
                    <input type="text" class="form-control" id="timeCard" aria-describedby="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">CVV</label>
                    <input type="password" class="form-control" id="cvvCard" aria-describedby="">
                </div>
                <div class="mb-3 ms-3 form-check">
                    <input type="checkbox" class="form-check-input  me-3" id="checkBook">
                    <label class="form-check-label" for="exampleCheck1">Я согласен с <a href="/acceptpay" class="link-primary">важной бумагой</a></label>
                </div>
            </div>
            <p for="" class="mb-3 text-danger fs-6" id="msgReg"></p>
            <button type="submit" class="btn btn-primary ms-2" id="push-package">Отправить</button>
        </form>
    </div>
    </body>
    </html>
