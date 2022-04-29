<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title=$app.community.community_title bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.community.image_id}
		<!--コミュニティ画像-->
		<a href="?action_user_file_image_view=true&image_id={$app.community.image_id}&community_id={$form.community_id}">
		<img src="f.php?type=image&id={$app.community.image_id}&attr=t&SESSID={$SESSID}" style="float:left;" alt="画像">
		</a>
	{/if}
	<!--コミュニティ説明上部開始-->
	<span>
	{$app.community.community_description|nl2br}
	</span>
	<!--コミュニティ説明上部終了-->
	{html_style type="line" color="gray"}
	
	{if !$app.user_status.is_member}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_join_do=true&community_id={$app.community.community_id}">この{$ft.community.name}に参加する</a>
	{/if}
	<!--新着トピック読み込み権限ユーザのみ閲覧開始-->
	{if $app.user_status.can_read_article}
		<div align="center" style="text-align:center;font-size:small;">
		[
		<a href="?action_user_community_article_list=true&community_id={$app.community.community_id}">ﾄﾋﾟｯｸ一覧</a>
		&nbsp;/&nbsp;
		<a href="?action_user_community_member=true&community_id={$app.community.community_id}">ﾒﾝﾊﾞｰ一覧</a>
		]
		</div>
		<!--タイトル-->
		{html_style type="title" title="新着の`$ft.community_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
		
		<!--新着トピック開始-->
		<div align="left" style="text-align:left;font-size:small;">
			{foreach from=$app.article_list item=item key=k}
				{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
				{/if}
				<span>
					<span style="color:{$timecolor}">{$item.community_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span>
					{if $item.user_id == $session.user.user_id}
					[<a href="?action_user_community_article_edit=true&community_article_id={$item.community_article_id}">編集</a>]
					{/if}
					<br />
					<a href="?action_user_community_article_view=true&community_article_id={$item.community_article_id}">{$item.community_article_title}({$item.community_article_comment_num})</a><br />
				</span>
				{html_style type="line" color="gray"}
			{/foreach}
		</div>
		{if $app.user_status.can_add_topic}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_article_add=true&community_id={$app.community.community_id}">{$ft.community_article.name}の新規作成</a><br />
		{/if}
	{/if}{* if $app.user_status.can_read_article *}
	<!--新着トピック読み込み権限ユーザのみ閲覧終了-->
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	
	<!--コミュニティ説明下部開始-->
	<div align="left" style="text-align:left;font-size:small;">
		<span style="color:{$form_name_color};">
		ｶﾃｺﾞﾘ:
		</span>
		{$app.category}
		{html_style type="line" color="gray"}
		<span style="color:{$form_name_color};">
		参加条件:
		</span>
		{$config.community_join_condition[$app.community.community_join_condition].name}
		{html_style type="line" color="gray"}
		<span style="color:{$form_name_color};">
		ﾄﾋﾟｯｸ権限:
		</span>
		{$config.community_topic_permission[$app.community.community_topic_permission].name}
		{html_style type="line" color="gray"}
		<span style="color:{$form_name_color};">
		開設日時:
		</span>
		{$app.community.community_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
		{html_style type="line" color="gray"}
		<span style="color:{$form_name_color};">
		管理人:
		</span>
		<a href="?action_user_profile_view=true&user_id={$app.admin.user_id}">{$app.admin.user_nickname}</a>さん<br />
		{html_style type="line" color="gray"}
	</div>
	<!--コミュニティ説明下部終了-->
	
	<!--コミュニティ管理者コンテンツ開始-->
	{if $app.user_status.is_admin}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_edit=true&community_id={$app.community.community_id}">{$ft.community.name}を編集</a><br />
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_admin_member=true&community_id={$app.community.community_id}">ﾒﾝﾊﾞｰの管理</a>
	{/if}
	<!--コミュニティ管理者コンテンツ終了-->
	{if $app.user_status.is_member}
		<br /><span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_resign_confirm=true&community_id={$app.community.community_id}">この{$ft.community.name}を退会する</a>
	{/if}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
