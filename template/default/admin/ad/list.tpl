{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>
			{php}
			 $ac = $this->_tpl_vars['app']['ac'];
			{/php}
			{if $form.ad_category_id}
				{php}
						echo $ac[$this->_tpl_vars['form']['ad_category_id']]['name'];
				{/php}
			{/if}
				{$ft.ad.name}����
			</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_ad_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.ad.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_adcode_list=true">{$ft.ad.name}ASP����</a>
				{$ft.menu_icon.name}<a href="?action_admin_config_edit=true&site_type=ad">{$ft.ad.name}��������</a>
				{$ft.menu_icon.name}<a href="?action_admin_adcategory_list=true">{$ft.ad_category.name}����</a>
				{$ft.menu_icon.name}<a href="?action_admin_ad_add=true&ad_category_id={$form.ad_category_id}">{$ft.ad.name}��Ͽ</a><br />
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.ad.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.ad.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			{form action="$script" ethna_action="admin_ad_list"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<td {if $app.ad_created_active}class="active"{/if} nowrap>
						{form_input name="ad_created_year_start" emptyoption=""}ǯ
						{form_input name="ad_created_month_start" emptyoption=""}��
						{form_input name="ad_created_day_start" emptyoption=""}��
						��
						{form_input name="ad_created_year_end" emptyoption=""}ǯ
						{form_input name="ad_created_month_end" emptyoption=""}��
						{form_input name="ad_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="ad_id"}</th>
					<td {if $app.ad_id_active}class="active"{/if}>{form_input name="ad_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.ad_updated_active}class="active"{/if} nowrap>
						{form_input name="ad_updated_year_start" emptyoption=""}ǯ
						{form_input name="ad_updated_month_start" emptyoption=""}��
						{form_input name="ad_updated_day_start" emptyoption=""}��
						��
						{form_input name="ad_updated_year_end" emptyoption=""}ǯ
						{form_input name="ad_updated_month_end" emptyoption=""}��
						{form_input name="ad_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="ad_name"}</th>
					<td {if $app.ad_name_active}class="active"{/if}>{form_input name="ad_name"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.ad_deleted_active}class="active"{/if} nowrap>
						{form_input name="ad_deleted_year_start" emptyoption=""}ǯ
						{form_input name="ad_deleted_month_start" emptyoption=""}��
						{form_input name="ad_deleted_day_start" emptyoption=""}��
						��
						{form_input name="ad_deleted_year_end" emptyoption=""}ǯ
						{form_input name="ad_deleted_month_end" emptyoption=""}��
						{form_input name="ad_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="ad_desc"}</th>
					<td {if $app.ad_desc_active}class="active"{/if}>{form_input name="ad_desc"}</td>
				</tr>
				<tr>
					<th>�ۿ����ϴ���</th>
					<td {if $app.ad_start_active}class="active"{/if} nowrap>
						{form_input name="ad_start_year_start" emptyoption=""}ǯ
						{form_input name="ad_start_month_start" emptyoption=""}��
						{form_input name="ad_start_day_start" emptyoption=""}��
						��
						{form_input name="ad_start_year_end" emptyoption=""}ǯ
						{form_input name="ad_start_month_end" emptyoption=""}��
						{form_input name="ad_start_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="ad_start_status"}</th>
					<td {if $app.ad_start_status_active}class="active"{/if}>{form_input name="ad_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>�ۿ���λ����</th>
					<td {if $app.ad_end_active}class="active"{/if} nowrap>
						{form_input name="ad_end_year_start" emptyoption=""}ǯ
						{form_input name="ad_end_month_start" emptyoption=""}��
						{form_input name="ad_end_day_start" emptyoption=""}��
						��
						{form_input name="ad_end_year_end" emptyoption=""}ǯ
						{form_input name="ad_end_month_end" emptyoption=""}��
						{form_input name="ad_end_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="ad_end_status"}</th>
					<td {if $app.ad_end_status_active}class="active"{/if}>{form_input name="ad_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_stock_num"}</th>
					<td {if $app.ad_stock_num_active}class="active"{/if}>{form_input name="ad_stock_num" emptyoption=""}</td>
					<th>{form_name name="ad_stock_status"}</th>
					<td {if $app.ad_stock_status_active}class="active"{/if}>{form_input name="ad_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_category_id"}</th>
					<td {if $app.ad_category_id_active}class="active"{/if}>{form_input name="ad_category_id" emptyoption=""}</td>
					<th>{form_name name="ad_status"}</th>
					<td {if $app.ad_status_active}class="active"{/if}>{form_input name="ad_status"}</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th nowrap>{$ft.ad_name.name}</th>
					<th nowrap>{$ft.ad_category_name.name}</th>
					<th nowrap>{$ft.ad_image.name}</th>
					<th>{$ft.banner.name}����</th>
					<th>�����URL</th>
					<th nowrap>����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.ad_id}</td>
					<td {if $i.ad_status==0}class="disable"{/if}>{$config.regist_status[$i.ad_status].name}</td>
					<td>{$i.ad_name}</td>
					<td>{$i.ad_category_name}</td>
					<td>{if $i.ad_image}<img src="f.php?file=ad/{$i.ad_image}">{/if}</td>
					<td nowrap>{literal}{ad id={/literal}{$i.ad_id}{literal}}{/literal}</td>
					<td nowrap><input type="text" value="ad.php?ad_id={$i.ad_id}" size="55"></td>
					<td><a href="?action_admin_stats_list=true&type=ad&id={$i.ad_id}&term=month">����</a></td>
					<td><a href="?action_admin_ad_edit=true&ad_id={$i.ad_id}">�Խ�</a></td>
					<td><a href="?action_admin_ad_delete_do=true&ad_id={$i.ad_id}&ad_category_id={$form.ad_category_id}" onClick="return confirm('�����ˤ���{$ft.ad.name}�������Ƥ��ޤäƤ������Ǥ�����');">���</a></td>
				</tr>
				{/foreach}
			</table>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
