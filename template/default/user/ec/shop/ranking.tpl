{include file="user/header.tpl"}

{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--人気ランキング開始-->
{if $app_ne.shop_ranking_list}
	{*}ショップ管理-ショップ編集-人気ランキングで変更可。{*}
	{html_style type="title" title="[x:0167]人気ﾗﾝｷﾝｸﾞ[x:0167]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{foreach from=$app_ne.shop_ranking_list item=i key=k name=n}
		{if $i.item_image}
		<img align="left" style="text-align:left;float:left;" src="{if $i.item_image|escape}?action_user_ec_file_get=true&file_name=thumb/{$i.item_image|escape}&type=item{/if}" >
		{/if}
		<span style="color:red;">第{$smarty.foreach.n.iteration}位</span><br>
		<a href="?action_user_ec_item=true&item_id={$i.item_id|escape}">{$i.item_name|escape}</a><br />
		{$i.item_text1}{html_style type="br"}
		<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid" noshade>
	{/foreach}
{/if}
<!--人気ランキング終了-->

{include file="user/footer.tpl"}
