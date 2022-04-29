<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.sound.name`ﾀﾞｳﾝﾛｰﾄﾞ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		{if $form.sound_file2}<img src="f.php?file=sound/{$form.sound_file2}&SESSID={$SESSID}">{/if}
	</div>
	<span style="color:{$form_name_color};">
	{$ft.sound.name}名:
	</span>
	{$form.sound_name}<br />
	<span style="color:{$form_name_color};">
	{$ft.sound.name}説明:
	</span>
	{$form.sound_desc}<br />
	<span style="color:{$form_name_color};">
	消費ﾎﾟｲﾝﾄ:
	</span>
	{$form.sound_point}pt<br />
	<div align="center" style="text-align:center;font-size:small;">
		{if $form.sound_stock_status == 1 && 0 >= $form.sound_stock_num}
		{* 売り切れ *}
		<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.sound.name}は売り切れてしまいました。</span>
		{elseif $form.sound_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.sound_end_time}
		{* 配信期間終了 *}
		<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.sound.name}は販売期間が終了してしまいました。</span>
		{else}
		{* 販売中 *}
		{form action="$script" ethna_action="user_sound_buy_do"}
			{form_input name="sound_id"}
			{form_submit value="ﾀﾞｳﾝﾛｰﾄﾞ"}
		{/form}
	{/if}
	</div>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_sound=true">{$ft.sound.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
