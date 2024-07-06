<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Grid View</title>
    <style>
        .grid-container {
            margin-top: 50px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 5fr));
            gap: 30px;
            padding-left: 100px;
            padding-top: 30px;
            height: auto;
        }

        .grid-item {

            border-radius: 10px;

            text-align: center;
            background-color: whitesmoke;
            height: auto;
        }

        .grid-item img {
            border-radius: 10px;
            display: inline-block;
            width: 100%;
            height: 60%;
        }

        .button-container {
            margin-top: 25px;
            margin-left: 25%;

            align-items: center;
        }

        .button2 {
            width: 50%;
            border-color: white;
            margin-inline-start: 50px;
            background-color: rgb(25 214 40 / 60%);
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
            color: white;
            border-radius: 10px;
            position: fixed;
        }


        .button1 {
            width: 20%;
            border-color: white;

            background-color: rgb(212 239 11 / 60%);
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
            color: white;
            border-radius: 10px;
            position: fixed;
        }

        .button3 {
            width: 20%;
            border-color: white;

            background-color: rgb(191 29 186 / 73%);
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
            color: white;
            border-radius: 10px;
            position: fixed;
        }

        .button4 {
            width: 20%;
            border-color: white;
            margin-inline-start: 400px;
            background-color: rgb(206 21 21 / 60%);
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
            color: white;
            border-radius: 10px;
            position: fixed;
        }

        p {
            font-weight: blod;
        }

        .div1 {
            margin-top: 25px;
            margin-left: 20%;

            align-items: center;
        }

        .div2 {
            margin-top: 25px;
            margin-left: 45%;

            align-items: center;
        }

        .div3 {
            margin-top: 25px;
            margin-left: 45%;

            align-items: center;
        }

        .blur-effect {
            filter: blur(8px);
        }

        #chose {
            font-weight: bold;
            color: #08b508;
            ;
        }

        .SEARCH {
            width: 20%;
            height: 4%;
            border-color: white;
            margin-inline-start: 100px;
            background-color: rgb(134 231 86 / 84%);
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
            color: white;
            border-radius: 10px;
            position: fixed;

        }
    </style>
    <script>
        function Search() {
            // Get the value of the input field
            let input = document.getElementById('myInput').value.toUpperCase();

            // Get the grid container element
            let gridContainer = document.getElementById('waitingAccept');

            // Get all the grid items within the container
            let gridItems = gridContainer.getElementsByClassName('grid-item');

            // Loop through all grid items
            for (let i = 0; i < gridItems.length; i++) {
                // Find the h3 element that contains the description
                let h3 = gridItems[i].getElementsByTagName('h3')[0];

                // If the h3 element exists
                if (h3) {
                    // Check if the text in the h3 tag matches the input value
                    let textValue = h3.textContent || h3.innerText;
                    if (textValue.toUpperCase().indexOf(input) > -1) {
                        // If it matches, display the grid item
                        gridItems[i].style.display = '';
                    } else {
                        // If it does not match, hide the grid item
                        gridItems[i].style.display = 'none';
                    }
                }
            }
        }

    </script>
</head>
<div>

    <?php if ($_SESSION['IsCart'] == 0) { ?>
        <div class="button-container">
            <a href="<?php echo URL . 'carts/CreateCart'; ?>" class="btn_del"> <button id="gg" class="button2">Create
                    Cart</button></a>
        </div>
    <?php } else { ?>
        <div id='div' class='div1'>

            <button onclick="EditCart()" id="gg" class="button1">Edit
                Cart</button>

        </div>
        <div id='div' class='div2'>

            <button onclick="CreateOrder()" id="gg" class="button3">Create Order
            </button>

        </div>
        <div id='div' class='div3'>

            <a href="<?php echo URL . 'carts/DeleteCart'; ?>" class="btn_del"> <button id="gg" class="button4">Delete
                    Cart</button></a>

        </div>

    <?php } ?>
    <br />
    <br />
    <br />
    <input id="myInput" type="text" class="SEARCH" placeholder="SEARCH..." onkeyup="Search()">
    <div class="grid-container" id="waitingAccept">
        <?php

        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]->state == 1) {
                $path = "../" . $array[$i]->image;
                ?>
                <div class="grid-item" id="griditem">
                    <img src="<?php echo $path ?>" alt="Product 1">

                    <h3 id='DESC' class="h3" style="font-size: 30px;"> <?php echo $array[$i]->description; ?></h3>
                    <p style="font-weight: bold"> Available Quantity: <?php echo $array[$i]->count; ?></p>
                    <p style="font-weight: bold">Price: <?php echo $array[$i]->price . '$'; ?></p>
                    <?php
                    foreach ($_SESSION['Cart'] as $product) {
                        if (unserialize($product)->id == $array[$i]->id) { ?>
                            <p id='chose'>In The Cart<span> &#128525;</span> </p>
                            <?php
                            break;
                        }
                    } ?>

                    <br />

                    <i onclick="AddProduct('<?php echo $array[$i]->id; ?>', 
                       '<?php echo $array[$i]->count; ?>',
                       '<?php echo htmlspecialchars($array[$i]->description, ENT_QUOTES); ?>',
                       '<?php echo $array[$i]->price; ?>',
                       '<?php echo htmlspecialchars($path, ENT_QUOTES); ?>')" style="color:blue; font-size: 25px"
                        id="deltbtn" class="bx bx-cart-alt"></i>

                </div>

                <?php

            }
        }
        ?>
        <br />

    </div>

