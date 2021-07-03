//付与したいクラスの配列
var arr = ["tags__link01", "tags__link02", "tags__link03", "tags__link04", "tags__link05"];
var a = arr.length;

//シャッフルアルゴリズム
while (a) {
  var j = Math.floor(Math.random() * a);
  var t = arr[--a];
  arr[a] = arr[j];
  arr[j] = t;
}

//シャッフルされた配列の要素を順番に表示する
arr.forEach(function (value, index) {
  $(".tags__link").eq(index).addClass(value);
});