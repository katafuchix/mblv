{include file="user/header.tpl"}

<!--���ʳ���-->
{html_style type="title" title=$form.item_name bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
</div>

<!--����å׾Ҳ�-->
<div align="left" style="text-align:left;font-size:small">
	{$app_ne.item_text1}
</div>

<div align="center" style="text-align:center;font-size:small;">
	{if $form.item_image}
		<img src="{if $form.item_image|escape}f.php?file_name={$form.item_image|escape}&contents=item{/if}" >
	{/if}
</div>

<div align="left" style="text-align:left;font-size:small">
	{form action="$script" ethna_action="user_ec_item_regist_do"}
		{form_input name="item_id"}
		<br />
		<!--����ץ볫��-->
		{foreach from=$app.sample_list item=i}
			<div align="center" style="text-align:center;font-size:small;">
				<a href="?action_user_ec_sample=true&item_id={$app.item_id}&sample_id={$i.sample_id}&shop_id={$app.shop_id}">{$i.sample_name}</a>
			</div>
		{/foreach}
		<!--����ץ뽪λ-->
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		
		<!--���ʾܺ�-->
		{$app_ne.item_text2}<br />
		
		<!--��������-->
		{if $app_ne.item_detail }<a href="?action_user_ec_item_detail=true&item_id={$app.item_id}&type=detail&shop_id={$app.shop_id}">���ʾܺ٤Ϥ�����</a><br />{/if}
		
		<!--���ʥ��ڥå�-->
		{if $app_ne.item_spec }<a href="?action_user_ec_item_detail=true&item_id={$app.item_id}&type=spec&shop_id={$app.shop_id}">���ʥ��ڥå��Ϥ�����</a><br />{/if}
		{if $app.shop_new_arrivals }<a href="?action_user_ec_shop_recommend=true&shop_id={$app.shop_id}">��Ź�Ύ������Ҿ��ʤ�</a><br />{/if}<br />
		
		<!--�߸˥��顼-->
		{if $app.zaikoerror}<span style="color:#ff0000">{$app.zaikoerror}</span><br />{/if}
		
		<div align="center" style="text-align:center;font-size:small;">
			<!--����٥�-->{if $form.item_label_front}{$form.item_label_front}<br />{/if}
			<!--���٥�-->{if $form.item_label_back}{$form.item_label_back}<br />{/if}
			<!--����-->����:{$form.item_price|number_format}��(�ǹ�)<br />
		</div>
		
		<div align="center" style="text-align:center;font-size:small;">
			<!--������-->
			{if $app.item_type_list}
				<!--�����פ��ҤȤĤξ��ϡ֎����̎�:�פ�ɽ�����ʤ�����-->
				{if $app.stock_one_type_status}
					<input type="hidden" name="stock_one_type_status" value="1" >
					<input type="hidden" name="stock_id" value="{$app.one_type_only_id}" >
				{else}
					<input type="hidden" name="stock_one_type_status" value="0" >
					<span style="color:{$title_bgcolor}">{form_name name="stock_id"}:</span>{select name="stock_id" list=$app.item_type_list value=$form.stock_id}<br />
				{/if}
				<!--�����פ��ҤȤĤξ��ϡ֎����̎�:�פ�ɽ�����ʤ���λ-->
			{else}
				<input type="hidden" name="stock_id" value="0"><br />
			{/if}
			
			<!--�Ŀ�-->
			<span style="color:{$title_bgcolor}">{form_name name="cart_item_num"}:</span>{select name="cart_item_num" list=$app.cart_item_num_list value=$form.cart_item_num}<br />
			
			<!--�ݥ����-->
			<span style="color:{$title_bgcolor}">����{$point_name}:</span>{$form.item_point}{$point_unit}<br />
		</div>
		<br />
		
		<!--�����������ܥ���-->
		<div align="center" style="text-align:center;font-size:small;">{form_submit value="�����������"}</div>
		
		<!--��������ʧ��-->
		<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_ec_item_postage=true&item_id={$app.item_id}">����</a> / <a href="?action_user_ec_item_order=true&item_id={$app.item_id}">��ʧ��ˡ</a></div>
		
		<!--�ե꡼���ڡ���-->
		{$app_ne.item_contents_body|nl2br}
	{/form}
</div>
<!--���ʽ�λ-->

<!--ͧã�˶�����-->
<div align="left" style="text-align:left;font-size:small;">[x:0105]<a HREF="mailto:?subject=&body={$app.user_url}%3Faction_user_ec_item%3Dtrue%26item_id%3D{$app.item_id}">ͧã�˶�����</a><br /></div>

<!--���ʤˤĤ��Ƥ��䤤��碌-->
<div align="left" style="text-align:left;font-size:small;">[x:0105]<a HREF="mailto:{$config.item_info_mailaddress}?subject=����&body=�ھ����ֹ��{$app.item_id}%0D%0A�ھ���̾��{$app.item_name|replace_emoji_form}%0D%0A�ڤ�̾����{$session.user.user_name}%0D%0A�ڤ��䤤��碌���ơ�%0D%0A">ŹĹ�˼���!</a><br /></div>

<!--���Τ�Ź�ˤĤ���-->
<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
<div align="left" style="text-align:left;font-size:small;">
	���Τ�Ź���äȸ���<br />
	<a href="?action_user_ec_shop_ranking=true&shop_id={$app.shop_id}">�Ϳ͵���󥭥�</a><br />
	<a href="?action_user_ec_shop_recommend=true&shop_id={$app.shop_id}">�ͤ���Ź�Ύ������Ҿ���</a><br />
	<a href="?action_user_ec_shop=true&shop_id={$app.shop_id}">�ͥ���å�TOP��</a><br />
	<a href="fp.php?code=system_ec_return">�����ʤˤĤ��ƤϤ�����</a><br />
</div>
<div align="right" style="text-align:right;font-size:small;">
	<a href="#top">���͎ߎ����ޤκǽ��</a>
</div>
<br />

<!--���ʤˤĤ��ƤΥ�ӥ塼-->
{if $app.review_count >0 }
	<div align="right" style="text-align:right;font-size:small;">
		<a href="?action_user_ec_review=true&item_id={$form.item_id}">���ξ��ʤΥ�ӥ塼�򸫤�</a> 
	</div>
{/if}

<!--�եå���-->
{include file="user/footer.tpl"}
