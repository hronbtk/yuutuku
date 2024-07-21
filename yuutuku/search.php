<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カード検索</title>
</head>
<body>
    <form action="result.php" method="post">
        キーワード検索<br>
        <input type="text" name="name"><br>
        <br>
        効果<br>
        <label><input type="radio" name="effect" value="nothing" checked="checked">指定なし</label>
        <label><input type="radio" name="effect" value="通常">通常</label>
        <label><input type="radio" name="effect" value="永続">永続</label>
        <label><input type="radio" name="effect" value="速攻">速攻</label>
        <label><input type="radio" name="effect" value="装備">装備</label>
        <label><input type="radio" name="effect" value="儀式">儀式</label>
        <label><input type="radio" name="effect" value="フィールド">フィールド</label>
        <label><input type="radio" name="effect" value="カウンター">カウンター</label><br>
        <br>
        属性<br>
        <label><input type="radio" name="element" value="nothing" checked="checked">指定しない</label>
        <label><input type="radio" name="element" value="honoo">炎</label>
        <label><input type="radio" name="element" value="mizu">水</label>
        <label><input type="radio" name="element" value="kaze">風</label>
        <label><input type="radio" name="element" value="ti">地</label>
        <label><input type="radio" name="element" value="hikari">光</label>
        <label><input type="radio" name="element" value="yami">闇</label>
        <label><input type="radio" name="element" value="kami">神</label>
        <br><br>
        種族<br>
        <label><input type="radio" name="species" value="nothing" checked="checked">指定なし</label>
        <label><input type="radio" name="species" value="魔法使い族">魔法使い族</label>
        <label><input type="radio" name="species" value="ドラゴン族">ドラゴン族</label>
        <label><input type="radio" name="species" value="アンデット族">アンデット族</label>
        <label><input type="radio" name="species" value="戦士族">戦士族</label>
        <label><input type="radio" name="species" value="獣戦士族">獣戦士族</label>
        <label><input type="radio" name="species" value="獣族">獣族</label><br>
        <label><input type="radio" name="species" value="鳥獣族">鳥獣族</label>
        <label><input type="radio" name="species" value="悪魔族">悪魔族</label>
        <label><input type="radio" name="species" value="天使族">天使族</label>
        <label><input type="radio" name="species" value="昆虫族">昆虫族</label>
        <label><input type="radio" name="species" value="恐竜族">恐竜族</label>
        <label><input type="radio" name="species" value="爬虫類族">爬虫類族</label>
        <label><input type="radio" name="species" value="魚族">魚族</label><br>
        <label><input type="radio" name="species" value="海竜族">海竜族</label>
        <label><input type="radio" name="species" value="水族">水族</label>
        <label><input type="radio" name="species" value="炎族">炎族</label>
        <label><input type="radio" name="species" value="雷族">雷族</label>
        <label><input type="radio" name="species" value="岩石族">岩石族</label>
        <label><input type="radio" name="species" value="植物族">植物族</label>
        <label><input type="radio" name="species" value="機械族">機械族</label><br>
        <label><input type="radio" name="species" value="サイキック族">サイキック族</label>
        <label><input type="radio" name="species" value="幻神獣族">幻神獣族</label>
        <label><input type="radio" name="species" value="創造神族">創造神族</label>
        <label><input type="radio" name="species" value="幻竜族">幻竜族</label>
        <label><input type="radio" name="species" value="サイバース族">サイバース族</label>
        <label><input type="radio" name="species" value="幻想魔族">幻想魔族</label><br>
        <button type="submit">検索する</button>
    </form>
</body>
</html>