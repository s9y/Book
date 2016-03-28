&lt;?php&nbsp;<br />
<br />
include&nbsp;'serendipity_config.inc.php';<br />
$authorid&nbsp;=&nbsp;1;<br />
$neues_passwort&nbsp;=&nbsp;'neues_passwort';<br />
<br />
if&nbsp;($authorid&nbsp;&gt;&nbsp;0)&nbsp;{<br />
&nbsp;&nbsp;&nbsp;&nbsp;serendipity_db_query("UPDATE&nbsp;{$serendipity['dbPrefix']}authors&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SET&nbsp;password&nbsp;=&nbsp;'".&nbsp;md5($neues_passwort)."'<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE&nbsp;authorid&nbsp;=&nbsp;".&nbsp;$author_id);<br />
}&nbsp;else&nbsp;{<br />
&nbsp;&nbsp;&nbsp;&nbsp;serendipity_db_query("UPDATE&nbsp;{$serendipity['dbPrefix']}authors&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SET&nbsp;password&nbsp;=&nbsp;'".md5($neues_passwort)."'");<br />
}<br />
<br />
?&gt;