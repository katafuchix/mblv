{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.game.name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_gamecategory_add=true">{$ft.game_category.name}��Ͽ</a><br />
			</div>
			{form action="$script" ethna_action="admin_gamecategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.game_category_priority.name}</th>
					<th nowrap>{$ft.game_category_name.name}</th>
					<th nowrap>{$ft.game.name}����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td><input name="game_category_priority_id[{$i.game_category_id}]" value="{$i.game_category_priority_id}" size="4"></td>
					<td>{$i.game_category_name}</td>
					<td nowrap><a href="?action_admin_game_list=true&game_category_id={$i.game_category_id}">����</td>
					<td><a href="?action_admin_gamecategory_edit=true&game_category_id={$i.game_category_id}">�Խ�</a></td>
					<td><a href="?action_admin_gamecategory_delete_do=true&game_category_id={$i.game_category_id}" onClick="return confirm('�����ˤ���{$ft.game_category_name.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/foreach}
			</table>
			<div class="entry_box">
				��{$ft.game_category_name.name}ͥ���٤���0�פξ�硢�桼�����̤ˤ�ɽ������ޤ���<br />
				{form_submit value="`$ft.game_category_name.name`ͥ���ٹ���"}
				{/form}
			</div>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
