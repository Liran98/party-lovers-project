 const email = document.querySelector('.email');

 const selector = document.getElementById('email_selection')

selector.addEventListener('change', function (e){
   email.value = selector.value;
    
    });



