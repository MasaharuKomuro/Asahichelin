$('.delete-confirmation').on('click', function () {
        return confirm('削除してよろしいですか？');
    });
$('.logout-confirmation').on('click', function () {
        return confirm('ログアウトしてよろしいですか？');
    });


var aElems = document.getElementsByTagName('a');

for (var i = 0, len = aElems.length; i < len; i++) {
    aElems[i].onclick = function() {
        return confirm("Are you sure you want to leave?");
    };
}
