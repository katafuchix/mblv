<!--ヘッダ 非会員TOPー--> {include file="user/header.tpl" title="ｱﾊﾞﾀｰ,ｱﾊﾞﾀｰ素材のﾅﾊﾟﾀｳﾝTOP" bgcolor="#FFFFFF" 
text="#666666" link="#0099FF" vlink="#6666FF"} 
<!-- napatown -->
<a name="d_top" id="d_top"></a> 
<!--topロゴ-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=268" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,TOPﾛｺﾞ">
	<!--<img src="img_napa/top/logo_napatown.jpg" width="240" height="70" border="0" />--><br />
	<!--広告ﾊﾞﾅｰ-->
	{ad type="index"}
	{if $session.user.user_id && !$app.logout}
		[x:0037]<a href="?action_user_home=true">ﾏｲﾍﾟｰｼﾞ</a>[x:0037]<br />
		[x:0105]<a href="?action_user_invite=true">友達招待</a>[x:0105]<br /><br />
	{else}
		<!--ログイン開始-->
		
  <div align="center" style="text-align:center;font-size:small;"> [x:0107]<a href="fp.php?code=guide_mail"><span style="color:{$menucolor};">無料会員登録</span></a>[x:0107] 
  </div>

<div align="center" style="text-align:center;font-size:small;">
[<a href="http://c.napatown.jp/fp.php?action_user_login_do=true&easy_login=true&guid=ON">会員ﾛｸﾞｲﾝ[x:0138]</a>]</div>

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
</div>
<!--エラーメッセージ表示終了-->

<!--コンテンツ開始-->
<!-- napatown strat -->
<div style="text-align:left;"> 
<!--
<div style="text-align:center;"><img src="f.php?type=file&id=210" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾅﾊﾟﾀｳﾝﾆｭｰｽ"></div>-->
  <!--たいとる★NEWS-->
<!--<span style="font-size:xx-small; color:#3333CC"> {if count($app.listview_data)} 
  {foreach from=$app.listview_data item=news} ■{$news.news_time}<a href="fp.php?code=guide_mail">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">もっと見る</a>[x:0771]
	<div style="text-align:center;"><img src="f.php?type=file&id=221" width="240" height="10" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾆｭｰｽﾛｺﾞ"></div>
</div>-->

<!--◆◆特集◆◆-->
<div style="text-align:center;"><img src="f.php?type=file&id=251" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,PickUp!"></div>
  <div style="text-align:center;"> <span style="font-size:xx-small"> </span> <a href="http://m.napatown.jp/?guid=ON&autologin=true"><span style="font-size:xx-small;">[x:0201]ナパタウンマーケット[x:0201]</span><br />
    <img src="f.php?type=file&id=271" width="150" height="30" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾅﾊﾟﾀｳﾝﾏｰｹｯﾄ"></a><br />
    <span style="font-size:xx-small; color:#808080">ｾｰﾙ開催中!!</span><br />
    <div style="text-align:center;"><img src="f.php?type=file&id=272" width="150" height="3" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,Pickupﾌﾞﾗﾝｸ"></div>
    <a href="http://m.napatown.jp/?action_mall_shop=true&shop_id=1"><span style="font-size:xx-small;">[x:0138]ﾁｬｰﾐﾝﾛｰｽﾞ[x:0138]</span><br />
    <img src="f.php?type=file&id=270" width="150" height="30" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾊﾟﾜｰｽﾄｰﾝのﾁｬｰﾐﾝﾛｰｽﾞ"></a><br />
    <span style="font-size:xx-small; color:#808080">願いを叶えて☆ﾊﾟﾜｰｽﾄｰﾝ!!</span><br />
  </div>
    <div style="text-align:right; font-size:xx-small;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>
  <!--◆◆ｱﾊﾞﾀｰｼｮｯﾌﾟ◆◆ｰ-->
  <div style="text-align:center;"><img src="f.php?type=file&id=252" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｱﾊﾞﾀｰﾛｺﾞ"></div>
  <table valign="top">
    <tr>
      <td> <img src="f.php?type=file&id=259" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｱﾊﾞﾀｰ"> 
      </td>
      <td> <a href="fp.php?code=about_avatar"> <span style="font-size:x-small;">ｱﾊﾞﾀｰって?</span></a><br />
        <span style="font-size:xx-small; color:#808080">自分らしさ[x:0156]で選べる[x:0159]<br />
        ﾄﾚﾝﾄﾞｱｲﾃﾑ[x:0160]から着ぐるみ[x:0214]まで!</span> </td>
    </tr>
  </table>
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=intro_avatar">もっとｱﾊﾞﾀｰ</a>[x:0771]
</div>

