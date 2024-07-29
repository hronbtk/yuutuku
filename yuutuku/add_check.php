<?php
require_once('common.php');
$post=sanitize($_POST);
$kinds=$post['kinds'];
$card_name=$post['cardname'];
$hurigana=$post['card_name_hurigana'];
$card_image=$_FILES['cardimage'];

if($kinds=='monster'){
    if(isset($post['link'])==true){
        $link_number=$post['link_number'];
        if(isset($post['ue'])){
            $ue=true;
        }
        if(isset($post['sita'])){
            $sita=true;
        }
        if(isset($post['hidari'])){
            $hidari=true;
        }
        if(isset($post['migi'])){
            $migi=true;
        }
        if(isset($post['hidariue'])){
            $hidariue=true;
        }
        if(isset($post['migiue'])){
            $migiue=true;
        }
        if(isset($post['hidarisita'])){
            $hidarisita=true;
        }
        if(isset($post['migisita'])){
            $migisita=true;
        }
        $element=$post['element'];
        $species=$post['species'];
        $text=$post['text'];
        $atk=$post['atk'];
    }else{
        $kinds_monster=$post['kinds-monster'];
        $element=$post['element'];
        $species=$post['species'];
        $lebel=$post['lebel'];
        $text=$post['text'];
        $atk=$post['atk'];
        $def=$post['def'];
        if(isset($post['tuner'])){
            $tuner=true;
        }
        if(isset($post['penduramu'])){
            $pORnot=$post['penduramu'];
            $penduramu_text=$post['penduramu_text'];
            $penduramu_scale=$post['scale'];
        }
    }

}
if($kinds=='magic'){
    $kinds_magic=$post['kinds_magic'];
    $text=$post['text'];
}
if($kinds=='trap'){
    $kinds_trap=$post['kinds_trap'];
    $text=$post['text'];
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
            if(isset($post['link'])){
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
                echo 'LINK-';
                echo '</th>';
                echo '<td>';
                echo $link_number;
                echo '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>攻撃力</th>';
                echo '<td>'.$atk.'</td>';
                echo '<th>守備力</th>';
                echo '<td>-</td>';
                echo '</tr>';
                echo '<tr>';
                echo '</tr>';
                echo '<tr>';
                echo '<td colspan="4">';
                if(isset($post['noeffect'])){
                    echo '【'.$species.'/リンク】';
                }else{
                    echo '【'.$species.'/リンク/効果】';
                }
                echo '</td>';
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
            }else{
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
                        if(isset($tuner)){
                        echo '<span>【'.$species.'/ペンデュラム/チューナー/'.$kinds_monster.'】</span></div>';
                        }else{
                        echo '<span>【'.$species.'/ペンデュラム/'.$kinds_monster.'】</span></div>';
                        }
                    }else{
                        if(isset($tuner)){
                        echo '<div><span>【'.$species.'/チューナー/'.$kinds_monster.'】</span></div>';
                        }else{
                        echo '<div><span>【'.$species.'/'.$kinds_monster.'】</span></div>';
                        }
                    }
                }elseif(isset($pORnot)){
                    if(isset($tuner)){
                    echo '<span>【'.$species.'/'.$kinds_monster.'/ペンデュラム/チューナー/効果】</span></div>';
                    }else{
                        echo '<span>【'.$species.'/'.$kinds_monster.'/ペンデュラム/効果】</span></div>';
                    }
                }else{
                    if(isset($tuner)){
                    echo '<span>【'.$species.'/'.$kinds_monster.'/チューナー/効果】</span></div>';
                    }else{
                        if(isset($post['noeffect'])){
                            echo '<span>【'.$species.'/'.$kinds_monster.'】</span></div>';
                        }else{
                            echo '<span>【'.$species.'/'.$kinds_monster.'/効果】</span></div>';
                        }
                    }
                }
                echo '</td>';
                echo '</tr>';
                echo '</table>';
                if(isset($pORnot)){
                    echo '<table class="penduramu_detail" border="1"><tr><th>ペンデュラム効果</th><th>ペンデュラムスケール</th><td><img src="./images/messageImage_1720501698804.jpg" width="20" height="20">'.$penduramu_scale.'</td></tr><tr><td colspan="3" class="text">'.$penduramu_text.'</td></tr></table>';
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
            echo '<td colspan="2" style="text-align:left; padding:5px;">'.$text.'</td>';
            echo '</tr>';
            echo '</table>';
        }
        if($kinds=='trap'){
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
            echo $kinds_trap.'罠';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="2" style="text-align:left; padding:5px;">'.$text.'</td>';
            echo '</tr>';
            echo '</table>';
        }
    ?>
                        
                    
                
            

        


    
    
    <form action="add_done.php" method="post">
        <?php
        if($kinds=="monster"){
            if(isset($post['link'])){
                echo '<input type="hidden" name="link" value="'.$post['link'].'">';
                echo '<input type="hidden" name="link_number" value="'.$link_number.'">';
                echo '<input type="hidden" name="kinds" value="'.$kinds.'">';
                echo '<input type="hidden" name="card_name" value="'.$card_name.'">';
                echo '<input type="hidden" name="hurigana" value="'.$hurigana.'">';
                echo '<input type="hidden" name="card_image_name" value="'.$card_image['name'].'">';
                echo '<input type="hidden" name="element" value="'.$element.'">';
                echo '<input type="hidden" name="species" value="'.$species.'">';
                echo '<input type="hidden" name="text" value="'.$text.'">';
                echo '<input type="hidden" name="atk" value="'.$atk.'">';
                if(isset($post['ue'])){
                    $ue=true;
                    echo '<input type="hidden" name="ue" value="'.$ue.'">';
                }
                if(isset($post['sita'])){
                    $ue=true;
                    echo '<input type="hidden" name="sita" value="'.$sita.'">';
                }
                if(isset($post['hidari'])){
                    $ue=true;
                    echo '<input type="hidden" name="hidari" value="'.$hidari.'">';
                }
                if(isset($post['migi'])){
                    $ue=true;
                    echo '<input type="hidden" name="migi" value="'.$migi.'">';
                }
                if(isset($post['hidariue'])){
                    $ue=true;
                    echo '<input type="hidden" name="hidariue" value="'.$hidariue.'">';
                }
                if(isset($post['migiue'])){
                    $ue=true;
                    echo '<input type="hidden" name="migiue" value="'.$migiue.'">';
                }
                if(isset($post['hidarisita'])){
                    $ue=true;
                    echo '<input type="hidden" name="hidarisita" value="'.$hidarisita.'">';
                }
                if(isset($post['migisita'])){
                    $ue=true;
                    echo '<input type="hidden" name="migisita" value="'.$migisita.'">';
                }
                if(isset($post['noeffect'])==true){
                    echo '<input type="hidden" name="noeffect" value="true">';
                }
            }else{
                echo '<input type="hidden" name="kinds" value="'.$kinds.'">';
                echo '<input type="hidden" name="card_name" value="'.$card_name.'">';
                echo '<input type="hidden" name="hurigana" value="'.$hurigana.'">';
                echo '<input type="hidden" name="card_image_name" value="'.$card_image['name'].'">';
                echo '<input type="hidden" name="kinds_monster" value="'.$kinds_monster.'">';
                echo '<input type="hidden" name="element" value="'.$element.'">';
                echo '<input type="hidden" name="species" value="'.$species.'">';
                echo '<input type="hidden" name="lebel" value="'.$lebel.'">';
                echo '<input type="hidden" name="text" value="'.$text.'">';
                echo '<input type="hidden" name="atk" value="'.$atk.'">';
                echo '<input type="hidden" name="def" value="'.$def.'">';
                if(isset($post['penduramu'])){
                    echo '<input type="hidden" name="pORnot" value="true">';
                    echo '<input type="hidden" name="penduramu_text" value="'.$penduramu_text.'">';
                    echo '<input type="hidden" name="scale" value="'.$penduramu_scale.'">';
                }
                if(isset($post['tuner'])){
                    echo '<input type="hidden" name="tuner" value="true">';
                }
                if(isset($post['noeffect'])==true){
                    echo '<input type="hidden" name="noeffect" value="true">';
                }
            }

        }
        if($kinds=="magic"){
            echo '<input type="hidden" name="kinds" value="'.$kinds.'">';
            echo '<input type="hidden" name="card_name" value="'.$card_name.'">';
            echo '<input type="hidden" name="hurigana" value="'.$hurigana.'">';
            echo '<input type="hidden" name="card_image_name" value="'.$card_image['name'].'">';
            echo '<input type="hidden" name="kinds_magic" value="'.$kinds_magic.'">';
            echo '<input type="hidden" name="text" value="'.$text.'">';
        }
        if($kinds=="trap"){
            echo '<input type="hidden" name="kinds" value="'.$kinds.'">';
            echo '<input type="hidden" name="card_name" value="'.$card_name.'">';
            echo '<input type="hidden" name="hurigana" value="'.$hurigana.'">';
            echo '<input type="hidden" name="card_image_name" value="'.$card_image['name'].'">';
            echo '<input type="hidden" name="kinds_trap" value="'.$kinds_trap.'">';
            echo '<input type="hidden" name="text" value="'.$text.'">';
        }
        ?>
        <button type="submit">追加する</button>
    </form>
    <button type="button" onclick="history.back()">修正する</button>
</body>
</html>