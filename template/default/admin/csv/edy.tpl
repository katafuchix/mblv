63000031,{$app.total},{$app.total_price}
{foreach from=$app.point_list item=i}
1,{$i.edy_number},{$i.price},{$smarty.now|date_format:"%Y%m%d"},eupheeポイント,,63000032D{$smarty.now|date_format:"%Y%m%d"}S{$i.point_id|string_format:"%010d"}
{/foreach}