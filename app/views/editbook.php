<?
$book = $arResult['BOOK']['data'][0];
?>
<div class="container">
	<form>
		<div class="form-group">
			<label for="exampleFormControlInput1">Название</label>
			<input type="text" class="form-control" id="exampleFormControlInput1" value="<?=$book['bookname']?>">
		</div>
        <div class="form-group row-m-t">
            <label for="exampleFormControlInput1">Изображение</label>
            <img src="<?=$book['preview_picture']?>">
            <input type="file" class="form-control row-m-t" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Год</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?=$book['year']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Кол-во страниц</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?=$book['pagesCount']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Рейтинг</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?=$book['rating']?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Издательство</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <?foreach ($arResult['PUBLISHERS']['data'] as $PUBLISHER):?>
                    <option <?=$PUBLISHER['idpublisher'] != $book['idpublisher']?:'selected'?>><?=$PUBLISHER['name']?></option>
                <?endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Автор</label>
            <select class="form-control" id="exampleFormControlSelect1">
	            <?foreach ($arResult['AUTHORS']['data'] as $AUTHOR):?>
                    <option <?=$AUTHOR['idauthor'] != $book['idauthor']?:'selected'?>><?=$AUTHOR['name'] . ' ' . $AUTHOR['surname'] . ' ' . $AUTHOR['lastname']?></option>
	            <?endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Язык</label>
            <select class="form-control" id="exampleFormControlSelect1">
	            <?foreach ($arResult['LANGS']['data'] as $LANG):?>
                    <option <?=$LANG['idlang'] != $book['idlang']?:'selected'?>><?=$LANG['name']?></option>
	            <?endforeach;?>
            </select>
        </div>
    </form>
</div>