<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.blog_article.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
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
		{html_style type="title" title="検索結果" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
		{include file="user/pager.tpl"}
		{html_style type="line" color="gray"}
		{foreach from=$app.listview_data item=item}
			<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a><br />
			（<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん）
			{html_style type="line" color="gray"}
		{foreachelse}
			検索条件に合致する{$ft.blog_article.name}は見つかりませんでした。
		{/foreach}
		{include file="user/pager.tpl"}
	{/if}{* $form.keyword != '' *}
	
	ｷｰﾜｰﾄﾞを入力して検索すると{$ft.blog_article_title.name}または{$ft.blog_article_body.name}に一致する{$ft.blog_article.name}検索結果が表示されます。<br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
