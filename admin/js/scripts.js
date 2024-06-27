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

show_pass.addEventListener('click', function (e) {
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






// ?</package selection for add_package.php>

const package_items = [
    { item: "Balloons", img: "balloons.jpg" },
    { item: "Cake or cupcakes", img: "cupcakes.jpg" },
    { item: "Appetizers", img: "appetizers.jpg" },
    { item: "Arcade Machine", img: "arcade.png" },
    { item: "Claw Machine", img: "claw_machine.png" },
    { item: "Small gifts or goodie bags", img: "goodiebag.jpg" },
    { item: "Pop Corn", img: "popcorn.jpg" },


];


const packages = document.querySelector('.packages');

let item_data;
const getitems = function (arr) {
    arr.forEach(function (data) {
        item_data = `
         <div class="col m-2">
        <div class="card h-100 w-100  packge_acc ">
       <p class="text-center" data-target='${data.item}'>${data.item}</p>
       <div class="card-body p-4">
        <img style="width:115px;" class="card-img-top img-fluid " src="../package items/${data.img}" alt="..." />
       </div>
       </div>
        `;
        packages.insertAdjacentHTML('afterbegin', item_data);
    }); // end for each

}//end of getitems function

getitems(package_items);


const package = document.querySelectorAll('.packge_acc');
package.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
        const data = e.target.dataset.target;
        alert(data);
    });
});

// ? </package selection for add_package.php>



 const bin = document.querySelector('.del-btn');

 bin.addEventListener('click', function (e){

     alert("clicked");
    
    });







});// end of js


















