<div class="container-fluid">
    <div class="form">
        <form class="form-horizontal" role="form" method="POST" action="/signin/doAuth">
            <div class="form-group">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Пароль" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                </div>
				<?if(!$arResult['status'] AND isset($arResult)):?>
                    <div class="alert alert-danger" role="alert">
						<?=$arResult['description']?>
                    </div>
				<?endif;?>
                <p class="fs-6">Еще нет аккаунта? <a href="/signup/">Зарегистрироваться!</a></p>
        </form>
    </div>
</div>