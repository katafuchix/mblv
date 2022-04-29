{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.blog_article.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_blog_article_edit_do"}
			{form_input name="blog_article_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="blog_article_id"}</th>
					<td>{$form.blog_article_id}</td>
				</tr>
				<tr>
					<th>{form_name name="blog_article_title"}</th>
					<td>{form_input name="blog_article_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="blog_article_body"}</th>
					<td>{form_input name="blog_article_body" cols="40" rows="20"}</td>
				</tr>
				{if $form.image_id}
				<tr>
					<th>画像</th>
					<td>
						<img src="f.php?type=image&id={$form.image_id}&attr=t"><br />
						{form_input name="delete_image"}
					</td>
				</tr>
				{/if}
				<tr>
					<th>{form_name name="blog_article_public"}</th>
					<td>{form_input name="blog_article_public"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="編集"}</td>
				</tr>
			</table>
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
