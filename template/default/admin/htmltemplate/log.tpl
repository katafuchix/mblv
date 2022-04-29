{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.htmltemplate.name}��</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_htmltemplate_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.htmltemplate.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $form.html_template_id}
					{$ft.menu_icon.name}<a href="?action_admin_htmltemplate_edit=true&html_template_id={$form.html_template_id}">{$ft.htmltemplate.name}�Խ�</a>
				{else}
					{$ft.menu_icon.name}<a href="?action_admin_htmltemplate_list=true">{$ft.htmltemplate.name}����</a><br />
				{/if}
			</div>
			
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>{$ft.htmltemplate.name}������</th>
					<th nowrap>��������</th>
					<th nowrap>�ܺ�</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.html_template_code}</td>
					<td>{$i.html_template_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M:%S"}</td>
					<td><textarea rows="10" style="width:100%">{$i.html_template_body}</textarea></td>
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
