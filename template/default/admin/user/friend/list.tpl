{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>ユーザID{$app.user.user_id} {$app.user.user_nickname}さんの友達</h2>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					検索条件に合致するユーザは見つかりませんでした。
				{else}
					検索条件に合致するユーザが{$app.listview_total}人見つかりました。<br />
				{/if}
			</div>
			{include file="admin/pager.tpl"}
			{form action="$script" ethna_action="admin_user_friend_edit_do"}
			{form_input name="user_id"}
			<table class="sheet" id="list">
				<tr>
					<th>ユーザID</th>
					<th>ステータス</th>
					<th>
						登録日時<br />
						更新日時<br />
						退会日時
					</th>
					<th>メールアドレス</th>
					<th>ニックネーム</th>
					<th>エラーメール数</th>
					<th>友達状態</th>
					<th>状態変更</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td>{$item.user_id}</td>
					<td>{$config.user_status[$item.user_status].name}</td>
					<td>
						[登録]:{$item.user_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]:{$item.user_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[退会]:{$item.user_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.user_mailaddress}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}さん</a></td>
					<td>{$item.user_magazine_error_num}</td>
					<td>{$config.friend_status[$item.friend_status].name}</td>
					<td class="checkedrow"><input name="check[]" type="checkbox" value="{$item.user_id}"></td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan="8" align="right">チェックを付けたユーザとの友達状態を{form_input name="friend_status"}に編集{form_input name="update"}</td>
				</tr>
			</table>
			{/form}
			{include file="admin/pager.tpl"}
			
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
