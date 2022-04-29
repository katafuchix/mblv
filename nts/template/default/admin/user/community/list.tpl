{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>ユーザID{$app.user.user_id} {$app.user.user_nickname}さんの参加コミュニティ一覧</h2>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				検索条件に合致する{$ft.community.name}は見つかりませんでした。
			{else}
				検索条件に合致する{$ft.community.name}が{$app.listview_total}件見つかりました。
			{/if}
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_user_community_edit_do"}
			{form_input name="user_id"}
			<table class="sheet">
				<tr>
					<th>ID</th>
					<th>
						作成日時<br />
						更新日時<br />
						削除日時
					</th>
					<th>メンバー数</th>
					<th>コミュニティタイトル</th>
					<th>コミュニティ説明</th>
					<th>コミュニティカテゴリ</th>
					<th>コミュニティメンバー状態</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">状態変更</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.community_id}</td>
					<td nowrap>
						[作成]{$item.community_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]{$item.community_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[削除]{if $item.community_status == 0 }{$item.community_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}{/if}
					</td>
					<td>{$item.community_member_num}</td>
					<td><a href="?action_admin_community_edit=true&community_id={$item.community_id}">{$item.community_title}</a></td>
					<td>{$item.community_description|nl2br}</td>
					<td>{$item.community_category_name}</td>
					<td>{$config.community_member_status[$item.community_member_status].name}</td>
					<td class="checkedrow" nowrap>
						<input type="checkbox" name="check[]" value="{$item.community_id}">
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=8 align="right">上記コミュニティメンバー状態を{form_input name="community_member_status"}に更新{form_submit name="update"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
