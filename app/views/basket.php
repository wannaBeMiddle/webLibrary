<div class="container">
    <div class="row">
        <div class="col-lg-8">
        <?if($arResult['items']):?>
            <?foreach($arResult['items'] as $item):?>
                    <div class="card mt-3">
                        <div class="card-header">
							<?=$item['name']?>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Количество: <?=$item['count']?>шт.</p>
                            <p class="card-text"><?=number_format(str_replace(' ', '', $item['cost']), 0, ',', ' ')?> ₽</p>
                            <a href="/basket/delete/<?=$item['id']?>" class="btn btn-danger">Удалить из корзины</a>
                        </div>
                    </div>
            <?endforeach;?>
        <?endif;?>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card">
                <h5 class="card-header">Корзина</h5>
                <div class="card-body">
                    <p class="card-text">Стоимость товара <?=number_format($arResult['basketPrice']['sum'], 0, ',', ' ')?>₽</p>
                    <p class="card-text">Стоимость доставки 500₽</p>
                    <p class="card-text">Итого к оплате <?=$arResult['basketPrice']['sum'] > 0 ?number_format($arResult['basketPrice']['delivery'], 0, ',', ' ') : 0?>₽</p>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Полный адрес</label>
                        <textarea class="form-control full-address" id="exampleFormControlTextarea1" rows="3" placeholder="Введите адрес"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Дополнительная информация</label>
                        <textarea class="form-control full-address" id="exampleFormControlTextarea1" rows="3" placeholder="Что нам стоит знать?"></textarea>
                    </div>
                    <a href="/basket/pay/<?=$arResult['basketPrice']['id']?>" class="btn btn-primary">Оплатить</a>
                </div>
            </div>
        </div>
    </div>
</div>