<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.blog_article.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action="user_blog_article_search" action="$script"}
		<br />
		<span style="color:{$form_name_color};">
		{form_name name='keyword'}:
		</span>
		{form_input name='keyword' size=12}
		&nbsp;{form_input name='search'}
	{/form}
	
	{if $form.keyword != ''}
		{html_style type="title" title="�������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
		{include file="user/pager.tpl"}
		{html_style type="line" color="gray"}
		{foreach from=$app.listview_data item=item}
			<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a><br />
			��<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>�����
			{html_style type="line" color="gray"}
		{foreachelse}
			�������˹��פ���{$ft.blog_article.name}�ϸ��Ĥ���ޤ���Ǥ�����
		{/foreach}
		{include file="user/pager.tpl"}
	{else}{* $form.keyword != '' *}
		{html_style type="title" title="������������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
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
		{*if $app.listview_data && $k >=4*}
			<div align="right" style="text-align:right;font-size:small;">
				&nbsp;��<a href="?action_user_blog_article_whole=true">��äȸ���</a>[x:0082]
			</div>
			{html_style type="line" color="gray"}
		{*/if*}
	{/if}
	
	�����܎��Ďޤ����Ϥ��Ƹ��������{$ft.blog_article_title.name}�ޤ���{$ft.blog_article_body.name}�˰��פ���{$ft.blog_article.name}������̤�ɽ������ޤ���<br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
