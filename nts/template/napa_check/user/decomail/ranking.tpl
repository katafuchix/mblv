<!--ヘッダー-->
{include file="user/header.tpl" title="ナパタウンデコメランキング" bgcolor="#ffffff" text="#808080" link="#3399FF" vlink="#3399FF"}


<!--タイトル-->
<div style="background-color:#ff6699; text-align:center; font-size:xx-small;">
	<span style="color:＃808000">ランキング</span><br />
	<span style="color:＃808000">{$app.decomail_category_name}</span><br />
</div>

<!--タイトル-->
<div style="background-color:#ffffdb; text-align:center;">
	<span style="font-size:x-small; color:＃808000">{$app.last_modified|jp_date_format:"%m/%d(%a)"}更新</span><br />
</div>

<!--中部コンテンツ開始-->
<div style="background-color:#ffffdb; text-align:center;">
{foreach from=$app.ranking item=item name=decomail key =k}
	<span style="font-size:xx-small; color:＃808000">[x:0138]第{$k+1}位[x:0138]</span><br />
	{if $item.decomail_file1}<img src="f.php?&file=decomail/{$item.decomail_file1}&SESSID={$SESSID}">{/if}<br />
	<a href="?action_user_decomail_buy=true&decomail_id={$item.decomail_id}">
	<span style="font-size:xx-small;">{$item.decomail_name}<br />{if $item.decomail_desc}（{$item.decomail_desc}）<br />{/if}【{$item.decomail_point}{$ft.point.name}】<br /></span></a>
	{html_style type="br"}
{/foreach}
</div>
<!--中部コンテンツ終了-->



<!--中部コンテンツ開始-->

<!--ぷちふるDECOへ誘導リンク-->
<div style="background-color:#ffffff; text-align:center;">
	<a href="fp.php?code=decomail_puchi"><img src="f.php?type=file&id=135" /><span style="font-size:xx-small">かわいいﾃﾞｺﾒが全部とり放題</span></a><br />
</div>

<!--フッター-->
{include file="user/footer.tpl" title_bgcolor="#ff6699" hrcolor="#ff6699" title="(C)ｽﾍﾟｰｽｱｳﾄ"}
