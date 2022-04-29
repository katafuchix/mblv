{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>メールテンプレート管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_mailtemplate_add=true">メールテンプレート登録</a><br />
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>メールテンプレート名</th>
					<th nowrap>メールテンプレートタイトル</th>
					<th nowrap>編集</th>
					<!--th nowrap>削除</th-->
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$config.mail_template[$i.mail_template_code].name}</td>
					<td>{$i.mail_template_title}</td>
					<td><a href="?action_admin_mailtemplate_edit=true&mail_template_id={$i.mail_template_id}">編集</a></td>
					<!--td>{if $i.mail_template_system_status}<a href="?action_admin_mailtemplate_delete_do=true&mail_template_id={$i.mail_template_id}" onClick="return confirm('本当にこのメールテンプレートを削除してもよろしいですか？');">削除</a>{/if}</td-->
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
