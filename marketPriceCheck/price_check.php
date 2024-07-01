<?php
$kinds=$_POST['kinds'];
$card_name=$_POST['cardname'];
$card_image=$_FILES['cardimage'];
$lebel=$_POST['lebel'];
$text=$_POST['text'];
$typenumber1=$_POST['typenumber1'];
$typenumber2=$_POST['typenumber2'];



?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>遊戯王カードデータベース</title>
</head>
<body>
    下記のカードを追加しますか？<br><br>
    カード名<br>
    <div class="card_wrapper">

    </div><?php echo $card_name;?><br>
    <?php 
        if(isset($card_image)){
            if($card_image['size']<=0 || $card_image['size']>=1000000){
                echo '画像が大きすぎるか、見つかりません。';
            }else{
                move_uploaded_file($card_image['tmp_name'], './cardImage/' . $card_image['name']);
                echo '<img width="240" height="360" src="./cardImage/'.$card_image['name'].'">';
            }
        } 
    ?><br><br>
    <button type="submit" onclick="history.back()">修正する</button>
</body>
</html>