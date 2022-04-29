{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>入会経路管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_media_add=true">入会経路登録</a><br />
			※入会経路として他メディアに伝えるURL<br />
			{$config.base_url}index.php?code=「識別コード」<br />
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>識別コード</th>
					<th nowrap>入会経路名</th>
					<th>入会通知用メールアドレス</th>
					<th nowrap>パラメータ名</th>
					<th>入会時成果返却先</th>
					<th nowrap>統計</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.media_code}</td>
					<td>{$i.media_name}</td>
					<td>{$config.mail_account.media.account}_{$i.media_code}@{$config.mail_domain}</td>
					<td>{$i.media_param1} {$i.media_param2} {$i.media_param3}</td>
					<td>{$i.media_res_url|wordwrap:40:"\n":true}</td>
					<td><a href="?action_admin_stats_list=true&type=media&id={$i.media_id}&term=month">統計</a></td>
					<td><a href="?action_admin_media_edit=true&media_id={$i.media_id}">編集</a></td>
					<td><a href="?action_admin_media_delete_do=true&media_id={$i.media_id}" onClick="return confirm('本当にこの入会経路情報を削除してもよろしいですか？');">削除</a></td>
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
