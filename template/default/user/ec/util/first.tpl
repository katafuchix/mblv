<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="初めての方" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
<a name="TOP"></a>

<div align="left" style="text-align:left;font-size:small;">

<font color="red">※</font>ご利用の前に必ずお読み下さい。<br />
<font color="blue">┣</font><a href="#mall">{$mall_name}とは?</a><br />
<font color="blue">┣</font><a href="#search">欲しい商品を探してみよう!</a><br />
<font color="blue">┣</font><a href="#try">買ってみよう!</a><br />
<font color="blue">┣</font><a href="#register">会員登録!</a><br />
<font color="blue">┗</font><a href="#mail">ﾒﾙﾏｶﾞでもっとお得!</a>

<br /><br />
<div align="center">
------------------
</div>

<a name="mall" id="mall"></a><br />
    <font color="green" size="3">[x:0068]</font><font color="#CC0000" size="3">{$mall_name}とは?</font> 
    <hr>

    はじめての方でも安心して楽しめるｻｰﾋﾞｽがいっぱいのｼｮｯﾋﾟﾝｸﾞｻｲﾄです。<br />
<!--欲しい商品を探してみよう!-->

<a name="search" id="search"></a><br />
<font color="blue">[x:0111]</font>欲しい商品を探してみよう!
<hr>

[x:0115]ｼｮｯﾌﾟから探す<br />
ﾊﾟﾜｰｽﾄｰﾝ､ﾌｧｯｼｮﾝ､家電･･･興味があるｼｮｯﾌﾟをｸﾘｯｸして､商品を絞り込むことができます｡

    <div align="center"> <blink><font color="blue">&lt;&lt;</font></blink><a href="?action_user_ec=true" accesskey="0">{$mall_name}からｼｮｯﾌﾟを探す</a><blink><font color="blue">&gt;&gt;</font></blink> 
    </div>

<br />

[x:0116]検索して探す<br />
気になるﾜｰﾄﾞを検索BOXに入れて検索ﾎﾞﾀﾝを押すだけで､商品の中から関連する商品を探すことができます｡<br /><br />

<!--検索窓-->
<div align="center">
<font color="orange"><blink>↓</blink> 早速探してみる <blink>↓</blink></font>
<form action="index.php" method="post"><input type="hidden" name="action_user_ec_item_list" value="true">	
		<input type="text" name="keyword" size="14">

		<input type="submit" name="submit" value="検索">

</form>
</div>

[x:0117]特集から探す<br />
{$mall_name}では､お得な商品や今話題の商品を集めた特集ｺｰﾅｰがたくさん!!<br />
お得に商品をGETしたいならｺｺ!!


<div align="right">
<a href="#TOP">▲ﾍﾟｰｼﾞTOPへ</a>
</div>


<!--買ってみよう!-->

<a name="try" id="try"></a><br />
    <font color="#FF94E1" size="3">[x:0086]</font><font color="#CC0000" size="3">買ってみよう! 
    </font> 
    <hr>

[x:0162]送料･お支払方法<br />
送料は商品によって異なります｡<br />
中には､送料無料の商品もありますのでお見逃しなく!!<br />
    決済方法は以下の中から選択することができます｡<br />

    <br />


・<a href="fp.php?code=system_ec_paycredit">ｸﾚｼﾞｯﾄｶｰﾄﾞ決済</a><br />
・ｺﾝﾋﾞﾆ決済<br />
　┣<a href="fp.php?code=system_ec_payconveni#seven">ｾﾌﾞﾝｲﾚﾌﾞﾝ</a><br />
　┣<a href="fp.php?code=system_ec_payconveni#lawson">ﾛｰｿﾝ</a><br />
　┗<a href="fp.php?code=system_ec_payconveni#famima">ﾌｧﾐﾘｰﾏｰﾄ</a><br />

・<a href="fp.php?code=system_ec_paycollect">代金引換</a><br />
・<a href="fp.php?code=system_ec_paybank">銀行振込</a><br /><br />

[x:0162]買い物かごって？<br />
気に入った商品を見つけたら…<br />

<div align="center" style="text-align:center;font-size:small;">「かごに入れる」</div>
ボタンを押して、買い物かごに商品を入れましょう♪<br /><br />
	
[x:0162]かごの商品を購入
買い物かごに入れただけでは購入は完了しません。<br />

<div align="center" style="text-align:center;font-size:small;">「注文画面に進む」</div>
ボタンを押して、購入を完了しましょう。<br /><br />


