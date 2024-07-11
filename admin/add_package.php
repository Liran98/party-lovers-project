<?php include("includes/header.php"); ?>
<section class="py-3 py-md-5 py-xl-8 m-4 p-4">
    <div class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <div class="rounded shadow-sm overflow-hidden text-light m-3">
                    <h3 class="text-center m-3 text-light">Add Package</h3>
                    <div class="row align-items-lg-center h-100 ">
                        <div class="col-12 ">
                            <?php
                            if (isset($_POST['add_package'])) {

                                $package->package_name = $_POST['name'];
                                $package->package_items = $_POST['package_items'];
                                $package->package_theme = $_POST['package_theme'];
                                $package->package_price = $_POST['package_price'];


                                $package->set_file($_FILES['package_image']);

                                $package->create();

                                echo "<p class='bg-success text-center'>package added successfully</p>";

                                redirect("all_packages");
                            }

                            ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                                    <div class="col-6">
                                        <label for="name" class="form-label">Package Name </label>
                                        <input type="text" class="form-control" id="name" name="name" value="" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="package image" class="form-label">Package Image</label>
                                        <input class="form-control" type="file" name="package_image">
                                    </div>

                                    <div class="col-6">
                                        <label for="theme" class="form-label">Package theme</label>
                                        <input class="form-control" type="text" name="package_theme">
                                    </div>

                                    <div class="col-6">
                                        <label for="price" class="form-label">Package price</label>
                                        <input class="form-control price-input" type="number" name="package_price">
                                    </div>


                                    <div class="col-12">
                                        <label for="package_items" class="form-label">Package items</label>

                                        <div class="container  m-3">
                                            <div class="row  row-cols-2 row-cols-md-3 row-cols-xl-6  packages ">


                                            </div>


                                            <h2 class="text-center pagination">
                                                
                                            </h2>

                                            <br>
                                            <!-- color picker for balloons fixing soon<input class='form-control' type="text" data-coloris> -->
                                            <textarea rows="10" class="form-control  m-3" name="package_items" id="all_selected_packages">

                                            </textarea>
                                        </div>

                                        <br>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button name="add_package" class="btn btn-primary btn-lg" type="submit">Add package</button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<br>

<script>
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

const pagination_div = document.querySelector('.pagination');
const total_pages = Math.ceil(package_items.length / 4);


for (let i = 0; i < total_pages; i++) {
    const btns = `<input type='button' value='${i + 1}'  class='btn btn-primary pagination-btn' data-go=${i + 1}>`;
    pagination_div.insertAdjacentHTML('beforeend', btns);

}

const gotobtn = document.querySelectorAll('.pagination-btn');
gotobtn.forEach(function (button) {
    button.addEventListener('click', function (e) {
        packages.innerHTML = "";
        const res = e.target.closest('.pagination-btn');
        const data = res.dataset.go;
        change_page(data);
    });
})


const change_page = function (page) {
    const start = (page - 1) * 4;
    const end = page * 4;

    const pack = package_items.slice(start, end);

    packages.innerHTML = "";

    pack.forEach(function (data, i) {

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
    });


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
                text_area.value = added_items.join(' ,');
            } else {
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

            const index = added_items.indexOf(data);
            const index_price = item_prices.indexOf(total);


        });
    });
    //end of foreach package
}




// ? </package selection for add_package.php>

// all packages checkboxes
</script>

<?php include("includes/footer.php"); ?>