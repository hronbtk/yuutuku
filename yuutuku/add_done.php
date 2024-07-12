<?php
    require_once('common.php');
    $post=sanitize($_POST);
    $kinds=$post[''];
    $cardname=$post[''];
    $card_name_hurigana=$post[''];
    $card_image_name=$post[''];
    $kinds_monster=$post[''];
    $element=$post[''];
    $species=$post[''];
    $lebel=$post[''];
    $text=$post[''];
    $atk=$post[''];
    $def=$post[''];
        if(isset($post['penduramu'])){
            $pORnot=$post[''];
            $scale=$post[''];
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo '<a href="#">';
        echo 'よろしく';
        echo '</a>';
    ?>
</body>
</html>
