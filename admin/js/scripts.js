// Toggle the side navigation
const sidebarToggle = document.body.querySelector('#sidebarToggle');


if (sidebarToggle) {
    if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        document.body.classList.toggle('sb-sidenav-toggled');
    }

    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
}



export const check_validation = function(input, validator) {
    validator.innerHTML = "";
    input.addEventListener('change', function(e) {
  
       if(input.value.length !== 0 ){
        validator.innerHTML = "✅";
       }else{
        validator.innerHTML = "*";
       }
    });
}









