{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.admin_account.name}追加</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_account_add_do"}
			<table class="sheet">
				<tr>
					<th>{form_name name="admin_name"}</th>
					<td>{form_input name="admin_name"}</td>
				</tr>
				<tr>
					<th>{form_name name="login_id"}</th>
					<td>{form_input name="login_id" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="login_password"}</th>
					<td>{form_input name="login_password" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="admin_status"}</th>
					<td>{form_input name="admin_status"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="追加"}</td>
				</tr>
			</table>
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
