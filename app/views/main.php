<div class="container d-flex flex-wrap justify-content-around">
    <?if(isset($arResult) AND $arResult['status']):?>
        <?foreach($arResult['data'] as $item):?>
            <div class="card">
                <img src="<?=$item['imagePath']?>" class="card-img-top" alt="<?=$item['name']?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$item['name']?></h5>
                    <p class="fs-5"><?=$item['cost']?> ₽</p>
                    <a href="/basket/<?=$item['id']?>" class="btn btn-primary container-fluid">В корзину</a>
                </div>
            </div>
        <?endforeach;?>
    <?endif;?>
</div>