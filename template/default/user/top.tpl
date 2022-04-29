<!--ヘッダー-->
{include file="user/header.tpl"}

<!--ロゴ画像開始-->
<div align="center" style="text-align:center;font-size:small;">
	<img src="img/logo_user.gif" align="center" style="text-align:center"><br />
</div>
<!--ロゴ画像終了-->

<!--エラーメッセージ表示開始-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div>
<!--エラーメッセージ表示終了-->

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{html_style type="title" title="新着ニュース" bgcolor="#00AA2B" fontcolor=$title_fontcolor}
	<div style="background-color:#EAFFEF;">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
	{/if}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_news_list=true">もっと見る</a>
	</div>
	
	{html_style type="title" title="ゲーム" bgcolor="#00A5D5" fontcolor=$title_fontcolor}
	<div align="left" style="background-color:#EAFAFF;">
		{html_style type="img_left" src="img/t7.jpg"}
		<span style="margin-top:5px;">
			100タイトル以上のゲームと導入実績にもとづくゲーム配信サイトの構築が可能です！
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_game=true">もっと見る</a>
	</div>
	
	{html_style type="title" title="ショッピング" bgcolor="#D56A00" fontcolor=$title_fontcolor}
	<div style="background-color:#FFF4EA;">
		{html_style type="img_left" src="img/t4.jpg}
		<span style="margin-top:5px;">
			雑誌社・公式レーベルなどの導入実績による携帯物販のベストプラクティスに基づくECモールの構築が可能です！
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_ec=true">もっと見る</a>
	</div>
	
	{html_style type="title" title="アバター" bgcolor="#BF0030" fontcolor=$title_fontcolor}
	<div style="background-color:#FFEAEF;">
		{html_style type="img_left" src="img/t3.jpg"}
		<span style="margin-top:5px;">
			業界トップレベルの素材品質と導入実績にもとづくアバター配信サイトの構築が可能です！
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_avatar=true">もっと見る</a>
	</div>
	
	{html_style type="title" title="デコメール" bgcolor="#D5009F" fontcolor=$title_fontcolor}
	<div style="background-color:#FFEAFA;">
		{html_style type="img_left" src="img/t6.jpg"}
		<span style="margin-top:5px;">
			業界NO.1サイトの素材品質と導入実績にもとづくデコメ配信サイトの構築が可能です！
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_decomail=true">もっと見る</a>
	</div>
	
	{html_style type="title" title="サウンド" bgcolor="#D5D500" fontcolor=$title_fontcolor}
	<div style="background-color:#FFFFEA;">
		{html_style type="img_left" src="img/t12.jpg"}
		<span style="margin-top:5px;">
			独自コンテンツと導入実績にもとづく&reg;着うた/&reg;着メロ配信サイトの構築が可能です！
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_sound=true">もっと見る</a>
	</div>
</div>
<!--コンテンツ終了-->

<!--タイトル-->
{html_style type="title" title="ｻﾎﾟｰﾄﾒﾆｭｰ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--サポートメニュー開始-->
<div align="left" style="text-align:left;font-size:small;">
	[x:0193]<a href="fp.php?code=system_caution">注意事項</a><br />
	[x:0161]<a href="fp.php?code=system_support">問い合わせ</a><br />
	[x:0046]<a href="fp.php?code=system_policy">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</a><br />
	[x:0038]<a href="fp.php?code=system_company">会社概要</a>
</div>
<!--サポートメニュー終了-->

<!--フッター-->
{include file="user/footer.tpl"}
