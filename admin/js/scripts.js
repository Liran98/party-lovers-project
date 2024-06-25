window.addEventListener('DOMContentLoaded', event => {

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


// ! <SHOW AND HIDE PASSWORD FOR EDIT_USER.PHP>
const show_pass = document.querySelector('.show-password');
const password = document.querySelector('.password');

let visible = false;

show_pass.addEventListener('click', function(e) {
    e.preventDefault();

    show_pass.innerHTML = "";

    if (visible) {
        password.type = 'text';
        show_pass.insertAdjacentHTML('afterbegin', "<i class='fa fa-eye display-6 my-4'></i>");
    } else {
        password.type = 'password';
        show_pass.insertAdjacentHTML('afterbegin', "<i class='fa fa-eye-slash display-6 my-4'></i>");
    }

    visible = !visible;

});
// ! </SHOW AND HIDE PASSWORD FOR EDIT_USER.PHP>



});

