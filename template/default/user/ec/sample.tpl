{include file="user/header.tpl"}

<!--����ץ볫��-->
{html_style type="title" title="��`$form.sample_name`��" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<div align="center" style="text-align:center;font-size:small;">
	{if $form.sample_id}
		<img src="{if $form.sample_image|escape}f.php?file_name={$form.sample_image|escape}&contents=sample{/if}" >
	{/if}
</div>

<div align="left" style="text-align:left;font-size:small">
	{form action="`$config.ssl_url``$script`" ethna_action="user_ec_item_regist_do" method="post"}
		{form_input name="item_id"}
		<br />
		<!--����ץ������󥯳���-->
		{foreach from=$app.sample_list item=i}
			<div align="center" style="text-align:center;font-size:small;">
				{if $form.sample_id == $i.sample_id}
					{$i.sample_name}
				{else}
					<a href="?action_user_ec_sample=true&item_id={$form.item_id}&sample_id={$i.sample_id}&shop_id={$form.shop_id}">{$i.sample_name}</a>
				{/if}
			</div>
		{/foreach}
		<!--����ץ������󥯽�λ-->
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		
		<!--���ʥڡ���TOP��-->
		<a href="?action_user_ec_item=true&item_id={$form.item_id}&shop_id={$app.shop_id}">���ʥڡ���TOP��</a><br />
		
		<!--��������-->
		{if $app_ne.item_detail }<a href="?action_user_ec_item_detail=true&item_id={$form.item_id}&type=detail&shop_id={$form.shop_id}">���ʾܺ٤Ϥ�����</a><br />{/if}
		
		<!--���ʥ��ڥå�-->
		{if $app_ne.item_spec }<a href="?action_user_ec_item_detail=true&item_id={$form.item_id}&type=spec&shop_id={$form.shop_id}">���ʥ��ڥå��Ϥ�����</a><br />{/if}
		{if $app.shop_new_arrivals }<a href="?action_user_ec_shop_recommend=true&shop_id={$form.shop_id}">��Ź�Ύ������Ҿ��ʤ�</a><br />{/if}<br />
		
		<!--�߸˥��顼-->
		{if $app.zaikoerror}<span style="color:#ff0000">{$app.zaikoerror}</span><br />{/if}
		
		<div align="center" style="text-align:center;font-size:small;">
			<!--����٥�-->{if $form.item_label_front}<p>{$form.item_label_front}</p>{/if}
			<!--���٥�-->{if $form.item_label_back}<p>{$form.item_label_back}</p>{/if}
			<!--����--><p>����:{$form.item_price|number_format}��(�ǹ�)</p>
			</div>
		<br />
		
		<div align="center" style="text-align:center;font-size:small;">
			<!--������-->
			{if $app.item_type_list}
				<!--�����פ��ҤȤĤξ��ϡ֎����̎�:�פ�ɽ�����ʤ�����-->
				{if $app.stock_one_type_status}
					<input type="hidden" name="stock_id" value="{$app.one_type_only_id}" >
				{else}
					<span style="color:{$title_bgcolor}">{form_name name="stock_id"}:</span>{select name="stock_id" list=$app.item_type_list value=$form.stock_id}<br />
				{/if}
				<!--�����פ��ҤȤĤξ��ϡ֎����̎�:�פ�ɽ�����ʤ���λ-->
			{else}
				<input type="hidden" name="stock_id" value="0"><br />
			{/if}
			
			<!--�Ŀ�-->
			<span style="color:{$title_bgcolor}">�Ŀ�:</span>{select name="item_num" list=$app.item_num_list value=$form.item_num}<br />
			
			<!--�ݥ����-->
			<span style="color:{$title_bgcolor}">����{$point_name}:</span>{$form.item_point}{$point_unit}<br />
		</div>
		<br />
		
		<!--�����������ܥ���-->
		<div align="center" style="text-align:center;font-size:small;">{form_submit value="�����������"}</div>
		
		<!--��������ʧ��-->
		<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_ec_item_postage=true&item_id={$form.item_id}">����</a> / <a href="?action_user_ec_item_order=true&item_id={$form.item_id}">��ʧ��ˡ</a></div>
		
	{/form}
</div>

{include file="user/footer.tpl"}
