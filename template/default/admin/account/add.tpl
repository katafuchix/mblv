{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.admin_account.name}登録</h2>
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
					<th>{form_name name="login_id"}<br /><span class="required"></span></th>
					<td>
						<span class="red">※半角英数字10文字以下で正しく入力してください</span><br />
						{form_input name="login_id" size="10"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="login_password"}<br /><br /><span class="required"></span></th>
					<td>
						<span class="red">※半角英数字10文字以下で正しく入力してください</span><br />
						{form_input name="login_password" size="10"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="admin_status"}<br /><span class="required"></span></th>
					<td>{form_input name="admin_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="admin_action_category_id"}</th>
					<td>{form_input name="admin_action_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="admin_shop_id"}</th>
					<td>{form_input name="admin_shop_id"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　`$ft.admin_account.name`登録　"}</td>
				</tr>
			</table>
			{/form}
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
