<?php
foreach(glob('*.php') AS $filename) {
  if ($filename == 'create_tex.php') continue;
  $new = str_replace('.php', '.tex', $filename);
  echo "Converting $filename.\n";
  $fg = file_get_contents($filename);
  
  // LaTeX is beautiful.
  // NOT.
  $fg = str_replace(
   array(
   '_',
   '{',
   '}',
   '$',
   '&',
   '"',
   '\\',
   ), 
   
   array(
   '\\_',
   '\\{',
   '\\}',
   '\\$',
   '\\&',
   '\'',
   '\\textbackslash{}'
   ),
  $fg);

  $fp = fopen($new, 'w');
  fwrite($fp, '\begin{ospcode}' . "\n" . $fg . "\n" . '\end{ospcode}');
  fclose($fp);
}