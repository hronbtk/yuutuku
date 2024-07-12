<?php
require_once('common.php');
$post=sanitize($_POST);
$kinds=$post['kinds'];
if($kinds=='monster'){
    $card_name=$post['cardname'];
    $hurigana=$post['card_name_hurigana'];
    $card_image=$_FILES['cardimage'];
    $kinds_monster=$post['kinds-monster'];
    $element=$post['element'];
    $species=$post['species'];
    $lebel=$post['lebel'];
    $text=$post['text'];
    $atk=$post['atk'];
    $def=$post['def'];
    if(isset($post['penduramu'])){
        $pORnot=$post['penduramu'];
    }
    if(isset($post['penduramu_text'])){
        $penduramu_text=$post['penduramu_text'];
    }
    if(isset($post['scale'])){
        $penduramu_scale=$post['scale'];
    }
}
if($kinds=='magic'){
    $card_name=$post['cardname'];
    $hurigana=$post['card_name_hurigana'];
    $card_image=$_FILES['cardimage'];
    $kinds_magic=$post['']
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="/common.css">
    <link rel="stylesheet" href="style.css">
    <title>遊戯王カードデータベース-追加確認</title>
</head>
<body>
    下記のカードを追加しますか？<br><br>
    <?php
        if($kinds=='monster'){
            echo '<div class="wrapper">';
            echo '<div class="name_wrapper">';
            echo '<span class="hurigana">'.$hurigana.'</span>';
            echo '<p class="card_name">'.$card_name.'</p>';
            echo '</div>';
            echo '<div class="body_wrapper">';
            if(isset($card_image)){
                move_uploaded_file($card_image['tmp_name'], './cardImage/' . $card_image['name']);
                echo '<img class=card_image src="./cardImage/'.$card_image['name'].'">';
            }
            echo '<div class="detail_wrapper">';
            echo '<table class="card_text_detail" border="1">';
            echo '<tr><th>属性</th>';
            echo '<td>';
            echo '<img class="card_element" width="20" height="20" src="./images/'.$element.'.png">';
            echo '</td>';
            echo '<th>';
            echo 'レベル/<br>ランク';
            echo '</th>';
            echo '<td>';
            if($lebel=='nothing'){
                echo '';
            }elseif($lebel!=='nothing'&& $kinds_monster=='エクシーズ'){
                echo '<img class=card_lebel src="./images/ranku.png" width="17" height="17">×'.$lebel;
            }else{
                echo '<img class=card_lebel src="./images/lebel.png" width="17" height="17">×'.$lebel;
            }
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<th>攻撃力</th>';
            echo '<td>'.$atk.'</td>';
            echo '<th>守備力</th>';
            echo '<td>'.$def.'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="4">';
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
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            if(isset($pORnot)){
                echo '<table class="penduramu_detail" border="1"><tr><th>ペンデュラム効果</th><th>ペンデュラムスケール</th><td><img src="./images/messageImage_1720501698804.jpg" width="20" height="20">×'.$penduramu_scale.'</td></tr><tr><td colspan="3" class="text">'.$penduramu_text.'</td></tr></table>';
            }
            echo '<table class="card_text" border="1">';
            echo '<tr>';
            echo '<th>カードテキスト</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo $text;
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div><br><br>';
        }
        if($kinds=='magic'){
            echo '<div class="wrapper">';
            echo '<div class="name_wrapper">';
            echo '<span class="hurigana">'.$hurigana.'</span>';
            echo '<p class="card_name">'.$card_name.'</p>';
            echo '</div>';
            echo '<div class="body_wrapper">';
            if(isset($card_image)){
                move_uploaded_file($card_image['tmp_name'], './cardImage/' . $card_image['name']);
                echo '<img class=card_image src="./cardImage/'.$card_image['name'].'">';
            }
            echo '<div class="detail_wrapper">';
            echo '<table class="card_text_detail" border="1">';
            echo '<tr><th>効果</th>';
            echo '<td>';
            echo $kinds_magic.'魔法';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '</tr>';
            echo '</table>';
            echo '<table class="card_text" border="1">';
            echo '<tr>';
            echo '<th>カードテキスト</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo $text;
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div><br><br>';
        }
    ?>
                        
                    
                
            

        


    
    
    <form action="add_done.php" method="post">
        <input type="hidden" name="kinds" value="<?php echo $kinds?>">
        <input type="hidden" name="cardname" value="<?php echo $card_name?>">
        <input type="hidden" name="card_name_hurigana" value="<?php echo $hurigana?>">
        <input type="hidden" name="card_image_name" value="<?php echo $card_image['name']?>">
        <input type="hidden" name="kinds-monster" value="<?php echo $kinds_monster?>">
        <input type="hidden" name="element" value="<?php echo $element?>">
        <input type="hidden" name="species" value="<?php echo $species?>">
        <input type="hidden" name="lebel" value="<?php echo $lebel?>">
        <input type="hidden" name="text" value="<?php echo $text?>">
        <input type="hidden" name="atk" value="<?php echo $atk?>">
        <input type="hidden" name="def" value="<?php echo $def?>">
        <?php 
            if(isset($post['penduramu'])){
                echo '<input type="hidden" name="pORnot" value="true">';
                echo '<input type="hidden" name="penduramu_text" value="'.$penduramu_text.'">';
                echo '<input type="hidden" name="scale" value="'.$penduramu_scale.'">';
            }
        ?>
        <button type="submit">追加する</button>
    </form>
    <button type="button" onclick="history.back()">修正する</button>
</body>
</html>