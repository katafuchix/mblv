{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.banner.name}����</h2>
			<div class="entry_box">
			{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_banner_add=true">{$ft.banner.name}�ɲ�</a><br />
			<br />
			<table class="sheet" id="list">
				<tr>
					<th>{$ft.banner_client.name}</th>
					<th>{$ft.banner_type.name}</th>
					<th>{$ft.banner.name}����</th>
					<th>�����URL</th>
					<th>����</th>
					<th>�Խ�</th>
					<th>���</th>
				</tr>
			{foreach from=$app.banner_list item=i}
				<tr>
					<td nowrap>{$i.banner_client}</td>
					<td nowrap>{$i.banner_type}</td>
					<td nowrap>{literal}{banner id={/literal}{$i.banner_id}{literal}}{/literal}</td>
					<td nowrap><input type="text" value="{$config.user_url}banner.php?banner_id={$i.banner_id}" size="55"></td>
					<td nowrap><a href="?action_admin_stats_list=true&type=banner&id={$i.banner_id}&term=month">����</a></td>
					<td nowrap><a href="?action_admin_banner_edit=true&banner_id={$i.banner_id}">�Խ�</a></td>
					<td nowrap><a href="?action_admin_banner_delete_do=true&banner_id={$i.banner_id}" onClick="return confirm('�����ˤ���{$ft.banner.name}�������Ƥ��ޤäƤ�����Ǥ�����');">���</a></td>
				</tr>
			{/foreach}
			</table>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
