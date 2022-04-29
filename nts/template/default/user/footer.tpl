<br />
<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
{if $session.user.user_id && !$app.logout}
	<!--ログイン時フッター開始-->
	<div align="left" style="text-align:left;font-size:small;">
		[x:0124]<a href="?action_user_top=true" accesskey="0">ﾎﾟｰﾀﾙ</a>
		[x:0115]<a href="?action_user_home=true" accesskey="1">ﾏｲﾍﾟｰｼﾞ</a>
		[x:0116]<a href="?action_user_blog_view=true&user_id={$session.user.user_id}" accesskey="2">{$ft.blog_article.name}</a><br />
		[x:0117]<a href="?action_user_friend_list=true&user_id={$session.user.user_id}" accesskey="3">{$ft.friend_list.name}</a>
		[x:0118]<a href="?action_user_community_list=true&user_id={$session.user.user_id}" accesskey="4">{$ft.community_list.name}</a><br />
		[x:0119]<a href="?action_user_message_list_received=true" accesskey="5">{$ft.message.name}</a>
		[x:0120]<a href="?action_user_logout_do=true" accesskey="6">ﾛｸﾞｱｳﾄ</a>
	</div>
	<!--ログイン時フッター終了-->
{else}
	<!--未ログイン時フッター開始-->
	<div align="left" style="text-align:left;font-size:small;">
		[x:0124]<a href="?action_user_index=true&ma_hash={$app.ma_hash}" accesskey="0">ﾄｯﾌﾟ</a>
	</div>
	<!--未ログイン時フッター終了-->
{/if}
{html_style type="title" title="(c)$sns_name" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
</div>
<!--コンテナ終了-->
</body>
</html>
