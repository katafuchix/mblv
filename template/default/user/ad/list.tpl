<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="広告一覧" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.ac[$form.ad_category_id].name}
		<span style="color:{$form_name_color}">
		ｶﾃｺﾞﾘ:
		</span>
		{$app.ac[$form.ad_category_id].name}<br />
	{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=ad key =k}
		<a href="?action_user_ad_redirect=true&ad_id={$item.ad_id}">{$item.ad_name}</a>({if $item.ad_type==1}ｸﾘｯｸ:{elseif $item.ad_type==2}登録:{elseif $item.ad_type==3}購買:{/if}{if $item.ad_point_type==1}{$item.ad_point}pt{elseif $item.ad_point_type==2}{$item.ad_point_percent}%{/if})<br />
		{if $item.ad_image}
			<div style="align:center;"><a href="?action_user_ad_redirect=true&ad_id={$item.ad_id}"><img src="f.php?file=ad/{$item.ad_image}&SESSID={$SESSID}"></a></div>
		{/if}
		{$item.ad_desc}<br />
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">ﾎﾟｲﾝﾄﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
