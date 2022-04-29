取得日時,ポイントID,ASP連動ID,ポイントタイプ,広告名,ポイントステータス,ポイント,ユーザID,ニックネーム
{foreach from=$app.point_list item=i}
{$i.point_regist_time|date_format:"%Y/%m/%d %H:%M"},{$i.point_id},{$i.user_ad_id},{$config.point_type[$i.point_type].name},{$i.ad_name},{$config.point_status[$i.point_status].name},{$i.point},{$i.user_id},{$i.user_nickname}
{/foreach}