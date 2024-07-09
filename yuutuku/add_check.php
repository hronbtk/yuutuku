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
if(isset($_POST['penduramu_text'])){
    $penduramu_text=$_POST['penduramu_text'];
}
if(isset($_POST['scale'])){
    $penduramu_scale=$_POST['scale'];
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
                    echo '<img class=card_image src="./cardImage/'.$card_image['name'].'">';
                }  
            ?>
            <div class="detail_wrapper">
                <table class='card_text_detail' border="1">
                    <tr>
                        <th>
                            属性
                        </th>
                        <td>
                            <?php echo '<img class="card_element" width="20" height="20" src="./images/'.$element.'.png">'?>
                        </td>
                        <th>
                            レベル/<br>ランク
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
                                    if(isset($pORnot)){
                                        echo '<span>【'.$species.'/ペンデュラム/'.$kinds_monster.'】</span></div>';
                                    }else{
                                        echo '<div><span>【'.$species.'/'.$kinds_monster.'】</span></div>';
                                    }
                                }elseif(isset($pORnot)){
                                    echo '<span>【'.$species.'/'.$kinds_monster.'/ペンデュラム/効果】</span></div>';
                                }else{
                                    echo '<span>【'.$species.'/'.$kinds_monster.'/効果】</span></div>';
                                }
                            ?>
                        </td>
                    </tr>

                </table>
                <?php
                    if(isset($pORnot)){
                        echo '<table class="penduramu_detail" border="1"><tr><th>ペンデュラム効果</th><th>ペンデュラムスケール</th><td><img src="./images/messageImage_1720501698804.jpg" width="20" height="20">×'.$penduramu_scale.'</td></tr><tr><td colspan="3" class="text">'.$penduramu_text.'</td></tr></table>';
                    }
                ?>
                <table class="card_text" border="1">
                    <tr>
                        <th>
                            カードテキスト
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $text?>
                        </td>
                    </tr>
                </table>
            </div>

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