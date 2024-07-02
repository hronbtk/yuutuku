<?php
$kinds=$_POST['kinds'];
$card_name=$_POST['cardname'];
$card_image=$_FILES['cardimage'];
$lebel=$_POST['lebel'];
$text=$_POST['text'];
// $typenumber1=$_POST['typenumber1'];
// $typenumber2=$_POST['typenumber2'];



?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>遊戯王カードデータベース</title>
</head>
<body>
    下記のカードを追加しますか？<br><br>
    <div class="card_wrapper">
        <?php echo '<p class="card_name">'.$card_name.'</p>';?><br>
        <div class="lebel_area">
            <?php
                if($lebel=='nothing'){
                    echo '';
                }else{
                    for($i=1;$i<=$lebel;$i++){
                        echo '<img class=card_lebel src="./images/lebel.png" width="17" height="17">';
                    }
                }
            ?>
        </div>
        <?php 
        if(isset($card_image)){
            if($card_image['size']<=0 || $card_image['size']>=1000000){
                echo '画像が大きすぎるか、見つかりません。';
            }else{
                move_uploaded_file($card_image['tmp_name'], './cardImage/' . $card_image['name']);
                echo '<img class=card_image width="188" height="190" src="./cardImage/'.$card_image['name'].'">';
            }
        } 
        ?>
        <?php echo '<div class=card_text>'.$text.'</div>'?>
    </div>
    <div>
        テキスト拡大
        <?php echo '<div class=card_text_detail>'.$text.'</div>'?>
    </div>
<br><br>
    <button type="submit" onclick="history.back()">修正する</button>
</body>
</html>