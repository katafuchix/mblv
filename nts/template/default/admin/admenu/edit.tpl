{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�����˥塼����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			��ɽ��������������ι���ID���,�ʥ���ޡˡ׶��ڤ�����Ϥ��Ʋ����������Ϥ��줿���𤬥������ɽ������ޤ���<br />
			{form ethna_action="admin_admenu_edit_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="index"}</th>
					<td>
						{form_input name="index" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="home"}</th>
					<td>
						{form_input name="home" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="blog_article_add_done"}</th>
					<td>
						{form_input name="blog_article_add_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="blog_article_edit_done"}</th>
					<td>
						{form_input name="blog_article_edit_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="blog_article_delete_done"}</th>
					<td>
						{form_input name="blog_article_delete_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="blog_comment_add_done"}</th>
					<td>
						{form_input name="blog_comment_add_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="blog_comment_edit_done"}</th>
					<td>
						{form_input name="blog_comment_edit_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="blog_comment_delete_done"}</th>
					<td>
						{form_input name="blog_comment_delete_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_add_done"}</th>
					<td>
						{form_input name="community_add_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_edit_done"}</th>
					<td>
						{form_input name="community_edit_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_delete_done"}</th>
					<td>
						{form_input name="community_delete_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_article_add_done"}</th>
					<td>
						{form_input name="community_article_add_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_article_edit_done"}</th>
					<td>
						{form_input name="community_article_edit_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_article_delete_done"}</th>
					<td>
						{form_input name="community_article_delete_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_comment_add_done"}</th>
					<td>
						{form_input name="community_comment_add_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_comment_edit_done"}</th>
					<td>
						{form_input name="community_comment_edit_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="community_comment_delete_done"}</th>
					<td>
						{form_input name="community_comment_delete_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="bbs_add_done"}</th>
					<td>
						{form_input name="bbs_add_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="bbs_edit_done"}</th>
					<td>
						{form_input name="bbs_edit_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="bbs_delete_done"}</th>
					<td>
						{form_input name="bbs_delete_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="message_send_done"}</th>
					<td>
						{form_input name="message_send_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="decomail"}</th>
					<td>
						{form_input name="decomail" size="100"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="���Խ���"}</td>
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
