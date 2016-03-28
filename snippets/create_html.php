<?php
foreach(glob('*') AS $filename) {
  if ($filename == 'create_html.php') continue;
  echo "Converting $filename.<br />\n";
  $fg = file_get_contents($filename);
  
  $fg = str_replace(
   array(
   '<',
   '>',
   '\n'
   ), 
   
   array(
   '&lt;',
   '&gt;',
   '<br />\n'
   ),

   $fg);

  $fp = fopen($filename, 'w');
  fwrite($fp, $fg);
  fclose($fp);
}