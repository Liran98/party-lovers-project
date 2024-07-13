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
                                        <input disabled class="form-control price-input" type="number" name="package_price">
                                    </div>


                                    <div class="col-12">
                                        <label for="package_items" class="form-label">Package items</label>

                                        <div class="container  m-3 ">
                                            <div class="row  row-cols-2 row-cols-md-3 row-cols-xl-6  packages ">


                                            </div>

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

    const package_items = [{
            item: "Balloons",
            img: "balloons.png",
            price: 3000
        },
        {
            item: "Cake/Cupcakes",
            img: "cupcakes.png",
            price: 2000
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
            price: 4000
        },
        {
            item: "Pop Corn Machine",
            img: "popcorn_machine.png",
            price: 4000
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
                btn.style.backgroundColor = '#E55141';
                btn.classList.add('card');

            }
            selected = !selected;
            text_area.value = added_items.join(',');

            const total_price = item_prices.reduce(function(acc, cur) {
                return acc + cur;
            });
            priceInput.value = total_price;
        });
    });
    //end of foreach package




    // ? </package selection for add_package.php>

    // all packages checkboxes
</script>

<?php include("includes/footer.php"); ?>