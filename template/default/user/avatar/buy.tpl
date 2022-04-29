<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`購入" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		<img src="?action_user_file_avatar_view=true&avatar_id={$form.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}&SESSID={$SESSID}">
	</div>
	<span style="color:{$form_name_color};">
	{$ft.avatar.name}名:
	</span>
	{$form.avatar_name}<br />
	<span style="color:{$form_name_color};">
	{$ft.avatar.name}説明:
	</span>
	{$form.avatar_desc}<br />
	<span style="color:{$form_name_color};">
	消費{$ft.point.name}:
	</span>
	{$form.avatar_point}{$ft.point_unit.name}<br />
	<div style="text-align:center;font-size:small;">
		{if $form.avatar_stock_status == 1 && 0 >= $form.avatar_stock_num}
			{* 売り切れ *}
			<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.avatar.name}は売り切れてしまいました。</span>
		{elseif $form.avatar_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.avatar_end_time}
			{* 配信期間終了 *}
			<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.avatar.name}は販売期間が終了してしまいました。</span>
		{else}
			{* 販売中 *}
			{form action="$script" ethna_action="user_avatar_preview"}
				{form_input name="avatar_id"}
				{form_input name="cart"}
			{/form}
		{/if}
	</div>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_preview=true&avatar_id={$form.avatar_id}">{$ft.avatar.name}買い物かごへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar=true">{$ft.avatar.name}ﾎﾟｰﾀﾙへ</a><br /></div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
