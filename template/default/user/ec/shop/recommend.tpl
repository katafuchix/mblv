{include file="user/header.tpl"}

{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--おすすめ商品開始-->
{if $app_ne.shop_recommend_list}
	{html_style type="title" title="[x:0139]おすすめ商品[x:0139]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{*}ショップ管理-ショップ編集-おすすめ商品で変更可。{*}
	{foreach from=$app_ne.shop_recommend_list item=i key=k name=n}
		{if $i.item_image}
		<img align="left" style="text-align:left;float:left;" src="{if $i.item_image|escape}f.php?file_name=thumb/{$i.item_image|escape}&contents=item{/if}" >
		{/if}
		<a href="?action_user_ec_item=true&item_id={$i.item_id|escape}">{$i.item_name|escape}</a><br />
		{$i.item_text1}{html_style type="br"}
		<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid;clear:both;" noshade>
	{/foreach}
{/if}
<!--おすすめ商品終了-->

{include file="user/footer.tpl"}
