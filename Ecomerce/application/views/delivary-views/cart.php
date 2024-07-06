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
  <thead class ="head2" >
    <tr>
      <th>Item Id</th>
      <th>Count</th>
      <th>Store Address</th>
    </tr>
  </thead>
  <tbody>
  <?php
 
 for ($i = 0; $i < count($cartinfo); $i++) 
{
 ?>

      <tr>
        <td><?php echo $cartinfo[$i]->Items_id ?></td>
        <td><?php echo $cartinfo[$i]->count?></td>
        <td><?php echo $cartinfo[$i]->address?></td>

      </tr>
      <?php
    }
    ?>
  </tbody>
  </table>