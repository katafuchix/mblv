{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ��������ᥤ�󥳥�ƥ��-->
				<h2>���ߥ�˥ƥ����ƥ������</h2>
				<blockquote><a href="?action_admin_util=true&page=faq_community_category_edit&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">���ߥ�˥ƥ����ƥ������FAQ</a></blockquote>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				
				<!--���ߥ�˥ƥ����ƥ����ɲó���-->
				{form action="$script" ethna_action="admin_config_community_category_add_do"}
				{uniqid}
				<table class="sheet">
					<tr>
						<th>�ɲä��륳�ߥ�˥ƥ����ƥ���̾<br /><span class="required"></span></th>
						<th>ͥ����</th>
						<th>�ɲ�</th>
					</tr>
					<tr>
						<td>{form_input name="community_category_name"}</td>
						<td>{form_input name="community_category_priority_id"}</td>
						<td>{form_submit value="�ɲ�"}</td>
					</tr>
				</table>
				{/form}
				<!--���ߥ�˥ƥ����ƥ����ɲý�λ-->
				
				<!--���ߥ�˥ƥ����ƥ����������-->
				<table class="sheet">
					<tr>
						<th>���ߥ�˥ƥ����ƥ���̾</th>
						<th>�Խ� / ͥ����</th>
						<th>���</th>
					</tr>
					{foreach from=$app.category_list item=item}
						<tr>
							<td>{$item.community_category_name}</td>
							<td>
								{form action="$script" ethna_action="admin_config_community_category_edit_do"}
								{form_input name="community_category_id" value="`$item.community_category_id`"}
								{form_input name="community_category_name" value="`$item.community_category_name`"}
								{form_input name="community_category_priority_id" value="`$item.community_category_priority_id`"}
								{form_submit value="���Խ���"}
								{/form}
							</td>
							<td>
								{form action="$script" ethna_action="admin_config_community_category_delete_do" onSubmit="return confirm('�����ˤ��Υ��ߥ�˥ƥ����ƥ���������Ƥ�����Ǥ�����');"}
								{form_input name="community_category_id" value="`$item.community_category_id`"}
								{form_submit value="�������"}
								{/form}
							</td>
						</tr>
					{/foreach}
				</table>
				<!--���ߥ�˥ƥ����ƥ��������λ-->
					<!-- �����ޤǥᥤ�󥳥�ƥ��-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
