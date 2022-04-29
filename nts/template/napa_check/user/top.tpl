<!--ヘッダー-->
{include file="user/header.tpl" title="ナパタウン総合TOP" bgcolor="#FFFFFF" text="#66AAEE" link="#AA3366" vlink="#CC5588"}

<!-- napatown -->
<a name="d_top" id="d_top"></a>
<!--topロゴ-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=165">
	<!--<img src="img_napa/top/logo_napatown.jpg" width="240" height="70" border="0" />--><br />
	<!--広告ﾊﾞﾅｰ-->
	{ad type="index"}
	{if $session.user.user_id && !$app.logout}
		[x:0037]<a href="?action_user_home=true">ﾏｲﾍﾟｰｼﾞ</a>/
		[x:0105]<a href="?action_user_invite=true">友達招待</a><br />
	{else}
		<!--ログイン開始-->
		<div align="center" style="text-align:center;font-size:small;">
			[x:0107]<a href="fp.php?code=guide_mail"><span style="color:{$menucolor};">無料会員登録</span></a>[x:0107]
		</div>
		<div align="center" style="text-align:center;font-size:small;">
			[<a href="?action_user_login_do=true&easy_login=true&guid=ON">会員ﾛｸﾞｲﾝ[x:0138]</a>]<br />
			ﾛｸﾞｲﾝできない方は<a href="?action_user_login=true">ｺﾁﾗ</a>
		<!--ログイン終了-->
	{/if}
<font size="1"><a href="http://m.napatown.jp/?guid=ON&autologin=true">ｼｮｯﾋﾟﾝｸﾞ</a>/<a href="?action_user_decomail=true">ﾃﾞｺﾒ</a>/<a href="?action_user_sound=true">着うた</a>/<a href="?action_user_game=true">ｹﾞｰﾑ</a>/<a href="fp.php?code=fortune_index">診断･占い</a></font><br>
</div>
<!--NEWS-->
<!-- napatoen -->

<!--エラーメッセージ表示開始-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div>
<!--エラーメッセージ表示終了-->

