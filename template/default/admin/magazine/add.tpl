{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.magazine.name}��Ͽ</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_magazine_add&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">���ޥ��ɲ�FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" method="post" ethna_action="admin_magazine_add_do" onsubmit="updateTextArea('magazine_body_html')"}
			<table class="sheet">
				<tr>
					<th>�ۿ�����<br /><span class="required"></span></th>
					<td>
						{form_input name="year"}ǯ
						{form_input name="month"}��
						{form_input name="day"}��
						{form_input name="hour"}��
						{form_input name="min"}ʬ
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_signature"}</th>
					<td>
						�����������ֽ�̾&lt;{$config.magazine_mailaddress}&gt;�פȤʤ�ޤ����ʶ���ξ��Ͻ�̾������ޤ��󡣡�<br />
						{form_input name="magazine_signature" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_title"}<br /><span class="required"></span></th>
					<td>
					{form_input name="magazine_title" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body_text"}</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_magazine','������ե����','width=700,height=700,scrollbars=yes'))">������ե����</a><br />
						{form_input name="magazine_body_text" cols=38 rows=30 style="float:left;margin-right:10px;padding-right:10px;"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body_html"}</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_magazine','������ե����','width=700,height=700,scrollbars=yes'))">������ե����</a><br />
						{form_input name="magazine_body_html_status"}<br />
						{form_input name="magazine_body_html" cols=40 rows=20 style="float:left;" id="magazine_body_html"}
{html_style type="j_emoji_replace"}
<script type="text/javascript">
generate_wysiwyg('magazine_body_html');
</script>
					</td>
				</tr>
				<tr>
					<th>�ƥ�������</th>
					<td>
						{form_name name="test_mailaddress"}��{form_input name="test_mailaddress" size="50"}<br />
						{form_input name="magazine_test"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="segment_id"}</th>
					<td>
						{form_input name="segment_id" emptyoption="����"}<br />
						<span class="err">�����������ۿ�����Ѥ����硢���Ѥ������������Ȥ����򤷤Ƥ������������򤵤�ʤ����������ۿ��Ȥʤ�ޤ���</span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="��`$ft.magazine.name`��Ͽ��"}</td>
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

