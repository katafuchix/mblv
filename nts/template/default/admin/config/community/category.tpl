{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ��������ᥤ�󥳥�ƥ��-->
				<h2>���ߥ�˥ƥ����ƥ������</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				
				<!--���ߥ�˥ƥ����ƥ����ɲó���-->
				{form action="$script" ethna_action="admin_config_community_category_add_do"}
				{uniqid}
				<table class="sheet">
					<tr>
						<th>�ɲä��륳�ߥ�˥ƥ����ƥ���̾</th>
						<th>�ɲ�</th>
					</tr>
					<tr>
						<td>{form_input name="community_category_name"}</td>
						<td>{form_submit value="�ɲ�"}</td>
					</tr>
				</table>
				{/form}
				<!--���ߥ�˥ƥ����ƥ����ɲý�λ-->
				
				<!--���ߥ�˥ƥ����ƥ����������-->
				<table class="sheet">
					<tr>
						<th>���ߥ�˥ƥ����ƥ���̾</th>
						<th>�Խ�</th>
						<th>���</th>
					</tr>
					{foreach from=$app.category_list item=item}
						<tr>
							<td>{$item.community_category_name}</td>
							<td>
								{form action="$script" ethna_action="admin_config_community_category_edit_do"}
								{form_input name="community_category_id" value="`$item.community_category_id`"}
								{form_input name="community_category_name" value="`$item.community_category_name`"}
								{form_submit value="�Խ�"}
								{/form}
							</td>
							<td>
								{form action="$script" ethna_action="admin_config_community_category_delete_do" onSubmit="return confirm('�����ˤ��Υ��ߥ�˥ƥ����ƥ���������Ƥ�����Ǥ�����');"}
								{form_input name="community_category_id" value="`$item.community_category_id`"}
								{form_submit value="���"}
								{/form}
							</td>
						</tr>
					{/foreach}
				</table>
				<!--���ߥ�˥ƥ����ƥ��������λ-->
				<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
				<!-- �����ޤǥᥤ�󥳥�ƥ��-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
