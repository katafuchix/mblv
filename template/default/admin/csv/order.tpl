��ʸ�ֹ�,��ʸ��,�������ֹ�,��ʸ��,��ʸ��͹���ֹ�,��ʸ����ƻ�ܸ�,��ʸ�Խ���,��ʸ�Է�ʪ̾,��ʸ�������ֹ�,��ʸ�ԥ᡼�륢�ɥ쥹,�����ֹ�,���ʼ���ID,����̾,������,ñ��,����,���ʾ���,����,����������,����{$ft.point.name},��׳�,�����ˡ,���Ϥ��褪̾��,���Ϥ���եꥬ��,���Ϥ���͹���ֹ�,���Ϥ�����ƻ�ܸ�,���Ϥ��轻��,���Ϥ����ʪ̾,���Ϥ��������ֹ�,���쥸�å���ɼ�ֹ�,���쥸�åȥ��������ֹ�,����ӥ���ɼ�ֹ�,����ӥˤ������ֹ�,��ã������,�ݥ������Ϳ������

{foreach from=$app.listview_data item=item}
{$item.user_order_no},{$item.user_order_created_time},{$item.cart_id},{$item.user_name},{$item.user_zipcode},{$config.region_id[$item.region_id].name},{$item.user_address},{$item.user_address_building},{$item.user_phone},{$item.user_mailaddress},{$item.item_id},{$item.item_distinction_id},{$item.item_name},{$item.item_type},{$item.item_price},{$item.cart_item_num},{math equation="x * y" x=$item.item_price y=$item.cart_item_num assign=this_price}{$this_price},{$item.user_order_postage},{$item.user_order_exchange_fee},{$item.user_order_use_point},{$item.user_order_total_price2},{$config.user_order_type[$item.user_order_type].name},{$item.user_order_delivery_name},{$item.user_order_delivery_name_kana},{$item.user_order_delivery_zipcode},{if $item.user_order_delivery_region_id}{$config.region_id[$item.user_order_delivery_region_id].name}{/if},{$item.user_order_delivery_address},{$item.user_order_delivery_address_building},{$item.user_order_delivery_phone},{*���쥸�åȤξ��Τ�ɽ��*}{if $item.user_order_type==1}{$item.cart_hash}{/if},{*���쥸�åȤξ��Τ�ɽ��*}{if $item.user_order_type==1}{$item.user_order_credit_auth_code}{/if},{*����ӥˤξ��Τ�ɽ��*}{if $item.user_order_type==2}{$item.cart_hash}{/if},{*����ӥˤξ��Τ�ɽ��*}{if $item.user_order_type==2}{$item.user_order_conveni_sale_code}{/if},{$config.delivery_date[$item.user_order_delivery_day].name},,{$item.get_point_date}
{/foreach}