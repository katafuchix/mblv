{foreach from=$app.point_list item=i}
1,{$smarty.now|date_format:"%m%d"},{$i.ebank_branch},{$i.ebank_account_name},{$i.ebank_account_number},{$i.price},{$i.user_id}_{$i.point_id}
{/foreach}