<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.ac[$form.ad_category_id].name}
		<span style="color:{$form_name_color}">
		���Î��ގ�:
		</span>
		{$app.ac[$form.ad_category_id].name}<br />
	{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=ad key =k}
		<a href="?action_user_ad_redirect=true&ad_id={$item.ad_id}">{$item.ad_name}<br />
		{if $item.ad_image}
			<div style="align:center;"><img src="f.php?file=ad/{$item.ad_image}&SESSID={$SESSID}"></div>
		{/if}
		</a>
		{$item.ad_desc}<br />
		({if $item.ad_type==1}���؎���:{elseif $item.ad_type==2}��Ͽ:{elseif $item.ad_type==3}����:{/if}{if $item.ad_point_type==1}{$item.ad_point}{$ft.point.name}{elseif $item.ad_point_type==2}{$item.ad_point_percent}%{/if})
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">�ŎʎߎΎ���Ģ��</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
