<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.avatar.name`�׎ݎ��ݎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{/if}
	<div align="center" style="text-align:center;font-size:small;">
	���{$ft.point.name}:{$app.user.user_point}{$ft.point.name}
	</div>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_home=true">{$ft.avatar.name}���ێ����ގ��Ĥ�</a><br />
	{if $session.cart_avatar}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_preview=true">{$ft.avatar.name}�㤤ʪ������</a><br />
	{/if}
</div>
<!--��������ƥ�Ľ�λ-->


<!--�����ȥ�-->
{html_style type="title" title="`$ft.avatar.name`�׎ݎ��ݎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">

	{foreach from=$app.ranking item=item name=avatar key =k}
		<div align="left" style="text-align:left;float:left;">

		<img src="?action_user_file_avatar_view=true&avatar_id={$item.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}&SESSID={$SESSID}" style="float:left;"><br />
			<span style="margin-top:5px;">
				<a href="?action_user_avatar_buy=true&avatar_id={$item.avatar_id}">{$item.avatar_name}</a><br />
				{$item.avatar_desc}
			</span>
		</div>
		{html_style type="line" color="gray"}

	{/foreach}

</div>
<!--��������ƥ�Ľ�λ-->


<!--�����ȥ�-->
{html_style type="title" title="`$ft.avatar_category.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
<div align="cetner" style="text-align:center;font-size:small;">
	{foreach from=$app.category item=item name=avatar key =k}
		<a href="?action_user_avatar_list=true&avatar_category_id={$item.avatar_category_id}">{$item.avatar_category_name}</a>/
	{/foreach}
</div>
<!--��������ƥ�Ľ�λ-->

<!--��������-->
{html_style type="title" title="`$ft.avatar.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_avatar_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="����"}
	{/form}
</div>
<!--������λ-->

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html2}
</div>
<!--��������ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}