</div>

<div id="myPopup">
    <h2 class='h2'>Add Product</h2> </br>

    <form id="form" action="<?php echo URL; ?>carts/addProductToCart" method="post">
        <img id="img" src="" alt="Product 1">

        <div class="input-text">
            <input id='id' type="number" name="id" style="display:none">
        </div>
        <div class="input-text">
            <input id='AvailableQuantity' type="number" name="AvailableQuantity" style="display:none">
        </div>
        <p class="leb">Description: <label class="leb" id="de">Description:</label></p>
        <div class="input-text">
            <input id='desc' type="text" name="Description" style="display:none">
        </div>
        <p class="leb">Price: <label class="leb" id='pri'>Price:</label></p>
        <div class="input-text">
            <input id='Price' type="number" name="Price" style="display:none">
        </div>
        <p class="leb">Available Quantity:<label class="leb" id='qua'>Available Quantity:</label></p>
        <br />
        <br />
        <div class="input-text">
            <input id='Quantity' type="number" placeholder="Quantity" name="Quantity" required>
        </div>
        <br />
        <input class="btn" name="btn2" type="submit" value="Add">
        <br /><br />
    </form>

</div>

</html>
<div id="myPopup2">
    <?php if (count($_SESSION['Cart']) == 0) { ?>
        <br>
        <h2 class='h2'>No Product in Cart</h2> </br>
    <?php } else { ?>
        <h2 class='h2'>Edit Cart</h2> </br>

        <form id="form" action="<?php echo URL; ?>carts/EditCart" method="post">
            <?php $index = 1;
            foreach ($_SESSION['Cart'] as $product) { ?>


                <label class="leb"><?php echo 'Product' . $index . ':'; ?></label>
                <br />
                <label class="leb2"><?php echo 'Description' . ':  ' . unserialize($product)->description; ?></label>
                <br />
                <label class="leb2"><?php echo 'Quantity:'; ?></label>

                <input class="input-num" max="<?php echo unserialize($product)->AvailableQuantity; ?>" type="number"
                    name="<?php echo $index; ?>" value="<?php echo unserialize($product)->quantity; ?>">
                <br>
                <a href="<?php echo URL . 'carts/RemoveProductFromCart/' . unserialize($product)->date; ?>" style="color:red;">
                    <i style="margin-left: 40px;" id="deltbtn" class="fa fa-trash"> Remove From Cart</i></a>
                <hr width="50%" color="green" />
                <br>
                <?php $index = $index + 1;
            } ?>
            <input class="btn" name="btn2" type="submit" value="SAVE">
            <br /><br />
        </form>
    <?php } ?>
</div>
<div id="myPopup3">
    <?php if (count($_SESSION['Cart']) == 0) { ?>
        <br>
        <h2 class='h2'>No Product in Cart</h2> </br>
    <?php } else { ?>
        <h2 class='h2'>Create Order</h2> </br>

        <form id="form" action="<?php echo URL; ?>orders/CreateOrder" method="post">
            <?php $index = 1;
            $totalPrice = 0;
            foreach ($_SESSION['Cart'] as $product) { ?>


                <label class="leb"><?php echo 'Product' . $index . ':'; ?></label>
                <br />
                <label class="leb2"><?php echo 'Description' . ':  ' . unserialize($product)->description; ?></label>
                <br />
                <label class="leb2"><?php echo 'Quantity' . ':  ' . unserialize($product)->quantity; ?></label>
                <br>
                <label class="leb2"><?php echo 'Price' . ':  ' . unserialize($product)->price . '$'; ?></label>
                <br>
                <hr width="50%" color="green" />
                <br>
                <?php $index = $index + 1;
                $totalPrice = $totalPrice + unserialize($product)->quantity * unserialize($product)->price;
            } ?>
            <label class="leb"><?php echo 'Total Price' . ':  ' . $totalPrice . '$'; ?></label>
            <br />
            <br />
            <div class="input-text">
            <input id='Price' type="text" name="address" placeholder="Your Address" required>
        </div>
            <br />
            <br />
            <div class="input-text">
            <input id='Price' type="number" name="phone" required placeholder="Your Phone" >
        </div>
            <br />
            <br />
            <input class="btn" name="btn2" type="submit" value="Request">
            <br /><br />
        </form>
    <?php } ?>
