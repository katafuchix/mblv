{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�����ɲ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ec_item_add" method="post" enctype="multipart/form-data"}
			�������ɲäˤϥ��ƥ�����꤬ɬ�פǤ���<br />
			���ʲ���ꥫ�ƥ�������򤷤Ƥ���������
			<table class="sheet">
				<tr>
					<th>{form_name  name="item_category_id"}</th>
					<td>{form_input name="item_category_id"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="�������ɲò��̤ء�"}</td>
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
