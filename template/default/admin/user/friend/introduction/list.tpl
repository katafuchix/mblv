{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.friend_introduction.name}検索</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.friend_introduction.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.friend_introduction.name}が{$app.listview_total}個見つかりました。
				{/if}
			</div>
			{form ethna_action="admin_user_friend_introduction_list"}
			<table class="sheet">
				<tr>
					<th>{form_name name="from_user_id"}</th>
					<td {if $app.from_user_id_active}class="active"{/if}>{form_input name="from_user_id"}</td>
					<th>{form_name name="to_user_id"}</th>
					<td {if $app.to_user_id_active}class="active"{/if}>{form_input name="to_user_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="from_user_nickname"}</th>
					<td {if $app.from_user_nickname_active}class="active"{/if}>{form_input name="from_user_nickname"}</td>
					<th>{form_name name="to_user_nickname"}</th>
					<td {if $app.to_user_nickname_active}class="active"{/if}>{form_input name="to_user_nickname"}</td>
				</tr>
				<tr>
					<th>{form_name name="friend_introduction"}</th>
					<td {if $app.friend_introduction_active}class="active"{/if}>{form_input name="friend_introduction"}</td>
					<th>{form_name name="friend_checked"}</th>
					<td {if $app.friend_checked_active}class="active"{/if}>{form_input name="friend_checked" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="friend_status"}</th>
					<td {if $app.friend_status_active}class="active"{/if}>{form_input name="friend_status" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="　検　索　"}</td>
				</tr>
			</table>
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet">
				<tr>
					<th>ID</th>
					<th>ステータス</th>
					<th>監視</th>
					<th>送信ユーザ</th>
					<th>受信ユーザ</th>
					<th>{$ft.friend_introduction.name}</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">非表示</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=7 align="right">下記{$ft.friend.name}の{$ft.friend_checked.name}ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.friend_id}<input type="hidden" name="id[]" value="{$item.friend_id}"></td>
					<td {if $item.friend_status==0}class="disable"{/if}>{$config.friend_status[$item.friend_status].name}</td>
					<td class="{if $item.friend_checked==0}non{/if}checked">{$config.data_checked[$item.friend_checked].name}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.from_user_id}">{$item.from_user_nickname}さん</a></td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.to_user_id}">{$item.to_user_nickname}さん</a></td>
					<td><a href="?action_admin_user_friend_introduction_edit=true&friend_id={$item.friend_id}">{$item.friend_introduction|nl2br}</a></td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.friend_id}">
						<input type="checkbox" name="check[]" value="{$item.friend_id}" {if $item.friend_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=7 align="right">
						下記{$ft.friend.name}の{$ft.friend_checked.name}ステータスを更新する{form_submit name="update" value="　実　行　"}
					</td>
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
