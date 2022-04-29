{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>管理ログイン</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form ethna_action="admin_login_do" action="$script"}
				{$app_ne.hidden_vars}
				<table class="sheet" id="w200">
					<tr>
						<th>{form_name name="login_id"}</th>
						<td>{form_input name="login_id"}</td>
					</tr>
					<tr>
						<th>{form_name name="login_password"}</th>
						<td>{form_input name="login_password"}</td>
					</tr>
					<tr>
						<th></th>
						<td>{form_submit value="ログイン"}</td>
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
