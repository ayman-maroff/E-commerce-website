<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Store Page</title>

  <link href="<?php echo URL; ?>public/css/logincss.css" rel="stylesheet">
</head>

<body>
  <div class="login">
    <h2>Update Store</h2> </br>
    <form id="form" action= "<?php echo URL . 'stores/updateStore/' . $array[0][0]->id.'/'. $array[0][0]->User_id ; ?>" method="post">
      <div class="input-text">
        <input type="text" placeholder="Address" id="name" name="addresss"  value = "<?php echo $array[0][0]->address ?>"required>
      </div>

      <?php if (count($array[1]) == 0) { ?>

        <h4 style="color: blue"> There are no store workers so you can't update the store Worker</h4><br>

        <?php
      } else {
        ?>
            <p  style="color: blue" for="numbermin">Store Worker Id: <select name="workerId">
            <?php

            for ($i = 0; $i < count($array[1]); $i++) {
              ?>
              <option value="<?php echo $array[1][$i]->id ?> "><?php echo $array[1][$i]->id ?></option>
              <?php
            }
            
            ?>
             <option value="<?php echo $array[0][0]->User_id ?> " selected="selected"><?php echo $array[0][0]->User_id ?></option>
          </select></p>

        <?php
      }
      ?>
      <br/>
        <input class="btn" name="btn2" type="submit" value="update">
      </form>

  </div>
  <script src="../../../public/js/loginjs.js"></script>

</body>

</html>