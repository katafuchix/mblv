{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.review.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_review_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.review.name}����FAQ</a></blockquote>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.review.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.review.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_review_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.review_created_active}class="active"{/if} nowrap>
						{form_input name="review_created_year_start" emptyoption=""}ǯ
						{form_input name="review_created_month_start" emptyoption=""}��
						{form_input name="review_created_day_start" emptyoption=""}��
						��
						{form_input name="review_created_year_end" emptyoption=""}ǯ
						{form_input name="review_created_month_end" emptyoption=""}��
						{form_input name="review_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="review_id"}</th>
					<td {if $app.review_id_active}class="active"{/if}>{form_input name="review_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.review_updated_active}class="active"{/if} nowrap>
						{form_input name="review_updated_year_start" emptyoption=""}ǯ
						{form_input name="review_updated_month_start" emptyoption=""}��
						{form_input name="review_updated_day_start" emptyoption=""}��
						��
						{form_input name="review_updated_year_end" emptyoption=""}ǯ
						{form_input name="review_updated_month_end" emptyoption=""}��
						{form_input name="review_updated_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="review_title"}</th>
					<td {if $app.review_name_active}class="active"{/if}>{form_input name="review_title"}</td>
				</tr>
				<!-- tr>
					<th>������</th>
					<td {if $app.review_deleted_active}class="active"{/if} nowrap>
						{form_input name="review_deleted_year_start" emptyoption=""}ǯ
						{form_input name="review_deleted_month_start" emptyoption=""}��
						{form_input name="review_deleted_day_start" emptyoption=""}��
						��
						{form_input name="review_deleted_year_end" emptyoption=""}ǯ
						{form_input name="review_deleted_month_end" emptyoption=""}��
						{form_input name="review_deleted_day_end" emptyoption=""}��
					</td>
					<th style="width:20%"></th>
					<td></td>
				</tr -->
				<tr>
					<th>{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>
						{form_input name="user_nickname"}
					</td>
					<th style="width:20%">{form_name name="review_body"}</th>
					<td {if $app.review_name_active}class="active"{/if}>{form_input name="review_body"}</td>
				</tr>
				<tr>
					<th>{form_name name="item_name"}</th>
					<td {if $app.item_name_active}class="active"{/if}>
						{form_input name="item_name" emptyoption=""}
					</td>
					<th></th>
					<td></td>
				</tr>
				<tr>
					<th>{form_name name="review_status"}</th>
					<td {if $app.review_status_active}class="active"{/if}>
						{form_input name="review_status" emptyoption=""}
					</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>{$ft.review_id.name}</th>
					<th>{$ft.review_status.name}</th>
					<th>
						��Ͽ����<br />
						��������<br />
					</th>
					<th>{$ft.item_name.name}</th>
					<th>{$ft.review_title.name}</th>
					<th>{$ft.review_body.name}</th>
					<th>{$ft.user_nickname.name}</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item name=review}
				{if $item != false}
				<tr>
					<td>{$item.review_id}</td>
					<td {if $item.review_status==0}class="disable"{/if}>{$config.review_status[$item.review_status].name}</td>
					<td nowrap>
						[��Ͽ]:{$item.review_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]:{$item.review_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					<!-- 	[���]:{$item.review_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"} -->
					</td>
					<td><a href="?action_admin_ec_item_edit=true&item_id={$item.item_id}">{$item.item_name}</a></td>
					<td>{$item.review_title}</td>
					<td>{$item.review_body|nl2br}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}</a>����</td>
					<td><a href="?action_admin_ec_review_edit=true&review_id={$item.review_id}">�Խ�</a></td>
					<td><a href="?action_admin_ec_review_delete_do=true&review_id={$item.review_id}" onClick="return confirm('�����ˤ���{$ft.review.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/if}
				{/foreach}
			</table>
			
			{include file="admin/pager.tpl"}
			
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
