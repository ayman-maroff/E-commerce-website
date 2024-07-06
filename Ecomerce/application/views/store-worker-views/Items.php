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
    margin-left: 25%;
          
            align-items: center;
        }
  .button2{
    border-color: white;
  margin-inline-start: 50px;
    background-color: #736ADF;
    font-weight: bold;
    font-size: 20px;
    padding:10px;
    color: white;
    border-radius: 10px;
  }   
p{
    font-weight: blod;
} 
.note1 {
      font-weight: bold;
      margin-left: 40%;
      background: rgb(146, 136, 136);
      width: 450px;
    }  
</style>

</head>
<body>
    <?php if(count($array)==0) {?>

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
  <h1 class="note1"> Ther are no Items to show! </h1><br>
  <?php
     } else {
    ?>
<div class="button-container">
        <button  class="button2" onclick="showContent('waitingAccept')">Items to be received</button>
        <button class="button2" onclick="showContent('Accept')">Receiving and existing Items</button>
        <button class="button2" onclick="showContent('soled')">Items sold out </button>
    </div>
    <?php
     }#
    ?>
<div class="grid-container" id="waitingAccept" style="display: none">
<?php
 
 for ($i = 0; $i < count($array); $i++) 
{ if($array[$i]->state==0) 
    {
    $path=$array[$i]->image; 
  
 ?>
  <div class="grid-item">
    <img src="<?php echo '../../'.$path ?>"  alt="Product 1">

    <h3 style= "font-size: 30px;"> <?php echo  $array[$i]->description; ?></h3>
    <p style= "font-weight: bold"> Item ID: <?php echo   $array[$i]->id; ?></p>
    <p style= "font-weight: bold"> Quantity: <?php echo   $array[$i]->count; ?></p>
    <p style= "font-weight: bold">Price: <?php echo   $array[$i]->price.'$'; ?></p>
    <p style= "font-weight: bold">State: Waiting for reception </p> 
    <br/>
    <a href="<?php echo URL . 'Items/StoreWorkerAccept/' . $array[$i]->id.'/'. $array[$i]->Store_id ;?>" class="btn_del"><i id="deltbtn"  class="fa fa-edit"> Accept</i></a>
  </div>
  
  <?php
     } }
    ?>
 
</div>




<div class="grid-container" id="Accept" style="display: none" >
<?php
 
 for ($i = 0; $i < count($array); $i++) 
{ if($array[$i]->state==1) 
    {
    $path=$array[$i]->image; 
  
 ?>
  <div class="grid-item">
    <img src="<?php echo '../../'.$path ?>"  alt="Product 1">
    <h3 style= "font-size: 30px;"> <?php echo  $array[$i]->description; ?></h3>
    <p style= "font-weight: bold"> Item ID: <?php echo   $array[$i]->id; ?></p>
    <p style= "font-weight: bold" > Quantity: <?php echo   $array[$i]->count; ?></p>
    <p style= "font-weight: bold"> Price: <?php echo   $array[$i]->price.'$'; ?></p>
    <p style= "font-weight: bold"> State: ready to sell</p> 
  </div>
  
  <?php
     } }
    ?>
 
</div>

<div class="grid-container" id="soled" style="display: none" >
<?php
 
 for ($i = 0; $i < count($array); $i++) 
{ if($array[$i]->state==-1) 
    {
    $path=$array[$i]->image; 
  
 ?>
  <div class="grid-item">
    <img src="<?php echo '../../'.$path ?>"  alt="Product 1">
    <h3 style= "font-size: 30px;"> <?php echo  $array[$i]->description; ?></h3>
    <p style= "font-weight: bold"> Item ID: <?php echo   $array[$i]->id; ?></p>
    <p style= "font-weight: bold"> Quantity: <?php echo   $array[$i]->count; ?></p>
    <p style= "font-weight: bold"> Price: <?php echo   $array[$i]->price.'$'; ?></p>
    <p style= "font-weight: bold">State: Sold out and stock has expired </p> 
  </div>
  
  <?php
     } }
    ?>
 
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