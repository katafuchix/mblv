��������,�ݥ����ID,ASPϢưID,�ݥ���ȥ�����,����̾,�ݥ���ȥ��ơ�����,�ݥ����,�桼��ID,�˥å��͡���
{foreach from=$app.point_list item=i}
{$i.point_regist_time|date_format:"%Y/%m/%d %H:%M"},{$i.point_id},{$i.user_ad_id},{$config.point_type[$i.point_type].name},{$i.ad_name},{$config.point_status[$i.point_status].name},{$i.point},{$i.user_id},{$i.user_nickname}
{/foreach}