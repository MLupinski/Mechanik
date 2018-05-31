<!DOCTYPE html>
<html lang="pl">

<head>
  <title>Document</title>
  <meta charset="UTF-8">
  <style>
    header {
      background: #e3e3e3;
      padding: 2em;
      text-align: center;
    }
  </style>
</head>
<body>
  <ul>
    <li><a href="controllers\about.php">About Us</a></li>
    <li><a href="controllers\contact.php">Contact Us</a></li>
  </ul>
  <ul>
   <?php foreach($clientsdata as $data) : ?>
    <li>
      <?php if ($data->COMPLETED) : ?>
        <strike><?=$data->FIRSTNAME; ?></strike>
        <strike><?=$data->LASTNAME; ?></strike>
        <strike><?=$data->CAR; ?></strike>
        <?php else: ?>
          <?=$data->FIRSTNAME; ?>
          <?=$data->LASTNAME; ?>
          <?=$data->CAR; ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>
