<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title=$app.article.blog_article_title bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--日記開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<!--span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_profile_view=true&user_id={$app.article.user_id}">{$app.user.user_nickname}さんのﾌﾟﾛﾌｨｰﾙ</a><br /-->
	<span style="color:#009900">{$app.article.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span>
	{if $app.article.user_id == $session.user.user_id}
		[<a href="?action_user_blog_article_edit=true&blog_article_id={$app.article.blog_article_id}">編集</a>]
	{/if}
	<br />
	{$app.article.blog_article_body|nl2br}<br />
	{if $app.article.image_id}
		<div align="center" style="text-align:center;font-size:small;">
		<a href="?action_user_file_image_view=true&image_id={$app.article.image_id}&blog_article_id={$form.blog_article_id}"><img src="f.php?type=image&id={$app.article.image_id}&attr=t&SESSID={$SESSID}" alt="画像"></a><br />
		</div>
	{/if}
	{if !$app.article.twitter_status}
		<div align="center" style="text-align:center;font-size:small;">
			[
			{if $app.pre_blog_article_id}<a href="?action_user_blog_article_view=true&blog_article_id={$app.pre_blog_article_id}">{/if}前の{$ft.blog_article.name}{if $app.pre_blog_article_id}</a>{/if}
			/
			{if $app.post_blog_article_id}<a href="?action_user_blog_article_view=true&blog_article_id={$app.post_blog_article_id}">{/if}次の{$ft.blog_article.name}{if $app.post_blog_article_id}</a>{/if}
			]
		</div>
	{/if}
</div>
<!--日記終了-->

<!--タイトル-->
{html_style type="title" title="ｺﾒﾝﾄ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コメント開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item key=k}
		{if $config.option.avatar}
			<img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
		{else}
			{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;">
			{/if}
		{/if}
		<span style="color:{$timecolor};">{$item.blog_comment_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
		{if $item.user_id == $session.user.user_id}
			[<a href="?action_user_blog_comment_edit=true&blog_comment_id={$item.blog_comment_id}">編集</a>]
		{/if}
		<br />
		<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
		{if $app.article.user_id == $session.user.user_id && $item.user_id != $session.user.user_id && $item.blog_comment_notice==1}<span style="color:red">{/if}
		{$item.blog_comment_body|nl2br}
		{if $app.article.user_id == $session.user.user_id && $item.user_id != $session.user.user_id && $item.blog_comment_notice==1}</span>{/if}
		{if $item.image_id}
			<div align="center" style="text-align:center;font-size:small;">
			<a href="?action_user_file_image_view=true&image_id={$item.image_id}&blog_article_id={$form.blog_article_id}"><img src="f.php?type=image&id={$item.image_id}&attr=i&SESSID={$SESSID}" alt="画像"></a>
			</div>
		{/if}
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	{if $app.listview_total != 0}
	<!--div align="right" style="text-align:right;font-size:small;">
		　→<a href="?action_user_blog_comment_view=true&blog_article_id={$form.blog_article_id}">ｺﾒﾝﾄ一覧</a>[x:0082]
	</div-->
	{/if}
</div>
<!--コメント終了-->

<!--タイトル-->
{html_style type="title" title="ｺﾒﾝﾄを書く" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コメントを書く開始-->
<div align="left" style="text-align:left;font-size:small;">
	{form ethna_action="user_blog_comment_add_confirm" action="$script"}
		{uniqid}
		<input type="hidden" name="user_id" value="{$app.user.user_id}">
		{form_input name="blog_article_id"}
		<div style="text-align:center">
		{form_input name="blog_comment_body" rows="5"}
		</div>
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_submit value="確認画面へ"}</div>
	{/form}
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
{if $app.article.twitter_status}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_twitter=true">{$ft.twitter.name}へ</a><br />
{else}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_view=true&user_id={$app.article.user_id}">{$ft.blog_article.name}ﾄｯﾌﾟへ戻る</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_article_list=true&user_id={$app.article.user_id}">{$ft.blog_article.name}一覧へ戻る</a>
{/if}
</div>
<!--コメントを書く終了-->

<!--フッター-->
{include file="user/footer.tpl"}
