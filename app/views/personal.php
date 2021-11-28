<div class="container">
	<div class="row mt-3">
        <div class="col-lg-4">
            <div class="container-fluid bg-light d-flex flex-column justify-content-center part-header">
                Последние покупки
            </div>
            <ul class="list-group">
                <?if($arResult['orders']):?>
                    <?foreach ($arResult['orders'] as $order):?>
                        <li class="list-group-item">
                            <div class="container-fluid">
                                <p class="fs-6">
                                    Заказ №RM-<?=$order['id']?>
                                </p>
                                <p class="fs-6">
                                    Оплачен: <?=$order['isPayed']?'Да':'Нет'?>
                                </p>
                                <p class="fs-6">
                                    Доставлен: <?=$order['isDelivered']?'Да':'Нет'?>
                                </p>
                            </div>
                        </li>
                    <?endforeach;?>
                <?endif;?>
            </ul>
        </div>
        <div class="col-lg-8">
            <div class="container-fluid bg-light d-flex flex-column justify-content-center part-header">
                Обо мне
            </div>
            <p class="fs-6 mt-0">Email: <?=$arResult['user']['data'][0]['email']?></p>
            <p class="fs-6 mt-0">Номер телефона: <?=$arResult['user']['data'][0]['phone']?></p>
            <p class="fs-6 mt-0">Дата регистрации: <?=$arResult['user']['data'][0]['regDate']?></p>
        </div>
    </div>
</div>