$('input').on('change', function () {
  var file = $(this).prop('files')[0];
  $('span').text(file.name);
});