$(function(){
  $('.flash').hide().fadeIn("slow", function () {
    $(this).delay(3000).fadeOut("slow");
  });
});