<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>遊戯王カードデータベース</title>
</head>
<body>
    <!-- <h1>遊戯王カード<br>データベース</h1> -->
    <form action="add_check.php" method="post" enctype="multipart/form-data">
            <br>
            <br>
        <label>
            カード名を入力してください。<br>
            <input type="text" name="cardname"><br><br>
        </label>
        カードの種類<br>
            <select name="kinds" class="kinds">
                <option value="nothing">選択してください</option>
                <option value="monster">モンスター</option>
                <option value="magic">魔法</option>
                <option value="trap">トラップ</option>
            </select><br><br>
            <div class="kinds-monster"></div><br>
            <div class="species"></div><br>
            <div class="lebel"></div><!-- /.lebel -->
            <div class="kinds-magic"></div><!-- /.kinds-magic -->
        <br>
        <br>
        <label>
            カード画像(正方形のイメージ画像を選択してください)<br>
            <input type="file" name="cardimage" accept="image/*">
        </label><br><br>
        <label>
            テキスト<br>
            <textarea name="text" cols="50" rows="10"></textarea><br>
        </label>
        <button type="submit">追加する</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(".kinds").change(function(){
            var kinds=$(this).val();
            if(kinds=='monster'){
                $('.kinds-monster').html('<select name="kinds-monster"><option value="通常">通常</option><option value="効果">効果</option><option value="儀式">儀式</option><option value="融合">融合</option><option value="シンクロ">シンクロ</option><option value="エクシーズ">エクシーズ</option><option value="トゥーン">トゥーン</option><option value="スピリット">スピリット</option><option value="ユニオン">ユニオン</option><option value="デュアル">デュアル</option><option value="チューナー">チューナー</option><option value="リバース">リバース</option><option value="ペンデュラム">ペンデュラム</option><option value="特殊召喚">特殊召喚</option></select>');
                $('.species').html('種族<br><select name="species"><option value="魔法使い族">魔法使い族</option><option value="ドラゴン族">ドラゴン族</option><option value="アンデット族">アンデット族</option><option value="戦士族">戦士族</option><option value="獣戦士族">獣戦士族</option><option value="獣族">獣族</option><option value="鳥獣族">鳥獣族</option><option value="悪魔族">悪魔族</option><option value="天使族">天使族</option><option value="昆虫族">昆虫族</option><option value="恐竜族">恐竜族</option><option value="爬虫類族">爬虫類族</option><option value="魚族">魚族</option><option value="海竜族">海竜族</option><option value="水族">水族</option><option value="炎族">炎族</option><option value="雷族">雷族</option><option value="岩石族">岩石族</option><option value="植物族">植物族</option><option value="機械族">機械族</option><option value="サイキック族">サイキック族</option><option value="幻神獣族">幻神獣族</option><option value="創造神族">創造神族</option><option value="幻竜族">幻竜族</option><option value="サイバース族">サイバース族</option><option value="幻想魔族">幻想魔族</option></select>');
                $('.lebel').html('レベル/ランク<br><select name="lebel"><option value="nothing">無し</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>');
            }
            if(kinds=='magic'){
                $('.kinds-magic').html('<select name="kinds-magic"><option value="通常">通常</option><option value="永続">永続</option><option value="速攻">速攻</option><option value="フィールド">フィールド</option><option value="儀式">儀式</option><option value="装備">装備</option></select><!-- /# -->');
                $('kinds-monster>select').remove();
                $('species>select').remove();
                $('lebel>select').remove();
            }
        });
        
    </script>
</body>
</html>