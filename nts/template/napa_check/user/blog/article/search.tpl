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
	{/if}{* $form.keyword != '' *}
	
	�����܎��Ďޤ����Ϥ��Ƹ��������{$ft.blog_article_title.name}�ޤ���{$ft.blog_article_body.name}�˰��פ���{$ft.blog_article.name}������̤�ɽ������ޤ���<br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
