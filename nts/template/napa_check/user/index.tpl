<!--ヘッダ 非会員TOPー-->
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
		[x:0037]<a href="?action_user_home=true">ﾏｲﾍﾟｰｼﾞ</a>[x:0037]<br />
		[x:0105]<a href="?action_user_invite=true">友達招待</a>[x:0105]<br /><br />
	{else}
		<!--ログイン開始-->
		<div align="center" style="text-align:center;font-size:small;">
			<img src="f.php?type=file&id=188">[x:0107]<a href="fp.php?code=guide_mail"><span style="color:{$menucolor};">無料会員登録</span></a>[x:0107]<img src="f.php?type=file&id=187">
		</div>

<div align="center" style="text-align:center;font-size:small;">
[<a href="?action_user_login_do=true&easy_login=true&guid=ON">会員ﾛｸﾞｲﾝ[x:0138]</a>]</div>
</table>
<!--ﾛｸﾞｲﾝできない方は<a href="?action_user_login=true">ｺﾁﾗ</a>-->

		<!--ログイン終了-->
	{/if}
<!--<font size="1"><a href="http://m.napatown.jp/?guid=ON&autologin=true">ｼｮｯﾋﾟﾝｸﾞ</a>/<a href="fp.php?code=guide_mail">ﾃﾞｺﾒ</a>/<a href="fp.php?code=guide_mail">着うた</a>/<a href="fp.php?code=guide_mail">ｹﾞｰﾑ</a>/<a href="fp.php?code=guide_mail">診断･占い</a></font><br>-->
</div>
<!--NEWS-->
<!-- napatoen -->

<!--エラーメッセージ表示開始-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div></div>
<!--エラーメッセージ表示終了-->

<!--コンテンツ開始-->
<!-- napatown strat -->
<div style="background-color:#ccffff; text-align:left;"><!--#CCDDFF-->
	<img src="img_napa/top/title_news.gif"><!--たいとる★NEWS-->
	<span style="font-size:xx-small; color:#AA0000">
		{if count($app.listview_data)}
			{foreach from=$app.listview_data item=news}
				■{$news.news_time}<a href="fp.php?code=guide_mail">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
<div style="background-color:#ccffff; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">もっと見る</a>[x:0771]
</div>

<!--◆◆ｱﾊﾞﾀｰｼｮｯﾌﾟ◆◆ｰ-->
<div style="background-color:#ffffcc">
<img src="f.php?type=file&id=192">
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=167">
</div></td>
<td>
<a href="fp.php?code=guide_mail">
<span style="font-size:x-small;float:right;">おしゃれにきせかえ☆</span></a><br />
<span style="font-size:xx-small;">
自分らしさ[x:0156]で選べる[x:0159]<br />ﾄﾚﾝﾄﾞｱｲﾃﾑ[x:0160]から着ぐるみ[x:0214]まで!</span>
</td>
</tr>
</table>
<div style="background-color:#ffffcc; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">もっとｱﾊﾞﾀｰ</a>[x:0771]
</div>

<!--◆◆診断・占い◆◆-->
<div style="background-color:#bdbded">
<img src="f.php?type=file&id=195">
<table valign="top">
<tr>
<td>
<div style="float:left; background-color:#bdbded">
<img src="f.php?type=file&id=163" style="float:left;">
</div>
</td>

<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;float:right;">あなたは何位?｢異性にﾓﾃる星座｣ﾗﾝｷﾝｸﾞ発表!!</span></a><br />
<span style="font-size:xx-small; color:#808000">『異性にﾓﾃる星座』配信中</span><br />
</td>
</tr>
</table>


<div style="background-color:#bdbded; text-align:right; font-size:xx-small; background-color:#bdbded">
<a href="fp.php?code=guide_mail">もっと診断･占い</a>[x:0771]
</div>


<!--◆◆着うた◆◆-->
<div style="background-color:#dcdcdc; text-align:left;">
<img src="f.php?type=file&id=172">
<table valign="top">
<tr>
<td width="50" height="50">
<div style="float:left;">
<img src="f.php?type=file&id=162" width="50" height="50">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small; float:right">ナパタウン独占配信!!</span></a><br />
<span style="font-size:xx-small; color:#8b008b">
ﾛｯｸから癒しまで<br />ｺｺだけのｵﾘｼﾞﾅﾙｻｳﾝﾄﾞ<br />
</span>
<span style="font-size:xx-small; color:#808080">
ﾛｯｸ/ﾎﾟｯﾌﾟ/ｼﾞｬｽﾞ/ﾋｰﾘﾝｸﾞ･･etc<br />
</span>
</td>
</tr>
</table>
<div style="background-color:#dcdcdc; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">もっと着うた</a>[x:0771]
</div>

