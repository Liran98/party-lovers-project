const package_items = [{
    item: "Balloons",
    img: "balloons.png",
    price: 3000
},
{
    item: "Cake/Cupcakes",
    img: "cupcakes.png",
    price: 1920
},
{
    item: "Fry Machine",
    img: "french_fries.png",
    price: 2400
},
{
    item: "Arcade Machine",
    img: "arcade.png",
    price: 10000
},
{
    item: "Claw Machine",
    img: "claw_machine.png",
    price: 12000
},
{
    item: "Gifts/Goodie bags",
    img: "goodiebag.jpg",
    price: 3600
},
{
    item: "Pop Corn Machine",
    img: "popcorn_machine.png",
    price: 4300
},
{
    item: "Styro Back Drops",
    img: "styros.jpg",
    price: 9000
},
{
    item: "Photographer",
    img: "photo_camera.png",
    price: 25000
},
{
    item: "Hotdog Machine",
    img: "hotdog_machine.jpg",
    price: 5500
},
{
    item: "Dj booth",
    img: "dj_booth.png",
    price: 33000
},
{
    item: "Pinata",
    img: "pinata.png",
    price: 5000
},
];

const packages = document.querySelector('.packages');
let item_data;


package_items.forEach(function(data, i) {

    const options = {
        style: 'currency',
        currency: 'PHP'
    }

    const cash = new Intl.NumberFormat('en-US', options).format(data.price);

    item_data = `
<div class="card package_acc m-3" data-price=${data.price} data-item="${data.item}" style="width: 13rem;">
<img src="../package items/${data.img}" class="card-img-top m-2" alt="...">
<div class="card-body">
<h5 class="card-title">
${data.item.includes("Styro") 
? `
<p class='m-2'>Styros with multiple options</p>
<ol>
<li>Characters</li>
<li>Shapes</li>
<li>Objects</li>
</ol>
<p class='m-2'> Depends on what theme the client chose</p>
`
: data.item}
</h5>
<p class="card-text">${cash}</p>
</div>
</div>
    `;
    packages.insertAdjacentHTML('beforeend', item_data);
});


const packageElements = document.querySelectorAll('.package_acc');
const text_area = document.getElementById('all_selected_packages');
const priceInput = document.querySelector('.price-input');

const added_items = [];
const item_prices = [];

packageElements.forEach(function(btn) {
    let selected = false;
    btn.addEventListener('click', function(e) {
        e.preventDefault();

        const total = +btn.dataset.price;
        const data = btn.dataset.item;

        priceInput.value = 0;

        if (!selected) {
            item_prices.push(total);
            added_items.push(data);
            btn.style.filter = 'drop-shadow(0 0 0.75rem lightgreen)';
            btn.style.backgroundColor = 'lightgreen';
        } else {

            const index_price = item_prices.indexOf(total);
            if (index_price > -1) {
                item_prices.splice(index_price, 1);

            }
            const index = added_items.indexOf(data);
            if (index > -1) {
                added_items.splice(index, 1);
            }
            btn.style.filter = 'drop-shadow(0 0 0.75rem red)';
            btn.style.backgroundColor = '';
            btn.classList.add('card');

        }
        selected = !selected;
        text_area.value = added_items.join('   ,   ');

        const total_price = item_prices.reduce(function(acc, cur) {
            return acc + cur;
        });

      
        priceInput.value = total_price;
    });
});




export default package_items;