</div>
<style>
    #myPopup {
        /* position: absolute; */

        width: 30%;
        height: auto;
        border: 5px solid rgb(146, 136, 136);
        border-radius: 10px;
        background-color: #736ADF;
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    #myPopup2 {
        /* position: absolute; */

        width: 30%;
        height: auto;
        border: 5px solid rgb(146, 136, 136);
        border-radius: 10px;
        background-color: #b266b2;
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    #myPopup3 {
        /* position: absolute; */

        width: 30%;
        height: auto;
        border: 5px solid rgb(146, 136, 136);
        border-radius: 10px;
        background-color: #b266b2;
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    #img {
        border-radius: 10px;
        display: inline-block;
        width: 80%;
        height: 60%;
        margin-left: 50px;
    }

    .leb {
        font-size: 25px;
        margin-left: 20px;
        font-weight: bold;
    }

    .leb2 {
        font-size: 20px;
        margin-left: 40px;

    }

    #myPopup:hover {
        box-shadow: 3px 3px 50px rgb(82, 165, 130);
    }

    #myPopup2:hover {
        box-shadow: 3px 3px 50px rgb(82, 165, 130);
    }

    #myPopup3:hover {
        box-shadow: 3px 3px 50px rgb(82, 165, 130);
    }

    .h2 {
        font-size: 30px;
        font-weight: bold;
        letter-spacing: 2px;
        text-align: center;
        margin: 0;
        color: rgb(183 214 179);
    }

    .input-text {

        margin-left: 20px;

        width: 250px;
    }

    .input-text input {
        width: 100%;
        padding: 10px 0;
        box-sizing: border-box;
        font-size: 16px;
        border: none;
        padding-left: 30px;
        border-bottom: 2px solid #97cddd;
    }

    .input-text input:focus {
        border-radius: 30px;
        border: 1px;
    }


    .input-num {
        width: 20%;
        border-radius: 30px;
        height: auto;
        padding: 10px 0;
        box-sizing: border-box;
        font-size: 13px;
        border: none;
        font-weight: bold;
        padding-left: 30px;
        border-bottom: 2px solid #97cddd;
    }

    .btn {
        width: 100%;
        font-size: 20px;
        font-weight: bold;
        border-radius: 15px;
        padding: 5px;
        /* background: none; */
        cursor: pointer;
        transition: 0.5s ease;
    }


    .btn:hover {
        background: rgb(84, 202, 147);
        color: rgb(210, 242, 243);
    }

    #myPopup.show {
        display: block;
    }

    #myPopup2.show {
        display: block;
    }

    #myPopup3.show {
        display: block;
    }
</style>
<script>
    // Get the popup
    var popup = document.getElementById('myPopup');
    var num = document.getElementById('Quantity');

    const popupQuerySelector = "#myPopup";
    const popupEl = document.querySelector(popupQuerySelector);

    const popupQuerySelector2 = "#myPopup2";
    const popupEl2 = document.querySelector(popupQuerySelector2);

    const popupQuerySelector3 = "#myPopup3";
    const popupEl3 = document.querySelector(popupQuerySelector3);
    // When the user clicks on the button, open the popup
    function AddProduct(id, count, desc, price, img) {
        setTimeout(() => {
            if (!popupEl.classList.contains("show")) {
                // Add class `show` to filterList element
                popupEl.classList.add("show");
                num.setAttribute('max', count);
                document.getElementById('img').setAttribute('src', img);
                document.getElementById('desc').setAttribute('value', desc);
                document.getElementById('Price').setAttribute('value', price);
                document.getElementById('AvailableQuantity').setAttribute('value', count);
                document.getElementById('id').setAttribute('value', id);
                document.getElementById('waitingAccept').classList.add('blur-effect');
                document.getElementById('qua').textContent = count;
                document.getElementById('pri').textContent = price + '$';
                document.getElementById('de').textContent = desc;
            }
        }, 250);
    }

    document.addEventListener("click", (e) => {
        const isClosest = e.target.closest(popupQuerySelector);
        if (!isClosest && popupEl.classList.contains("show")) {
            popupEl.classList.remove("show");
            document.getElementById('waitingAccept').classList.remove('blur-effect');

        }
    });

    function EditCart() {
        setTimeout(() => {
            if (!popupEl2.classList.contains("show")) {
                // Add class `show` to filterList element
                popupEl2.classList.add("show");
            }
        }, 250);
    }
    document.addEventListener("click", (e) => {
        const isClosest = e.target.closest(popupQuerySelector2);
        if (!isClosest && popupEl2.classList.contains("show")) {
            popupEl2.classList.remove("show");
            document.getElementById('waitingAccept').classList.remove('blur-effect');


        }
    });

    function CreateOrder() {
        setTimeout(() => {
            if (!popupEl3.classList.contains("show")) {
                // Add class `show` to filterList element
                popupEl3.classList.add("show");
            }
        }, 250);
    }
    document.addEventListener("click", (e) => {
        const isClosest = e.target.closest(popupQuerySelector3);
        if (!isClosest && popupEl3.classList.contains("show")) {
            popupEl3.classList.remove("show");
            document.getElementById('waitingAccept').classList.remove('blur-effect');

        }
    });

</script>