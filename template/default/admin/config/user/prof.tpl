{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ��������ᥤ�󥳥�ƥ��-->
				<h2>�ץ�ե���������ѹ�</h2>
				<blockquote><a href="?action_admin_util=true&page=faq_profile_edit&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">�ץ�ե���������ѹ�FAQ</a></blockquote>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				<table class="sheet">
					<tr>
						<th>����̾</th>
						<th>�ե��������</th>
						<th>ɽ�����</th>
						<th>�Խ�</th>
						<th>���</th>
					</tr>
					{foreach from=$app.configUserProfList item=item}
						<tr>
							<td>{$item.config_user_prof_name}</td>
							<td>{$app.configUserProfTypeList[$item.config_user_prof_type]}</td>
							<td>
								{form ethna_action="admin_config_user_prof_move_do"}
									{form_input name="config_user_prof_id" value="`$item.config_user_prof_id`"}
									{form_input name="up"}
									{form_input name="down"}
								{/form}
							</td>
							<td>
								<a href="?action_admin_config_user_prof_edit=true&config_user_prof_id={$item.config_user_prof_id}">�Խ�</a>
							</td>
							<td><a href="?action_admin_config_user_prof_delete_do=true&config_user_prof_id={$item.config_user_prof_id}" onClick="return confirm('�����ˤ��ι��ܤ������Ƥ��ޤäƤ�����Ǥ�����');">���</a></td>
						</tr>
					{foreachelse}
						<tr>
							<td colspan="4">�ץ�ե�������ܤ���Ͽ����Ƥ��ޤ���</td>
						</tr>
					{/foreach}
				</table>
				
				<h2>���ܤ��ɲ�</h2>
				{form ethna_action="admin_config_user_prof_add_do"}
					<table class="sheet">
						<tr>
							<th>{form_name name="config_user_prof_name"}<span class="required"></th>
							<td>{form_input name="config_user_prof_name"}</td>
							<th>{form_name name="config_user_prof_type"}</th>
							<td>
								<select name="config_user_prof_type">
									{html_options options=$app.configUserProfTypeList}
								</select>
								���ɲø�Υե�������̤��ѹ��ϤǤ��ޤ���
							</td>
							<td>{form_input name="add"}</td>
						</tr>
					</table>
					{uniqid}
				{/form}
				
					<!-- �����ޤǥᥤ�󥳥�ƥ��-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
