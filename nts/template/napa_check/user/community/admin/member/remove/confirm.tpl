<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾒﾝﾊﾞｰの除外" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action='user_community_admin_member_remove_do'}
		<input type="hidden" name="community_id" value="{$form.community_id}">
		<input type="hidden" name="community_member_id" value="{$form.community_member_id}">
		<div align="left" style="text-align:left;font-size:small;">
			{$app.user.user_nickname}さんをﾒﾝﾊﾞｰから外しますか？<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="remove"}<br />{form_input name="back"}</div>
	{/form}
	<a href="?action_user_community_view=true&community_id={$form.community_id}">{$ft.community.name}へ戻る</a>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
