{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$app.news_category_name}�˥塼������</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_news_add=true">�˥塼��������Ͽ</a><br />
			{include file="admin/pager.tpl"}
			{form action="$script" ethna_action="admin_news_list"}
			<table class="sheet">
				<tr>
					<th nowrap>ID</th>
					{* NAPATOWN <th nowrap>�Ǻ���</th> *}
					<th nowrap>�����ȥ�</th>
					<th nowrap>��ʸ</th>
					<th nowrap>��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan="4" align="right">�嵭{$ft.news.name}��{$ft.news_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>{* NAPATOWN *}
					{* <td class="checkedrow" colspan="5" align="right">�嵭{$ft.news.name}��{$ft.news_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td> *}
				</tr>
				{foreach from=$app.listview_data item=item}
				<tr>
					<td>{$item.news_id}</td>
					{* NAPATOWN <td>{$config.news_type[$item.news_type].name}</td> *}
					<td><a href="?action_admin_news_edit=true&news_id={$item.news_id}">{$item.news_title}</a></td>
					<td>{$item.news_body|nl2br}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.news_id}">
						<input type="checkbox" name="check[]" value="{$item.news_id}" {if $item.news_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/foreach}
				<tr>
					<td class="checkedrow" colspan="4" align="right">�嵭{$ft.news.name}��{$ft.news_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>{* NAPATOWN *}
					{* <td class="checkedrow" colspan="5" align="right">�嵭{$ft.news.name}��{$ft.news_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td> *}
				</tr>
			</table>
			{/form}
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
