{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.movie.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_movie_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.movie.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.movie.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.movie.name}��{$app.listview_total}�ĸ��Ĥ���ޤ�����
				{/if}
			</div>
			{form ethna_action="admin_movie_list"}
			<table class="sheet">
				<tr>
					<th>��ƴ���</th>
					<td {if $app.movie_created_active}class="active"{/if} nowrap>
						{form_input name="movie_created_year_start" emptyoption=""}ǯ
						{form_input name="movie_created_month_start" emptyoption=""}��
						{form_input name="movie_created_day_start" emptyoption=""}��
						��
						{form_input name="movie_created_year_end" emptyoption=""}ǯ
						{form_input name="movie_created_month_end" emptyoption=""}��
						{form_input name="movie_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.movie_deleted_active}class="active"{/if} nowrap>
						{form_input name="movie_deleted_year_start" emptyoption=""}ǯ
						{form_input name="movie_deleted_month_start" emptyoption=""}��
						{form_input name="movie_deleted_day_start" emptyoption=""}��
						��
						{form_input name="movie_deleted_year_end" emptyoption=""}ǯ
						{form_input name="movie_deleted_month_end" emptyoption=""}��
						{form_input name="movie_deleted_day_end" emptyoption=""}��
					</td>
					<th>{$ft.movie.name}������</th>
					<td {if $app.movie_size_active}class="active"{/if} nowrap>{form_input name="movie_size_min"}��{form_input name="movie_size_max"}�Х���</td>
				</tr>
				<tr>
					<th>{form_name name="movie_mime_type"}</th>
					<td {if $app.movie_mime_type_active}class="active"{/if}>{form_input name="movie_mime_type"}</td>
					<th>{form_name name="movie_status"}</th>
					<td {if $app.movie_status_active}class="active"{/if}>{form_input name="movie_status"}</td>
				</tr>
				<tr>
					<th>ɽ����</th>
					<td>{form_input name="sort_key" emptyoption=""}��{form_input name="sort_order" emptyoption=""}</td>
					<th>{form_name name="movie_checked"}</th>
					<td {if $app.movie_checked_active}class="active"{/if}>{form_input name="movie_checked" emptyoption=""}</td>
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
			
			{form action="$script" ethna_action="admin_movie_list"}
			{$app_ne.hidden_vars}
			<table class="sheet">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th>�ƻ�</th>
					<th>
						�������<br />
						�������
					</th>
					<th>����ͥ���</th>
					<th>��ͭ�桼��</th>
					<th>MIME������</th>
					<th>�ե����륵�����ʥХ��ȡ�</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=10 align="right">����{$ft.movie.name}��{$ft.movie_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
				</tr>
				{foreach from=$app.listview_data item=item name=file}
				{if $item != false}
				<tr>
					<td>{$item.movie_id}</td>
					<td {if $item.movie_status==0}class="disable"{/if}>{$config.data_status[$item.movie_status].name}</td>
					<td class="{if $item.movie_checked==0}non{/if}checked">{$config.data_checked[$item.movie_checked].name}</td>
					<td nowrap>
						[���]{$item.movie_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{$item.movie_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td><img src="f.php?type=movie&id={$item.movie_id}&attr=t"></td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}����</a></td>
					<td>{$item.movie_mime_type}</td>
					<td>{$item.movie_size}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.movie_id}">
						<input type="checkbox" name="check[]" value="{$item.movie_id}" {if $item.movie_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=10 align="right">�嵭{$ft.movie.name}��{$ft.movie_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
