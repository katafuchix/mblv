<!--�إå���-->
{include file="user/header.tpl"}

<!--top��-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=154" alt="���ʎގ����ʤ�Ŏʎߎ�����,TOP�ێ���">
</div>

<!--���顼ɽ������-->
<div align="left" style="text-align:left;font-size:xx-small;">
	{include file="user/errors.tpl"}
</div>
<!--���顼ɽ����λ-->

{if $app.thema_title}
	<div style="font-size:small;text-align:left;">
		{$app.thema_title}
	</div>
	<hr color="#ff6699" style="border:solid 1px #ff6699;">
{/if}

<!--twitter form ����-->
	{form ethna_action="user_blog_article_add_do" action="`$script`?guid=ON"}
		{form_input name="thema_id"}
		{form_input name="twitter_status" value="1"}
		<span style="color:{$form_name_color};">
		{form_input name="blog_article_title" size="20"}
		</span>
		<span style="text-align:right;font-size:small;">{form_submit value="���"}</span>
	{/form}
<!--twitter form ��λ-->

<!--�����ȳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item key=k}
		{if $config.option.avatar}
			<img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
		{else}
			{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;">
			{/if}
		{/if}
		<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">
			{$item.blog_article_title|mb_strimwidth:0:15:"..."}
		</a>
		��<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>�����<br />
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	{if $app.listview_total != 0}
	<!--div align="right" style="text-align:right;font-size:small;">
		����<a href="?action_user_blog_comment_view=true&blog_article_id={$form.blog_article_id}">���Ҏݎİ���</a>[x:0082]
	</div-->
	{/if}
</div>
<!--�����Ƚ�λ-->


<!--�եå���-->
{include file="user/footer.tpl"}
