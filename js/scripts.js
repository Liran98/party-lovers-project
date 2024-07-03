//email register picker
const email = document.querySelector('.email');

const selector = document.getElementById('email_selection')

selector.addEventListener('change', function (e) {
   e.preventDefault();
   email.focus();
   email.value = selector.value;


});

//loading spinner
const login = document.querySelector('.login-btn');
const loading = document.getElementById('loadingScreen');


const loadspinner = function () {
   loading.style.display = 'flex';
   setTimeout(function () {
      loading.style.display = 'none';
   }, 3000);
}

login.addEventListener('click', function (e) {
   alert("logged in");
   loadspinner();

});

