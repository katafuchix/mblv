{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.admenu.name}</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_admenu_edit&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.admenu.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				※表示させたい{$ft.ad.name}の{$ft.ad_id.name}を「,（カンマ）」区切りで入力して下さい。入力された{$ft.ad.name}がランダムで表示されます。<br />
			</div>
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
					<th>{form_name name="comment_add_done"}</th>
					<td>
						{form_input name="comment_add_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="comment_edit_done"}</th>
					<td>
						{form_input name="comment_edit_done" size="100"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="comment_delete_done"}</th>
					<td>
						{form_input name="comment_delete_done" size="100"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　編集　"}</td>
				</tr>
			</table>
			{/form}
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
