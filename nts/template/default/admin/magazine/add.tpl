{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>���ޥ��ɲ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" method="post" ethna_action="admin_magazine_add_do" onsubmit="updateTextArea('magazine_body_html')"}
			<table class="sheet">
				<tr>
					<th>�ۿ�����</th>
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
					<th>{form_name name="magazine_title"}</th>
					<td>
					{form_input name="magazine_title" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body_text"}</th>
					<td>
						{form_input name="magazine_body_text" cols=38 rows=30 style="float:left;margin-right:10px;padding-right:10px;"}
						<span style="float:left;">
						�����Ѳ�ǽ�ʥ���<br />
						�����󥯤���������##ad����ID##��<br />
						�桼���˥å��͡������������##user_nickname##��<br />
						�桼���ݥ���Ȥ���������##user_point##��<br />
						</span>
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body_html"}</th>
					<td>
						{form_input name="magazine_body_html_status"}<br />
						{form_input name="magazine_body_html" cols=40 rows=20 style="float:left;" id="magazine_body_html"}
{html_style type="j_emoji_replace"}
<script language="javascript1.2">
generate_wysiwyg('magazine_body_html');
</script>
						<span style="float:left;width:300px;">
						���ǥ��᡼���Խ������ջ���<br />
						�ǥ��᡼��˻��Ѳ�ǽ�ʥ�����DOCOMO,AU,SOFTBANK����Τ�ΤΤߤȤ��Ƥ���ޤ���<br />
						�����Բ�ǽ�ʥ������������줿���ϡ�HTML��&lt;=&gt;��TEXT�ץܥ���򲡤����Ȥˤ�������뤳�Ȥ���ǽ�Ǥ���<br />
						�ǥ��᡼��Ǥϲ�����ɽ����������MARQUEE���νġ�����DIV�νġ�����BLINK�νġ�������ꤹ�뤳�ȤϤǤ��ޤ���<br />
						�ǥ��᡼��Ǥϲ������̤˸³�������ޤ��Τǲ�����ź�դ��������դ��Ʋ�������<br />
						��ʸ����BLINK��MARQUEE�Ȥ���ɽ�������������ϡ���HTML�⡼�ɡפ��Խ����뤫����ö��ʸ���פ����򤿾��֤ǥܥ���򲡤��Ƥ��顢������ʬ�˳�ʸ�����������Ʋ�������<br />
						�֥饦���λ��ͤˤ�꺸�Υ��ǥ������MARQUEE�������ư��Ǥ��ʤ���礬����ޤ���<br />
						�֥饦���λ��ͤˤ�꺸�Υ��ǥ������BLINK�������ư��Ǥ��ʤ���礬����ޤ���<br />
						<br />
						�����Ѳ�ǽ�ʥ���<br />
						�����󥯤���������##ad:����ID##��<br />
						�桼���˥å��͡������������##user_nickname##��<br />
						�桼���ݥ���Ȥ���������##user_point##��<br />
						</span>
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
					<td>{form_submit value="���ޥ���Ͽ"}</td>
				</tr>
			</table>
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

