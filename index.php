<?php
  session_start();
  
  if ( !isset( $_SESSION['enter-task'] ) )
  {
    $_SESSION['enter-task'] = array();
  }
  
  $_SESSION['enter-task'] = array_values( $_SESSION['enter-task'] );
  
  if ( isset( $_POST ) && !empty( $_POST ) )
  {
    array_push($_SESSION['enter-task'], $_POST['todotask']);
  }

?><!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Assignment</title>
  </head>
  <body>
    <header>
      <h1>Todo Assignment</h1>
      <form action="./index.php" method="POST">
        <label for="todotask">
          Enter task:
          <input type="text" name="todotask" id="todotask">
        </label>
        <input type="submit" value="Add to Todo" id="add">
         <input type="submit" value="Reset" id="reset">

      <?php if ( !empty( $_SESSION['todolist'] ) ) : ?>
        <h2>Active To-Dos:</h2>
        <ul>
          <?php foreach ( $_SESSION['todolist'] as $T ) : ?>
            <li>
              <input type="checkbox" name="<?php echo $T; ?>" id="<?php echo $T; ?>">

              <label for="<?php echo $T; ?>">
              <?php echo $T; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      </form>
      <pre>
        <strong>$_POST contents:</strong>
        <?php var_dump( $_POST ); ?>
      </pre>
      <pre>
        <strong>$_SESSION contents:</strong>
        <?php var_dump( $_SESSION ); ?>
      </pre>
    </header>
  </body>
</html>
