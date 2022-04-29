<!--ヘッダー-->
{include file="user/header.tpl" title="ﾀｲﾄﾙ"}

<!--タイトル-->
{html_style type="title" title="`$ft.decomail.name`一覧" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.ac[$form.decomail_category_id].name}
		<span style="color:{$form_name_color}">
		ｶﾃｺﾞﾘ:
		</span>
		{$app.ac[$form.decomail_category_id].name}<br />
	{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=decomail key =k}
		<div style="text-align:center;font-size:small;">
			{if $item.decomail_file1}<img src="f.php?&file=decomail/{$item.decomail_file1}&SESSID={$SESSID}"{if $item.decomail_category_id!=4} style="float:left;"{/if}>{/if}<br />
			<a href="?action_user_decomail_buy=true&decomail_id={$item.decomail_id}">
			<span style="font-size:xx-small;">{$item.decomail_name}<br />{if $item.decomail_desc}（{$item.decomail_desc}）<br />{/if}【{$item.decomail_point}{$ft.point.name}】<br /></span></a>
<!--			{if $item.decomail_file1}<img src="f.php?file=decomail/{$item.decomail_file1}&SESSID={$SESSID}"><br />{/if}
			<a href="?action_user_decomail_buy=true&decomail_id={$item.decomail_id}">{$item.decomail_name}</a>&nbsp;&nbsp;{$item.decomail_desc}
-->
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_decomail=true">{$ft.decomail.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