<a name="register" id="register"></a>
[x:0109]お買い物されたことのない方は、会員登録をしましょう。<br />
ログインしてお買物すると、{$config.point_name}がたまったり、住所入力を省略したり出来ます。<br />

<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="mailto:{$app.register_account}@{$app.register_domain}?subject=会員登録&body=このままメールを送信してください。%0D%0A会員登録のお手続きメールが届きます。">無料会員登録はｺﾁﾗ</a><blink><font color="blue">&gt;&gt;</font></blink>
</div>

<br />
{$mall_name}会員登録すると…

お買物がますます楽しくなる特典がいっぱい
<br /><br />
[x:0085]面倒な住所入力が不要!<br />
┗事前にﾛｸﾞｲﾝして入力しておくことで､お買物時の手間が省けます｡<br /><br />
[x:0085]{$config.point_name}がたまります♪<br />
┗購入額に応じて{$config.point_name}がたまる!<br />
    {$config.point_name}はお買物額の割引にご利用できたり、{$app.mall_name}のｱﾊﾞﾀｰやｺﾝﾃﾝﾂなどにも利用可能。<br />

<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="mailto:{$app.register_account}@{$app.register_domain}?subject=会員登録&body=このままメールを送信してください。%0D%0A会員登録のお手続きメールが届きます。">無料会員登録はｺﾁﾗ</a><blink><font color="blue">&gt;&gt;</font></blink>

</div><br />

[x:0046]{$config.point_name}って??<br />

┗会員なら､ﾛｸﾞｲﾝをしてそのままお買物するだけ{$config.point_name}が貯まります｡<br />
<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="?action_user_ec=true" accesskey="0">お買物はｺﾁﾗから</a><blink><font color="blue">&gt;&gt;</font></blink>
</div>
<br />

[x:0161]{$config.point_name}を使う<br />
┗お買物で発生した{$config.point_name}は､確定後､お買物で発生した{$config.point_name}を使うことができます｡ <br /><br />

    <font color="#FF0000">※</font>お店で使う お買物に{$config.point_name}を使う場合は､買い物かごに商品を入れ､そのまま進み､{$config.point_name}を使うを選択してください｡ 
    {$config.point_name}は【100{$config.point_name}】から使用可能です｡<br />
    <font color="#FF0000">※</font>さらに{$config.point_name}をためる!! ﾎﾟｲﾝﾄｱｯﾌﾟｷｬﾝﾍﾟｰﾝなど各種ｷｬﾝﾍﾟｰﾝを実施しています!! 
    お得なﾀｲﾐﾝｸﾞを見のがさず､かしこく{$config.point_name}をためてﾈ♪<br />

<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="?action_user_ec=true" accesskey="0">さっそくお買物</a><blink><font color="blue">&gt;&gt;</font></blink>
</div>
<div align="right">
<a href="#TOP">▲ﾍﾟｰｼﾞTOPへ</a>
</div><br />

    <a name="mail" id="mail"></a> <font color="#8431B8" size="3">[x:0105]</font><font color="#CC0000" size="3">ﾒﾙﾏｶﾞでもっとお得! 
    </font> 
    <hr>
お得な情報を無料でお届けするﾒｰﾙｻｰﾋﾞｽ｡<br />
    ｲﾍﾞﾝﾄ､新着商品など､知っておくと｢ﾗｯｷｰ!｣な情報がいっぱい! ﾒｰﾙでいちはやく見のがせない情報をGET<font color="#FF9933">☆</font><br />
    読み物としても楽しめます｡
まずは会員登録してﾈ♪<br />
<div align="center">
<blink><font color="blue">&lt;&lt;</font></blink><a href="mailto:{$app.register_account}@{$app.register_domain}?subject=会員登録&body=このままメールを送信してください。%0D%0A会員登録のお手続きメールが届きます。">無料会員登録はｺﾁﾗ</a><blink><font color="blue">&gt;&gt;</font></blink>

</div>
<div align="right">
<a href="#TOP">▲ﾍﾟｰｼﾞTOPへ</a>
</div><br />
    <font color="blue" size="3">[x:0186]</font><font color="#CC0000" size="3">退会方法</font> 
    <hr>
退会手続きは以下の手順で申請ﾍﾟｰｼﾞまでｱｸｾｽし､退会手続きをお願いいたします｡<br /><br /> 


会員ﾛｸﾞｲﾝ→｢会員情報変更｣→｢退会はこちらから｣→｢退会手続き｣

<div align="right">
<a href="#TOP">▲ﾍﾟｰｼﾞTOPへ</a>
</div>

</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
