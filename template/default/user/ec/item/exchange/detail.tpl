<!--�إå���-->
{include file="user/header.tpl"}

{html_style type="title" title="���������ˤĤ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small">
	{*}����{*}
	�͡�����������{$app.exchange_name}<br /><br />
	
	{*}��Χ{*}
	{if $app.exchange_type == 1}
		���ޤȤ��㤤�λ���<br />
		Ʊ����ǽ���ʤξ�硢Ʊ���㤤ʪ���������줿�������������ϲû�����ޤ���<br />
		<br />
		�����������Ϥ���ʸ����ˤĤ��������Χ����ˤʤ�ޤ���<br />
		��Υ��ؤ�ȯ�����ޤ�Ʊ���Բľ��ʡ��緿�������ΰ����ξ��ʤ��������<br />
		<br />
		�����Τ���ʸ(Ʊ���㤤ʪ����)��ʣ���ξ��ʤ��㤤���ĺ������硢���������ϰ��ʬ�Τߤʤ�ޤ������̡��ˤ���ʸ��λ���줿���ϡ����줾������������������ޤ���<br />
		<br />
	{*}�ϰ�������{*}
	{elseif $app.exchange_type == 2}
		{foreach from=$app.exchange_range_list item=i name=n }
			{if $smarty.foreach.n.last == false}
				{$i.start|number_format}�߰ʾ��{$i.end|number_format}�߰ʲ�/{$i.price|number_format}��<br /><br />
			{else}
				{$i.start|number_format}�߰ʾ�/{$i.price|number_format}��<br /><br />
			{/if}
			
		{/foreach}
	{*}�������{*}
	{elseif $app.exchange_type == 3}
		���Τ���ʸ(Ʊ���㤤ʪ����)�Ǿ������ι�פ�{$form.exchange_total_price_set|number_format}�߰ʾ太�㤤���ĺ������硢����������̵���Ȥʤ�ޤ���<br />
		���̡��ˤ���ʸ��λ���줿���ϡ����줾������������������ޤ���<br />
		��Υ��ؤ�ȯ�����ޤ�Ʊ���Բľ��ʡ��緿�������ΰ����ξ��ʤ�����ޤ���<br />
		<br />
	{*}�����Ŀ�{*}
	{elseif $app.exchange_type == 4}
		���Τ���ʸ(Ʊ���㤤ʪ����)��{$form.exchange_total_piece_set}�İʾ�ξ��ʤ��㤤���ĺ������硢����������̵���Ȥʤ�ޤ���<br />
		���̡��ˤ���ʸ��λ���줿���ϡ����줾������������������ޤ���<br />
		��Υ��ؤ�ȯ�����ޤ�Ʊ���Բľ��ʡ��緿�������ΰ����ξ��ʤ�����ޤ���<br />
		<br />
	{/if}
	
	{*}����{*}
	�����������ˤ���������ǤˤĤ���<br />
	���������Ͼ����Ǥ�ޤ�Ǥ��ޤ���<br />
	<br />
	���ܺ٤�Ź�ޤ�ľ�ܤ��䤤��碌����������<br />
	<br />
	���䤤��碌�衧{$mall_name}<br />
	e-mail:<a href="mailto:{$app.from_mailaddress}">{$app.from_mailaddress}</a><br />
	TEL:0422-70-0275 10:00-18:00�������������������<br />
	<br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
