<br />
<br />
<div id="myPopup3">

    <h2 class='h2'>Contents of the Order</h2> </br>

    <?php $index = 1;
    $totalPrice = 0;
    foreach ($orderContains as $product) {
        if ($product->state != 5) {
            ?>


            <label class="leb"><?php echo 'Product' . $index . ':'; ?></label>
            <br />
            <label class="leb2"><?php echo 'Description' . ':  ' . $product->description; ?></label>
            <br />
            <label class="leb2"><?php echo 'Quantity' . ':  ' . $product->count; ?></label>
            <br>
            <label class="leb2"><?php echo 'Price' . ':  ' . $product->price . '$'; ?></label>
            <br>
            <hr width="50%" color="green" />
            <br>
            <?php $index = $index + 1;
            $totalPrice = $totalPrice + $product->count * $product->price;
        } else {
            ?>

            <label class="leb"><?php echo 'Product' . $index . ':'; ?></label>
            <br />
            <label class="leb2"><?php echo 'Description' . ':  ' . $product->description; ?></label>
            <br />
            <label class="leb2"><?php echo 'Quantity' . ':  ' . $product->count; ?></label>
            <br>
            <label class="leb2"><?php echo 'Price' . ':  ' . $product->price . '$'; ?></label>
            <br>

            <label class="leb3">This product has been removed from the order because the </label>
            <label class="leb3"> required quantity is not available</label>
            <br>
            <hr width="50%" color="green" />
            <br>

            <?php $index = $index + 1;
        }
    } ?>
    <label class="leb"><?php echo 'Total Price' . ':  ' . $totalPrice . '$'; ?></label>

    <br />
    <br />
   <a href="<?php echo URL . 'orders/orderDetails/'.$orderid;?>"> <input href class="btn" name="btn2" type="submit" value="Details" ></a>
    <br /><br />

</div>
<style>
    #myPopup3 {
        /* position: absolute; */
        margin-bottom: 500px;
        margin-left: 500px;
        width: 30%;
        height: auto;
        border: 5px solid rgb(146, 136, 136);
        border-radius: 10px;
        background-color: #b266b2;



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

    .leb3 {
        font-size: 15px;
        margin-left: 40px;
        color: #721212;
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
</style>