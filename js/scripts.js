 const email = document.querySelector('.email');

 const selector = document.getElementById('email_selection')

selector.addEventListener('change', function (e){
   e.preventDefault();
   email.focus();
   email.value = selector.value;
  
    
    });



