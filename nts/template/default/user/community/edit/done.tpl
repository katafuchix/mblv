<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community.name`編集完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.community.name}の編集が完了しました。<br />
		{ad type="community_add_done"}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$form.community_id}">{$ft.community.name}へ戻る</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
