<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.game.name`ﾌﾟﾚｲ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		{if $form.game_file2}<img src="f.php?file=game/{$form.game_file2}&SESSID={$SESSID}">{/if}
	</div>
	<span style="color:{$form_name_color};">
	{$ft.game.name}名:
	</span>
	&nbsp;{$form.game_name}<br />
	<span style="color:{$form_name_color};">
	{$ft.game.name}説明:
	</span>
	&nbsp;{$form.game_desc}<br />
	<span style="color:{$form_name_color};">
	操作説明:
	</span>
	&nbsp;{$form.game_explain}<br />
	<span style="color:{$form_name_color};">
	消費ﾎﾟｲﾝﾄ:
	</span>
	&nbsp;{$form.game_point}pt<br />
	<a href="?action_user_game_score_list=true&game_id={$form.game_id}">ﾗﾝｷﾝｸﾞ</a><br />
	<a href="?action_user_util=true&page=game_device">対応機種</a><br />
	<div align="center" style="text-align:center;font-size:small;">
		{if $form.game_stock_status == 1 && 0 >= $form.game_stock_num}
		{* 売り切れ *}
		<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.game.name}は売り切れてしまいました。</span>
		{elseif $form.game_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.game_end_time}
		{* 配信期間終了 *}
		<span style="color:red;font-size:small">大変申し訳ありませんがこの{$ft.game.name}は販売期間が終了してしまいました。</span>
		{else}
		{* 販売中 *}
		{form action="$script" ethna_action="user_game_buy_do"}
			{form_input name="game_id"}
			{form_submit value="ﾌﾟﾚｲ"}
		{/form}
		{/if}
	</div>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_game=true">{$ft.game.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--タイトル-->
{html_style type="title" title="感想" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--コメント開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item key=k}
		{if $item.user_image_id}
			<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;">
		{/if}
		<span style="color:{$timecolor};">{$item.comment_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
		{if $item.user_id == $session.user.user_id}
			[<a href="?action_user_comment_edit=true&comment_id={$item.comment_id}">編集</a>]
		{/if}
		<br />
		<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
		{$item.comment_body|nl2br}
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	{if $app.listview_total != 0}
	<!--div align="right" style="text-align:right;font-size:small;">
		　→<a href="?action_user_comment_view=true&comment_type=2&comment_subid={$form.comment_dub_id}">ｺﾒﾝﾄ一覧</a>[x:0082]
	</div-->
	{/if}
	{html_style type="title" title="感想を書く" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_comment_add_do"}
		{form_input name="comment_type" value="2"}<br />
		{form_input name="comment_subid" value="`$form.game_id`"}<br />
		{form_name name="comment_body"}<br />
		{form_input name="comment_body"}<br />
		{form_input name="add"}<br />
	{/form}
</div>
<!--コメント終了-->

<!--フッター-->
{include file="user/footer.tpl"}
