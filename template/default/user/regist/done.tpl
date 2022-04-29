<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="会員登録完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<div align="center" style="text-align:center;font-size:small;">
		{$site_name}へようこそ<br />
	</div>
	<br />
	{$site_name}では{$ft.point.name}という通貨を使ってｼｮｯﾋﾟﾝｸﾞやｹﾞｰﾑ・着うた・ﾃﾞｺﾒｰﾙ・ｱﾊﾞﾀｰなどたくさんのｺﾝﾃﾝﾂを利用することができます。<br />
	たくさん{$ft.point.name}を集めて楽しんでくださいね。<br />
	<br />
	{if $session.cart_hash}
		<!--買い物かごの中に商品がある場合-->
		お買い物中の方は<a href="?action_user_ec_cart=true">コチラ</a><br />
	{/if}
	{if $config.option.avatar}
		<!--アバターオプションがある場合-->
		まずは{$ft.avatar.name}を設定して下さい。<br />
		<br />
		<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_avatar_config_first=true">{$ft.avatar.name}作成</a></div>
	{/if}
	<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_home=true">ﾏｲﾍﾟｰｼﾞへ</a></div>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
