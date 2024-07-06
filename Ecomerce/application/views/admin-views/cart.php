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
  <thead class ="head1">
    <tr>
      <th>ID</th>
      <th>Buyer Id</th>
      <th>Total Price</th>
      <th> State</th>
    </tr>
  </thead>
  <tbody>


      <tr>
        <td><?php echo $cartinfo[0][0]->id ?></td>
        <td><?php echo $cartinfo[0][0]->buyer_id ?></td>
        <td><?php echo $cartinfo[0][0]->total_price?></td>


        <?php if($cartinfo[0][0]->state==1) {  ?>  <td>waiting preparation </td> <?php }?>
        <?php if($cartinfo[0][0]->state==2) {  ?>  <td>waiting delivery </td> <?php }?>
        <?php if($cartinfo[0][0]->state==3) {  ?>  <td>In delivery </td> <?php }?>
        <?php if($cartinfo[0][0]->state==4) {  ?>  <td>delivery Done</td> <?php }?>
        <?php if($cartinfo[0][0]->state==6) {  ?>  <td>delivery Money Done</td> <?php }?>
        <?php if($cartinfo[0][0]->state==-1) {  ?>  <td> Done</td> <?php }?>

      </tr>

  </tbody>

  <thead class ="head2" >
  <th > Contents: </th>
    <tr>
      <th>Item ID</th>
      <th>Price(1)</th>
      <th>Count</th>
      <th>Store Id</th>
    </tr>
  </thead>
  <tbody>
  <?php
 
 for ($i = 0; $i < count($cartinfo[1]); $i++) 
{
 ?>

      <tr>
        <td><?php echo $cartinfo[1][$i]->Items_id ?></td>
        <td><?php echo $cartinfo[1][$i]->price.'$' ?></td>
        <td><?php echo $cartinfo[1][$i]->count?></td>
        <td><?php echo $cartinfo[1][$i]->store_id?></td>

      </tr>
      <?php
    }
    ?>
  </tbody>
  </table>