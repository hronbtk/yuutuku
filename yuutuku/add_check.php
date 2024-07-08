<?php
$kinds=$_POST['kinds'];
$card_name=$_POST['cardname'];
$hurigana=$_POST['card_name_hurigana'];
$card_image=$_FILES['cardimage'];
$kinds_monster=$_POST['kinds-monster'];
$element=$_POST['element'];
$species=$_POST['species'];
$lebel=$_POST['lebel'];
$text=$_POST['text'];
$atk=$_POST['atk'];
$def=$_POST['def'];
if(isset($_POST['penduramu'])){
    $pORnot=$_POST['penduramu'];
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>遊戯王カードデータベース-追加確認</title>
</head>
<body>
    下記のカードを追加しますか？<br><br>
    <div class="wrapper">
        <div class="name_wrapper">
            <?php echo '<span class="hurigana">'.$hurigana.'</span>'?>
            <?php echo '<p class="card_name">'.$card_name.'</p>'?>
        </div>
        <div class="body_wrapper">
            <?php 
                if(isset($card_image)){
                    move_uploaded_file($card_image['tmp_name'], './cardImage/' . $card_image['name']);
                    echo '<img class=card_image width="120" height="180" src="./cardImage/'.$card_image['name'].'">';
                }  
            ?>
            <table class=card_text_detail>
                <tr>
                    <th>
                        属性
                    </th>
                    <td>
                        <?php echo '<img class="card_element" width="20" height="20" src="./images/'.$element.'.png">'?>
                    </td>
                    <th>
                        レベル/ランク
                    </th>
                    <td>
                        <?php
                        if($lebel=='nothing'){
                            echo '';
                        }else{
                            echo '<img class=card_lebel src="./images/lebel.png" width="17" height="17">×'.$lebel;
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        攻撃力
                    </th>
                    <td>
                        <?php echo $atk?>
                    </td>
                    <th>
                        守備力
                    </th>
                    <td>
                    <?php echo $def?>
                    </td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan="4">
                        <?php
                            if($kinds_monster=='通常'||$kinds_monster=='効果'){
                                echo '<div><span>【'.$species.'/'.$kinds_monster.'】</span><br>'.$text.'</div>';
                            }elseif(isset($pORnot)){
                                echo '<span>【'.$species.'/'.$kinds_monster.'/ペンデュラム/効果】</span><br>'.$text.'</div>';
                            }else{
                                echo '<span>【'.$species.'/'.$kinds_monster.'/効果】</span><br>'.$text.'</div>';
                            }
                        ?>
                    </td>
                </tr>

            </table>
        </div>


    </div>
<br><br>
    <button type="button" onclick="history.back()">修正する</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script>
    </script>
</body>
</html>