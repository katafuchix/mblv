{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.mailtemplate.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_mailtemplate_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.mailtemplate.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_mailtemplate_add=true">{$ft.mailtemplate.name}��Ͽ</a><br />
			</div>
			{include file="admin/pager.tpl"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.mailtemplate.name}̾</th>
					<th nowrap>{$ft.mailtemplate.name}�����ȥ�</th>
					<th nowrap>�Խ�</th>
					<!--th nowrap>���</th-->
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$config.mail_template[$i.mail_template_code].name}</td>
					<td>{$i.mail_template_title}</td>
					<td><a href="?action_admin_mailtemplate_edit=true&mail_template_id={$i.mail_template_id}">�Խ�</a></td>
					<!--td>{if $i.mail_template_system_status}<a href="?action_admin_mailtemplate_delete_do=true&mail_template_id={$i.mail_template_id}" onClick="return confirm('�����ˤ���{$ft.mailtemplate.name}�������Ƥ������Ǥ�����');">���</a>{/if}</td-->
				</tr>
				{/foreach}
			</table>
			{include file="admin/pager.tpl"}
		<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
