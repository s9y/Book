&lt;div&nbsp;class="serendipity_entry_body"&gt;<br />
&nbsp;&nbsp;{$entry.body}<br />
<br />
&nbsp;&nbsp;{if&nbsp;$entry.properties.ep_Podcast}<br />
&nbsp;&nbsp;&lt;p&gt;MP3-Podcast:<br />
&nbsp;&nbsp;&nbsp;&nbsp;&lt;object&nbsp;width="300"&nbsp;height="42"&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&lt;param&nbsp;name="src"&nbsp;value="{$entry.properties.ep_Podcast}"&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&lt;param&nbsp;name="autoplay"&nbsp;value="true"&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&lt;param&nbsp;name="controller"&nbsp;value="true"&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&lt;embed&nbsp;src="{$entry.properties.ep_Podcast}"&nbsp;autostart="true"&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;loop="false"&nbsp;&nbsp;width="300"&nbsp;height="42"&nbsp;controller="true"&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&lt;/embed&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&lt;/object&gt;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&lt;/p&gt;<br />
&nbsp;&nbsp;{/if}<br />
&lt;/div&gt;