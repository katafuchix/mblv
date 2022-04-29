<!--ヘッダー-->
{include file="user/header.tpl"}

<!--topロゴ-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=154" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,TOPﾛｺﾞ">
</div>

<!--エラー表示開始-->
<div align="left" style="text-align:left;font-size:xx-small;">
	{include file="user/errors.tpl"}
</div>
<!--エラー表示終了-->

{if $app.thema_title}
	<div style="font-size:small;text-align:left;">
		{$app.thema_title}
	</div>
	<hr color="#ff6699" style="border:solid 1px #ff6699;">
{/if}

<!--twitter form 開始-->
	{form ethna_action="user_blog_article_add_do" action="`$script`?guid=ON"}
		{form_input name="thema_id"}
		{form_input name="twitter_status" value="1"}
		<span style="color:{$form_name_color};">
		{form_input name="blog_article_title" size="20"}
		</span>
		<span style="text-align:right;font-size:small;">{form_submit value="投稿"}</span>
	{/form}
<!--twitter form 終了-->

<!--コメント開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item key=k}
		{if $config.option.avatar}
			<img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
		{else}
			{if $item.user_image_id}
				<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;">
			{/if}
		{/if}
		<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">
			{$item.blog_article_title|mb_strimwidth:0:15:"..."}
		</a>
		（<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん）<br />
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	{if $app.listview_total != 0}
	<!--div align="right" style="text-align:right;font-size:small;">
		　→<a href="?action_user_blog_comment_view=true&blog_article_id={$form.blog_article_id}">ｺﾒﾝﾄ一覧</a>[x:0082]
	</div-->
	{/if}
</div>
<!--コメント終了-->


<!--フッター-->
{include file="user/footer.tpl"}
