{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.video_category.name}管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_videocategory_add=true">{$ft.video_category.name}登録</a><br />
			</div>
			{form action="$script" ethna_action="admin_videocategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.video_category_priority.name}</th>
					<th nowrap>{$ft.video_category.name}名</th>
					<th nowrap>{$ft.video.name}ファイル1</th>
					<th nowrap>{$ft.video.name}一覧</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.video_category_list item=i}
				<tr>
					<td><input name="video_category_priority_id[{$i.video_category_id}]" value="{$i.video_category_priority_id}" size="4"></td>
					<td>{$i.video_category_name}</td>
					<td>{if $i.video_category_file1}<img src="f.php?file=video/{$i.video_category_file1}">{/if}</td>
					<td nowrap><a href="?action_admin_video_list=true&video_category_id={$i.video_category_id}">{$ft.video.name}一覧</td>
					<td><a href="?action_admin_videocategory_edit=true&video_category_id={$i.video_category_id}">編集</a></td>
					<td><a href="?action_admin_videocategory_delete_do=true&video_category_id={$i.video_category_id}" onClick="return confirm('本当にこの{$ft.video_category.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>
			<div class="entry_box">
				※{$ft.video_category.name}優先度が「0」の場合、ユーザ画面には表示されません。<br />
				{form_submit value="`$ft.video_category.name`優先度更新"}
				{/form}
			</div>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
