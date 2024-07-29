<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>カード検索</title>
</head>
<body>
    <?php
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $serch_name='%'.$name.'%';
    }else{
        $serch_name='%%';
    }
    if(isset($_POST['effect'])){
        $effect=$_POST['effect'];
        $count='in ('.substr(str_repeat(',?',count($effect)),1).')';
    }else{
        $search_effect='%%';
        $count='like ?';
    }
    if(isset($_POST['kinds_monster'])){
        $kinds_monster=$_POST['kinds_monster'];
        $count4='in ('.substr(str_repeat(',?',count($kinds_monster)),1).')';
    }else{
        $search_kinds_monster='%%';
        $count4='like ?';
    }
    if(isset($_POST['element'])){
        $element=$_POST['element'];
        $count2='in ('.substr(str_repeat(',?',count($element)),1).')';
    }else{
        $search_element='%%';
        $count2='like ?';
    }
    if(isset($_POST['species'])){
        $species=$_POST['species'];
        $count3='in ('.substr(str_repeat(',?',count($species)),1).')';
    }else{
        $search_species='%%';
        $count3='like ?';
    }
    if(isset($_POST['lebel'])){
        $lebel=$_POST['lebel'];
        $count5='in ('.substr(str_repeat(',?',count($lebel)),1).')';
    }else{
        $search_lebel='%%';
        $count5='like ?';
    }
    if(isset($_POST['scale'])){
        $scale=$_POST['scale'];
        $count6='in ('.substr(str_repeat(',?',count($scale)),1).')';
    }else{
        $search_scale='%%';
        $count6='like ?';
    }
    if(isset($_POST['link_number'])){
        $link_number=$_POST['link_number'];
        $count7='in ('.substr(str_repeat(',?',count($link_number)),1).')';
    }else{
        $search_link_number='%%';
        $count7='like ?';
    }
    if(isset($_POST['tuner'])){
        $search_tuner=$_POST['tuner'];
        $count8='in (?)';
    }else{
        $search_tuner='%%';
        $count8='like ?';
    }
    if(isset($_POST['penduramu'])){
        $search_penduramu=$_POST['penduramu'];
        $count9='in (?)';
    }else{
        $search_penduramu='%%';
        $count9='like ?';
    }
    if(isset($_POST['link'])){
        $search_link='link_monster';
        $count10='in (?)';
    }else{
        $search_link='%%';
        $count10='like ?';
    }

    try{
        $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
        $user='root';
        $password = '';
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


        $sql=sprintf('SELECT kinds,name,furigana,img_name FROM monstercard_data 
        where (name like ? or furigana like ? or text like ?) 
        and kinds_monster %s and element %s and species %s and kinds_monster %s 
        and lebel %s and scale %s and kinds_monster %s and tuner %s and pORnot %s
        and kinds %s

        union select kinds,name,furigana,img_name from magiccard_data 
        where (name like ? or furigana like ? or text like ?) 
        and kinds_magic %s and kinds_magic %s and kinds_magic %s  and furigana %s 
        and kinds_magic %s and kinds_magic %s and kinds_magic %s and kinds_magic %s and kinds_magic %s
        and kinds %s

        union select kinds,name,furigana,img_name from trapcard_data 
        where (name like ? or furigana like ? or text like ?) 
        and kinds_trap %s and kinds_trap %s and kinds_trap %s and furigana %s 
        and kinds_trap %s and kinds_trap %s and kinds_trap %s and kinds_trap %s and kinds_trap %s
        and kinds %s

        union select kinds,name,furigana,img_name from link_monstercard_data
        where (name like ? or furigana like ? or text like ?) 
        and link_number %s and element %s and species %s and species %s and species %s 
        and species %s and link_number %s and link_number %s and link_number %s
        and kinds %s'
        

        ,$count,$count2,$count3,$count4,$count5,$count6,$count7,$count8,$count9,$count10
        ,$count,$count2,$count3,$count4,$count5,$count6,$count7,$count8,$count9,$count10
        ,$count,$count2,$count3,$count4,$count5,$count6,$count7,$count8,$count9,$count10
        ,$count,$count2,$count3,$count4,$count5,$count6,$count7,$count8,$count9,$count10);
        
        $stmt=$dbh->prepare($sql);
        $data[]=$serch_name;
        $data[]=$serch_name;
        $data[]=$serch_name;
        if(isset($effect)){
            foreach($effect as $search_effect){
                $data[]=$search_effect;
            }
        }else{
            $data[]=$search_effect;
        }
        if(isset($element)){
            foreach($element as $search_element){
                $data[]=$search_element;
            }
        }else{
            $data[]=$search_element;
        }
        if(isset($species)){
            foreach($species as $search_species){
                $data[]=$search_species;
            }
        }else{
            $data[]=$search_species;
        }
        if(isset($kinds_monster)){
            foreach($kinds_monster as $search_kinds_monster){
                $data[]=$search_kinds_monster;
            }
        }else{
            $data[]=$search_kinds_monster;
        }
        if(isset($lebel)){
            foreach($lebel as $search_lebel){
                $data[]=$search_lebel;
            }
        }else{
            $data[]=$search_lebel;
        }
        if(isset($scale)){
            foreach($scale as $search_scale){
                $data[]=$search_scale;
            }
        }else{
            $data[]=$search_scale;
        }
        if(isset($link_number)){
            foreach($link_number as $search_link_number){
                $data[]=$search_link_number;
            }
        }else{
            $data[]=$search_link_number;
        }
        $data[]=$search_tuner;
        $data[]=$search_penduramu;
        $data[]=$search_link;
        $data[]=$serch_name;
        $data[]=$serch_name;
        $data[]=$serch_name;
        if(isset($effect)){
            foreach($effect as $search_effect){
                $data[]=$search_effect;
            }
        }else{
            $data[]=$search_effect;
        }
        if(isset($element)){
            foreach($element as $search_element){
                $data[]=$search_element;
            }
        }else{
            $data[]=$search_element;
        }
        if(isset($species)){
            foreach($species as $search_species){
                $data[]=$search_species;
            }
        }else{
            $data[]=$search_species;
        }
        if(isset($kinds_monster)){
            foreach($kinds_monster as $search_kinds_monster){
                $data[]=$search_kinds_monster;
            }
        }else{
            $data[]=$search_kinds_monster;
        }
        if(isset($lebel)){
            foreach($lebel as $search_lebel){
                $data[]=$search_lebel;
            }
        }else{
            $data[]=$search_lebel;
        }
        if(isset($scale)){
            foreach($scale as $search_scale){
                $data[]=$search_scale;
            }
        }else{
            $data[]=$search_scale;
        }
        if(isset($link_number)){
            foreach($link_number as $search_link_number){
                $data[]=$search_link_number;
            }
        }else{
            $data[]=$search_link_number;
        }
        $data[]=$search_tuner;
        $data[]=$search_penduramu;
        $data[]=$search_link;
        $data[]=$serch_name;
        $data[]=$serch_name;
        $data[]=$serch_name;
        if(isset($effect)){
            foreach($effect as $search_effect){
                $data[]=$search_effect;
            }
        }else{
            $data[]=$search_effect;
        }
        if(isset($element)){
            foreach($element as $search_element){
                $data[]=$search_element;
            }
        }else{
            $data[]=$search_element;
        }
        if(isset($species)){
            foreach($species as $search_species){
                $data[]=$search_species;
            }
        }else{
            $data[]=$search_species;
        }
        if(isset($kinds_monster)){
            foreach($kinds_monster as $search_kinds_monster){
                $data[]=$search_kinds_monster;
            }
        }else{
            $data[]=$search_kinds_monster;
        }
        if(isset($lebel)){
            foreach($lebel as $search_lebel){
                $data[]=$search_lebel;
            }
        }else{
            $data[]=$search_lebel;
        }
        if(isset($scale)){
            foreach($scale as $search_scale){
                $data[]=$search_scale;
            }
        }else{
            $data[]=$search_scale;
        }
        if(isset($link_number)){
            foreach($link_number as $search_link_number){
                $data[]=$search_link_number;
            }
        }else{
            $data[]=$search_link_number;
        }
        $data[]=$search_tuner;
        $data[]=$search_penduramu;
        $data[]=$search_link;
        $data[]=$serch_name;
        $data[]=$serch_name;
        $data[]=$serch_name;
        if(isset($effect)){
            foreach($effect as $search_effect){
                $data[]=$search_effect;
            }
        }else{
            $data[]=$search_effect;
        }
        if(isset($element)){
            foreach($element as $search_element){
                $data[]=$search_element;
            }
        }else{
            $data[]=$search_element;
        }
        if(isset($species)){
            foreach($species as $search_species){
                $data[]=$search_species;
            }
        }else{
            $data[]=$search_species;
        }
        if(isset($kinds_monster)){
            foreach($kinds_monster as $search_kinds_monster){
                $data[]=$search_kinds_monster;
            }
        }else{
            $data[]=$search_kinds_monster;
        }
        if(isset($lebel)){
            foreach($lebel as $search_lebel){
                $data[]=$search_lebel;
            }
        }else{
            $data[]=$search_lebel;
        }
        if(isset($scale)){
            foreach($scale as $search_scale){
                $data[]=$search_scale;
            }
        }else{
            $data[]=$search_scale;
        }
        if(isset($link_number)){
            foreach($link_number as $search_link_number){
                $data[]=$search_link_number;
            }
        }else{
            $data[]=$search_link_number;
        }
        $data[]=$search_tuner;
        $data[]=$search_penduramu;
        $data[]=$search_link;
        $stmt->execute($data);

        $dbh=null;

        echo '<div class="wrapper">';
        while(true){
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);

            if($rec==false){
                break;
            }
            echo '<div class="card_box"><a href="disp.php?kinds='.$rec['kinds'].'&name='.$rec['name'].'">';
            echo '<img class=card_image width="160" height="240" src="./cardImage/'.$rec['img_name'].'"><br>';
            echo $rec['name'].'<br>';
            echo '</a></div>';
            echo '<br>';
        }
        echo '</div>';
    }catch(PDOException $e){
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print('Error:'.$e->getMessage());
        die();
    }
    
    ?>
    <form>
        <button type="button" onclick="history.back()">戻る</button>
        <br><br><br><br><br><br><br><br><br>
    </form>
</body>
</html>