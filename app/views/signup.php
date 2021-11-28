<div class="container-fluid">
	<div class="form">
		<form class="form-horizontal" role="form" method="POST" action="/signup/doReg">
			<div class="form-group">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" placeholder="Email" name="email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Номер телефона</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Номер телефона" name="phone">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" placeholder="Пароль" name="password">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Повторите пароль</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" placeholder="Повторите пароль" name="repeatPassword">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
					</div>
				</div>
                <?if(!$arResult['status'] AND isset($arResult)):?>
                    <div class="alert alert-danger" role="alert">
                        <?=$arResult['description']?>
                    </div>
                <?endif;?>
				<p class="fs-6">Уже есть аккаунт? <a href="/signin/">Войти!</a></p>
		</form>
	</div>
</div>