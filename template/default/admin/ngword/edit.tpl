{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.ngword.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_ngword_edit&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.ngword.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_ngword_edit_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="site_ngword"}</th>
					<td>
						����Ƥ�ػߤ�������������ɤ���ԤǶ��ڤä����Ϥ��Ʋ�������<br />
						{form_input name="site_ngword" rows="40" cols="80"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="���Խ���"}</td>
				</tr>
			</table>
			{/form}
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
