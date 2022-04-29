取得日時,更新日,ポイントID,ポイントステータス,ポイントタイプ,ポイント,ポイントサブID,ポイントメモ,ユーザサブID,ユーザID,ニックネーム
{foreach from=$app.listview_data item=item}
{$item.point_created_time|jp_date_format:"%Y/%m/%d %H:%M"},{$item.point_updated_time|jp_date_format:"%Y/%m/%d %H:%M"},{$item.point_id},{$config.point_status[$item.point_status].name},{$config.point_type[$item.point_type].name},{$item.point},{$item.point_sub_id},{$item.point_memo},{$item.user_sub_id},{$item.user_id},{$item.user_nickname}
{/foreach}