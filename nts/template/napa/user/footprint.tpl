<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="��������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
���ʤ��Ύ̎ߎێ̎����َ͎ߎ����ޤ�ˬ�줿�Վ����ޤ�ɽ�����ޤ���<br>
<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item}
	<span style="color:#009900">{$item.footprint_regist_time|jp_date_format:"%m/%d(%a) %H:%M"}</span><br />
	&nbsp;&nbsp;<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����<br />
	{/foreach}
</div>

{include file="user/pager.tpl"}
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
