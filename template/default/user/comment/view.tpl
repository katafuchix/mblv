<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title=$app.article.blog_article_title bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--日記開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_profile_view=true&user_id={$app.article.user_id}">{$app.user.user_nickname}さんのﾌﾟﾛﾌｨｰﾙ</a><br />
	<span style="color:#009900">{$app.article.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span><br />
	{$app.article.blog_article_body|nl2br}<br />
	{if $app.article.image_id}
		<img src="?action_user_file_get_thumbnail=true&image_id={$app.article.image_id}&SESSID={$SESSID}" alt="画像"><br />
		[<a href="?action_user_file_image_view=true&image_id={$app.article.image_id}&blog_article_id={$form.blog_article_id}">画像を拡大</a>]<br />
	{/if}
	{if $app.article.user_id == $session.user.user_id}
		[<a href="?action_user_blog_article_edit=true&blog_article_id={$app.article.blog_article_id}">編集</a> |
		<a href="?action_user_blog_article_delete_confirm=true&blog_article_id={$app.article.blog_article_id}">削除</a>]
	{/if}
	<br />
	{if $app.pre_blog_article_id}<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_article_view=true&blog_article_id={$app.pre_blog_article_id}">前の{$ft.blog_article.name}</a>{/if}{if $app.post_blog_article_id}{if $app.pre_blog_article_id}/{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_article_view=true&blog_article_id={$app.post_blog_article_id}">後の{$ft.blog_article.name}</a>{/if}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<br />
	{include file="user/pager.tpl"}
	<br />
</div>
<!--日記終了-->

<!--タイトル-->
{html_style type="title" title="ｺﾒﾝﾄ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コメント開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item key=k}
	{if $k%2==0}
		{style align="left" bgcolor="#FFFFFF" fontcolor=$text fontsize="small"}
			{$item.blog_comment_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
			投稿者:<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
			{$item.blog_comment_body|nl2br}<br />
			{if $item.image_id}
				<img src="?action_user_file_get_thumbnail=true&image_id={$item.image_id}&SESSID={$SESSID}" alt="画像"><br />
				[<a href="?action_user_file_image_view=true&image_id={$item.image_id}&blog_article_id={$form.blog_article_id}">画像を拡大</a>]<br />
			{/if}
			{if $item.user_id == $session.user.user_id}
				[<a href="?action_user_blog_comment_edit=true&blog_comment_id={$item.blog_comment_id}">編集</a> |
				<a href="?action_user_blog_comment_delete_confirm=true&blog_comment_id={$item.blog_comment_id}">削除</a>]
			{/if}
		{/style}
	{else}
		{style align="left" bgcolor="#FFDD99" fontcolor=$text fontsize="small"}
			{$item.blog_comment_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
			投稿者:<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
			{$item.blog_comment_body|nl2br}<br />
			{if $item.image_id}
				<img src="?action_user_file_get_thumbnail=true&image_id={$item.image_id}&SESSID={$SESSID}" alt="画像"><br />
				[<a href="?action_user_file_image_view=true&image_id={$item.image_id}&blog_article_id={$form.blog_article_id}">画像を拡大</a>]<br />
			{/if}
			{if $item.user_id == $session.user.user_id}
				[<a href="?action_user_blog_comment_edit=true&blog_comment_id={$item.blog_comment_id}">編集</a> |
				<a href="?action_user_blog_comment_delete_confirm=true&blog_comment_id={$item.blog_comment_id}">削除</a>]
			{/if}
		{/style}
	{/if}
	{/foreach}
</div>
<!--コメント開始-->
	{include file="user/pager.tpl"}
	<div align="right" style="text-align:right;font-size:small;">
		　→<a href="?action_user_blog_article_view=true&blog_article_id={$form.blog_article_id}">{$ft.blog_comment.name}一覧</a>[x:0082]
	</div>
<br />

<!--タイトル-->
{html_style type="title" title="`$ft.blog_comment.name`を書く" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コメントを書く開始-->
<div align="left" style="text-align:left;font-size:small;">
	{form ethna_action='user_blog_comment_add_confirm' action="$script"}
		<input type="hidden" name='user_id' value="{$app.user.user_id}">
		{form_input name='blog_article_id'}
		{form_input name='blog_comment_body'}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡
		<br />
		<div style="text-align:center;font-size:small;">
			{form_input name='confirm'}
		</div>
		{uniqid}
	{/form}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_view=true&user_id={$app.article.user_id}">{$ft.blog_article.name}ﾄｯﾌﾟへ戻る</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_article_list=true&user_id={$app.article.user_id}">{$ft.blog_comment.name}一覧へ戻る</a>
</div>
<!--コメントを書く終了-->

<!--フッター-->
{include file="user/footer.tpl"}
