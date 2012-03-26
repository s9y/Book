<?php
foreach(glob('*.png') AS $filename) {
  $new = str_replace('.png', '.eps', $filename);
  if (!file_exists($new)) {
    echo "Converting $filename.\n";
    exec("convert $filename $new");
  } else {
    echo "Skipping $filename.\n";
  }
}