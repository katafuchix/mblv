{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�����������ݡ���</h2>
			{if count($errors)}<span class="ethna-error">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			{form action="$script" ethna_action="admin_analytics_day"}
				{form_input name="year"}ǯ
				{form_input name="month"}��
				{form_submit value="�ν��פ�ɽ��"}
			{/form}
			<table class="sheet">
				<tr>
					<th>����</th>
					<th>����Ͽ�Կ�</th>
					<th>����Ͽ�Կ�</th>
					<th>ͧã������Ͽ�Կ�</th>
					<th>������Ͽ�Կ�</th>
					<th>���Կ�</th>
				</tr>
				{foreach from=$app.analytics_list item=i}
				<tr>
					<td nowrap>{$i.analytics_date|jp_date_format:"%Y/%m/%d(%a)"}</td>
					<td>{$i.pre_regist_num}</td>
					<td>{$i.regist_num}</td>
					<td>{$i.friend_num}</td>
					<td>{$i.natural_num}</td>
					<td>{$i.resign_num}</td>
				</tr>
				{/foreach}
			</table>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- ***********************��#main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
