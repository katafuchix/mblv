<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`購入完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.avatar.name}の購入が完了しました。<br />
		=><a href="?action_user_avatar_home=true">{$ft.avatar.name}ｸﾛｰｾﾞｯﾄへ</a><br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar=true">{$ft.avatar.name}TOPへ</a><br /></div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
