<!-- ここからページャ -->
<div align="center" style="text-align:center;font-size:small;background:{$pager_bg_color};color:{$pager_text_color}">
	({$app.listview_current}/{$app.listview_last}ﾍﾟｰｼﾞ)<br />
	{if $app_ne.listview_links.back}{$app_ne.listview_links.back}{/if}
	{if $app_ne.listview_links.back && $app_ne.listview_links.next}|{/if}
 	{if $app_ne.listview_links.next}{$app_ne.listview_links.next}{/if}
</div>
<!-- ここまでページャ -->
