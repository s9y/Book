&lt;?php<br />
<br />
$input&nbsp;&nbsp;=&nbsp;file_get_contents('dump-iso.sql');<br />
$output&nbsp;=&nbsp;utf8_encode($input);<br />
$fp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;fopen('dump-utf8.sql',&nbsp;'wb');<br />
if&nbsp;($fp)&nbsp;{<br />
&nbsp;&nbsp;fwrite($fp,&nbsp;$output);<br />
&nbsp;&nbsp;fclose($fp);<br />
}&nbsp;else&nbsp;{<br />
&nbsp;&nbsp;echo&nbsp;"Keine&nbsp;Schreibrechte,&nbsp;bitte&nbsp;korrigieren.";<br />
}<br />
<br />
?&gt;