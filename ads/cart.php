<?php
session_start();

$products = [
  ["id" => 1, "name" => "Product 1", "price" => 10],
  ["id" => 2, "name" => "Product 2", "price" => 20],
  ["id" => 3, "name" => "Product 3", "price" => 30]
];

if (isset($_POST['add-to-cart'])) {
  $product_id = $_POST['product-id'];
  $product = $products[$product_id-1];
  $item = ["id" => $product['id'], "name" => $product['name'], "price" => $product['price'], "quantity" => 1];
  if (isset($_SESSION['cart'])) {
    $item_exists = false;
    foreach ($_SESSION['cart'] as &$cart_item) {
      if ($cart_item['id'] == $item['id']) {
        $cart_item['quantity'] += 1;
        $item_exists = true;
        break;
      }
    }
    if (!$item_exists) {
      $_SESSION['cart'][] = $item;
    }
  } else {
    $_SESSION['cart'] = [$item];
  }
}

if (isset($_POST['remove-one-from-cart'])) {
  $item_index = $_POST['item-index'];
  $_SESSION['cart'][$item_index]['quantity'] -= 1;
  if ($_SESSION['cart'][$item_index]['quantity'] <= 0) {
    unset($_SESSION['cart'][$item_index]);
  }
}

if (isset($_POST['remove-from-cart'])) {
  $item_index = $_POST['item-index'];
  unset($_SESSION['cart'][$item_index]);
}

if (isset($_SESSION['cart'])) {
  $cart_items = $_SESSION['cart'];
} else {
  $cart_items = [];
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Store</title>
</head>
<body>
  <h1>Products</h1>
  <ul>
    <?php foreach ($products as $product): ?>
      <li>
        <h3><?php echo $product['name']; ?></h3>
        <p>$<?php echo $product['price']; ?></p>
        <form method="POST">
          <input type="hidden" name="product-id" value="<?php echo $product['id']; ?>">
          <button type="submit" name="add-to-cart">Add to Cart</button>
        </form>
      </li>
    <?php endforeach; ?>
  </ul>

  <h1>Cart</h1>
  <ul>
    <?php foreach ($cart_items as $index => $item): ?>
      <li>
        <h3><?php echo $item['name']; ?></h3>
        <p>$<?php echo $item['price']; ?></p>
        <p>Quantity: <?php echo $item['quantity']; ?></p>
        <form method="POST">
          <input type="hidden" name="item-index" value="<?php echo $index; ?>">
          <button type="submit" name="remove-one-from-cart">Remove One</button>
          <button type="submit" name="remove-from-cart">Remove All</button>
        </form>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
