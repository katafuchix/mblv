<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{if $form.guest}
	{html_style type="title" title="ナパ☆コラム" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
	{html_style type="title" title="新着日記一覧" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
		{include file="user/pager.tpl"}
		{html_style type="line" color="gray"}
		{foreach from=$app.listview_data item=item}

				{if $config.option.avatar}
					<img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
				{else}
					{if $item.user_image_id}
					<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
					{/if}
				{/if}

			<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}({$item.blog_article_comment_num})</a>
			（<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}さん</a>）
			{html_style type="line" color="gray"}
		{foreachelse}
					全体ユーザの最新{$ft.blog_article.name}は見つかりませんでした。
		{/foreach}
		{include file="user/pager.tpl"}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
