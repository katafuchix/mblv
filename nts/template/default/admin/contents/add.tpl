{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.contents.name}��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_contents_add_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="contents_code"}</th>
					<td>{form_input name="contents_code"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_title"}</th>
					<td>{form_input name="contents_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_body"}</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_file=true','�ե��������','width=700,height=700,scrollbars=yes'))">�ե��������</a><br />
						{form_input name="contents_body" cols="80" rows="50"}
						<div>
							<b>������ե����</b><br />
							�ե�����URL�����ʲ�����ư��ؤ�URL�Ǥ���<br />
							��##file�֥ե������ֹ��##<br />
							�����㡧<input type="text" value='<img src="##file1##">' size="50">��<br />
							�ե꡼�ڡ���URL����1<br />
							��##fp�֥ե꡼�ڡ���ID��##<br />
							�����㡧<input type="text" value='<a href="##fp1##">�ե꡼�ڡ���1��</a>' size="50">��<br />
							�ե꡼�ڡ���URL����2<br />
							��##fp[�֥ե꡼�ڡ��������ɡ�]##<br />
							�����㡧<input type="text" value='<a href="##fp[test_code]##">�ե꡼�ڡ���1��</a>' size="50">��<br />
							���Х����ܺ٥ڡ���URL����<br />
							��##avatar�֥��Х���ID��##<br />
							�����㡧<input type="text" value='<a href="##avatar1##">���Х���1�ڡ�����</a>' size="50">��<br />
							�ǥ��᡼��ܺ٥ڡ���URL����<br />
							��##decomail�֥ǥ��᡼��ID��##<br />
							�����㡧<input type="text" value='<a href="##decomail1##">�ǥ��᡼��1�ڡ�����</a>' size="50">��<br />
							�ǥ��᡼���������ɥ���<br />
							��##decomail_dl�֥ǥ��᡼��ID��##<br />
							�����㡧<input type="text" value='<a href="##decomail_dl1##">�ǥ��᡼��1����������</a>' size="50">��<br />
							������ܺ٥ڡ���URL����<br />
							��##game�֥�����ID��##<br />
							�����㡧<input type="text" value='<a href="##game1##">������1����������</a>' size="50">��<br />
							������ɾܺ٥ڡ���URL����<br />
							��##sound�֥������ID��##<br />
							�����㡧<input type="text" value='<a href="##sound1##">�������1����������</a>' size="50">��<br />
							���ߥ�˥ƥ��ȥåץڡ���URL����<br />
							��##community�֥��ߥ�˥ƥ�ID��##<br />
							�����㡧<input type="text" value='<a href="##community1##">���ߥ�˥ƥ�1�ڡ�����</a>' size="50">��<br />
							���ȥåץڡ���URL����<br />
							��##top##<br />
							�����㡧<input type="text" value='<a href="##top##">���ȥåץڡ�����</a>' size="50">��<br />
							�ޥ��ڡ���URL����<br />
							��##home##<br />
							�����㡧<input type="text" value='<a href="##home##">�ޥ��ڡ�����</a>' size="50">��<br />
							�����ϩ�����Ѥ��᡼�륢�ɥ쥹����<br />
							��##media_mailaddress[�������ϩ�����ɡ�]##<br />
							�����㡧<input type="text" value='<a href="mailto:##media_mailaddress[test_media]##?subject=��̾&body=��ʸ">' size="50">��<br />
							�����Ͽ�᡼�륢�ɥ쥹����<br />
							��##regist_mailaddress##<br />
							�����㡧<input type="text" value='<a href="mailto:##regist_mailaddress##?subject=��̾&body=��ʸ">' size="50">��<br />
							�᡼��ɥᥤ�󥿥�<br />
							��##mail_domain##<br />
							�����㡧<input type="text" value="test@##mail_domain##" size="50">��<br />
							����URL����<br />
							��##ad�ֹ���ID��##<br />
							�����㡧<input type="text" value='<a href="##ad1##">����1�Υ����Ȥ�</a>' size="50">��<br />
							����Хʡ�����<br />
							��##ad_banner�ֹ���ID��##<br />
							�����㡧<input type="text" value="##ad_banner1##" size="50">��<br />
							���������Хʡ�����<br />
							��##ad_banner(�ֹ���ID�ꥹ�ȡ�)##<br />
							�����㡧<input type="text" value="##ad_banner(1,2,3,4,5)##" size="50">��<br />
						</div>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="��Ͽ"}</td>
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
