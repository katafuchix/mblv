<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{if $form.twitter_status}
{html_style type="title" title="`$ft.twitter.name`�Խ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
{html_style type="title" title="`$ft.blog_article.name`�Խ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_article_edit_confirm"}
		{form_input name="blog_article_id"}
		{form_input name="blog_article_hash"}
		{form_input name="twitter_status"}
		<span style="color:{$form_name_color};">
		{if $form.twitter_status}
			{$ft.twitter.name}���
		{else}
			{form_name name="blog_article_title"}:
		{/if}
		</span><br />
		{form_input name="blog_article_title"}<br />
		<br />
		{if !$form.twitter_status}
			<span style="color:{$form_name_color};">
			{form_name name="blog_article_body"}:
			</span><br />
			<div style="text-align:center;font-size:small;">
			{form_input name="blog_article_body" rows="5"}
			</div>
		{/if}
		<br />
		{if $form.image_id}
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" style="float:left" alt="����"><br />
			<span>
			<a href="{html_style type='mailto' account='blog_article_image' hash=$form.blog_article_hash}">{$ft.image_edit.name}</a><br />
					{form_input name="delete_image"}
			</span>
			{html_style type="br"}
		{else}
			<div style="text-align:center;font-size:small;">
			<a href="{html_style type='mailto' account='blog_article_image' hash=$form.blog_article_hash}">{$ft.image_add.name}</a><br />
			</div>
		{/if}
		<br />
		<span style="color:{$form_name_color};">
		{if $form.twitter_status}
			{$ft.twitter.name}��������
		{else}
			{form_name name="blog_article_public"}:
		{/if}
		</span>
		<br />
		{form_input name="blog_article_public"}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="edit_confirm"}</div>
	{/form}
	
	<br />
	
	<!--�����ȥ�-->
	{if $form.twitter_status}
		{html_style type="title" title="`$ft.twitter.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{else}
		{html_style type="title" title="`$ft.blog_article.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{/if}
	{form action="$script" ethna_action="user_blog_article_delete_confirm"}
		{form_input name="blog_article_id"}
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete_confirm"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
