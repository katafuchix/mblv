<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="��������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	���ʤ��Ύ̎ߎێ̎����َ͎ߎ����ޤ�ˬ�줿�Վ����ޤ�ɽ�����ޤ���<br />
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item}
		<span style="color:{$timecolor}">{$item.footprint_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
		&nbsp;&nbsp;<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����<br />
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
