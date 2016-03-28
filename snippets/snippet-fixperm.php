&lt;?php<br />
<br />
$ziel&nbsp;=&nbsp;'/var/www/example.com/serendipity/serendipity_config_local.inc.php';<br />
if&nbsp;(chmod($ziel,&nbsp;0777))&nbsp;{<br />
&nbsp;&nbsp;echo&nbsp;"Rechte&nbsp;geändert.";<br />
}&nbsp;else&nbsp;{<br />
&nbsp;&nbsp;echo&nbsp;"Fehler:&nbsp;Rechte&nbsp;dürften&nbsp;nicht&nbsp;verändert&nbsp;werden.";<br />
&nbsp;&nbsp;echo&nbsp;"Sie&nbsp;müssen&nbsp;den&nbsp;Provider&nbsp;kontaktieren.";<br />
}<br />
<br />
?&gt;