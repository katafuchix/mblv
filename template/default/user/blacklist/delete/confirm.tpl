<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.blacklist.name`解除の確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$form_name_color};">
	相手のお名前:
	</span>
	<br />
	&nbsp;{$app.deny_user.user_nickname}さん<br /><br />
	{form action="$script" ethna_action="user_blacklist_delete_do"}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		<div align="left" style="text-align:left;font-size:small;">{$ft.blacklist.name}登録を解除します｡<br />よろしいですか?<br /><br /></div>
		<div style="text-align:center;font-size:small;">
{form_input name="delete"}
<br />
{form_input name="back"}</div>
		{form_input name="black_list_deny_user_id" type="hidden" value=$app.deny_user.user_id}
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
