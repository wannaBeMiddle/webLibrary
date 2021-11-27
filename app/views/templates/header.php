<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?=$pathModification?>includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$pathModification?>styles/templates/header.css?<?=time()?>" rel="stylesheet">
    <?if($css):?>
        <link href="<?=$css?>" rel="stylesheet">
	<?endif;?>
	<title>Online store</title>
</head>
<body>
<nav class="bg-dark">
    <ul class="nav justify-content-center">
        <li class="nav-item menu-button">
            <a class="nav-link text-light" aria-current="page" href="/">Каталог</a>
        </li>
        <li class="nav-item menu-button">
            <a class="nav-link text-light" href="/basket/">Корзина</a>
        </li>
        <li class="nav-item menu-button">
            <a class="nav-link text-light" href="/personal/">Личный кабинет</a>
        </li>
    </ul>
</nav>
<script src="<?=$pathModification?>includes/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>