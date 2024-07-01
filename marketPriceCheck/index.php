<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>遊戯王カードデータベース</title>
</head>
<body>
    <!-- <h1>遊戯王カード<br>データベース</h1> -->
    <form action="price_check.php" method="post" enctype="multipart/form-data">
        <label>
            <select name="kinds">
                <option value="monster">モンスター</option>
                <option value="magic">魔法</option>
                <option value="trap">トラップ</option>
            </select><br><br>
        </label>
        <label>
            カード名を入力してください。<br>
            <input type="text" name="cardname"><br><br>
        </label>
        <label>
            カード画像<br>
            <input type="file" name="cardimage" accept="image/*">
        </label><br><br>
        <img id="preview">
        <label>
            レベル/ランク<br>
            <select name="lebel">
                <option value="nothing">無し</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </label><br><br>
        <label>
            テキスト<br>
            <textarea name="text" cols="50" rows="10"></textarea><br>
        </label>
        <label>
            収録番号<br>
            <input type="text" name="typenumber1">-<input type="text" name="typenumber2">
        </label><br><br>
        <button type="submit">追加する</button>
    </form>
</body>
</html>