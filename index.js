/* Авторизация */
$("#btn-auth").on("click", (e) => {
  e.preventDefault();
  clearError();
  const p = document.querySelector('.error-massage-auth')
  p.innerHTML = ""
  let login = $('input[name="login"]').val();
  let password = $('input[name="password"]').val();

  $.ajax({
    url: "./developer/signIn.php",
    type: "POST",
    dataType: "json",
    data: {
      login: login,
      password: password,
    },
    success: function (data) {
      if (data.status) {
        document.location.href = "./pages/profile.php";
      } else {
        if (data.type === 1) {
          data.fields.forEach((item) => {
            setError(item);
          });
        }else{
          p.innerHTML = `${data.message}`
          data.fields.forEach((item) => {
            setErrorMessage(item);
          });
        }
      }
    },
  });
});
 /* Регистраия */
$("#btn-register").on("click", (e) => {
  e.preventDefault();
  clearError();
  const p = document.querySelector('.error-massage-register')
  p.innerHTML = ''
  let login = $('input[name="login"]').val(),
    password = $('input[name="password"]').val(),
    confirmPassword = $('input[name="confirmPassword"]').val(),
    email = $('input[name="email"]').val(),
    fullName = $('input[name="fullName"]').val();
  $.ajax({
    url: "../developer/signUp.php",
    type: "POST",
    dataType: "json",
    data: {
      login: login,
      password: password,
      confirmPassword: confirmPassword,
      email: email,
      fullName: fullName,
    },
    success: function (data) {
      if (data.status) {
        document.location.href = "../index.php";
      } else {
        if (data.type === 1) {
          data.fields.forEach((item) => {
            setError(item);
          });
        }else{
          p.innerHTML = `${data.message}`
          data.fields.forEach((item) => {
            setErrorMessage(item);
          });
        }
      }
    },
  });
});

function setError(item) {
  const input = $(`input[name="${item}"]`);
  input.addClass("error-border");
  const inputContainer = document.querySelector(`div[name="${item}"]`);
  const err = '<p class="validation-error">Введите коректное значение</p>';
  inputContainer.insertAdjacentHTML("beforeend", err);
}
function clearError() {
  $("input").removeClass("error-border");
  const p = document.querySelectorAll(".validation-error");
  if (p.length) {
    p.forEach((item) => {
      const parent = item.parentNode;
      parent.removeChild(item);
    });
  }
}
function setErrorMessage(item){
  const input = $(`input[name="${item}"]`);
  input.addClass("error-border");
}
