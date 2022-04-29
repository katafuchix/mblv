{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.friend_introduction.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_user_friend_introduction_edit_do"}
			{form_input name="friend_id"}
			<table class="sheet">
				<tr>
					<th>送信ユーザID</th>
					<td><a href="?action_admin_user_edit=true&user_id={$app.from_user_id}">{$app.from_user_id}</a></td>
					<th>送信ユーザニックネーム</th>
					<td><a href="?action_admin_user_edit=true&user_id={$app.from_user_id}">{$app.from_user_nickname}</a></td>
				</tr>
				<tr>
					<th>受信ユーザID</th>
					<td><a href="?action_admin_user_edit=true&user_id={$app.to_user_id}">{$app.to_user_id}</a></td>
					<th>受信ユーザニックネーム</th>
					<td><a href="?action_admin_user_edit=true&user_id={$app.to_user_id}">{$app.to_user_nickname}</a></td>
				</tr>
				<tr>
					<th>{form_name name="friend_introduction"}</th>
					<td colspan="3">{form_input name="friend_introduction"}</td>
				</tr>
				<tr>
					<th></th>
					<td colspan="3">{form_submit value="編集"}</td>
				</tr>
			</table>
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
