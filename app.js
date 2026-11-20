document.addEventListener('DOMContentLoaded', function () {
  var splash = document.getElementById('splash');
  if (splash) {
    setTimeout(function () {
      splash.classList.add('hide');
    }, 700);
  }
});
