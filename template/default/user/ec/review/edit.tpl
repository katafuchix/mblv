<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="��ӥ塼�Խ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	{$app.item_name}�Υ�ӥ塼���Խ��Ǥ��ޤ���<br />
	<br />
	{form action="$script" ethna_action="user_ec_review_edit_confirm"}
	{form_name name="review_title"}<br />
	{form_input name="review_title"}<br />
	<br />
	{form_name name="review_body"}<br />
	{form_input name="review_body"}<br />
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{form_submit value="��ǧ���̤�"}
	</div>
	{form_input name="review_id"}
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
