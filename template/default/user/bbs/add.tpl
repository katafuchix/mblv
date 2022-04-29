<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.bbs_name.name`を書く" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_bbs_add_confirm"}
		{form_input name="to_user_id" value="`$app.to_user.user_id`"}
		<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>さんの{$ft.bbs.name}に書き込む{$ft.bbs_name.name}を入力してください｡<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="bbs_body"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="bbs_body" rows=5}
		</div>
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
