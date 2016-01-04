<?php require_once 'variables.php'; ?>
<?php require_once 'header.php'; ?>
<?php require_once 'database.php'; ?>

  <div class="container">

    <h1><?php echo $TITLE; ?></h1>

    <?php if ($COUNT) { ?>
    <p><div class="alert alert-danger" role="alert"><?php echo $SUBTITLE; ?></div></p>
    <?php } else { ?>
    <p><div class="alert alert-success" role="alert"><?php echo $SUBTITLE; ?></div></p>
    <?php } ?>

    <?php $stuffs = get_stuff(); ?>
    <table class="table">
      <tr>
        <th>Up/Down</th>
        <th>IT Service Name</th>
        <th>Status (Value)</th>
        <th>Config Color</th>
      </tr>
    <?php foreach ($stuffs as $stuff) { ?>
      <tr>
        <td>
          <?php if ($stuff['status'] == 0) { ?>
          <span class="glyphicon glyphicon-upload"></span>
          <?php } else { ?>
          <span class="glyphicon glyphicon-download"></span>
          <?php } ?>
        </td>
        <td><?php echo $stuff['name'] ?></td>
        <td><?php echo $CONFIG['severity_name_'.$stuff['status']] ?> (<?php echo $stuff['status'] ?>)</td>
        <td bgcolor="#<?php echo $CONFIG['severity_color_'.$stuff['status']] ?>">#<?php echo $CONFIG['severity_color_'.$stuff['status']] ?></td>
      </tr>
    <?php } ?>
    </table>

  </div>

<?php require_once 'footer.php'; ?>
