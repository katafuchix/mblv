{include file="user/header.tpl"}

{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--�͵���󥭥󥰳���-->
{if $app_ne.shop_ranking_list}
	{*}����å״���-����å��Խ�-�͵���󥭥󥰤��ѹ��ġ�{*}
	{html_style type="title" title="[x:0167]�͵��׎ݎ��ݎ���[x:0167]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{foreach from=$app_ne.shop_ranking_list item=i key=k name=n}
		{if $i.item_image}
		<img align="left" style="text-align:left;float:left;" src="{if $i.item_image|escape}?action_user_ec_file_get=true&file_name=thumb/{$i.item_image|escape}&type=item{/if}" >
		{/if}
		<span style="color:red;">��{$smarty.foreach.n.iteration}��</span><br>
		<a href="?action_user_ec_item=true&item_id={$i.item_id|escape}">{$i.item_name|escape}</a><br />
		{$i.item_text1}{html_style type="br"}
		<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid" noshade>
	{/foreach}
{/if}
<!--�͵���󥭥󥰽�λ-->

{include file="user/footer.tpl"}