<!--◆◆診断・占い◆◆-->
    <div style="text-align:center;"><img src="f.php?type=file&id=257" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,診断･占いﾛｺﾞ"></div>
    
  <table valign="top">
    <tr>
      <td> <img src="f.php?type=file&id=265" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,診断･占い"> 
      </td>
      <td> <a href="fp.php?code=intro_fortune"><span style="font-size:x-small;float:">有名占い師監修の診断･占いが全部無料!!</span></a><br />
        <span style="font-size:xx-small; color:#808080">生まれ持ったあなたの運命は?<br>
        秘めた力を引き出すﾊﾟﾜｰｽﾄｰﾝも販売中!!</span><br />
      </td>
    </tr>
  </table>


  <div style="text-align:right; font-size:xx-small;"> <a href="fp.php?code=intro_fortune">もっと診断･占い</a>[x:0771] 
    <div style="text-align:right; font-size:xx-small;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>
  </div>


<!--◆◆着うた◆◆-->
  <div style="text-align:left;"> 
    <div style="text-align:center;"><img src="f.php?type=file&id=258" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,着うたﾛｺﾞ"></div>
    <table valign="top">
<tr>
<td width="50" height="50">
<div style="float:left;">
<img src="f.php?type=file&id=266" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,着うたｲﾒｰｼﾞ">
</div></td>
<td>
<a href="fp.php?code=intro_sound"><span style="font-size:x-small;">ナパタウン独占配信!!</span></a><br />
          <span style="font-size:xx-small; color:#808080">ﾛｯｸから癒しまでｺｺだけのｵﾘｼﾞﾅﾙｻｳﾝﾄﾞ<br />
ﾛｯｸ/ﾎﾟｯﾌﾟ/ｼﾞｬｽﾞ/ﾋｰﾘﾝｸﾞ･･etc<br />
</span>
</td>
</tr>
</table>
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=intro_sound">もっと着うた</a>[x:0771]
</div>

<!--◆◆ｹﾞｰﾑ◆◆-->
      <div style="text-align:center;"><img src="f.php?type=file&id=269" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｹﾞｰﾑﾛｺﾞ"></div>
      
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=263" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｹﾞｰﾑ"> 
        </td>
        <td> <a href="fp.php?code=intro_game"><span style="font-size:x-small;"> 荒野の早撃ちﾘﾎﾞﾙﾊﾞｰ</span></a><br />
          <span style="font-size:xx-small; color:#808080">脅威のｽﾋﾟｰﾄﾞ[x:0151]ｶﾞﾝｱｸｼｮﾝ!(*'-')&lt;助けてﾘﾎﾞﾙﾊﾞｰ!</span><br />
        </td>
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"> <a href="fp.php?code=intro_game">もっとｹﾞｰﾑ</a>[x:0771] 
      <div style="text-align:right; font-size:xx-small;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>
    </div>
	
	
    <!--◆◆ﾃﾞｺﾒ◆◆ｰ-->
      <div style="text-align:center;"><img src="f.php?type=file&id=254" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾃﾞｺﾒﾛｺﾞ"></div>
      
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=262" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ﾃﾞｺﾒ"> 
        </td>
        <td> <a href="fp.php?code=intro_deco"><span style="font-size:x-small;"> 
          かわいいｷｬﾗｸﾀｰがｲｯﾊﾟｲ</span></a><br />
          <span style="font-size:xx-small; color:#808080">美味しそうな絵文字が食べ放題<blink><span style="; color:#FF0000">(取り放題)</span></blink></span> 
        </td>
      </tr>
    </table>
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=intro_deco">もっとﾃﾞｺﾒ</a>[x:0771]
</div>
</div>
<div align="left" style="text-align:left;font-size:small;">


    <!--◆◆ショッピング◆◆ｰ-->
      <div style="text-align:center;"><img src="f.php?type=file&id=256" width="240" height="20" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｼｮｯﾋﾟﾝｸﾞﾛｺﾞ"></div>
      
    <table valign="top">
      <tr> 
        <td> <img src="f.php?type=file&id=276" width="50" height="50" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｼｮｯﾋﾟﾝｸﾞ"> 
        </td>
        <td> <span style="font-size:xx-small; color:#808080"><a href="http://m.napatown.jp/?action_mall_item=true&item_id=9"><span style="font-size:x-small;">ﾀｲｶﾞｰｱｲ&ﾋﾏﾗﾔ水晶のﾌﾞﾚｽ</span></a><br />
          ﾋﾞｼﾞﾈｽで成功したい人､金運を上げたい人にｵｽｽﾒのﾌﾞﾚｽ!!<br />
        </td>
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"><a href="http://m.napatown.jp/?guid=ON&autologin=true">もっとお買い物</a>[x:0771] 
      <div style="text-align:right; font-size:xx-small;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>
    </div>
