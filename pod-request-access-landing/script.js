const btn_request = document.getElementById('btn-request');
const email = document.getElementById('input-email');
const lbl_error = document.getElementById('error-label');

// Check email is valid
function checkEmail(input) {
  const re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(input.value.trim())) {
    lbl_error.classList.remove('visible');
  } else {
    lbl_error.classList.add('visible');
  }
}

// Event listeners
btn_request.addEventListener('click', function (e) {
  e.preventDefault();
  checkEmail(email);
});
