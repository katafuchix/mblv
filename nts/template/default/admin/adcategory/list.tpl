{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>���𥫥ƥ������</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_adcategory_add=true">{$ft.ad_category.name}������Ͽ</a><br />
			{form action="$script" ethna_action="admin_adcategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.ad_category_priority.name}</th>
					<th nowrap>{$ft.ad_category_name.name}</th>
					<th nowrap>{$ft.ad.name}����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.ad_category_list item=i}
				<tr>
					<td><input name="ad_category_priority_id[{$i.ad_category_id}]" value="{$i.ad_category_priority_id}" size="4"></td>
					<td>{$i.ad_category_name}</td>
					<td nowrap><a href="?action_admin_ad_list=true&ad_category_id={$i.ad_category_id}">�������</td>
					<td><a href="?action_admin_adcategory_edit=true&ad_category_id={$i.ad_category_id}">�Խ�</a></td>
					<td><a href="?action_admin_adcategory_delete_do=true&ad_category_id={$i.ad_category_id}" onClick="return confirm('�����ˤ���{$ft.ad_category.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/foreach}
			</table>
			��{$ft.ad_category.name}ͥ���٤���0�פξ�硢�桼�����̤ˤ�ɽ������ޤ���<br />
			{form_submit value="`$ft.ad_category.name`ͥ���ٹ���"}
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
		<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
