<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{if $form.guest}
	{html_style type="title" title="�ʥѡ������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
	{html_style type="title" title="������������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
		{include file="user/pager.tpl"}
		{html_style type="line" color="gray"}
		{foreach from=$app.listview_data item=item}

				{if $config.option.avatar}
					<img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
				{else}
					{if $item.user_image_id}
					<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
					{/if}
				{/if}

			<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}({$item.blog_article_comment_num})</a>
			��<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}����</a>��
			{html_style type="line" color="gray"}
		{foreachelse}
					���Υ桼���κǿ�{$ft.blog_article.name}�ϸ��Ĥ���ޤ���Ǥ�����
		{/foreach}
		{include file="user/pager.tpl"}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
