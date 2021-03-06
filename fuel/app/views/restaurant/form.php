<div id="register_form">
    <h3>登録フォーム</h3>
    <form action="/restaurant/register" method="post">
        <table>
            <tr><td>場所</td><td><input type="text" name="place"></td></tr>
            <tr><td>最寄り駅</td><td><input type="text" name="station"></td></tr>
            <tr><td>店名</td><td><input type="text" name="name"></td></tr>
            <tr><td>業態</td><td><input type="text" name="kind"></td></tr>
            <tr><td>個室</td><td>あり<input type="radio" name="private_room" value="true" checked> | なし<input type="radio" name="private_room" value="false"></td></tr>
            <tr><td>連絡先</td><td><input type="text" name="phone"></td></tr>
            <tr><td>一人あたり予算</td><td><input type="text" name="cost"></td></tr>
            <tr><td>部門</td><td><input type="text" name="department"></td></tr>
            <tr><td>推薦者</td><td><input type="text" name="recommender"></td></tr>
            <tr><td>店舗情報URL</td><td><input type="text" name="link"></td></tr>
            <tr><td>備考</td><td><textarea name="other"></textarea></td></tr>
        </table>
        <input type="button" value="戻る" onclick="location.href='/restaurant'">
        <input type="submit" value="登録">
    </form>
</div>
