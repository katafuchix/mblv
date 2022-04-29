{include file="user/header.tpl"}

<!--検索結果開始-->
{html_style type="title" title="■検索結果■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
<div align="left" style="text-align:left;font-size:small;">
	{if count($app.listview_data) == 0}
		検索条件に合致する商品は見つかりませんでした。<br />
		<br />
	{else}
		検索条件に合致する商品が{$app.listview_total}件見つかりました。
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{include file="user/pager.tpl"}
	{/if}

	
	{foreach from=$app.listview_data item=item name=item}
		{if $item.item_image}
			<p><img src="f.php?file=item/thumb/{$item.item_image}&SESSID={$SESSID}" align="left" style="text-align:left;float:left;" width="53" height="46"><br /></p>
		{/if}
		<p><a href="?action_user_ec_item=true&item_id={$item.item_id}">{$item.item_name}</a></p>
		<p>{$item.item_price|number_format}円</p>
		{if !$smarty.foreach.item.last}
			<hr>
		{/if}
	{/foreach}
	{include file="user/pager.tpl"}
</div>

{include file="user/footer.tpl"}
