{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�����ϩ����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_media_add=true">�����ϩ��Ͽ</a><br />
			�������ϩ�Ȥ���¾��ǥ�����������URL<br />
			{$config.base_url}index.php?code=�ּ��̥����ɡ�<br />
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>���̥�����</th>
					<th nowrap>�����ϩ̾</th>
					<th>���������ѥ᡼�륢�ɥ쥹</th>
					<th nowrap>�ѥ�᡼��̾</th>
					<th>����������ֵ���</th>
					<th nowrap>����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.media_code}</td>
					<td>{$i.media_name}</td>
					<td>{$config.mail_account.media.account}_{$i.media_code}@{$config.mail_domain}</td>
					<td>{$i.media_param1} {$i.media_param2} {$i.media_param3}</td>
					<td>{$i.media_res_url|wordwrap:40:"\n":true}</td>
					<td><a href="?action_admin_stats_list=true&type=media&id={$i.media_id}&term=month">����</a></td>
					<td><a href="?action_admin_media_edit=true&media_id={$i.media_id}">�Խ�</a></td>
					<td><a href="?action_admin_media_delete_do=true&media_id={$i.media_id}" onClick="return confirm('�����ˤ��������ϩ����������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/foreach}
			</table>
			{include file="admin/pager.tpl"}
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
		<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