</div>
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">


<img src="img_napa/top/line01_blue.gif" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｱﾊﾞﾀｰﾗｲﾝ"><!--ライン★青-->
<a name="d_category" id="d_category"></a>
<div style="background-color:#AABBFF; text-align:center;"><!--#88ddee-->
<span style="font-size:small; color:#FFFFFF">
■ｶﾃｺﾞﾘ■</span>
</div>
<div style="background-color:#CCDDFF; text-align:left; font-size:xx-small"><!--#ccffff-->
<a href="http://m.napatown.jp/?guid=ON&autologin=true"><span style="font-size:xx-small; color:#ff1493">ｼｮｯﾋﾟﾝｸﾞ</span></a><span style="font-size:xx-small; color:#ffffff">　</span>:<span style="font-size:xx-small; color:#886666">ｳｷｳｷお買い物♪</span><br />
<a href="fp.php?code=intro_sound"><span style="font-size:xx-small; color:#8a2be2">着うた</span></a><span style="font-size:xx-small; color:#ffffff">　　</span>:<span style="font-size:xx-small; color:#886666">流行ｻｳﾝﾄﾞ</span><br />


<a href="fp.php?code=intro_avatar"><span style="font-size:xx-small; color:red">ｱﾊﾞﾀｰ</span></a><span style="font-size:xx-small; color:#ffffff">　　 </span>:<span style="font-size:xx-small; color:#886666">ｵｼｬﾚ服ｲｯﾊﾟｲ</span><br />


<a href="fp.php?code=intro_game"><span style="font-size:xx-small; color:#ffa500">ｹﾞｰﾑ</span></a><span style="font-size:xx-small; color:#ffffff">　　　</span>:<span style="font-size:xx-small; color:#886666">楽しさしみこむ</span><br />

<!--
<a href="http://m.panatown.jp/?guid=ON"><span style="font-size:xx-small; color:#808000">ショップ</span></a>
<span style="font-size:xx-small; color:#ffffff">　</span>:
<span style="font-size:xx-small; color:#886666">お得情報</span><br />
-->


<a href="fp.php?code=intro_fortune"><span style="font-size:xx-small; color:#113366">診断・占い</span></a>:<span style="font-size:xx-small; color:#886666">意外な真実が!?</span><br />


<a href="fp.php?code=intro_deco"><span style="font-size:xx-small; color:#ff69b4">ﾃﾞｺﾒ</span></a><span style="font-size:xx-small; color:#ffffff">　　　</span>:<span style="font-size:xx-small; color:#886666">全部とり放題</span><br />
</div>
    <img src="img_napa/top/line01_blue.gif" alt="ｱﾊﾞﾀｰならﾅﾊﾟﾀｳﾝ,ｱﾊﾞﾀｰﾗｲﾝ">
    <!--ライン★青-->
    <div style="text-align:right; font-size:xx-small;"><a href="#d_top">▲ﾍﾟｰｼﾞﾄｯﾌﾟへ</a></div>
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
      {if $session.user.user_id && !$app.logout} <span style="font-size:x-small; color:#3366FF">■</span><a href="?action_user_resign_confirm=true">退会</a><br>

<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
{/if}
<!-- napatown footer end -->
</div>

<!--フッター-->
{include file="user/footer.tpl" no_navi=true}

</div></div></div>