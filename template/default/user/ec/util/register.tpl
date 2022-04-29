<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="会員登録について" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	
■会員登録について<br>
<hr>
<font color="#ff0000">Q.会員登録をすると何が便利になるの?</font>
<hr>
<font color="#0000ff">A</font>.氏名･住所･電話番号などをご登録いただくと､買い物のたびに情報を入力することなく簡単にお買い物ができます｡<br>登録料や月会費は無料｡<br>
また､お買い物の額に応じてお得なﾎﾟｲﾝﾄも貯まります｡<br>
⇒<a href="{html_style type='mailto' account='regist' hash=$session.media_access_hash}"><span style="color:{$menucolor};">会員登録する</span></a>
<hr>
<font color="#ff0000">Q.登録方法がわかりません｡</font>
<hr>
<font color="#0000ff">A</font>.TOPﾍﾟｰｼﾞの｢ﾛｸﾞｲﾝ｣より案内にしたがってご登録下さい｡<br>
[会員登録までの流れ]<br>
1.空ﾒｰﾙ送信<br>
2.氏名等の入力<br>
3.住所詳細入力<br>
4.登録内容確認<br>
5.登録登録完了<br>
<hr>
<font color="#ff0000">Q.無料で登録､利用できますか?</font>
<hr>
<font color="#0000ff">A</font>.{$app.mall_name}の登録料､利用料は一切無料です｡<br>
商品の購入も無料で行うことができます(携帯電話会社にお支払いいただく通信料金は別途必要です)｡<br>
<hr>
<font color="#ff0000">Q.携帯電話以外のﾒｰﾙｱﾄﾞﾚｽで登録できますか?</font>
<hr>
<font color="#0000ff">A</font>.ご登録いただけるﾒｰﾙｱﾄﾞﾚｽは携帯電話のﾒｰﾙｱﾄﾞﾚｽのみです｡<br>
ﾊﾟｿｺﾝのﾒｰﾙｱﾄﾞﾚｽはご登録いただけません｡<br>
あらかじめご了承下さい｡<br>
<hr>
<font color="#ff0000">Q.ﾒｰﾙｱﾄﾞﾚｽを登録できません｡</font>
<hr>
<font color="#0000ff">A</font>.ﾒｰﾙｱﾄﾞﾚｽ登録は空ﾒｰﾙを送信の際に行います｡<br>
会員登録時に｢会員登録はこちらから｣を押すとﾒｰﾙ送信画面が表示されますので､ﾒｰﾙ本文には何も入力せず送信して下さい｡<br>
その後返信ﾒｰﾙが届き､ﾒｰﾙに記載されているURLにｱｸｾｽし､必要事項を入力すれば登録完了です｡<br>
※ﾄﾞﾒｲﾝ指定受信を設定される場合は､必ず設定をお願いいたします｡<br>
<hr>
<font color="#ff0000">Q.登録情報を確認･変更したい｡</font>
<hr>
<font color="#0000ff">A</font>.登録情報は｢ﾛｸﾞｲﾝ後｣&#65515;｢会員情報変更｣から確認･変更できます｡<br>
<hr>
<font color="#ff0000">Q.決済･配送について知りたい｡</font>
<hr>
<font color="#0000ff">A</font>.決済につきましては各商品ﾍﾟｰｼﾞの｢送料｣｢支払方法｣からご確認下さい｡<br>
<hr>
<font color="#ff0000">Q.購入のｷｬﾝｾﾙしたい｡</font>
<hr>
<font color="#0000ff">A</font>.ご注文後のｷｬﾝｾﾙにつきましてはお受けできません｡<br>
<br>
※お客様都合による一方的なｷｬﾝｾﾙは固くお断りしております｡<br>
万が一無理なｷｬﾝｾﾙをなさいますと､ｷｬﾝｾﾙ料債権問題やお客様の社会的な信用に関わる問題が生じますので､くれぐれもご注意くださいませ｡<br>
<br>
※下記の場合､ご連絡無しにｷｬﾝｾﾙさせて頂くことがございます｡<br>
1)過去の取引においてｷｬﾝｾﾙされた経歴がある場合｡<br>
2)ご登録情報に著しい誤りがある場合｡<br>
3)ご連絡が取れなくなってしまった場合｡<br>
4)常識的に逸脱したお申し込みがあった場合｡<br>
<hr>
<font color="#ff0000">Q.退会したい｡</font>
<hr>
<font color="#0000ff">A</font>.退会手続きは以下の手順でｱｸｾｽし､退会手続きをお願いいたします｡<br>
ﾛｸﾞｲﾝ→｢会員情報変更｣→｢退会手続き｣<br>
<hr>
<font color="#ff0000">Q.ﾒｰﾙｱﾄﾞﾚｽを変更したい｡</font>
<hr>
<font color="#0000ff">A</font>.登録したﾒｰﾙｱﾄﾞﾚｽはﾛｸﾞｲﾝ後､｢会員情報変更｣から変更できます｡<br>
<hr>
<font color="#ff0000">Q.商品が届かない｡</font>
<hr>
<font color="#0000ff">A</font>.商品の発送状況は､お店に直接お問い合わせ下さい｡<br>
<a href="mailto:{$config.support_mailaddress}">お問い合わせする</a>
<hr>
<font color="#ff0000">Q.ﾊﾟｽﾜｰﾄﾞを変更したい｡</font>
<hr>
<font color="#0000ff">A</font>.登録したﾊﾟｽﾜｰﾄﾞはﾛｸﾞｲﾝ後､｢会員情報変更｣から変更できます｡<br>
<hr>

	
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
