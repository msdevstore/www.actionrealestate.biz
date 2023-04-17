let inactivityTime = function() {
  let time;
  window.onload = resetTimer;
  document.onmousemove = resetTimer;
  document.onkeypress = resetTimer;
  function logout() {
    $('#logout-btn').click();
  }
  function resetTimer() {
    clearTimeout(time);
    time = setTimeout(logout, 1000*60*30)
  }
};
window.onload = function() {
  inactivityTime();
}