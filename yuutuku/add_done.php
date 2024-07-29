<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once('common.php');
    $post=sanitize($_POST);
    $kinds=$post['kinds'];
    if($kinds=='monster'){
        if(isset($post['link'])==true){
            $kinds='link_monster';
            $link_number=$post['link_number'];
            $cardname=$post['card_name'];
            $card_name_hurigana=$post['hurigana'];
            $card_image_name=$post['card_image_name'];
            $element=$post['element'];
            $species=$post['species'];
            $text=$post['text'];
            $atk=$post['atk'];
            if(isset($post['ue'])){
                $ue=true;
            }else{
                $ue='';
            }
            if(isset($post['sita'])){
                $sita=true;
            }else{
                $sita='';
            }
            if(isset($post['hidari'])){
                $hidari=true;
            }else{
                $hidari='';
            }
            if(isset($post['migi'])){
                $migi=true;
            }else{
                $migi='';
            }
            if(isset($post['hidariue'])){
                $hidariue=true;
            }else{
                $hidariue='';
            }
            if(isset($post['migiue'])){
                $migiue=true;
            }else{
                $migiue='';
            }
            if(isset($post['hidarisita'])){
                $hidarisita=true;
            }else{
                $hidarisita='';
            }
            if(isset($post['migisita'])){
                $migisita=true;
            }else{
                $migisita='';
            }
            if(isset($post['noeffect'])==true){
                $noeffect=true;
            }else{
                $noeffect='';
            }

            try{
                $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
                $user='root';
                $password = '';
                $dbh=new PDO($dsn,$user,$password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
                $sql='INSERT INTO link_monstercard_data(kinds,name,furigana,img_name,element,link_number,species,atk,text,noeffect,ue,sita,hidari,migi,hidariue,migiue,hidarisita,migisita) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
                $stmt=$dbh->prepare($sql);
                $data[]=$kinds;
                $data[]=$cardname;
                $data[]=$card_name_hurigana;
                $data[]=$card_image_name;
                $data[]=$element;
                $data[]=$link_number;
                $data[]=$species;
                $data[]=$atk;
                $data[]=$text;
                $data[]=$noeffect;
                $data[]=$ue;
                $data[]=$sita;
                $data[]=$hidari;
                $data[]=$migi;
                $data[]=$hidariue;
                $data[]=$migiue;
                $data[]=$hidarisita;
                $data[]=$migisita;
                $stmt->execute($data);
    
                $dbh=null;
                echo $cardname;
                echo 'を追加しました。';
            }catch(PDOException $e){
                print 'ただいま障害により大変ご迷惑をお掛けしております。';
                print('Error:'.$e->getMessage());
                die();
            }
        }else{
            $cardname=$post['card_name'];
            $card_name_hurigana=$post['hurigana'];
            $card_image_name=$post['card_image_name'];
            $kinds_monster=$post['kinds_monster'];
            $element=$post['element'];
            $species=$post['species'];
            $lebel=$post['lebel'];
            $text=$post['text'];
            $atk=$post['atk'];
            $def=$post['def'];
            if(isset($post['pORnot'])){
                $pORnot=$post['pORnot'];
                if($pORnot==true){
                    $penduramu_text=$post['penduramu_text'];
                    $scale=$post['scale'];
                }
            }else{
                $pORnot='';
                $penduramu_text='';
                $scale='';
            }
            if(isset($post['tuner'])){
                $tuner=$post['tuner'];
            }else{
                $tuner='';
            }
            if(isset($post['noeffect'])){
                $noeffect=$post['noeffect'];
            }else{
                $noeffect='';
            }
            try{
                $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
                $user='root';
                $password = '';
                $dbh=new PDO($dsn,$user,$password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
                $sql='INSERT INTO monstercard_data(kinds,name,furigana,img_name,kinds_monster,tuner,pORnot,scale,penduramu_text,element,lebel,species,atk,def,text,noeffect) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
                $stmt=$dbh->prepare($sql);
                $data[]=$kinds;
                $data[]=$cardname;
                $data[]=$card_name_hurigana;
                $data[]=$card_image_name;
                $data[]=$kinds_monster;
                $data[]=$tuner;
                $data[]=$pORnot;
                $data[]=$scale;
                $data[]=$penduramu_text;
                $data[]=$element;
                $data[]=$lebel;
                $data[]=$species;
                $data[]=$atk;
                $data[]=$def;
                $data[]=$text;
                $data[]=$noeffect;
                $stmt->execute($data);
    
                $dbh=null;
                echo $cardname;
                echo 'を追加しました。';
            }catch(PDOException $e){
                print 'ただいま障害により大変ご迷惑をお掛けしております。';
                print('Error:'.$e->getMessage());
                die();
            }
        }

    }
    if($kinds=='magic'){
        $cardname=$post['card_name'];
        $card_name_hurigana=$post['hurigana'];
        $card_image_name=$post['card_image_name'];
        $kinds_magic=$post['kinds_magic'];
        $text=$post['text'];
        try{
            $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
            $user='root';
            $password = '';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='INSERT INTO magiccard_data(kinds,name,furigana,img_name,kinds_magic,text) VALUES(?,?,?,?,?,?)';
            $stmt=$dbh->prepare($sql);
            $data[]=$kinds;
            $data[]=$cardname;
            $data[]=$card_name_hurigana;
            $data[]=$card_image_name;
            $data[]=$kinds_magic;
            $data[]=$text;
            $stmt->execute($data);

            $dbh=null;
            echo $cardname;
            echo 'を追加しました。';
        }catch(PDOException $e){
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            print('Error:'.$e->getMessage());
            die();
        }
    }
    if($kinds=='trap'){
        $cardname=$post['card_name'];
        $card_name_hurigana=$post['hurigana'];
        $card_image_name=$post['card_image_name'];
        $kinds_trap=$post['kinds_trap'];
        $text=$post['text'];
        try{
            $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
            $user='root';
            $password = '';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='INSERT INTO trapcard_data(kinds,name,furigana,img_name,kinds_trap,text) VALUES(?,?,?,?,?,?)';
            $stmt=$dbh->prepare($sql);
            $data[]=$kinds;
            $data[]=$cardname;
            $data[]=$card_name_hurigana;
            $data[]=$card_image_name;
            $data[]=$kinds_trap;
            $data[]=$text;
            $stmt->execute($data);

            $dbh=null;
            echo $cardname;
            echo 'を追加しました。';
        }catch(PDOException $e){
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            print('Error:'.$e->getMessage());
            die();
        }
    }
?>
<br><br><a href="index.php">追加画面に戻る</a>
</body>
</html>
