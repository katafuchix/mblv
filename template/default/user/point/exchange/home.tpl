<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�Ύߎ��ݎĸ�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	[x:0162]���ߤΎΎߎ��ݎ�<span style="color:#FF3399">{$app.user_point}</span>pt<br />
	<span style="color:{$menucolor}">��</span><a href="?action_user_util=true&page=about-sns-exchange">�Ύߎ��ݎĸ�</a><br />
	<span style="color:{$menucolor}">��</span><a href="?action_user_ad=true">�Ύߎ��ݎĎΎߎ����٤�</a><br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{foreach from=$app.point_list item=item name=point key =k}
		{style align="left" bgcolor=$bgcolor fontcolor=$text fontsize="small"}
		{$item.point_exchange_time|date_format:"%m/%d"}<br />{$config.point_type[$item.point_type].name}��{$item.price}<br />�ʼ����:��{$item.fee}��<!--��ǧ��ǧ����ɽ��({$config.point_status[$item.point_status].name})--></a>
		{/style}
	<hr color="#C9DACF" style="border:solid 1px #C9DACF;">
	{/foreach}
	<br />
	{include file="user/pager.tpl"}
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<span style="color:{$menucolor}">��</span><a href="?action_user_util=true&page=about-sns-exchange">�Ύߎ��ݎĸ�</a><br />
	<span style="color:{$menucolor}">��</span><a href="?action_user_ad=true">�Ύߎ��ݎĎΎߎ����٤�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
