<!--�إå���-->
{include file="user/header.tpl"}

{html_style type="title" title="�����ˤĤ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small">
	{*}����{*}
	�͡�������{$app.postage_name}<br /><br />
	
	{*}��Χ{*}
	{if $app.postage_type == 1}
		���ޤȤ��㤤�λ���<br />
		Ʊ����ǽ���ʤξ�硢Ʊ���㤤ʪ���������줿���������ϲû�����ޤ���<br />
		<br />
		�������Ϥ���ʸ����ˤĤ��������Χ����ˤʤ�ޤ���<br />
		��Υ��ؤ�ȯ�����ޤ�Ʊ���Բľ��ʡ��緿�������ΰ����ξ��ʤ��������<br />
		<br />
		�����Τ���ʸ(Ʊ���㤤ʪ����)��ʣ���ξ��ʤ��㤤���ĺ������硢�����ϰ��ʬ�Τߤʤ�ޤ������̡��ˤ���ʸ��λ���줿���ϡ����줾��������������ޤ���<br />
		<br />
		���������߾��ʤΰ���<br />
		�����������̤ξ��ʤ˹�碌�������Ȥʤ�ޤ���<br />
		<br />
		�������ˤ���������ǤˤĤ���<br />
		�����Ͼ����Ǥ�ޤ�Ǥ��ޤ���<br />
		<br />
	{*}�ϰ�������{*}
	{elseif $app.postage_type == 2}
		{$app.postage_list.1.name}<br />
		{$app.postage_list.1.fee|number_format}��<br />
		<br />
		{$app.postage_list.2.name}��{$app.postage_list.3.name}��{$app.postage_list.4.name}<br />
		{$app.postage_list.2.fee|number_format}��<br />
		<br />
		{$app.postage_list.5.name}��{$app.postage_list.6.name}��{$app.postage_list.7.name}<br />
		{$app.postage_list.5.fee|number_format}��<br />
		<br />
		{$app.postage_list.8.name}��{$app.postage_list.9.name}��{$app.postage_list.10.name}��{$app.postage_list.11.name}��{$app.postage_list.12.name}��{$app.postage_list.13.name}��{$app.postage_list.14.name}<br />
		{$app.postage_list.8.fee|number_format}��<br />
		<br />
		{$app.postage_list.15.name}<br />
		{$app.postage_list.15.fee|number_format}��<br />
		<br />
		{$app.postage_list.16.name}��{$app.postage_list.17.name}��{$app.postage_list.18.name}��{$app.postage_list.19.name}��{$app.postage_list.20.name}��{$app.postage_list.21.name}��{$app.postage_list.22.name}��{$app.postage_list.23.name}��{$app.postage_list.24.name}��{$app.postage_list.25.name}��{$app.postage_list.26.name}��{$app.postage_list.27.name}��{$app.postage_list.28.name}��{$app.postage_list.29.name}��{$app.postage_list.30.name}��{$app.postage_list.31.name}<br />
		{$app.postage_list.16.fee|number_format}��<br />
		<br />
		{$app.postage_list.32.name}��{$app.postage_list.33.name}��{$app.postage_list.34.name}��{$app.postage_list.35.name}��{$app.postage_list.36.name}<br />
		{$app.postage_list.32.fee|number_format}��<br />
		<br />
		{$app.postage_list.37.name}��{$app.postage_list.38.name}��{$app.postage_list.39.name}��{$app.postage_list.40.name}<br />
		{$app.postage_list.37.fee|number_format}��<br />
		<br />
		{$app.postage_list.41.name}��{$app.postage_list.42.name}��{$app.postage_list.43.name}��{$app.postage_list.44.name}��{$app.postage_list.45.name}��{$app.postage_list.46.name}��{$app.postage_list.47.name}<br />
		{$app.postage_list.41.fee|number_format}��<br />
		<br />
		{$app.postage_list.48.name}��{$app.postage_list.49.name}<br />
		{$app.postage_list.48.fee|number_format}��<br />
		<br />
		���ޤȤ��㤤�λ���<br />
		Ʊ����ǽ���ʤξ�硢Ʊ���㤤ʪ���������줿���������ϲû�����ޤ���<br />
		<br />
		���������߾��ʤΰ���<br />
		�����������̤ξ��ʤ˹�碌�������Ȥʤ�ޤ���<br />
		<br />
		�������ˤ���������ǤˤĤ���<br />
		�����Ͼ����Ǥ�ޤ�Ǥ��ޤ���<br />
		<br />
	{*}�������{*}
	{elseif $app.postage_type == 3}
		���Τ���ʸ(Ʊ���㤤ʪ����)�Ǿ������ι�פ�{$app.postage_total_price_set|number_format}�߰ʾ太�㤤���ĺ������硢������̵���Ȥʤ�ޤ���<br />
		���̡��ˤ���ʸ��λ���줿���ϡ����줾��������������ޤ���<br />
		��Υ��ؤ�ȯ�����ޤ�Ʊ���Բľ��ʡ��緿�������ΰ����ξ��ʤ�����ޤ���<br />
		<br />
		���������߾��ʤΰ���<br />
		�����������̤ξ��ʤ˹�碌�������Ȥʤ�ޤ���<br />
		<br />
		�������ˤ���������ǤˤĤ���<br />
		�����Ͼ����Ǥ�ޤ�Ǥ��ޤ���<br />
		<br />
	{*}�����Ŀ�{*}
	{elseif $app.postage_type == 4}
		���Τ���ʸ(Ʊ���㤤ʪ����)��{$app.postage_total_piece_set}�İʾ�ξ��ʤ��㤤���ĺ������硢������̵���Ȥʤ�ޤ���<br />
		���̡��ˤ���ʸ��λ���줿���ϡ����줾��������������ޤ���<br />
		��Υ��ؤ�ȯ�����ޤ�Ʊ���Բľ��ʡ��緿�������ΰ����ξ��ʤ�����ޤ���<br />
		<br />
		���������߾��ʤΰ���<br />
		�����������̤ξ��ʤ˹�碌�������Ȥʤ�ޤ���<br />
		<br />
		�������ˤ���������ǤˤĤ���<br />
		�����Ͼ����Ǥ�ޤ�Ǥ��ޤ���<br />
		<br />
	{/if}
	
	{*}����{*}
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
