{if !$no_navi}
{$site_navi_template}
{/if}
<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
{if !$no_footer}
<div align="left" style="text-align:left;font-size:small;">
{if $session.user.user_id && !$app.logout}
	<!--ログイン時フッター開始-->
	[x:0124]<a href="?action_user_top=true" accesskey="0">ﾎﾟｰﾀﾙ</a>
	[x:0115]<a href="?action_user_home=true" accesskey="1">ﾏｲﾍﾟｰｼﾞ</a>
	[x:0116]<a href="?action_user_blog_view=true&user_id={$session.user.user_id}" accesskey="2">{$ft.blog_article.name}</a><br />
	[x:0117]<a href="?action_user_friend_list=true&user_id={$session.user.user_id}" accesskey="3">{$ft.friend_list.name}</a>
	[x:0118]<a href="?action_user_community_list=true&user_id={$session.user.user_id}" accesskey="4">{$ft.community_list.name}</a><br />
	[x:0119]<a href="?action_user_message_list_received=true" accesskey="5">{$ft.message.name}</a>
	[x:0120]<a href="?action_user_ec=true&user_id={$session.user.user_id}" accesskey="6">EC</a>
	<!-- 買い物かごがある場合 -->
	{if $session.cart_hash && !$app.logout}
		[x:0121]<a href="{$mall_url}?action_user_ec_cart=true&shop_id={$form.shop_id}" accesskey="7">かごの中を見る</a><br />
	{/if}
	[x:0123]<a href="?action_user_logout_do=true" accesskey="9">ﾛｸﾞｱｳﾄ</a>
	<!--ログイン時フッター終了-->
{else}{* $session.user.user_id && !$app.logout *}
	<!--未ログイン時フッター開始-->
	[x:0124]<a href="?action_user_index=true" accesskey="0">ﾄｯﾌﾟ</a>
	<!--未ログイン時フッター終了-->
{/if}{* $session.user.user_id && !$app.logout *}
</div>
{/if}{* !$no_footer *}
{html_style type="title" title="(c)`$site_name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
</div>
<!--コンテナ終了-->
</body>
</html>
