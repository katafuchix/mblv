{include file="user/header.tpl"}

<!--���ʳ���-->
{html_style type="title" title="��`$form.item_name`��" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--���ʲ���-->
<div align="center" style="text-align:center;font-size:small;">
		{if $form.item_image}
			<img src="{if $form.item_image|escape}f.php?file_name={$form.item_image|escape}&contents=item{/if}" >
		{/if}
</div>

<div align="left" style="text-align:left;font-size:small">
	{form action="$script" ethna_action="user_ec_item_regist_do" method="post"}
	{form_input name="item_id"}
	<br />
	<!--����ץ볫��-->
	{foreach from=$app.sample_list item=i}
		<div align="center" style="text-align:center;font-size:small;">
			<a href="?action_user_ec_sample=true&item_id={$app.item_id}&sample_id={$i.sample_id}&shop_id={$app.shop_id}">{$i.sample_name}</a>
		</div>
	{/foreach}
	<!--����ץ뽪λ-->
	<br /><hr>
	
	<!--���ʾܺپ��󳫻�-->
	<br />
	{if $app.type == 'detail'}
		{$app_ne.item_detail}
	{else}
		{$app_ne.item_spec}
	{/if}
	<br /><br />
	
	<!--���ʥڡ���TOP��-->
	<a href="?action_user_ec_item=true&item_id={$form.item_id}&shop_id={$app.shop_id}">���ʥڡ���TOP��</a><br />
	
	<!--���ʥ��ڥå���-->
	{if $form.type=='detail' && $app_ne.item_spec}
		<a href="?action_user_ec_item_detail=true&item_id={$form.item_id}&type=spec&shop_id={$app.shop_id}">���ʥ��ڥå��Ϥ�����</a><br />
	{/if}
	
	<!--����������-->
	{if $form.type=='spec' && $app_ne.item_detail}
		<a href="?action_user_ec_item_detail=true&item_id={$form.item_id}&type=detail&shop_id={$app.shop_id}">���ʾܺ٤Ϥ�����</a><br />
	{/if}
	<br />
	<!--���ʾܺپ���λ-->
	
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
			<span style="color:{$title_bgcolor}">{form_name name="cart_item_num"}:</span>{select name="item_num" list=$app.item_num_list value=$form.item_num}<br />
			
			<!--�ݥ����-->
			<span style="color:{$title_bgcolor}">����{$point_name}:</span>{$form.item_point}{$point_unit}<br />
		</div>
		<br />
		
		<!--�����������ܥ���-->
		<div align="center" style="text-align:center;font-size:small;">{form_submit value="�����������"}</div>
		
		<!--��������ʧ��-->
		<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_ec_item_postage=true&item_id={$app.item_id}">����</a> / <a href="?action_user_ec_item_order=true&item_id={$app.item_id}">��ʧ��ˡ</a></div>
		
		<!--�ե꡼���ڡ���-->
		<font size="-1">{$app_ne.contents_body|nl2br}<br /></font>
		
	{/form}
</div>
<!--���ʽ�λ-->

{*}
<hr>
<a href="">���������꾦����Ͽ*</a><br />
<a href="">����������Ź����Ͽ*</a><br />
{*}

<!--ͧã�˶�����-->
<div align="left" style="text-align:left;font-size:small;">[x:0105]<a HREF="mailto:?subject=&body={$app.user_url}%3Faction_mall_item%3Dtrue%26item_id%3D{$app.item_id}">ͧã�˶�����</a><br /></div>

<!--���ʤˤĤ��Ƥ��䤤��碌-->
<div align="left" style="text-align:left;font-size:small;">[x:0105]<a HREF="mailto:{$config.item_info_mailaddress}?subject=����&body=�ھ����ֹ��{$app.item_id}%0D%0A�ھ���̾��{$app.item_name|replace_emoji_form}%0D%0A�ڤ�̾����{$session.user.user_name|replace_emoji_form}%0D%0A�ڤ��䤤��碌���ơ�%0D%0A">ŹĹ�˼���!</a><br /></div>

<!--��ӥ塼-->
{if $app.review_count >0 }
	<div align="right" style="text-align:right;font-size:small;">
		<a href="?action_user_ec_review=true&item_id={$form.item_id}">���ξ��ʤΥ�ӥ塼�򸫤�</a> 
	</div>
{/if}

{include file="user/footer.tpl"}
