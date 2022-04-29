<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾏｲ`$ft.decomail.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=decomail key =k}
		<div style="text-align:center;font-size:small;">
			{if $item.decomail_file1}<img src="f.php?file=decomail/{$item.decomail_file1}&SESSID={$SESSID}"><br />{/if}
			{$item.decomail_name}<br />
			[<a href="f.php?type=decomail&id={$item.decomail_id}">ﾀﾞｳﾝﾛｰﾄﾞ</a>]
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_decomail=true">{$ft.decomail.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
