{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>���ޥ��ɲó�ǧ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" method="post" ethna_action="admin_magazine_add_do"}
			{$app_ne.hidden_vars}
			{uniqid}
			{form_input name="magazine_segment_num"}
			<table class="sheet">
				<tr>
					<th>�ۿ�����</th>
					<td>
						{$form.year}ǯ
						{$form.month}��
						{$form.day}��
						{$form.hour}��
						{$form.min}ʬ
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_signature"}</th>
					<td>
						{if $form.magazine_signature}
							{$form.magazine_signature}
						{else}
							��̾�ʤ�
						{/if}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_title"}</th>
					<td>{$form.magazine_title}</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body"}</th>
					<td>
						<iframe id="preview" onload="$('preview').contentWindow.document.body.innerHTML = $j('input[@name=magazine_body]').val()">
						</iframe>
						<br style="clear:both" />
						{form_name name="test_mailaddress"}��{form_input name="test_mailaddress" size="50"}<br />
						{form_input name="magazine_test"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="segment_id"}</th>
					<td>
						{$form.segment_name}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_segment_num"}</th>
					<td>
						{$form.magazine_segment_num}̾
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_input name="back"}{form_submit value="���ޥ��ɲ�"}</td>
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

