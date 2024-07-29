<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale[]=1.0">
    <link rel="stylesheet" href="style.css">
    <title>カード検索</title>
</head>
<body>
    <form action="result.php" method="post">
        キーワード検索<br>
        <input type="text" name="name"><br>
        <br>
        効果<br>
        <label><input type="checkbox" name="effect[]" value="通常">通常</label>
        <label><input type="checkbox" name="effect[]" value="永続">永続</label>
        <label><input type="checkbox" name="effect[]" value="速攻">速攻</label>
        <label><input type="checkbox" name="effect[]" value="装備">装備</label>
        <label><input type="checkbox" name="effect[]" value="儀式">儀式</label>
        <label><input type="checkbox" name="effect[]" value="フィールド">フィールド</label>
        <label><input type="checkbox" name="effect[]" value="カウンター">カウンター</label><br>
        <br>
        モンスターの種類<br>
        <label><input type="checkbox" name="kinds_monster[]" value="通常">通常</label>
        <label><input type="checkbox" name="kinds_monster[]" value="効果">効果</label>
        <label><input type="checkbox" name="kinds_monster[]" value="儀式">儀式</label>
        <label><input type="checkbox" name="kinds_monster[]" value="融合">融合</label>
        <label><input type="checkbox" name="kinds_monster[]" value="シンクロ">シンクロ</label>
        <label><input type="checkbox" name="kinds_monster[]" value="エクシーズ">エクシーズ</label>
        <label><input type="checkbox" name="kinds_monster[]" value="トゥーン">トゥーン</label>
        <label><input type="checkbox" name="kinds_monster[]" value="スピリット">スピリット</label><br>
        <label><input type="checkbox" name="kinds_monster[]" value="ユニオン">ユニオン</label>
        <label><input type="checkbox" name="kinds_monster[]" value="デュアル">デュアル</label>
        <label><input type="checkbox" name="kinds_monster[]" value="リバース">リバース</label>
        <label><input type="checkbox" name="kinds_monster[]" value="特殊召喚">特殊召喚</label><br>
        <br>
        その他項目(and)<br>
        <label><input type="checkbox" name="tuner" value="true">チューナー</label><br>
        <label><input type="checkbox" name="penduramu" value="true">ペンデュラム</label><br>
        <label><input type="checkbox" name="link" value="true">リンク</label><br><br>

        属性<br>
        <label><input type="checkbox" name="element[]" value="honoo">炎</label>
        <label><input type="checkbox" name="element[]" value="mizu">水</label>
        <label><input type="checkbox" name="element[]" value="kaze">風</label>
        <label><input type="checkbox" name="element[]" value="ti">地</label>
        <label><input type="checkbox" name="element[]" value="hikari">光</label>
        <label><input type="checkbox" name="element[]" value="yami">闇</label>
        <label><input type="checkbox" name="element[]" value="kami">神</label>
        <br><br>
        種族<br>
        <label><input type="checkbox" name="species[]" value="魔法使い族">魔法使い族</label>
        <label><input type="checkbox" name="species[]" value="ドラゴン族">ドラゴン族</label>
        <label><input type="checkbox" name="species[]" value="アンデット族">アンデット族</label>
        <label><input type="checkbox" name="species[]" value="戦士族">戦士族</label>
        <label><input type="checkbox" name="species[]" value="獣戦士族">獣戦士族</label>
        <label><input type="checkbox" name="species[]" value="獣族">獣族</label><br>
        <label><input type="checkbox" name="species[]" value="鳥獣族">鳥獣族</label>
        <label><input type="checkbox" name="species[]" value="悪魔族">悪魔族</label>
        <label><input type="checkbox" name="species[]" value="天使族">天使族</label>
        <label><input type="checkbox" name="species[]" value="昆虫族">昆虫族</label>
        <label><input type="checkbox" name="species[]" value="恐竜族">恐竜族</label>
        <label><input type="checkbox" name="species[]" value="爬虫類族">爬虫類族</label>
        <label><input type="checkbox" name="species[]" value="魚族">魚族</label><br>
        <label><input type="checkbox" name="species[]" value="海竜族">海竜族</label>
        <label><input type="checkbox" name="species[]" value="水族">水族</label>
        <label><input type="checkbox" name="species[]" value="炎族">炎族</label>
        <label><input type="checkbox" name="species[]" value="雷族">雷族</label>
        <label><input type="checkbox" name="species[]" value="岩石族">岩石族</label>
        <label><input type="checkbox" name="species[]" value="植物族">植物族</label>
        <label><input type="checkbox" name="species[]" value="機械族">機械族</label><br>
        <label><input type="checkbox" name="species[]" value="サイキック族">サイキック族</label>
        <label><input type="checkbox" name="species[]" value="幻神獣族">幻神獣族</label>
        <label><input type="checkbox" name="species[]" value="創造神族">創造神族</label>
        <label><input type="checkbox" name="species[]" value="幻竜族">幻竜族</label>
        <label><input type="checkbox" name="species[]" value="サイバース族">サイバース族</label>
        <label><input type="checkbox" name="species[]" value="幻想魔族">幻想魔族</label><br><br>

        レベル/ランク<br>
        <label><input type="checkbox" name="lebel[]" value="1">1</label>
        <label><input type="checkbox" name="lebel[]" value="2">2</label>
        <label><input type="checkbox" name="lebel[]" value="3">3</label>
        <label><input type="checkbox" name="lebel[]" value="4">4</label>
        <label><input type="checkbox" name="lebel[]" value="5">5</label><br>
        <label><input type="checkbox" name="lebel[]" value="6">6</label>
        <label><input type="checkbox" name="lebel[]" value="7">7</label>
        <label><input type="checkbox" name="lebel[]" value="8">8</label>
        <label><input type="checkbox" name="lebel[]" value="9">9</label>
        <label><input type="checkbox" name="lebel[]" value="10">10</label>
        <label><input type="checkbox" name="lebel[]" value="11">11</label>
        <label><input type="checkbox" name="lebel[]" value="12">12</label><br><br>

        ペンデュラムスケール<br>
        <label><input type="checkbox" name="scale[]" value="0">0</label>
        <label><input type="checkbox" name="scale[]" value="1">1</label>
        <label><input type="checkbox" name="scale[]" value="2">2</label>
        <label><input type="checkbox" name="scale[]" value="3">3</label>
        <label><input type="checkbox" name="scale[]" value="4">4</label>
        <label><input type="checkbox" name="scale[]" value="5">5</label><br>
        <label><input type="checkbox" name="scale[]" value="6">6</label>
        <label><input type="checkbox" name="scale[]" value="7">7</label>
        <label><input type="checkbox" name="scale[]" value="8">8</label>
        <label><input type="checkbox" name="scale[]" value="9">9</label>
        <label><input type="checkbox" name="scale[]" value="10">10</label>
        <label><input type="checkbox" name="scale[]" value="11">11</label>
        <label><input type="checkbox" name="scale[]" value="12">12</label>
        <label><input type="checkbox" name="scale[]" value="13">13</label><br><br>

        LINK-<br>
        <label><input type="checkbox" name="link_number[]" value="1">1</label>
        <label><input type="checkbox" name="link_number[]" value="2">2</label>
        <label><input type="checkbox" name="link_number[]" value="3">3</label>
        <label><input type="checkbox" name="link_number[]" value="4">4</label>
        <label><input type="checkbox" name="link_number[]" value="5">5</label>
        <label><input type="checkbox" name="link_number[]" value="6">6</label><br><br>

        <button type="submit">検索する</button>
    </form><br>
    <a href="search.php"><button>選択を解除</button></a><br><br><br><br>
</body>
</html>