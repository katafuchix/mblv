{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.blog_article.name}{$ft.blog_comment.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_blog_comment_edit_do"}
			{form_input name="blog_comment_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="blog_comment_id"}</th>
					<td>{$form.blog_comment_id}</td>
				</tr>
				<tr>
					<th>{form_name name="blog_comment_body"}</th>
					<td>{form_input name="blog_comment_body" cols="80" rows="20"}</td>
				</tr>
				<tr>
					<th>画像</th>
					<td>
						{if $form.image_id}
							<img src="f.php?type=image&id={$form.image_id}&attr=t"><br />
							{form_input name="delete_image"}
						{else}
							なし
						{/if}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　`$ft.blog_article.name``$ft.blog_comment.name`編集　"}</td>
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
