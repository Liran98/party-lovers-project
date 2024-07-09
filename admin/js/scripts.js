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

        if (!visible) {
            password.type = 'text';
            show_pass.insertAdjacentHTML('afterbegin', "<i class='fa fa-eye display-6 my-4'></i>");
        } else {
            password.type = 'password';
            show_pass.insertAdjacentHTML('afterbegin', "<i class='fa fa-eye-slash display-6 my-4'></i>");
        }

        visible = !visible;

    });
    // ! </SHOW AND HIDE PASSWORD FOR EDIT_USER.PHP>



});// end of js


// ?</package selection for add_package.php>

const package_items = [
    { item: "Balloons", img: "balloons.jpg", price: 3000 },
    { item: "Cake or cupcakes", img: "cupcakes.jpg", price: 2000 },
    { item: "Appetizers", img: "appetizers.jpg", price: 2000 },
    { item: "Arcade Machine", img: "arcade.png", price: 10000 },
    { item: "Claw Machine", img: "claw_machine.png", price: 12000 },
    { item: "Small gifts or goodie bags", img: "goodiebag.jpg", price: 4000 },
    { item: "Pop Corn", img: "popcorn.jpg", price: 4000 },
    { item: "Styro backDrop", img: "styros.jpg", price: 16000 },



];


const packages = document.querySelector('.packages');
let item_data;

package_items.forEach(function (data, i) {

    const options = {
        style: 'currency',
        currency: 'PHP'
    }

    const cash = new Intl.NumberFormat('en-US', options).format(data.price);

    item_data = `
 <div class="card package_acc m-3" data-price=${data.price} data-item="${data.item}" style="width: 13rem;">
  <img src="../package items/${data.img}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">${data.item}</h5>
    <p class="card-text">${cash}</p>
  </div>
</div>
        `;


    packages.insertAdjacentHTML('beforeend', item_data);
}); // end for each array


const packageElements = document.querySelectorAll('.package_acc');
const text_area = document.getElementById('all_selected_packages');
const added_items = [];
const item_prices = [];


packageElements.forEach(function (btn) {

    let selected = false;
    btn.addEventListener('click', function (e) {
        e.preventDefault();



        const total = btn.dataset.price;
        const data = btn.dataset.item;
        //* could use this method instead but since we using foreach you could just use btn.dataset.item
        // const res = e.target.closest('.package_acc');
        // const data = res.dataset.item;


        if (!selected) {
            item_prices.push(total);
            added_items.push(data);
            btn.style.backgroundColor = 'lightgreen';
            btn.classList.remove('card');
        } else {
            const index = added_items.indexOf(data);
            const index_price = item_prices.indexOf(total);

            if (index_price > -1) {
                item_prices.splice(index_price, 1);
            }
            if (index > -1) {
                added_items.splice(index, 1);
            }
            btn.style.backgroundColor = '';
            btn.classList.add('card');
        }
        selected = !selected;
        text_area.value = added_items.join(' ,');

    });
});
//end of foreach package





// ? </package selection for add_package.php>






