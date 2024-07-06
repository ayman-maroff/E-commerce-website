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
    margin-left: 20%;
          
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
</style>

</head>
<body>
<div class="button-container">
        <button  class="button2" onclick="showContent('waitingAccept')">Products that waiting Accept</button>
        <button class="button2" onclick="showContent('Accept')">Accepted Products</button>
        <button class="button2" onclick="showContent('soled')">Soleded Products and stock has expired </button>
    </div>
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
    <p style= "font-weight: bold"> Store Id: <?php echo   $array[$i]->Store_id; ?></p>
    <p style= "font-weight: bold">State: waiting store worker accept them </p> 
    <br/>
    <a href="<?php echo URL . 'Items/prepareToDeleteItem/' . $array[$i]->id.'/'. $array[$i]->User_id; ?>" class="btn_del"><i style="color:red" id="deltbtn"  class="fa fa-trash"></i></a>
    <a href="<?php echo URL . 'Items/prepareToUpdateItem/' . $array[$i]->id.'/'. $array[$i]->User_id; ?>" class="btn_del"><i id="deltbtn"  class="fa fa-edit"></i></a>
  </div>
  
  <?php
     } }
    ?>
 
</div>




<div class="grid-container" id="Accept" style="display: none" >
<?php
 
 for ($i = 0; $i < count($array); $i++) 
{ if($array[$i]->state!=0&&$array[$i]->state!=-1) 
    {
    $path=$array[$i]->image; 
  
 ?>
  <div class="grid-item">
    <img src="<?php echo '../../'.$path ?>"  alt="Product 1">
    <h3 style= "font-size: 30px;"> <?php echo  $array[$i]->description; ?></h3>
    <p style= "font-weight: bold"> Item ID: <?php echo   $array[$i]->id; ?></p>
    <p style= "font-weight: bold" > Quantity: <?php echo   $array[$i]->count; ?></p>
    <p style= "font-weight: bold"> Price: <?php echo   $array[$i]->price.'$'; ?></p>
    <p style= "font-weight: bold"> Store Id: <?php echo   $array[$i]->Store_id; ?></p>
    
    <p style= "font-weight: bold"><?php  if($array[$i]->state==1){echo 'State: ready to sell';}else{echo 'State: Some of this Item are soled';}  ?></p> 
    <br/>
    <a href="<?php echo URL . 'Items/prepareToUpdateItem/' . $array[$i]->id .'/'. $array[$i]->User_id; ?>" class="btn_del"><i id="deltbtn"  class="fa fa-edit"></i></a>
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
    <p style= "font-weight: bold"> Store Id: <?php echo   $array[$i]->Store_id; ?></p>
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