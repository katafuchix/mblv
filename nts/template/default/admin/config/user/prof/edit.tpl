{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ��������ᥤ�󥳥�ƥ��-->
				<h2>�ץ�ե�������ܤ��Խ�</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form ethna_action="admin_config_user_prof_edit_do"}
					{form_input name="config_user_prof_id"}
					<table>
						<tr>
							<th>{form_name name="config_user_prof_name"}</th>
							<td>{form_input name="config_user_prof_name"}</td>
						</tr>
						<tr>
							<td>
								�������Ƥǹ������Ƥ�����Ǥ�����<br />
								{form_input name="submit" value="���ϡ�����"}
								{form_input name="back" value="����������"}
							</td>
						</tr>
					</table>
				{/form}
				{if $form.config_user_prof_type >= 3}
					<h2>�������Խ�</h2>
					<table>
						<tr>
							<th>����̾</th>
							<th>ɽ�����</th>
							<th>���</th>
						</tr>
					{foreach from=$app.configUserProfOptionList item=item}
						<tr>
							<td>{$item.config_user_prof_option_name}</td>
							<td>
								{form ethna_action="admin_config_user_prof_option_move_do"}
									{form_input name="config_user_prof_id" value="`$item.config_user_prof_id`"}
									{form_input name="config_user_prof_option_id" value="`$item.config_user_prof_option_id`"}
									{form_input name="up"}
									{form_input name="down"}
								{/form}
							</td>
							<td><a href="?action_admin_config_user_prof_option_delete_do=true&config_user_prof_option_id={$item.config_user_prof_option_id}" onClick="return confirm('�����ˤ��ι��ܤ������Ƥ��ޤäƤ�����Ǥ�����');">���</a></td>
						</tr>
					{foreachelse}
						<tr>
							<td colspan="2">��������Ͽ����Ƥ��ޤ���</td>
						</tr>
					{/foreach}
						</table>
						<h3>�������ɲ�</h3>
						{form ethna_action="admin_config_user_prof_option_add_do"}
							{form_input name="config_user_prof_id"}
							<table>
								<tr>
									<th>{form_name name="config_user_prof_option_name"}</th>
									<td>{form_input name="config_user_prof_option_name"}</td>
									<td>{form_input name="add"}</td>
								</tr>
							</table>
						{/form}
					{/if}
					
				<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
				<!-- �����ޤǥᥤ�󥳥�ƥ��-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
