<?php 
    require_once('data.php');
    require_once('menu.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div class="menu-wrapper container">
        <h1 class="logo">Cafe Progate</h1>
        <h3>メニュー<?php echo Menu::getCount()?>品</h3>
        <form method="post" action="confirm.php">
            <div class="menu-items">
                <?php foreach($menus as $menu): ?>
                    <div class="menu-item">
                        <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
                        <a href="show.php?name=<?php echo $menu->getName()?>"><h3 class="menu-item-name"><?php echo $menu->getName()?></h3></a>
                        <?php if($menu instanceof Drink):?>
                        <p class="menu-item-type"><?php echo $menu->getType()?></p>
                        <?php else:?>
                        <?php for($i=1;$i<=$menu->getSpiciness();$i++):?>
                            <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class="icon-spiciness">
                        <?php endfor?>
                        <?php endif?>
                        <p class="prise">¥<?php echo $menu->getTaxIncludedPrice()?></p>
                        <input type="text" name="<?php echo $menu->getName()?>" value="0">
                        <span>個</span>
                    </div>
                <?php endforeach?>
            </div>
            <input type="submit" value="注文する">
        </form>
    </div>
</body>
</html>