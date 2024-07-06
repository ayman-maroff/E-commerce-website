<table class="content-table">
  <thead>
    <tr>

      <th>Stor ID</th>
      <th>Address</th>
      <th>Items</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($myStore as $obj) { ?>
      <tr>
        <td><?php  echo $obj->id; ?></td>
        <td><?php  echo $obj->address; ?></td>
        <td> <a href="<?php echo URL . 'Items/ItemsListWorker/' . $obj->id; ?>"><span>&#8594;</span></a></td>
      </tr> 
    <?php } ?>
  </tbody>
</table>


</html>
<?php
