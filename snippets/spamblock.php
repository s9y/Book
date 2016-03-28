&lt;?php<br />
<br />
function&nbsp;random_string($max_char,&nbsp;$min_char)&nbsp;{<br />
&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;chars&nbsp;=&nbsp;array(2,&nbsp;3,&nbsp;4,&nbsp;7,&nbsp;9);&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;1,&nbsp;5,&nbsp;6&nbsp;and&nbsp;8&nbsp;may&nbsp;look&nbsp;like&nbsp;characters.<br />
&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;chars&nbsp;=&nbsp;array_merge($this-&gt;chars,<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array('A','B','C','D','E','F','H','J','K','L','M',<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'N','P','Q','R','T','U','V','W','X','Y','Z'));&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;I,&nbsp;O,&nbsp;S&nbsp;may&nbsp;look&nbsp;like&nbsp;numbers<br />
<br />
?&gt;