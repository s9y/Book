&lt;div&nbsp;class="serendipity_entry_body"&gt;<br />
&nbsp;&nbsp;{$entry.body}<br />
<br />
&nbsp;&nbsp;{if&nbsp;$entry.properties.ep_aggregator_feedurl}<br />
&nbsp;&nbsp;&lt;p&gt;Dieser&nbsp;Artikel&nbsp;wurde&nbsp;ursprünglich&nbsp;von&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$entry.properties.ep_aggregator_author}&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;im&nbsp;Blog&nbsp;&lt;a&nbsp;href="{$entry.properties.ep_aggregator_articleurl}"&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$entry.properties.ep_aggregator_feedname}&lt;/a&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;verfasst&nbsp;und&nbsp;hier&nbsp;aggregiert.<br />
&nbsp;&nbsp;&lt;/p&gt;<br />
&nbsp;&nbsp;{/if}<br />
&lt;/div&gt;