{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.sound_category.name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_soundcategory_add=true">{$ft.sound_category.name}��Ͽ</a><br />
			</div>
			{form action="$script" ethna_action="admin_soundcategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.sound_category_priority.name}</th>
					<th nowrap>{$ft.sound_category.name}̾</th>
					<th nowrap>{$ft.sound.name}�ե�����1</th>
					<th nowrap>{$ft.sound.name}����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.sound_category_list item=i}
				<tr>
					<td><input name="sound_category_priority_id[{$i.sound_category_id}]" value="{$i.sound_category_priority_id}" size="4"></td>
					<td>{$i.sound_category_name}</td>
					<td>{if $i.sound_category_file1}<img src="f.php?file=sound/{$i.sound_category_file1}">{/if}</td>
					<td nowrap><a href="?action_admin_sound_list=true&sound_category_id={$i.sound_category_id}">{$ft.sound.name}����</td>
					<td><a href="?action_admin_soundcategory_edit=true&sound_category_id={$i.sound_category_id}">�Խ�</a></td>
					<td><a href="?action_admin_soundcategory_delete_do=true&sound_category_id={$i.sound_category_id}" onClick="return confirm('�����ˤ���{$ft.sound_category.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/foreach}
			</table>
			<div class="entry_box">
				��{$ft.sound_category.name}ͥ���٤���0�פξ�硢�桼�����̤ˤ�ɽ������ޤ���<br />
				{form_submit value="`$ft.sound_category.name`ͥ���ٹ���"}
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
