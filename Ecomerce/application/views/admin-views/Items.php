<head>
  <style>
    .btn {
      font-size: 1.0rem;
      background: #3c3ab4;
      background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3);
      background: linear-gradient(to right, #63739c, #1672db, #3613b3);
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

    #addform {
      margin-top: 1rem;
      position: flex;
      width: 300px;
      margin-left: 265px;
      z-index: -1;
      border: 5px solid rgb(146, 136, 136);
      border-radius: 10px;
      background-color: rgba(202, 238, 224, 0.5);

    }

    .coursename2 {

      margin-left: 20px;
      /* background:wheat; */
      width: 120px;
      border-radius: 4px;
      margin-top: 0rem;
      padding: 7px 5px;
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.97em;
      font-weight: bold;
      /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
      /* color:white; */
    }

    .coursename22 {
      margin-left: 20px;
      /* background:wheat; */
      width: 120px;
      border-radius: 4px;
      padding: 7px 5px;
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.97em;
      font-weight: bold;
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
      margin-bottom: 1rem;
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
      width: 254px;
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
      width: 254px;
      border-radius: 4px;
      margin-top: 0rem;
      cursor: pointer;
      position: relative;
      margin-left: 20px;
      transition: all 0.35s;
      outline: none;
    }

    .note {
      font-weight: bold;
      margin-left: 260px;

      background: rgb(146, 136, 136);
      width: 500px;
    }

    .note1 {
      font-weight: bold;
      margin-left: 40%;
      background: rgb(146, 136, 136);
      width: 450px;
    }
  </style>
</head>

<html>
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
  <h1 class="note1"> Ther are no Items to show! </h1><br>
<?php } else {
    $classifiedArray = [];
    foreach ($array as $item) {
     $classifiedArray[$item->User_id][] = $item;
           } ?>
  <?php  foreach ($classifiedArray as $userId => $objects) { ?>
    <div>
      <table class="content-table">
        
        <thead>
          <th> The Items for The Seller with id:<?php echo  $userId ?> </th>
          <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Price</th>
            <th> Count </th>
          </tr>
        </thead>
        <tbody>
         <?php  foreach ( $objects as $item ){?>
          <tr>
            <td><?php echo $item->id; ?></td>
          
            <td><?php echo $item->description; ?></td>
            <td><?php echo $item->price . "$"; ?></td>
            <td><?php echo $item->count; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } ?>
    <br />
  <?php } ?>


</html>