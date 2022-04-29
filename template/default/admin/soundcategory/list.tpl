{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.sound_category.name}管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_soundcategory_add=true">{$ft.sound_category.name}登録</a><br />
			</div>
			{form action="$script" ethna_action="admin_soundcategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.sound_category_priority.name}</th>
					<th nowrap>{$ft.sound_category.name}名</th>
					<th nowrap>{$ft.sound.name}ファイル1</th>
					<th nowrap>{$ft.sound.name}一覧</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.sound_category_list item=i}
				<tr>
					<td><input name="sound_category_priority_id[{$i.sound_category_id}]" value="{$i.sound_category_priority_id}" size="4"></td>
					<td>{$i.sound_category_name}</td>
					<td>{if $i.sound_category_file1}<img src="f.php?file=sound/{$i.sound_category_file1}">{/if}</td>
					<td nowrap><a href="?action_admin_sound_list=true&sound_category_id={$i.sound_category_id}">{$ft.sound.name}一覧</td>
					<td><a href="?action_admin_soundcategory_edit=true&sound_category_id={$i.sound_category_id}">編集</a></td>
					<td><a href="?action_admin_soundcategory_delete_do=true&sound_category_id={$i.sound_category_id}" onClick="return confirm('本当にこの{$ft.sound_category.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>
			<div class="entry_box">
				※{$ft.sound_category.name}優先度が「0」の場合、ユーザ画面には表示されません。<br />
				{form_submit value="`$ft.sound_category.name`優先度更新"}
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
