{foreach from=$app.point_list item=i}
{$i.point_exchange_time|date_format:"%Y%m%d"},{$i.point_id},{$config.point_type[$i.point_type].name},{$config.point_status[$i.point_status].name},{$i.price},{$i.user_id},{$i.user_nickname}
{/foreach}