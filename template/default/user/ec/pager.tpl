<!-- ここからページャ -->
{if $app.pager.hasprev}
	<a href="{$app.pager.link}&start={$app.pager.prev}" accesskey="*">←前へ＊</a>
{/if}
{if $app.pager.hasnext}
	<a href="{$app.pager.link}&start={$app.pager.next}" accesskey="#">次へ＃→</a>
{/if}
<!-- ここまでページャ -->
