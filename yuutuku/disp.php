<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        $card_name=$_GET['name'];
        $kinds=$_GET['kinds'];

        if($kinds=='monster'){
            $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
            $user='root';
            $password = '';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql='SELECT * FROM monstercard_data where name=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$card_name;
            $stmt->execute($data);
    
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $card_name=$rec['name'];
            $furigana=$rec['furigana'];
            $img_name=$rec['img_name'];
            $kinds_monster=$rec['kinds_monster'];
            $tuner=$rec['tuner'];
            $pORnot=$rec['pORnot'];
            $penduramu_scale=$rec['scale'];
            $penduramu_text=$rec['penduramu_text'];
            $element=$rec['element'];
            $lebel=$rec['lebel'];
            $species=$rec['species'];
            $atk=$rec['atk'];
            $def=$rec['def'];
            $text=$rec['text'];
            $noeffect=$rec['noeffect'];
    
            $disp_img='<img class=card_image width="160" height="240" src="./cardImage/'.$img_name.'">';
            $dbh=null;
    
            echo '<div class="wrapper">';
            echo '<div class="name_wrapper">';
            echo '<span class="hurigana">'.$furigana.'</span>';
            echo '<p class="card_name">'.$card_name.'</p>';
            echo '</div>';
            echo '<div class="body_wrapper">';
    
            echo $disp_img;
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
                if($pORnot==''){
                    if($tuner==''){
                        echo '<span>【'.$species.'/'.$kinds_monster.'】</span></div>';
                    }else{
                    echo '<span>【'.$species.'/チューナー/'.$kinds_monster.'】</span></div>';
                    }
                }else{
                    if($tuner==''){
                        echo '<div><span>【'.$species.'/ペンデュラム/'.$kinds_monster.'】</span></div>';
                    }else{
                    echo '<div><span>【'.$species.'/ペンデュラム/チューナー/'.$kinds_monster.'】</span></div>';
                    }
                }
            }elseif($pORnot==true){
                if($tuner==''){
                    echo '<span>【'.$species.'/'.$kinds_monster.'/ペンデュラム/効果】</span></div>';
                }else{
                echo '<span>【'.$species.'/'.$kinds_monster.'/ペンデュラム/チューナー/効果】</span></div>';
                }
            }else{
                if($tuner==''){
                    if($noeffect==''){
                        echo '<span>【'.$species.'/'.$kinds_monster.'/効果】</span></div>';
                    }else{
                    echo '<span>【'.$species.'/'.$kinds_monster.'】</span></div>';
                    }
                }else{
                echo '<span>【'.$species.'/'.$kinds_monster.'/チューナー/効果】</span></div>';
    
                }
            }
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            if($pORnot==true){
                echo '<table class="penduramu_detail" border="1"><tr><th>ペンデュラム効果</th><th>ペンデュラムスケール</th><td><img src="./images/messageImage_1720501698804.jpg" width="20" height="20">'.$penduramu_scale.'</td></tr><tr><td colspan="3" class="text">'.$penduramu_text.'</td></tr></table>';
            }
            echo '<table class="card_text" border="1">';
            echo '<tr>';
            echo '<th>カードテキスト</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<td style="padding:5px">';
            echo $text;
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div><br><br>';

            echo '<form method="get" action="card_branch.php">';
            echo '<input type="hidden" name="name" value="'.$card_name.'">';
            echo '<input type="hidden" name="kinds" value="'.$kinds.'">';
            echo '<button type="submit" name="edit">修正</button>';
            echo '<button type="submit" name="delete">削除</button>';
            echo '</form>';
        }
        if($kinds=='link_monster'){
            $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
            $user='root';
            $password = '';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql='SELECT * FROM link_monstercard_data where name=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$card_name;
            $stmt->execute($data);
    
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $card_name=$rec['name'];
            $furigana=$rec['furigana'];
            $img_name=$rec['img_name'];
            $element=$rec['element'];
            $link_number=$rec['link_number'];
            $species=$rec['species'];
            $atk=$rec['atk'];
            $text=$rec['text'];
            $noeffect=$rec['noeffect'];
    
            $disp_img='<img class=card_image width="160" height="240" src="./cardImage/'.$img_name.'">';
            $dbh=null;
    
            echo '<div class="wrapper">';
            echo '<div class="name_wrapper">';
            echo '<span class="hurigana">'.$furigana.'</span>';
            echo '<p class="card_name">'.$card_name.'</p>';
            echo '</div>';
            echo '<div class="body_wrapper">';
    
            echo $disp_img;
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
            if($noeffect==true){
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

            echo '<form method="get" action="card_branch.php">';
            echo '<input type="hidden" name="name" value="'.$card_name.'">';
            echo '<input type="hidden" name="kinds" value="'.$kinds.'">';
            echo '<button type="submit" name="edit">修正</button>';
            echo '<button type="submit" name="delete">削除</button>';
            echo '</form>';
        }

        if($kinds=='magic'){
            $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
            $user='root';
            $password = '';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql='SELECT code,name,furigana,img_name,kinds_magic,text FROM magiccard_data where name=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$card_name;
            $stmt->execute($data);

            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $card_name=$rec['name'];
            $furigana=$rec['furigana'];
            $img_name=$rec['img_name'];
            $kinds_magic=$rec['kinds_magic'];
            $text=$rec['text'];
    
            $disp_img='<img class=card_image width="160" height="240" src="./cardImage/'.$img_name.'">';
            $dbh=null;

            echo '<div class="wrapper">';
            echo '<div class="name_wrapper">';
            echo '<span class="hurigana">'.$furigana.'</span>';
            echo '<p class="card_name">'.$card_name.'</p>';
            echo '</div>';
            echo '<div class="body_wrapper">';
            echo $disp_img;
            echo '<div class="detail_wrapper">';
            echo '<table class="card_text_detail" border="1">';
            echo '<tr><th>効果</th>';
            echo '<td>';
            echo $kinds_magic.'魔法';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="2" class="card_text">'.$text.'</td>';
            echo '</tr>';
            echo '</table><br><br>';

            echo '<form method="get" action="card_branch.php">';
            echo '<input type="hidden" name="name" value="'.$card_name.'">';
            echo '<input type="hidden" name="kinds" value="'.$kinds.'">';
            echo '<button type="submit" name="edit">修正</button>';
            echo '<button type="submit" name="delete">削除</button>';
            echo '</form>';
        }
        if($kinds=='trap'){
            $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
            $user='root';
            $password = '';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql='SELECT code,name,furigana,img_name,kinds_trap,text FROM trapcard_data where name=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$card_name;
            $stmt->execute($data);

            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $card_name=$rec['name'];
            $furigana=$rec['furigana'];
            $img_name=$rec['img_name'];
            $kinds_trap=$rec['kinds_trap'];
            $text=$rec['text'];
    
            $disp_img='<img class=card_image width="160" height="240" src="./cardImage/'.$img_name.'">';
            $dbh=null;

            echo '<div class="wrapper">';
            echo '<div class="name_wrapper">';
            echo '<span class="hurigana">'.$furigana.'</span>';
            echo '<p class="card_name">'.$card_name.'</p>';
            echo '</div>';
            echo '<div class="body_wrapper">';
            echo $disp_img;
            echo '<div class="detail_wrapper">';
            echo '<table class="card_text_detail" border="1">';
            echo '<tr><th>効果</th>';
            echo '<td>';
            echo $kinds_trap.'罠';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="2" class="card_text">'.$text.'</td>';
            echo '</tr>';
            echo '</table><br><br>';

            echo '<form method="get" action="card_branch.php">';
            echo '<input type="hidden" name="name" value="'.$card_name.'">';
            echo '<input type="hidden" name="kinds" value="'.$kinds.'">';
            echo '<button type="submit" name="edit">修正</button>';
            echo '<button type="submit" name="delete">削除</button>';
            echo '</form>';
        }
    ?>
    <button onclick="history.back()">戻る</button>
</body>
</html>