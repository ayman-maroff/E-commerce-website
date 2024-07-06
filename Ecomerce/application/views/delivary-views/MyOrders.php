<style>
   .content-table-cart {
    border-collapse: collapse;
    margin-top: 90px;
    margin-left:260px ;
    font-size: 1.05em;
    min-width: 1000px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  }
  
  .content-table-cart .head1 tr {
    background: #736ADF;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
  }
  .content-table-cart .head2 tr {
    background: #5dd7bb;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
  }
  
  .content-table-cart th,
  .content-table-cart td {
    padding: 12px 15px;
  }
  .deleticon{
    color: #111316;
  }
  .deleticon_active{
    color: #3a6bb4;
  }
  .content-table-cart tbody tr {
    border-bottom: 1px solid #dddddd;
  }
  
  .content-table-cart tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
  }
  .content-table-cart tbody tr:nth-of-type(odd) {
    background-color: #aaabac;
  }
  
  .content-table-cart tbody tr:last-of-type {
    border-bottom: 2px solid #2455bd;
  }
  
  .content-table-cart tbody tr.active-row {
    font-weight: bold;
    color:  #1672db;
  }
</style>

<table class="content-table-cart">
<?php if(count($orders)==0) {?>

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
<h1 class="note1"> Ther are no orders to show! </h1><br>
<?php
} else {
?>
  <thead class ="head2" >
    <tr>
      <th>Order Number</th>
      <th>Address</th>
      <th>State</th>
      <th>Total Price</th>
    </tr>
  </thead>
  <tbody>
  <?php
 
 for ($i = 0; $i < count($orders); $i++) 
{
 ?>

      <tr>
        <td><?php echo $i+1; ?></td>
        <td><?php echo $orders[$i]->buyer_address?></td>
        <?php if($orders[$i]->state==3) {  ?>  <td>In progress </td> <?php }?>
        <?php if($orders[$i]->state==4) {  ?>  <td>Waiting for the money to be delivered</td> <?php }?>
        <?php if($orders[$i]->state==6|$orders[$i]->state==-1) {  ?>  <td>Done</td> <?php }?>
        <td><?php echo $orders[$i]->price.'$'?></td>
        <?php if($orders[$i]->state==3) {  ?>  <td><a  href="<?php echo URL . 'orders/Idelivered/'.$orders[$i]->id.'/'.$orders[$i]->Cart_id;?>" class="btn_del"><span>I delivered</span></a> </td> <?php }?>
        <?php if($orders[$i]->state==4) {  ?>  <td><a  href="<?php echo URL . 'orders/deliveredMoney/'.$orders[$i]->id.'/'.$orders[$i]->Cart_id;?>" class="btn_del"><span>I delivered Money</span></a></td> <?php }?>
      </tr>
      <?php
    }
    ?>
  </tbody>
  </table>
  <?php
     } 
    ?>