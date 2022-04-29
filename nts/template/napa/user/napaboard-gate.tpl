<!--タイトル開始-->
<div style="text-align:center; background-color:#228B22">
	<span style="color:#ffffff;font-size:small">ナパボード</span>
</div>
<!--タイトル終了-->

<!--お題開始-->
<div align="center" style="text-align:center;font-size:xx-small;">
	{if $thema_title}
		<span style="color:#000000;font-size:small">
			お題：{$thema_title}
		</span>
	{/if}
	{if $latest_date}
		<br />
		<span style="color:#000000;font-size:x-small">
			最新の投稿は：{$latest_date|jp_date_format:"%m/%d (%a) %H:%M"}
		</span>
	{/if}
	<!--
	<span style="color:#FF0000;font-size:xx-small"><a style="color:#FF0000" href="?action_user_blog_article_view=true&blog_article_id=63581&SESSID=e1eb150599e6f425ec838887592ab7a08336b5261ffb07d0225c7cf14e28b0be"><span style="color:#FF0000;font-size:xx-small">日記に新着ｺﾒﾝﾄあり</span></a></span><br />
	-->
		<!--<hr color="#ff6699" style="border:solid 1px #ff6699;">-->

</div>
<!--お題終了-->

<!--twitter開始-->
<div align="left" style="text-align:left;font-size:small;">
{foreach from=$napaboard_list item="item"}
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
</div>
<!--twitter終了-->

<!--ナパボード入口開始-->
<div align="center" style="text-align:center;font-size:xx-small;">
	<span style="color:#FF0000;font-size:x-small">
		<a href="?action_user_twitter=true">
			ナパボード入口
		</a>
	</span>
</div>
<!--ナパボード入口終了-->