<!--◆◆ｹﾞｰﾑ◆◆-->
<div style="background-color:#ffdd99">
<img src="f.php?type=file&id=194">

<table valign="top">
<tr>
<td width="65" height="65">
<img src="f.php?type=file&id=156" width="65" height="65" style="float:left;">
</td>
<td>
<span style="font-size:xx-small"><a href="fp.php?code=guide_mail">荒野の早撃ちﾘﾎﾞﾙﾊﾞｰ</a><br />
脅威のｽﾋﾟｰﾄﾞ[x:0151]<br />ｶﾞﾝｱｸｼｮﾝ!<br />(*'-')<助けてﾘﾎﾞﾙﾊﾞｰ!</span><br />
</td>
</tr>
</table>
<div style="background-color:#ffdd99; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">もっとｹﾞｰﾑ</a>[x:0771]
</div>


<!--◆◆ﾃﾞｺﾒ◆◆ｰ-->
<div style="background-color:#ffaaaa">
<img src="f.php?type=file&id=193">
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=166">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;float:right">
全部とり放題</span></a><br />
<span style="font-size:xx-small;">
大人気[x:0085]ぷちふるｷｬﾗのｶﾜｲｲ[x:0183]がいっぱい[x:0200]</span>
</td>
</tr>
</table>
<div style="background-color:#ffaaaa; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">もっとﾃﾞｺﾒ</a>[x:0771]
</div>
</div>
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">

<img src="img_napa/top/line01_blue.gif"><!--ライン★青-->
<a name="d_category" id="d_category">
<div style="background-color:#AABBFF; text-align:center;"><!--#88ddee-->
<span style="font-size:small; color:#FFFFFF">
■ｶﾃｺﾞﾘ■</span>
</div>
<div style="background-color:#CCDDFF; text-align:left; font-size:xx-small"><!--#ccffff-->
<a href="http://m.napatown.jp/?guid=ON&autologin=true"><span style="font-size:xx-small; color:#ff1493">ｼｮｯﾋﾟﾝｸﾞ</span></a><span style="font-size:xx-small; color:#ffffff">　</span>:<span style="font-size:xx-small; color:#886666">ｳｷｳｷお買い物♪</span><br />
<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#8a2be2">着うた</span></a><span style="font-size:xx-small; color:#ffffff">　　</span>:<span style="font-size:xx-small; color:#886666">流行ｻｳﾝﾄﾞ</span><br />


<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:red">ｱﾊﾞﾀｰ</span></a><span style="font-size:xx-small; color:#ffffff">　　 </span>:<span style="font-size:xx-small; color:#886666">ｵｼｬﾚ服ｲｯﾊﾟｲ</span><br />


<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#ffa500">ｹﾞｰﾑ</span></a><span style="font-size:xx-small; color:#ffffff">　　　</span>:<span style="font-size:xx-small; color:#886666">楽しさしみこむ</span><br />

<!--
<a href="http://m.panatown.jp/?guid=ON"><span style="font-size:xx-small; color:#808000">ショップ</span></a>
<span style="font-size:xx-small; color:#ffffff">　</span>:
<span style="font-size:xx-small; color:#886666">お得情報</span><br />
-->


<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#113366">診断・占い</span></a>:<span style="font-size:xx-small; color:#886666">意外な真実が!?</span><br />


<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#ff69b4">ﾃﾞｺﾒ</span></a><span style="font-size:xx-small; color:#ffffff">　　　</span>:<span style="font-size:xx-small; color:#886666">全部とり放題</span><br />
</div>
<img src="img_napa/top/line01_blue.gif"><!--ライン★青-->
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<img src="f.php?type=file&id=190"><a href="#d_top">上に戻る[x:0134]</a><br />
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

<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
{/if}
<!-- napatown footer end -->
</div>

<!--フッター-->
{include file="user/footer.tpl" no_navi=true}

</div>