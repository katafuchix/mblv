<!--ヘッダー-->
{include file="user/header.tpl" title="ナパタウン着うたDL" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}

<!--タイトル-->
<div align="center" style="text-align:center;">
	{if $form.sound_category_file1}<img src="f.php?file=sound/{$form.sound_category_file1}&SESSID={$SESSID}">{/if}
</div>

<!--
{html_style type="title" title="`$ft.sound.name`ﾀﾞｳﾝﾛｰﾄﾞ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->


<!--コンテンツ開始-->

<!--ファィル名-->
<div style="text-align:center;background-color:{$form.sound_category_color}" align="center"><span style="color:#ffffff">{$form.sound_name}</span></div>

<!--ポイント数-->
<div align="right" style="text-align:right;">
	<span style="font-size:x-small;color:{$form.sound_category_color}">【ﾀﾞｳﾝﾛｰﾄﾞ{if $form.sound_point == 0}無料！{else}{$form.sound_point}{$ft.point.name}{/if}】</span>
</div>

<!--曲説明-->
<hr size="2" color="{$form.sound_category_color}" style="border:solid 1px {$form.sound_category_color}"></hr>
<div align="left">
	<span style="font-size:x-small;color:{$form.sound_category_color}">{$form.sound_desc}</span>
</div>
<hr size="2" color="{$form.sound_category_color}" style="border:solid 1px {$form.sound_category_color}"></hr>

<!--ダウンロード-->
<div align="center" style="text-align:center;font-size:small;">
	<!--メッセージ-->
	{include file="user/errors.tpl"}
	
	{if $form.sound_stock_status == 1 && 0 >= $form.sound_stock_num}
	{* 売り切れ *}
	<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.sound.name}は売り切れてしまいました。</span>
	{elseif $form.sound_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.sound_end_time}
	{* 配信期間終了 *}
	<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.sound.name}は販売期間が終了してしまいました。</span>
	{else}
	{* 販売中 *}
		{if $app.low_term}
			<!--下位端末の場合エラーを表示-->
			<span style="color:#ff3366">●お客様の端末は<br>非対応となっております。</span><br />
			<!--対応機種一覧-->
			<a href="fp.php?code=sound_device"><span style="color:#00cccc"><strong>対応機種一覧</strong></span></a>
		{else}
			所持{$ft.point.name}:{$form.user_point}{$ft.point.name}<br />
			{if $carrier=="AU"}
				{form action="$script" ethna_action="user_sound_buy_do"}
					{form_input name="sound_id"}
					{form_submit value="取得"}
				{/form}
			{else}
				{form action="$script" ethna_action="user_sound_buy_do"}
					{form_input name="sound_id"}
					{form_submit value="ﾀﾞｳﾝﾛｰﾄﾞ"}
				{/form}
			{/if}
		{/if}
	{/if}
</div>

<!--ファィルサイズ-->

<div align="center" style="text-align:center"><span style="font-size:small;color:#999999"><strong>{$form.file_size}</strong></span></div>
<!--通信料説明-->

<div align="center" style="text-align:center"><span style="font-size:small;color:#999999">●ﾀﾞｳﾝﾛｰﾄﾞには通信料が<br>別途かかります。</span></div>
<br>
<hr size="2" color="{$form.sound_category_color}" style="border:solid 1px {$form.sound_category_color}"></hr>

<div align="center" style="text-align:center">
	{ad id="15"}
</div>
<hr align="center" size="1" width="240" color="#000000"></hr>

<!--コンテンツ終了-->


<!--フッター-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)ｽﾍﾟｰｽｱｳﾄ" title_fontcolor="#000000"}