<!--コンテンツ開始-->
<!-- napatown strat -->
<div style="background-color:#ccffff; text-align:left;"><!--#CCDDFF-->
	<img src="img_napa/top/title_news.gif"><!--たいとる★NEWS-->
	<span style="font-size:xx-small; color:#AA0000">
		{if count($app.listview_data)}
			{foreach from=$app.listview_data item=news}
				■{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=top">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
</div>
<div style="background-color:#ccffff; text-align:right;">
	<a href="?action_user_news_list=true"><span style="font-size:xx-small; color:#5577CC">もっと見る</span></a></div>
<!--<img src="img_napa/top/sita_news.gif">下★NEWS-->

<!--◆◆ｹﾞｰﾑ◆◆-->
<div style="background-color:#ffdd99">
<img src="f.php?type=file&id=170"><!--<img src="img_napa/top/title_game.gif">--><!--たいとる★ゲーム-->
<!--<div style="background-color:#FFBB33; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
最強★定番ｹﾞｰﾑ</span></div>-->
<!--もちまるTouch!DEｹﾞｰﾑ-->


<table valign="top">
<tr align="center">
<td colspan="2">
<a href="?action_user_game=true"><span style="font-size:x-small;">荒野の早撃ちﾘﾎﾞﾙﾊﾞｰ</span></a><br />
</td></tr>
<tr>
<td width="60" height="60">
<img src="f.php?type=file&id=156"  width="60" height="60" style="float:left;">
</td>
<td>
<span style="font-size:xx-small">脅威のｽﾋﾟｰﾄﾞ[x:0151]ｶﾞﾝｱｸｼｮﾝ!(*'-')<助けてﾘﾎﾞﾙﾊﾞｰ!</span><br />
</td>
</tr>
<tr align="center">
<td colspan="2">
<a href="?action_user_game=true"><span style="font-size:x-small;">ｼﾞｭｴﾙｹﾞｯﾀｰ</span></a><br />
</td></tr>
<tr>
<td width="60" height="60">
<img src="f.php?type=file&id=158"  width="60" height="60" style="float:right;">
</td>
<td>
<span style="font-size:xx-small">魔法少女系横ｽｸﾛｰﾙ避けｼｭｰ!<br />ﾊｲｽｺｱを狙え!!</span><br /><br />
<div style="background-color:#ffdd99; text-align:right; font-size:xx-small;">
<a href="?action_user_game=true">もっとｹﾞｰﾑ[x:0771]</a>
</div>
</td>
</tr>
</table>
</div>
<!--<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=156"  width="100" height="100" style="float:left;">
</td>
<td>
<a href="?action_user_game=true"><div style="font-size:x-small;float:right;">荒野の早撃ちﾘﾎﾞﾙﾊﾞｰ</span></a><br />
</td>
</tr>
</table>
<span style="font-size:xx-small">脅威のｽﾋﾟｰﾄﾞ[x:0151]ｶﾞﾝｱｸｼｮﾝ!<br />(*'-')<助けてﾘﾎﾞﾙﾊﾞｰ!</span><br /><br />

<hr noshade color="#FFEECC">--><!--オレンジ罫線-->

<!--世界釣り紀行-->
<!--<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=158"  width="100" height="100" style="float:left;">
</td>
<td>
<a href="?action_user_game=true"><div style="font-size:x-small;float:right;">ｼﾞｭｴﾙｹﾞｯﾀｰ</span></a>
</td>
</tr>
</table>
<span style="font-size:xx-small">魔法少女系横ｽｸﾛｰﾙ避けｼｭｰ!<br />ﾊｲｽｺｱを狙え!!<br />

<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="?action_user_game=true">もっとｹﾞｰﾑ[x:0771]</a>
</div>-->

<!--◆◆診断・占い◆◆-->
<!--<div style="background-color:#9999EE; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
○占い・診断○</span></div>-->
<div style="background-color:#bdbded">
<img src="f.php?type=file&id=171">
<!--<img src="img_napa/top/title_uranai.gif">--><!--たいとる★占い-->
<!--<div style="background-color:#FFFFFF; text-align:left;">
<img src="f.php?type=file&id=163" style="float:left;">
<a href="fp.php?code=fortune_index"><span style="font-size:x-small;">あなたは何位？「異性にﾓﾃる星座」ﾗﾝｷﾝｸﾞ発表!!</span></a><br />
<span style="font-size:xx-small">新着!『異性にﾓﾃる星座』配信中</span><br />
</div>
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="fp.php?code=fortune_index">もっと診断･占い[x:0771]</a>
</div>-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=163" style="float:left;">
</td>
<td>
<a href="fp.php?code=fortune_index"><div style="font-size:x-small;float:right;">あなたは何位？「異性にﾓﾃる星座」ﾗﾝｷﾝｸﾞ発表!!</span></a>
</td>
</tr>
</table>

<span style="font-size:xx-small; color:#808000">新着!『異性にﾓﾃる星座』配信中</span><br />
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=fortune_index">もっと診断･占い[x:0771]</a>
</div></div>

<!--◆◆着うた◆◆-->
<!--<div style="background-color:#666666; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
♪着うた♪</span></div>-->
<div style="background-color:#dcdcdc">
<img src="f.php?type=file&id=172">
<!--<img src="img_napa/top/title_uta.gif">--><!--たいとる★着うた-->
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=162">
</div></td>
<td>
<div style="background-color:#dcdcdc; text-align:left;">
<a href="?action_user_sound=true"><span style="font-size:x-small; float:right">ナパタウン独占配信!!</span></a><br />

<span style="font-size:xx-small; color:#8b008b">
ﾛｯｸから癒しまで<br />ナパタウンだけのｵﾘｼﾞﾅﾙｻｳﾝﾄﾞ<br />
</span>
<span style="font-size:xx-small; color:#808080">
ﾛｯｸ/ﾎﾟｯﾌﾟ/ｼﾞｬｽﾞ/ﾋｰﾘﾝｸﾞ<br />環境音/動物･･･etc.
</span>
</td>
</tr>
</table>
<!--
<span style="font-size:small">♪Love Breeze <br />
♪Beat Is Rockin'<br />
♪TransOut <br />
</span>
-->
<div style="text-align:right; font-size:xx-small;">
<a href="?action_user_sound=true">もっと着うた[x:0771]</a>
</div></div>

<!--◆◆ショッピング◆◆>
<img src="img_napa/top/line01_pink.gif"><!--ライン★ピンク>
<div style="background-color:#FFEEEE; text-align:center;">
<img src="img_napa/top/logo_napa.gif"  width="146" height="80" border="1" /><br />
<a href="{$config.spgv_url}"><span style="font-size:x-small;">ﾅﾊﾟﾅﾊﾟﾏｰｹｯﾄ</span></a><br />
<span style="font-size:xx-small">☆売れ筋情報☆</span>
</div>

<!--商品1>
<div style="background-color:#FFEEEE; text-align:center;">
<img src="img_napa/top/napa_test1.gif"  width="100" height="50" style="float:left;">
<a href="{$config.spgv_url}"><span style="font-size:x-small;">xxxxxxxxxx</span></a><br />
<span style="font-size:xx-small">xxxxxxxxxxxxxxxxx</span><br /><br /><br />
<!--商品2>
<img src="img_napa/top/napa_test2.gif"  width="100" height="50" style="float:left;">
<a href="{$config.spgv_url}"><span style="font-size:x-small;">xxxxxxxxxx</span></a><br />
<span style="font-size:xx-small">xxxxxxxxxxxxxxxxx</span><br /><br /><br />
</div>
<div style="background-color:#FFEEEE; text-align:center; font-size:xx-small;">
<a href="{$config.spgv_url}">まだまだあります!<br />ﾒﾁｬ売れ商品</a>
</div>
<img src="img_napa/top/line01_pink.gif"><!--ライン★ピンク-->

<!--◆◆ｱﾊﾞﾀｰｼｮｯﾌﾟ◆◆ｰ-->
<!--<div style="background-color:#FFCC66; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
●ｱﾊﾞﾀｰｼｮｯﾌﾟ●</span></div>-->
<div style="background-color:#ffffcc">
<img src="f.php?type=file&id=168">
<!--<img src="img_napa/top/title_avatar.gif">--><!--たいとる★アバター-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=167">
<!--<img src="img_napa/top/avatar.gif" width="100" height="80" style="float:left;">-->
</td>
<td>
<a href="?action_user_avatar=true"><span style="font-size:x-small;float;right">ﾄﾚﾝﾄﾞｱｲﾃﾑでおしゃれにきせかえ☆</span></a>
<td>
</tr>
</table>
<br />
</div>
<!--◆◆ﾃﾞｺﾒ◆◆ｰ-->
<!--<div style="background-color:#FFAAAA; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
◆デコメ◆</span></div>-->
<div style="background-color:#ffaaaa">
<img src="f.php?type=file&id=169">
<!--<img src="img_napa/top/title_deco.gif">--><!--たいとる★DECO-->
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=166">
<!--<img src="img_napa/top/test5.gif" width="100" height="80" style="float:left;">-->
</td>
<td>
<a href="?action_user_decomail=true"><span style="font-size:x-small;float:right;">かわいいｷｬﾗｸﾀｰ<br />全部とり放題<br />大人気ぷちふる<br />ｷｬﾗがいっぱい</span></a>
</td>
</tr>
</table>
</div>

{$sns_navi_template}
<img src="img_napa/top/line01_blue.gif"><!--ライン★青-->
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="#d_top">上に戻る[x:0134]</a><br />
</div>

<div style="background-color:#FFFFFF; text-align:left; font-size:xx-small">
<span style="font-size:x-small; color:#CCDDFF">■</span><a href="fp.php?code=guide_terms">利用規約</a><br />
<span style="font-size:x-small; color:#BBCCFF">■</span><a href="fp.php?code=guide_policy">ﾌﾟﾗｲﾊﾞｼｰ保護の方針</a><br />
<!--<span style="font-size:x-small; color:#BBCCFF">■</span><a href="fp.php?code=guide_qa">Q&amp;A</a><br />-->
<span style="font-size:x-small; color:#AABBFF">■</span><a href="fp.php?code=guide_inquiry">問い合わせ</a><br>
<span style="font-size:x-small; color:#99AAFF">■</span><a href="?action_user_config=true">設定</a><br>

<span style="font-size:x-small; color:#8899FF">■</span><a href="fp.php?code=guide_device2">対応機種一覧</a><br />
<span style="font-size:x-small; color:#7788FF">■</span><a href="fp.php?code=guide_point">ﾅﾊﾟﾎﾟの集め方</a><br />
<!--<span style="font-size:x-small; color:#6677FF">■</span><a href="?action_user_home=true">ﾏｲﾍﾟｰｼﾞ</a><br>-->

<span style="font-size:x-small; color:#5566FF">■</span><a href="?action_user_invite=true">友達招待</a><br>
<span style="font-size:x-small; color:#4455FF">■</span><a href="?action_user_logout_do=true">ﾛｸﾞｱｳﾄ</a><br>
{if $session.user.user_id && !$app.logout}
<span style="font-size:x-small; color:#4455FF">■</span><a href="?action_user_resign_confirm=true">退会</a><br>
{/if}
<!-- napatown footer end -->
</div>

<!--フッター-->
{include file="user/footer.tpl" no_navi=true}
