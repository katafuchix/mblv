{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.blog_article.name}検索</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_blog_article_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.blog_article.name}検索FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.blog_article.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.blog_article.name}が{$app.listview_total}件見つかりました。
				{/if}
			</div>
			{form action="$script" ethna_action="admin_blog_article_list"}
			<table class="sheet">
				<tr>
					<th>投稿期間</th>
					<td {if $app.blog_article_created_active}class="active"{/if} nowrap>
						{form_input name="blog_article_created_year_start" emptyoption=""}年
						{form_input name="blog_article_created_month_start" emptyoption=""}月
						{form_input name="blog_article_created_day_start" emptyoption=""}日
						〜
						{form_input name="blog_article_created_year_end" emptyoption=""}年
						{form_input name="blog_article_created_month_end" emptyoption=""}月
						{form_input name="blog_article_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.blog_article_updated_active}class="active"{/if} nowrap>
						{form_input name="blog_article_updated_year_start" emptyoption=""}年
						{form_input name="blog_article_updated_month_start" emptyoption=""}月
						{form_input name="blog_article_updated_day_start" emptyoption=""}日
						〜
						{form_input name="blog_article_updated_year_end" emptyoption=""}年
						{form_input name="blog_article_updated_month_end" emptyoption=""}月
						{form_input name="blog_article_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>{form_input name="user_nickname"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.blog_article_deleted_active}class="active"{/if} nowrap>
						{form_input name="blog_article_deleted_year_start" emptyoption=""}年
						{form_input name="blog_article_deleted_month_start" emptyoption=""}月
						{form_input name="blog_article_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="blog_article_deleted_year_end" emptyoption=""}年
						{form_input name="blog_article_deleted_month_end" emptyoption=""}月
						{form_input name="blog_article_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="blog_article_id"}</th>
					<td {if $app.blog_article_id_active}class="active"{/if}>{form_input name="blog_article_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="blog_article_title"}</th>
					<td {if $app.blog_article_title_active}class="active"{/if}>{form_input name="blog_article_title" size="50"}</td>
					<th>{form_name name="blog_article_body"}</th>
					<td {if $app.blog_article_body_active}class="active"{/if}>{form_input name="blog_article_body" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="blog_article_status"}</th>
					<td {if $app.blog_article_status_active}class="active"{/if}>{form_input name="blog_article_status"}</td>
					<th>{form_name name="blog_article_checked"}</th>
					<td {if $app.blog_article_checked_active}class="active"{/if}>{form_input name="blog_article_checked" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="blog_article_public"}</th>
					<td {if $app.blog_article_public_active}class="active"{/if}>{form_input name="blog_article_public" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="　検　索　"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_blog_article_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>ステータス</th>
					<th>監視</th>
					<th>
						投稿日時<br />
						更新日時<br />
						削除日時
					</th>
					<th>ユーザID</th>
					<th>ユーザ名</th>
					<th>{$ft.blog_article_title.name}</th>
					<th>{$ft.blog_article_body.name}</th>
					<th>{$ft.image.name}</th>
					<th>{$ft.blog_article_public.name}</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">非表示</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=11 align="right">下記{$ft.blog_article.name}の{$ft.blog_article_checked.name}ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.blog_article_id}</td>
					<td {if $item.blog_article_status==0}class="disable"{/if}>{$config.data_status[$item.blog_article_status].name}</td>
					<td class="{if $item.blog_article_checked==0}non{/if}checked">{$config.data_checked[$item.blog_article_checked].name}</td>
					<td nowrap>
						[投稿]{$item.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]{$item.blog_article_updted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[削除]{$item.blog_article_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.user_id}</td>
					<td nowrap><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん</td>
					<td><a href="?action_admin_blog_article_edit=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a></td>
					<td>{$item.blog_article_body|nl2br}</td>
					<td>{if $item.image_id}<img src="f.php?type=image&id={$item.image_id}&attr=t">{/if}</td>
					<td>{$config.blog_article_public[$item.blog_article_public].name}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.blog_article_id}">
						<input type="checkbox" name="check[]" value="{$item.blog_article_id}" {if $item.blog_article_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=11 align="right">上記{$ft.blog_article.name}の{$ft.blog_article_checked.name}ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
