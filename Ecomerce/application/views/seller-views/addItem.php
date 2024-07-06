<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Product</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: url('../../../public/img/pic2.jpeg') repeat fixed 100%;
    margin: 0;
    padding: 0;
  }
  .form-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    background: #f9f9f9;
    width: 80%;
    margin: 5% auto;
    padding: 20px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
  }
  .input-container, .image-container {
    width: 48%; /* Adjusts to 50% considering the padding and margins */
  }
  h2 {
    text-align: center;
    color: #736ADF;
    width: 100%;
  }
  .form-group {
    margin-bottom: 15px;
  }
  .form-group .tit {
    display: block;
    color: #736ADF;
    font-weight: bold;
  }
  .form-group input[type="text"],
  .form-group input[type="number"],
  .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
  }
  .form-group input[type="file"] {
    display: none;
  }
  .form-group textarea {
    resize: vertical;
  }
  .form-group button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background: #5cb85c;
    color: white;
    cursor: pointer;
    font-weight: bold;
    font-size: 100%;
  }
  .form-group button:hover {
    background: #4cae4c;
  }
  .image-container img {
    max-width: 100%;
    max-height: 100%;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 6px 5px rgba(0, 0, 0, 0.1);
    margin-left: 10px;
    margin-top: 30px;
  }
  .custom-file-upload {
  border: 1px solid #ccc;
  border-radius: 20px;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer; 
  color: white;
  background: #2b8de3;
  font-weight: bold;
    font-size: 100%;
}
</style>
</head>
<body>

<div class="form-container">
  <div class="input-container">
    <h2>Add New Product</h2>
    <form method="POST" action="<?php echo URL . 'Items/AddItem/' . $storeId.'/'.$SellerId; ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label class="tit" for="description">Description:</label>
        <input id="description" type ="text" name="description" rows="4" required></input>
      </div>
      <div class="form-group">
        <label class="tit" for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
      </div>
      <div class="form-group">
        <label class="tit" for="price">Price:</label>
        <input type="number" id="price" name="price" required>
      </div>

      <div class="form-group">
        <label class="tit" for="image">Product Image:</label>
        <label for="image" class="custom-file-upload">
        Upload
    </label>
        <input type="file" id="image" name="ItemImage" accept="image/*" onchange="previewImage(event)" required>
      </div>
      <div class="form-group">
        <button type="submit">Add Product</button>
      </div>
    </form>
  </div>
  <div class="image-container">
    <img id="image-preview" src="<?php echo URL; ?>public/img/newproduct.jpg" alt="Preview">
  </div>
</div>

<script>
  function previewImage(event) {
    const preview = document.getElementById('image-preview');
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function() {
        preview.src = reader.result;
      };
      reader.readAsDataURL(file);
    }
  }
</script>

</body>
</html>
