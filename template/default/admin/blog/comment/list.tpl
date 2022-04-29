{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.blog_article.name}{$ft.blog_comment.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_blog_comment_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.blog_article.name}{$ft.blog_comment.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.blog_article.name}{$ft.blog_comment.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.blog_article.name}{$ft.blog_comment.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			{form action="$script" ethna_action="admin_blog_comment_list"}
			<table class="sheet">
				<tr>
					<th>��ƴ���</th>
					<td {if $app.blog_comment_created_active}class="active"{/if} nowrap>
						{form_input name="blog_comment_created_year_start" emptyoption=""}ǯ
						{form_input name="blog_comment_created_month_start" emptyoption=""}��
						{form_input name="blog_comment_created_day_start" emptyoption=""}��
						��
						{form_input name="blog_comment_created_year_end" emptyoption=""}ǯ
						{form_input name="blog_comment_created_month_end" emptyoption=""}��
						{form_input name="blog_comment_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.blog_comment_updated_active}class="active"{/if} nowrap>
						{form_input name="blog_comment_updated_year_start" emptyoption=""}ǯ
						{form_input name="blog_comment_updated_month_start" emptyoption=""}��
						{form_input name="blog_comment_updated_day_start" emptyoption=""}��
						��
						{form_input name="blog_comment_updated_year_end" emptyoption=""}ǯ
						{form_input name="blog_comment_updated_month_end" emptyoption=""}��
						{form_input name="blog_comment_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>{form_input name="user_nickname"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.blog_comment_deleted_active}class="active"{/if} nowrap>
						{form_input name="blog_comment_deleted_year_start" emptyoption=""}ǯ
						{form_input name="blog_comment_deleted_month_start" emptyoption=""}��
						{form_input name="blog_comment_deleted_day_start" emptyoption=""}��
						��
						{form_input name="blog_comment_deleted_year_end" emptyoption=""}ǯ
						{form_input name="blog_comment_deleted_month_end" emptyoption=""}��
						{form_input name="blog_comment_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="blog_article_id"}</th>
					<td {if $app.blog_article_id_active}class="active"{/if}>{form_input name="blog_article_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="blog_comment_body"}</th>
					<td {if $app.blog_comment_body_active}class="active"{/if}>{form_input name="blog_comment_body" size="50"}</td>
					<th>{form_name name="blog_comment_id"}</th>
					<td {if $app.blog_comment_id_active}class="active"{/if}>{form_input name="blog_comment_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="blog_comment_status"}</th>
					<td {if $app.blog_comment_status_active}class="active"{/if}>{form_input name="blog_comment_status"}</td>
					<th>{form_name name="blog_comment_checked"}</th>
					<td {if $app.blog_comment_checked_active}class="active"{/if}>{form_input name="blog_comment_checked" emptyoption=""}</td>
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
			
			{form action="$script" ethna_action="admin_blog_comment_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th>�ƻ�</th>
					<th>
						�������<br />
						��������<br />
						�������
					</th>
					<th>�����ȥ桼��ID</th>
					<th>�����ȥ桼��̾</th>
					<th>{$ft.blog_article_title.name}</th>
					<th>{$ft.blog_article_body.name}</th>
					<th>{$ft.blog_comment.name}</th>
					<th>{$ft.image.name}</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=11 align="right">����{$ft.blog_comment.name}��{$ft.blog_comment_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.blog_comment_id}</td>
					<td {if $item.blog_comment_status==0}class="disable"{/if}>{$config.data_status[$item.blog_comment_status].name}</td>
					<td class="{if $item.blog_comment_checked==0}non{/if}checked">{$config.data_checked[$item.blog_comment_checked].name}</td>
					<td nowrap>
						[���]{$item.blog_comment_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.blog_comment_updted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{$item.blog_comment_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}</a>����</td>
					<td><a href="?action_admin_blog_article_edit=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a></td>
					<td>{$item.blog_article_body|nl2br}</td>
					<td><a href="?action_admin_blog_comment_edit=true&blog_comment_id={$item.blog_comment_id}">{$item.blog_comment_body|nl2br}</a></td>
					<td>{if $item.image_id}<img src="f.php?type=image&id={$item.image_id}&attr=t">{/if}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.blog_comment_id}">
						<input type="checkbox" name="check[]" value="{$item.blog_comment_id}" {if $item.blog_comment_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=11 align="right">�嵭{$ft.blog_comment.name}��{$ft.blog_comment_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
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
