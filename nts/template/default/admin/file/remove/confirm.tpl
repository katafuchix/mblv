{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�ե���������ǧ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<p>�ʲ��Υե�����������ޤ���������Ǥ�����</p>
			{form ethna_action='admin_file_remove_do'}
				{$app_ne.hidden_vars}
				{form_input name='remove' value="���ϡ�����"}
				{form_input name='back' value="����������"}
			{/form}
			<table class="sheet">
				<tr>
					<th>�ե�����ID</th>
					<th>����ͥ���</th>
					<th>��ͭ�桼��ID</th>
					<th>MIME������</th>
					<th>�ե����륵�����ʥХ��ȡ�</th>
					<th>���åץ�������</th>
					<th>����</th>
				</tr>
				{foreach from=$app.fileList[1] item=item name=file}
					{if $item != false}
						<tr>
							<td>{$item.image_id}</td>
							<td><a href="f.php?type=image&id={$item.image_id}"><img src="?action_user_file_get_thumbnail=true&image_id={$item.image_id}"></a></td>
							<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_id}</a></td>
							<td>{$item.file_mime_type}</td>
							<td>{$item.file_size}</td>
							<td>{$item.file_upload_time}</td>
							<td>{$app.fileStatusList[$item.file_status]}</td>
						</tr>
					{/if}
				{/foreach}
			</table>
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
