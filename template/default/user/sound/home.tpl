<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{*html_style type="title" title="ﾏｲ`$ft.sound.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor*}
{html_style type="title" title="ﾀﾞｳﾝﾛｰﾄﾞ履歴" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=sound key =k}
			<span style="color:{$timecolor};">
			{$item.user_sound_created_time|jp_date_format:"%m/%d (%a) %H:%M"}
			</span>
			{$item.sound_name}
			[<a href="f.php?type=sound&id={$item.sound_id}">ﾌﾟﾚｲ</a>]
		{html_style type="line" color="gray"}
	{/foreach}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_sound=true">{$ft.sound.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
