<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.friend_introduction.name`削除完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.friend.introduction.name}削除が完了しました。<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_profile_view=true&user_id={$form.to_user_id}">{$ft.profile.name}へ戻る</a>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
