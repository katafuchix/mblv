{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.mailtemplate.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_mailtemplate_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.mailtemplate.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_mailtemplate_add=true">{$ft.mailtemplate.name}登録</a><br />
			</div>
			{include file="admin/pager.tpl"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.mailtemplate.name}名</th>
					<th nowrap>{$ft.mailtemplate.name}タイトル</th>
					<th nowrap>編集</th>
					<!--th nowrap>削除</th-->
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$config.mail_template[$i.mail_template_code].name}</td>
					<td>{$i.mail_template_title}</td>
					<td><a href="?action_admin_mailtemplate_edit=true&mail_template_id={$i.mail_template_id}">編集</a></td>
					<!--td>{if $i.mail_template_system_status}<a href="?action_admin_mailtemplate_delete_do=true&mail_template_id={$i.mail_template_id}" onClick="return confirm('本当にこの{$ft.mailtemplate.name}を削除してもよろしいですか？');">削除</a>{/if}</td-->
				</tr>
				{/foreach}
			</table>
			{include file="admin/pager.tpl"}
		<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
