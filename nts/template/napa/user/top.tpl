<!--ヘッダ 会員TOPー--> {include file="user/header.tpl" title="ｱﾊﾞﾀｰ,ｱﾊﾞﾀｰ素材のﾅﾊﾟﾀｳﾝTOP" bgcolor="#FFFFFF" 
text="#666666" link="#0099FF" vlink="#6666FF"} 
<!-- napatown -->
<a name="d_top" id="d_top"></a> 
<!--topロゴ-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=165" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,TOPﾛｺﾞ">
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
			ﾛｸﾞｲﾝできない方は<a href="?action_user_login=true">ｺﾁﾗ</a><br />
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
<div style="text-align:left;background-color:#FFFFCC;"><!--#CCDDFF-->
    <!--<div style="background-color:#3366FF; text-align:center;">お知らせ</div>-->
    <img src="f.php?type=file&id=210" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,TOPﾛｺﾞ">
    <!--たいとる★NEWS-->
    <span style="font-size:xx-small; color:#003399"> {if count($app.listview_data)} 
    {foreach from=$app.listview_data item=news} ■{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=top">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
<div style="text-align:right;">
	<a href="?action_user_news_list=true"><span style="font-size:xx-small;">もっと見る[x:0771]</span></a><img src="f.php?type=file&id=221" width="240" height="10" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾆｭｰｽﾛｺﾞ"></div>
</div>
<!--<img src="img_napa/top/sita_news.gif">下★NEWS-->

<!--◆◆特集◆◆-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">特集</span></div>-->
<!--<img src="f.php?type=file&id=211" width="240" height="20">
<div style="text-align:left;">
<table valign="top">
<tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50"> </td>
      <td> <span style="font-size:xx-small"><a href=""><span style="font-size:x-small;">七夕特集</span></a><br />
七夕ﾃﾞｺﾒｹﾞｯﾄだぜ!!</span><br />
</td>
</tr>
</table></div>
-->
<!--◆◆ｺﾐｭﾆﾃｨ◆◆-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">コミュニティ</span></div>-->
  <img src="f.php?type=file&id=212" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｺﾐｭﾆﾃｨﾛｺﾞ">
<div style="text-align:left;">
    <table valign="top">
      <tr> 
        <td> <img src="f.php?type=file&id=219" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,水谷奏音ｺﾐｭﾆﾃｨ"> </td>
        <td> <span style="font-size:xx-small"><a href="?action_user_community_view=true&community_id=7"><span style="font-size:x-small;">女の幸せ力検定★公式ｺﾐｭﾆﾃｨ</span></a><br />
          ﾊﾟﾜｰｽﾄｰﾝ大好きな人集まれ!<br>
          ｽﾄｰﾝｾﾗﾋﾟｽﾄ・水谷奏音先生の公認ｺﾐｭﾆﾃｨ。</span><br />
        </td>
      </tr>
      <tr>
        <td> <img src="f.php?type=file&id=220" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,桜倉ｹﾝｺﾐｭﾆﾃｨ"> </td>
        <td> <span style="font-size:xx-small"><a href="?action_user_community_view=true&community_id=6"><span style="font-size:x-small;">桜倉ｹﾝの占い公式ｺﾐｭﾆﾃｨ</span></a><br />
          びっくりするほどｲｹﾒﾝなのに､占いは超本格派!<br />
		  ｲｹﾒﾝ占い師･桜倉ｹﾝの公式ｺﾐｭﾆﾃｨ｡</span><br />
        </td>
      </tr>
    </table>
    <div style="text-align:right;"> <a href="?action_user_community_search=true"><span style="font-size:xx-small;">ｺﾐｭﾆﾃｨ検索[x:0771]</span></a></div>
  </div>

<!--◆◆ｹﾞｰﾑ◆◆-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">ゲーム</span></div>-->
<img src="f.php?type=file&id=213" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｹﾞｰﾑﾛｺﾞ">

<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｹﾞｰﾑ"> </td>
        <td> <span style="font-size:xx-small"><a href="?action_user_game=true"><span style="font-size:x-small;">荒野の早撃ちﾘﾎﾞﾙﾊﾞｰ</span></a><br />
          脅威のｽﾋﾟｰﾄﾞ[x:0151]ｶﾞﾝｱｸｼｮﾝ!(*'-')&lt;助けてﾘﾎﾞﾙﾊﾞｰ!</span><br />
        </td>
      </tr>
    </table>
    <div style="text-align:right;"> <a href="?action_user_game=true"><span style="font-size:xx-small;">もっとｹﾞｰﾑ[x:0771]</span></a></div>
	<div style="text-align:right;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>
  </div>

<!--◆◆診断・占い◆◆-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">診断･占い</span></div>-->
<img src="f.php?type=file&id=214" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,診断･占いﾛｺﾞ"><!--たいとる★占い-->

<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=222" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,診断･占い"> </td>
        <td> 
          <div style="font-size:x-small;float:right;"><a href="fp.php?code=fortune_woman_index">女の幸せ力検定</a><br />
            <span style="font-size:xx-small; color:#808080">あなたは｢貯められる｣女?｣<br />
			どうしても貯金できない! 給料日前になると不安…<br />
節約する? いっそ諦める?</span>  </div>
        </td>
      </tr>
    </table>
  </div>

<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=fortune_index">もっと診断･占い[x:0771]</a>
</div>

<!--◆◆着うた◆◆-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">着うた</span></div>-->
<img src="f.php?type=file&id=215" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,着うたﾛｺﾞ">
<!--たいとる★着うた-->
<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=223" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,着うた"> </td>
        <td> 
          <div style="text-align:left;"> <a href="?action_user_sound=true"><span style="font-size:x-small;">ナパタウン独占配信!!</span></a><br />
            <span style="font-size:xx-small;color:#808080"> ﾛｯｸから癒しまで ナパタウンだけのｵﾘｼﾞﾅﾙｻｳﾝﾄﾞ<br />
            ﾛｯｸ/ﾎﾟｯﾌﾟ/ｼﾞｬｽﾞ/ﾋｰﾘﾝｸﾞ/環境音/動物･･･etc. </span></div>
        </td>
      </tr>
    </table>
</div>
<!--
<span style="font-size:small">♪Love Breeze <br />
♪Beat Is Rockin'<br />
♪TransOut <br />
</span>
-->
<div style="text-align:right; font-size:xx-small;">
<a href="?action_user_sound=true">もっと着うた[x:0771]</a>
</div>
<div style="text-align:right;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>


<!--◆◆ｱﾊﾞﾀｰｼｮｯﾌﾟ◆◆ｰ-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">アバター</span></div>-->
<img src="f.php?type=file&id=216" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｱﾊﾞﾀｰﾛｺﾞ">
<!--たいとる★アバター-->

<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｱﾊﾞﾀｰ"> </td>
        <td> <a href="?action_user_avatar=true"><span style="font-size:x-small;float;right">ﾄﾚﾝﾄﾞｱｲﾃﾑでおしゃれにきせかえ☆</span></a> 
        <td> 
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"> <a href="?action_user_avatar=true">もっとｱﾊﾞﾀｰ[x:0771]</a> 
    </div>
  </div>

  <!--◆◆ﾃﾞｺﾒ◆◆ｰ-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">デコメ</span></div>-->
<img src="f.php?type=file&id=217" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾃﾞｺﾒﾛｺﾞ">
<!--たいとる★DECO-->
<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾃﾞｺﾒ"> </td>
        <td> <span style="font-size:x-small;float:right;"><a href="?action_user_decomail=true">かわいいｷｬﾗｸﾀｰ全部とり放題</a><br />
          大人気ぷちふるｷｬﾗがいっぱい</span> </td>
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"> <a href="?action_user_decomail=true">もっとﾃﾞｺﾒ[x:0771]</a>
    </div>
	<div style="text-align:right;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>
  </div>
  <!--◆◆ショッピング◆◆-->
  <!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">お買い物</span></div>-->
  <img src="f.php?type=file&id=218" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｼｮｯﾋﾟﾝｸﾞﾛｺﾞ"> 
  <div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｼｮｯﾋﾟﾝｸﾞ"> </td>
        <td> <span style="font-size:xx-small"><a href="http://m.napatown.jp/?guid=ON&autologin=true"><span style="font-size:x-small;">ｵｽｽﾒの商品</span></a><br />
          今売れてるのはこの商品だ!<br />
          みんな急げ!</span><br />
        </td>
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"> <a href="http://m.napatown.jp/?guid=ON&autologin=true">ナパタウンマーケットへ[x:0771]</a> 
    </div>
  </div>
<br />


<!--◆◆ぷちDECOアニメ誘導◆◆ｰ-->
<div style="text-align:center; font-size:xx-small">
<a href="http://anime.puchifuru.jp"><img src="f.php?type=file&id=206" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾃﾞｺｱﾆﾒ"></a><br />
ﾄﾞｺﾓ専用[xf:0138]906i/706i対応ｻｲﾄ<br />進化したﾃﾞｺﾒって?
</div>


<!--タイトル-->
{html_style type="title" title="ナパ☆コラム" bgcolor=#fa6b73 fontcolor=#ffffff}

<!--ゲストユーザーの最新日記開始-->
<div align="left" style="text-align:left;font-size:small;">
	{*ゲストユーザーの最新日記を5件まで表示します*}
	{foreach from=$app.whole_blog_article_list item=item name=blog key =k}
			<div align="left" style="text-align:left;float:left;">
				{if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" /-->
				{else}
					{if $item.user_image_id}
					<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
					{/if}
				{/if}
				<span>
					<span style="color:{$timecolor};">{$item.blog_article_created_time|jp_date_format:"%m/%d (%a) %H:%M"}</span><br />
					<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}({$item.blog_article_comment_num})</a>
					({$item.user_nickname}さん)
				</span>
			</div>
			{html_style type="line" color="gray"}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			まだありません。<br />
		</div>
	{/foreach}{$key}
	{if $app.whole_blog_article_list && $k >=4}
		<div align="right" style="text-align:right;font-size:small;">
			&nbsp;→<a href="?action_user_blog_article_whole=true&guest=true">もっと見る</a>[x:0082]
		</div>
		{html_style type="line" color="gray"}
	{/if}
</div>
<!--ゲストユーザーの最新日記終了-->



{$sns_navi_template}
<img src="img_napa/top/line01_blue.gif" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾗｲﾝ"><!--ライン★青-->
<div style="text-align:right;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>

  <div style="background-color:#FFFFFF; text-align:left; font-size:xx-small"> <span style="font-size:x-small; color:#3366FF">■</span><a href="fp.php?code=guide_terms">利用規約</a><br />
    <span style="font-size:x-small; color:#3366FF">■</span><a href="fp.php?code=guide_policy">ﾌﾟﾗｲﾊﾞｼｰ保護の方針</a><br />
    <!--<span style="font-size:x-small; color:#BBCCFF">■</span><a href="fp.php?code=guide_qa">Q&amp;A</a><br />-->
    <span style="font-size:x-small; color:#3366FF">■</span><a href="fp.php?code=guide_inquiry">問い合わせ</a><br>
    <span style="font-size:x-small; color:#3366FF">■</span><a href="?action_user_config=true">設定</a><br>
    <span style="font-size:x-small; color:#3366FF">■</span><a href="fp.php?code=guide_device2">対応機種一覧</a><br />
    <span style="font-size:x-small; color:#3366FF">■</span><a href="fp.php?code=guide_point">ﾅﾊﾟﾎﾟの集め方</a><br />
    <!--<span style="font-size:x-small; color:#6677FF">■</span><a href="?action_user_home=true">ﾏｲﾍﾟｰｼﾞ</a><br>-->
    <span style="font-size:x-small; color:#3366FF">■</span><a href="?action_user_invite=true">友達招待</a><br>
    <span style="font-size:x-small; color:#3366FF">■</span><a href="?action_user_logout_do=true">ﾛｸﾞｱｳﾄ</a><br>
{if $session.user.user_id && !$app.logout}
<span style="font-size:x-small; color:#3366FF">■</span><a href="?action_user_resign_confirm=true">退会</a><br>
{/if}
<!-- napatown footer end -->
</div></div>

<!--フッター-->
{include file="user/footer.tpl" no_navi=true} 