{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>ファイル削除確認</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<p>以下のファイルを削除します。よろしいですか？</p>
			{form ethna_action='admin_file_remove_do'}
				{$app_ne.hidden_vars}
				{form_input name='remove' value="　は　い　"}
				{form_input name='back' value="　いいえ　"}
			{/form}
			<table class="sheet">
				<tr>
					<th>ファイルID</th>
					<th>サムネイル</th>
					<th>所有ユーザID</th>
					<th>MIMEタイプ</th>
					<th>ファイルサイズ（バイト）</th>
					<th>アップロード日時</th>
					<th>状態</th>
				</tr>
				{foreach from=$app.fileList[1] item=item name=file}
					{if $item != false}
						<tr>
							<td>{$item.image_id}</td>
							<td><a href="f.php?type=image&id={$item.image_id}"><img src="?action_user_file_get_thumbnail=true&image_id={$item.image_id}"></a></td>
							<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_id}</a></td>
							<td>{$item.file_mime_type}</td>
							<td>{$item.file_size}</td>
							<td>{$item.file_upload_time}</td>
							<td>{$app.fileStatusList[$item.file_status]}</td>
						</tr>
					{/if}
				{/foreach}
			</table>
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
