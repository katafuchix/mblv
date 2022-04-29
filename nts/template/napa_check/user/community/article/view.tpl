<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title=$app.article.community_article_title bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:#009900">{$app.article.community_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span>
	{if $app.article.user_id == $session.user.user_id}
		[<a href="?action_user_community_article_edit=true&community_article_id={$app.article.community_article_id}">編集</a>]
	{/if}
	<br />
	{if $config.option.avatar}
		<img src="f.php?type=avatar&user_id={$app.user.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
	{else}
		{if $app.user.image_id}
		<img src="f.php?type=image&id={$app.user.image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
		{/if}
	{/if}
	<a href="?action_user_profile_view=true&user_id={$app.user.user_id}">{$app.user.user_nickname}</a>さん<br />
	{$app.article.community_article_body|nl2br}<br />
	{if $app.article.image_id}
		<div align="center" style="text-align:center;font-size:small;">
		<a href="?action_user_file_image_view=true&image_id={$app.article.image_id}&community_article_id={$form.community_article_id}">
		<img src="f.php?type=image&id={$app.article.image_id}&attr=t&SESSID={$SESSID}" alt="画像">
		</a>
		</div>
	{/if}
	<br />
</div>
<!--コンテンツ終了-->

<!--タイトル-->
{html_style type="title" title="`$ft.community_comment.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item}
		{if $config.option.avatar}
			<img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
		{else}
			{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;">
			{/if}
		{/if}
		<span style="color:#009900">{$item.community_comment_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
		{if $item.user_id == $session.user.user_id}
			[<a href="?action_user_community_comment_edit=true&community_comment_id={$item.community_comment_id}">編集</a>]
		{/if}
		<br />
		<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
		{$item.community_comment_body|nl2br}<br />
		{if $item.image_id}
			<div align="center" style="text-align:center;font-size:small;">
			<a href="?action_user_file_image_view=true&image_id={$item.image_id}&community_article_id={$form.community_article_id}">
			<img src="f.php?type=image&id={$item.image_id}&attr=t&SESSID={$SESSID}" alt="画像">
			</a>
			</div>
		{/if}
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--コンテンツ終了-->
{if $app.user_status.can_add_topic}
<!--タイトル-->
{html_style type="title" title="`$ft.community_comment.name`を書く" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action='user_community_comment_add_confirm' action="$script"}
		{uniqid}
		{form_input name='community_article_id'}
		<div style="text-align:center;font-size:small;">
		{form_input name='community_comment_body' rows=5}
		</div>
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡
		<br />
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name='confirm'}
		</div>
	{/form}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$app.community.community_id}">{$ft.community.name}へ戻る</a>
</div>
{/if}
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
