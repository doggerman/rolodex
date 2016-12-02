<?php


  if (!empty($error)) {
    echo '<div class="massage error">';
    echo '<div class="close">x</div>';
    echo '<div class="text">';
    foreach ($error as $key => $value) {
      echo "$value<br>";
    }
    echo '</div></div>';
  }


  if (!empty($success)) {
    echo '<div class="massage">';
    echo '<div class="close">x</div>';
    echo '<div class="text">';
    foreach ($success as $key => $value) {
      echo "$value<br>";
    }
    echo '</div></div>';
  }
