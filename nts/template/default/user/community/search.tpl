<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_add=true">{$ft.community.name}�ο�������</a>
	{html_style type="line" color="gray"}
	{form ethna_action="user_community_search" action="$script"}
		<span style="color:{$form_name_color};">
		{form_name name="keyword"}:
		</span>
		{form_input name="keyword"}<br />
		<span style="color:{$form_name_color};">
		{form_name name="community_category_id"}:
		</span>
		{form_input name="community_category_id" emptyoption=""}
		{form_input name="search"}
	{/form}
	
	{if $form.keyword == "" && $form.community_category_id == ""}
		<!--�������ܤ��ʤ����-->
		{html_style type="title" title="���ܤ�`$ft.community.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{else}
		<!--�������ܤ�������-->
		{html_style type="title" title="�������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
		{include file="user/pager.tpl"}
	{/if}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item key=key}
		<a href="?action_user_community_view=true&community_id={$item.community_id}">{$item.community_title}</a><br />
		{$item.community_description|truncate_emoji:100|nl2br}<br />
		<span style="color:{$form_name_color};">�Ҏݎʎގ���:</span>{$item.community_member_num}�͡�
		<span style="color:{$form_name_color};">���Î��ގ�:</span>{$item.community_category_name}
		{html_style type="line" color="gray"}
	{foreachelse}
		�������˹��פ���{$ft.community.name}�ϸ��Ĥ���ޤ���Ǥ�����
	{/foreach}{* $form.keyword != '' *}
	{if $form.keyword != "" || $form.community_category_id != ""}
		<!--��̤�������Τ�ɽ��-->
		{include file="user/pager.tpl"}
	{/if}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
