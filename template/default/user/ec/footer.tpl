<!--フッター開始-->

<!--フッター本体開始-->
{html_style type="title" title="[x:0074]ｼｮｰﾄｶｯﾄﾒﾆｭｰ[x:0074]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	<!-- セッションがあってログアウト変数がない場合 -->
	{if $session.user.user_id && !$app.logout}
		<!-- セッションにニックネームがある場合 -->
		{if $session.user.user_nickname}
			{$session.user.user_nickname}様<br />
		{/if}
		[x:0116]<a href="{$mall_url}?action_user_ec_delivery_edit=true&SESSID={$SESSID}" accesskey="2">会員情報変更</a><br />
	{else}
		<!--ログインしていない場合-->
		[x:0115]<a href="{$mall_url}{$scipt}?action_user_login=true" accesskey="1">ﾛｸﾞｲﾝ</a><br />
	{/if}
	<!-- 買い物かごがある場合 -->
	{if $session.cart_hash && !$app.logout}
		[x:0117]<a href="{$mall_url}?action_user_ec_cart=true&shop_id={$form.shop_id}&SESSID={$SESSID}" accesskey="3">かごの中を見る</a><br />
	{/if}

	<!-- セッションがあってログアウト変数がない場合 -->
	{if $session.user.user_id && !$app.logout}
		[x:0118]<a href="?action_user_logout_do=true" accesskey="4">ﾛｸﾞｱｳﾄ</a><br />
	{/if}

	<!--共通フッター TOPへ-->
	[x:0119]<a href="{$mall_url}?action_user_index=true&SESSID={$SESSID}" accesskey="5">{$mall_name}TOPへ</a><br />
	[x:0124]<a href="{$site_url}?guid=ON" accesskey="0">総合TOPへ</a><br />
</div>
<!--フッター本体終了-->

<!-- cmark-->
{html_style type="title" title="(c){$app.company_name}" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテナ終了-->
</div>

<!--フッター終了-->
</body>
</html>
