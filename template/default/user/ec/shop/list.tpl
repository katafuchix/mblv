{include file="user/header.tpl"}

<!--������̳���-->
{html_style type="title" title="��������̢�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
<div align="left" style="text-align:left;font-size:small;">
	{if count($app.listview_data) == 0}
		�������˹��פ���Ź�ޤϸ��Ĥ���ޤ���Ǥ�����
	{else}
		�������˹��פ���Ź�ޤ�{$app.listview_total}�︫�Ĥ���ޤ�����<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<!--�ڡ����㡼-->
		{include file="user/pager.tpl"}
	{/if}
	
	{foreach from=$app.listview_data item=i name=n}
		{if $i.shop_image1}
		<img align="left" style="text-align:left;float:left;" src="?action_user_ec_file_get=true&file_name=thumb/{$i.shop_image1|escape}&type=shop" >
		{/if}
		<a href="?action_user_ec_shop=true&shop_id={$i.shop_id}">{$i.shop_name}</a><br />
		��{$i.shop_news}{html_style type="br"}
		{if !$smarty.foreach.n.last}
			<hr>
		{/if}
	{/foreach}
	<!--�ڡ����㡼-->
	{include file="user/pager.tpl"}
</div>

{include file="user/footer.tpl"}
