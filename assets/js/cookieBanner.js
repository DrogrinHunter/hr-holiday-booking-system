if (localStorage.getItem('cookieSeen') != 'shown') {
  $('.cookie-banner').delay(1000).fadeIn();
  localStorage.setItem('cookieSeen', 'shown')
};
$('.close').click(function () {
  $('.cookie-banner').fadeOut();
})