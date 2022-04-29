<!-- ここからページャ -->
{if $app_ne.listview_links.back || $app_ne.listview_links.next}
<div class="pager">
{$app_ne.listview_links.back}
{$app_ne.listview_links.first}
{$app_ne.listview_links.pages}
{$app_ne.listview_links.last}
{$app_ne.listview_links.next}
</div>
<br class="clear" />
{/if}
<!-- ここまでページャ -->
