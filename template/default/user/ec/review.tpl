{include file="user/header.tpl"}

<!--レビュー一覧開始-->
{html_style type="title" title="■レビュー一覧■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	
	<br />
	{foreach from=$app.listview_data item=r}
		
		<div align="left" style="text-align:left">
			<img src="{if $r.item_image}f.php?file_name={$r.item_image}&contents=item{else}img/item1.jpg{/if}" width="53" heith="41" style="float:left">
		</div>
		
		<div align="left" style="text-align:left">
			<a href="?action_user_ec_item=true&item_id={$r.item_id}">{$r.item_name}</a><br />
		</div>
		
		<div align="left" style="text-align:left">
			{$r.review_title}<br />
			{$r.review_body}<br />
		</div>
		
		{if $app.self_user_id == $r.user_id}
			<div align="left" style="text-align:right">
				<a href="?action_user_ec_review_edit=true&review_id={$r.review_id}&item_id={$r.item_id}">編集</a>  
				<a href="?action_user_ec_review_delete=true&review_id={$r.review_id}&item_id={$r.item_id}">削除</a>
				<br />
			</div>
		{/if}
	
		<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid" noshade>
	{/foreach}
</div>
<!--レビュー一覧終了-->

<div align="center" style="text-align:center">

	{if $app.total> 0}
		{include file="user/pager.tpl"}
	{else}

	{/if}

</div>

{include file="user/footer.tpl"}
