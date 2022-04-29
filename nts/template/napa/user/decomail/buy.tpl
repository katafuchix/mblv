<!--ヘッダー-->
{include file="user/header.tpl" title="ナパタウンデコメダウンロード" bgcolor="#ffffff" text="#808080" link="#3399FF" vlink="#3399FF"}


<!-- NAPATOWN開始 -->
<div style="background-color:#ff6699; text-align:center; font-size:xx-small;">
<span style="color:#00ff00">ダウンロード</span><br />
</div>
<div style="background-color:#ffffff; text-align:center; font-size:xx-small;">
	{if $form.decomail_file2}<img src="f.php?file=decomail/{$form.decomail_file2}&SESSID={$SESSID}">{/if}
	<br />
	<br />
	所持：{$session.user.user_point}{$ft.point.name}<br />
	価格：{$form.decomail_point}{$ft.point.name}<br /><br />
	{if $form.decomail_stock_status == 1 && 0 >= $form.decomail_stock_num}
		{* 売り切れ *}
		<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.decomail.name}は売り切れてしまいました。</span>
		{elseif $form.decomail_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.decomail_end_time}
		{* 配信期間終了 *}
		<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.decomail.name}は販売期間が終了してしまいました。</span>
		{else}
		{* 販売中 *}
		
		{if $carrier=="AU" && $form.decomail_file_a|regex_replace:"/.*khm.*/i":"khm" eq "khm"}
			<!--AUデコメールテンプレートの場合のみの処理-->
			{form action="$script" ethna_action="user_decomail_buy_do"}
				{form_input name="decomail_id"}
				{form_submit value="取得"}
			{/form}
		{else}
			{form action="$script" ethna_action="user_decomail_buy_do"}
				{form_input name="decomail_id"}
				{form_submit value="ﾀﾞｳﾝﾛｰﾄﾞ"}
			{/form}
		{/if}
	{/if}
</div>
<br />
<br />
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl" title_bgcolor="#ff6699" hrcolor="#ff6699" title="(C)ｽﾍﾟｰｽｱｳﾄ"}
