{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.segment.name}管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_segment_add=true">{$ft.segment.name}追加</a><br />
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>セグメント名</th>
					<th nowrap>対象ユーザ数</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.segment_name}</td>
					<td>{$i.segment_user_num}人</td>
					<td><a href="?action_admin_segment_edit=true&segment_id={$i.segment_id}">編集</a></td>
					<td><a href="?action_admin_segment_delete_do=true&segment_id={$i.segment_id}" onClick="return confirm('本当にこの{$ft.segment.name}情報を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>
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
