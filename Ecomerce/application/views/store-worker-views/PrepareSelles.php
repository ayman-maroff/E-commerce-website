<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Grid View</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding-left: 100px;
            padding-top: 30px;
        }

        .grid-item {

            border: 8px solid #ccc;
            padding: 2px;
            text-align: center;
            background-color: whitesmoke;
        }

        .grid-item img {
            display: inline-block;
            max-width: 100%;
            height: auto;
        }

        .button-container {
            margin-top: 25px;
            margin-left: 32%;

            align-items: center;
        }

        .button2 {
            border-color: white;
            margin-inline-start: 50px;
            background-color: #736ADF;
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
            color: white;
            border-radius: 10px;
        }

        p {
            font-weight: blod;
        }

        .note1 {
            font-weight: bold;
            margin-left: 40%;
            background: gb(159 28 28 / 28%);
            width: 350px;
        }
    </style>

</head>

<body>
    <?php if (count($array) == 0) { ?>

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <h1 class="note1"> No Items to prepare ! </h1><br>
        <?php
    } else {
        ?>
        <div class="button-container">
            <button class="button2" onclick="showContent('waitingAccept')">Items to be Prepare</button>
            <button class="button2" onclick="showContent('Accept')">Prepared Items</button>
        </div>
        <?php
    }
    ?>
    <div class="grid-container" id="waitingAccept" style="display: none">
        <?php
          $temp1=0;
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]->state == 1) {
                $path = $array[$i]->image;

                ?>
                <div class="grid-item">
                    <img src="<?php echo '../' . $path ?>" alt="Product 1">

                    <h3 style="font-size: 30px;"> <?php echo $array[$i]->description; ?></h3>
                    <p style="font-weight: bold"> Item ID: <?php echo $array[$i]->Items_id; ?></p>
                    <p style="font-weight: bold"> Orginal Quantity: <?php echo $array[$i]->orginalCount; ?></p>
                    <p style="font-weight: bold"> required Quantity: <?php echo $array[$i]->requiredCount; ?></p>
                    <p style="font-weight: bold">Price: <?php echo $array[$i]->price . '$'; ?></p>
                    <?php if ($array[$i]->orginalCount >= $array[$i]->requiredCount) { ?>
                        <p style="font-weight: bold">State: Waiting for Preparation </p>
                        <br />
                        <a href="<?php echo URL . 'Items/PrepareItem/' . $array[$i]->Items_id.'/'.$array[$i]->orginalCount-$array[$i]->requiredCount.'/'.$array[$i]->AddDate; ?>" class="btn_del"><i id="deltbtn"
                                class="fa fa-edit"> Prepare</i></a>
                    <?php } else { 
                        $temp=$array[$i]->Items_id.'z'. $array[$i]->Cart_id;
        
                        ?>
                        <p style="font-weight: bold">State: Quantity has run out </p>
                        <br />
                        <a href="<?php echo URL . 'Items/RemoveItemFromCart/' .$temp.'/'.$array[$i]->orginalCount.'/'.$array[$i]->AddDate; ?>" class="btn_del"><i id="deltbtn"
                                class="fa fa-edit"> Remove from cart</i></a>

                    <?php } ?>
                </div>

                <?php
                $temp1= $temp1+1;
            }
        }
        if( $temp1 == 0) {
        ?>
           <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <h1 class="note1"> No Items to prepare ! </h1><br>
        <?php } ?>
    </div>




    <div class="grid-container" id="Accept" style="display: none">
        <?php
      $temp2=0;
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]->state == 2) {
                $path = $array[$i]->image;

                ?>
                <div class="grid-item">
                    <img src="<?php echo '../' . $path ?>" alt="Product 1">
                    <h3 style="font-size: 30px;"> <?php echo $array[$i]->description; ?></h3>
                    <p style="font-weight: bold"> Item ID: <?php echo $array[$i]->Items_id; ?></p>
                    <p style="font-weight: bold"> required Quantity: <?php echo $array[$i]->requiredCount; ?></p>
                    <p style="font-weight: bold"> Price: <?php echo $array[$i]->price . '$'; ?></p>
                    <p style="font-weight: bold">State: Ready to deliver </p>
                </div>

                <?php
                  $temp2= $temp2+1;
            }
        }   if( $temp2 == 0) {
        ?>
       
        <h1 class="note1" style="margin-left:500px,width:500px">There are no prepared items waiting for delivery ! </h1><br>
        <?php } ?>
    </div>



</body>

</html>
<script>
    function showContent(divId) {
        const contentDiv = document.getElementById(divId);
        if (contentDiv) {
            const allContentDivs = document.querySelectorAll('.grid-container');
            allContentDivs.forEach((div) => {
                div.style.display = 'none';
            });
            contentDiv.style.display = 'grid';
        }
    }
</script>