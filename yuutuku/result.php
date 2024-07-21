<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $name=$_POST['name'];
    $effect=$_POST['effect'];
    $element=$_POST['element'];
    $species=$_POST['species'];
    $word='%'.$name.'%';
    try{
        $dsn='mysql:dbname=ygdata;host=localhost;charset=utf8';
        $user='root';
        $password = '';
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


        $sql='SELECT kinds,name,furigana,img_name FROM monstercard_data where name like ? or furigana like ? or text like ? union select kinds,name,furigana,img_name from magiccard_data where name like ? or furigana like ? or text like ? union select kinds,name,furigana,img_name from trapcard_data where name like ? or furigana like ? or text like ? union select kinds,name,furigana,img_name from link_monstercard_data where name like ? or furigana like ? or text like ?';
        $stmt=$dbh->prepare($sql);
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $data[]=$word;
        $stmt->execute($data);

        $dbh=null;

        while(true){
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);

            if($rec==false){
                break;
            }
            echo '<a href="disp.php?kinds='.$rec['kinds'].'&name='.$rec['name'].'">';
            echo '<img class=card_image width="160" height="240" src="./cardImage/'.$rec['img_name'].'"><br>';
            echo $rec['name'].'<br>';
            echo '</a>';
            echo '<br>';
        }
    }catch(PDOException $e){
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print('Error:'.$e->getMessage());
        die();
    }
    
    ?>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
        <br><br><br><br><br><br><br><br><br>
    </form>
</body>
</html>