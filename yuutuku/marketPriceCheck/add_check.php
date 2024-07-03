<?php
$kinds=$_POST['kinds'];
$card_name=$_POST['cardname'];
$card_image=$_FILES['cardimage'];
$kinds_monster=$_POST['kinds-monster'];
$element=$_POST['element'];
$species=$_POST['species'];
$lebel=$_POST['lebel'];
$text=$_POST['text'];


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
    <?php
        if($kinds_monster=='エクシーズ'){
            
        }
    ?>
    <div class="card_wrapper">
        <div class="card_name_wrapper">
        <?php echo '<p class="card_name">'.$card_name.'</p>';?>
        <?php echo'<img class="card_element" width="20" height="20" src="./images/'.$element.'.png">'?>
        
        </div>
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
        <?php 
            if($kinds_monster=='通常'||$kinds_monster=='効果'){
                echo '<div class=card_text><span>【'.$species.'/'.$kinds_monster.'】</span><br>'.$text.'</div>';
            }else{
            echo '<div class=card_text><span>【'.$species.'/'.$kinds_monster.'/効果】</span><br>'.$text.'</div>';

            }
        ?>
    </div>
    <div>
        テキスト拡大
        <?php echo '<div class=card_text_detail>'.$text.'</div>'?>
    </div>
<br><br>
    <button type="button" onclick="history.back()">修正する</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script>
    </script>
</body>
</html>