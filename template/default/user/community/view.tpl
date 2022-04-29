<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title=$app.community.community_title bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.community.image_id}
		<!--���ߥ�˥ƥ�����-->
		<a href="?action_user_file_image_view=true&image_id={$app.community.image_id}&community_id={$form.community_id}">
		<img src="f.php?type=image&id={$app.community.image_id}&attr=t&SESSID={$SESSID}" style="float:left;" alt="����">
		</a>
	{/if}
	<!--���ߥ�˥ƥ�������������-->
	<span>
	{$app.community.community_description|nl2br}
	</span>
	<!--���ߥ�˥ƥ�����������λ-->
	{html_style type="line" color="gray"}
	
	{if !$app.user_status.is_member}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_join_do=true&community_id={$app.community.community_id}">����{$ft.community.name}�˻��ä���</a>
	{/if}
	<!--����ȥԥå��ɤ߹��߸��¥桼���Τ߱�������-->
	{if $app.user_status.can_read_article}
		<div align="center" style="text-align:center;font-size:small;">
		[
		<a href="?action_user_community_article_list=true&community_id={$app.community.community_id}">�Ďˎߎ�������</a>
		&nbsp;/&nbsp;
		<a href="?action_user_community_member=true&community_id={$app.community.community_id}">�Ҏݎʎގ�����</a>
		]
		</div>
		<!--�����ȥ�-->
		{html_style type="title" title="�����`$ft.community_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
		
		<!--����ȥԥå�����-->
		<div align="left" style="text-align:left;font-size:small;">
			{foreach from=$app.article_list item=item key=k}
				{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
				{/if}
				<span>
					<span style="color:{$timecolor}">{$item.community_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span>
					{if $item.user_id == $session.user.user_id}
					[<a href="?action_user_community_article_edit=true&community_article_id={$item.community_article_id}">�Խ�</a>]
					{/if}
					<br />
					<a href="?action_user_community_article_view=true&community_article_id={$item.community_article_id}">{$item.community_article_title}({$item.community_article_comment_num})</a><br />
				</span>
				{html_style type="line" color="gray"}
			{/foreach}
		</div>
		{if $app.user_status.can_add_topic}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_article_add=true&community_id={$app.community.community_id}">{$ft.community_article.name}�ο�������</a><br />
		{/if}
	{/if}{* if $app.user_status.can_read_article *}
	<!--����ȥԥå��ɤ߹��߸��¥桼���Τ߱�����λ-->
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	
	<!--���ߥ�˥ƥ�������������-->
	<div align="left" style="text-align:left;font-size:small;">
		<span style="color:{$form_name_color};">
		���Î��ގ�:
		</span>
		{$app.category}
		{html_style type="line" color="gray"}
		<span style="color:{$form_name_color};">
		���þ��:
		</span>
		{$config.community_join_condition[$app.community.community_join_condition].name}
		{html_style type="line" color="gray"}
		<span style="color:{$form_name_color};">
		�Ďˎߎ�������:
		</span>
		{$config.community_topic_permission[$app.community.community_topic_permission].name}
		{html_style type="line" color="gray"}
		<span style="color:{$form_name_color};">
		��������:
		</span>
		{$app.community.community_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
		{html_style type="line" color="gray"}
		<span style="color:{$form_name_color};">
		������:
		</span>
		<a href="?action_user_profile_view=true&user_id={$app.admin.user_id}">{$app.admin.user_nickname}</a>����<br />
		{html_style type="line" color="gray"}
	</div>
	<!--���ߥ�˥ƥ�����������λ-->
	
	<!--���ߥ�˥ƥ������ԥ���ƥ�ĳ���-->
	{if $app.user_status.is_admin}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_edit=true&community_id={$app.community.community_id}">{$ft.community.name}���Խ�</a><br />
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_admin_member=true&community_id={$app.community.community_id}">�Ҏݎʎގ��δ���</a>
	{/if}
	<!--���ߥ�˥ƥ������ԥ���ƥ�Ľ�λ-->
	{if $app.user_status.is_member}
		<br /><span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_resign_confirm=true&community_id={$app.community.community_id}">����{$ft.community.name}����񤹤�</a>
	{/if}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
