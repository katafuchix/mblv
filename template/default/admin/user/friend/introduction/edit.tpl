{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.friend_introduction.name}�Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_user_friend_introduction_edit_do"}
			{form_input name="friend_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>�����桼��</th>
					<td>
						ID:{$app.from_user_id}<br />
						{$ft.user_nickname.name}:<a href="?action_admin_user_edit=true&user_id={$app.from_user_id}">{$app.from_user_nickname}����</a>
					</td>
				</tr>
				<tr>
					<th>�����桼��</th>
					<td>
						ID:{$app.to_user_id}<br />
						{$ft.user_nickname.name}:<a href="?action_admin_user_edit=true&user_id={$app.to_user_id}">{$app.to_user_nickname}����</a>
					</td>
				</tr>
				<tr>
					<th>{form_name name="friend_introduction"}</th>
					<td>{form_input name="friend_introduction" rows="20" cols="80"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="��`$ft.friend_introduction.name`�Խ���"}</td>
				</tr>
			</table>
			{/form}
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}