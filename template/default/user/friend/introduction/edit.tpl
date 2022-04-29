<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.friend_introduction.name`の編集" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action="user_friend_introduction_edit_confirm" action="$script"}
		{uniqid}
		{form_input name="to_user_id"}
		<span style="color:{$form_name_color}">
		{$ft.friend_introduction.name}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="friend_introduction" rows="5"}
		</div>
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
