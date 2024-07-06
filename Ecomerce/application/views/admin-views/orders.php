<head>
  <style>
  .btn {
    font-size: 1.0rem;
    background: #736ADF;

    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 2rem;
    cursor: pointer;
    position: relative;
    margin-left: 260px;
    transition: all 0.35s;
    outline: none;
  }


  .btn a {
    position: relative;
    z-index: 2;
    color: #fff;
    text-decoration: none;
  }

  .btn:after {
    position: absolute;
    /* content: ''; */
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background: #1005a7;
    transition: all 0.35s;
    border-radius: 4px;
  }

  .btn:hover {
    color: #fff;
  }

  .btn:hover:after {
    width: 100%;
  }
    #addform{
      margin-top:1rem;
      position: flex;
      width:300px;
      margin-left:265px;
      z-index: -1;
      border: 5px solid rgb(146, 136, 136);
      border-radius: 10px;
      background-color: rgba(202, 238, 224, 0.5);

        }
    .coursename2{

      margin-left:20px;
      /* background:wheat; */
      width:135px;
      border-radius: 4px;
      margin-top:0rem;
      padding: 7px 5px;
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.97em;
      font-weight:bold;
      /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
      /* color:white; */
    }
    .coursename22{
      margin-left:20px;
      /* background:wheat; */
      width:120px;
      border-radius: 4px;
      padding: 7px 5px;
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.97em;
      font-weight:bold;
      /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
      /* color:white; */
    }
    .topic {
    font-size: 1.0rem;
    background: #3a98b4;
    background: -webkit-linear-gradient(to right, #63739c, #6a819c, #8062e0);
    background: linear-gradient(to right, #7f828a, #69a1e0, #5b43b3);
    padding: 5px 5px;
    border: none;
    border-radius: 4px;
    margin-top: 2rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}
    .submit {
    font-size: 1.0rem;
    background: #77f181;
    /* background: -webkit-linear-gradient(to right, #1cf126, #126d29, #4feb69); */
    background: linear-gradient(to right, #63739c, #1672db, #3613b3);
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 1rem;
    margin-bottom:1rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}
  .add {
    font-size: 1.0rem;
    background: #deddf8;
    background: -webkit-linear-gradient(to right, #f0f2f5, #ecf0f5, #bcb7cf);
    background: linear-gradient(to right, #afb7cc, #d8dde2, #e3e1ec);
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 0rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
  }
  .addtopic {
    font-size: 1.0rem;
    background: #deddf8;
    background: -webkit-linear-gradient(to right, #f0f2f5, #ecf0f5, #bcb7cf);
    background: linear-gradient(to right, #afb7cc, #d8dde2, #e3e1ec);
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    margin-top: 0rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}
.note{
  font-weight: bold;
  margin-left: 260px;
  background: rgb(146, 136, 136);
  width:500px;
}

  </style>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<!-- table section -->
<table class="content-table">
  <thead>
    <tr>
    <th>id</th>
      <th>State</th>
      <th>Price</th>
      <th>My percentage(10%)</th>
      <th>Delivary Worker Id</th>
      <th>Cart</th>
    </tr>
  </thead>
  <tbody>

    <?php
 
    for ($i = 0; $i < count($orders); $i++) 
   {
    ?>
      <tr>
        <td><?php echo  $orders[$i]->id ?></td>

        <?php if($orders[$i]->state==1) {  ?>  <td>waiting preparation </td> <?php }?>
        <?php if($orders[$i]->state==2) {  ?>  <td>waiting delivery </td> <?php }?>
        <?php if($orders[$i]->state==3) {  ?>  <td>In delivery </td> <?php }?>
        <?php if($orders[$i]->state==4) {  ?>  <td>delivery Done</td> <?php }?>
        <?php if($orders[$i]->state==6) {  ?>  <td>delivery Money Done</td> <?php }?>
        <?php if($orders[$i]->state==-1) {  ?>  <td> Done</td> <?php }?>
        <?php if($orders[$i]->state==-1||$orders[$i]->state==1||$orders[$i]->state==2||$orders[$i]->state==3||$orders[$i]->state==4||$orders[$i]->state==6) {  ?>  
        <td><?php echo  $orders[$i]->price.'$'?> </td>
        <td><?php echo  $orders[$i]->price * 0.1.'$'?> </td>
        <td><?php echo  $orders[$i]->delivary_user_id?> </td>
        <!-- <td><i class='bx bx-cart-alt'></i></td> -->
        <td><a  href="<?php echo URL . 'carts/cartListA/'.$orders[$i]->Cart_id;?>" class="btn_del"><span>&#8594;</span></a></td>
        <?php }else{?>
          <td>This order has been cancelled</td>
          <td><?php echo  $orders[$i]->price.'$'?> </td>
          <?php }?>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<br><br>