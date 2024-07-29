<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ろくまる農園</title>
</head>
<body>
    <?php
        try{
            $name=$_GET['name'];
            $kinds=$_GET['kinds'];

            if($kinds=='monster'){
                $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
                $user='root';
                $password='';
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql='SELECT * FROM monstercard_data WHERE name=?';
                $stmt=$dbh->prepare($sql);
                $data[]=$name;
                $stmt->execute($data);
    
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                $name=$rec['name'];
                $furigana=$rec['furigana'];
                $old_img_name=$rec['img_name'];
    
                $dbh=null;
            }elseif($kinds=="magic"){
                $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
                $user='root';
                $password='';
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql='SELECT * FROM magiccard_data WHERE name=?';
                $stmt=$dbh->prepare($sql);
                $data[]=$name;
                $stmt->execute($data);
    
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                $name=$rec['name'];
                $furigana=$rec['furigana'];
                $old_img_name=$rec['img_name'];
    
                $dbh=null;
            }elseif($kinds=="trap"){
                $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
                $user='root';
                $password='';
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql='SELECT * FROM trapcard_data WHERE name=?';
                $stmt=$dbh->prepare($sql);
                $data[]=$name;
                $stmt->execute($data);
    
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                $name=$rec['name'];
                $furigana=$rec['furigana'];
                $old_img_name=$rec['img_name'];
    
                $dbh=null;
            }else{
                $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
                $user='root';
                $password='';
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql='SELECT * FROM link_monstercard_data WHERE name=?';
                $stmt=$dbh->prepare($sql);
                $data[]=$name;
                $stmt->execute($data);
    
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                $name=$rec['name'];
                $furigana=$rec['furigana'];
                $old_img_name=$rec['img_name'];
    
                $dbh=null;
            }


            if($old_img_name==''){
                $disp_gazou='';
            }else{
                $disp_gazou='<img src="./cardImage/'.$old_img_name.'">';
            }
        }catch(Exception $e){
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    ?>
    カード情報修正<br>
    <br>
    <br>
    <br>
    <form method="post" action="edit_check.php" enctype="multipart/form-data" >
        <input type="hidden" name="kinds" value="<?php print $kinds?>">
        <input type="hidden" name="gazou_name_old" value="<?php echo $old_img_name?>"><br>
        <br>
        カード名<br>
        <input type="text" name="name" value="<?php print $name?>" style="width:250px"><br><br>
        フリガナ<br>
        <input type="text" name="furigana" value="<?php print $furigana?>" style="width:250px"><br>
        <br><br>
        現在の画像<br>
        <?php echo $disp_gazou?><br><br>
        新しい画像を選んでください<br>
        <input type="file" name="img_name" style="width:400px"><br><br><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="送信">
    </form>
</body>
</html>