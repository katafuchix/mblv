<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="��ӥ塼�����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form action="$script" ethna_action="user_ec_review_delete_do"}
		{uniqid}
		{form_input name="review_id"}
		{form_name name="review_title"}:<br />
		&nbsp;{$form.review_title}<br /><br />
		{form_name name="review_body"}:<br />
		&nbsp;{$form.review_body}
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������ƤΥ�ӥ塼�������ޤ���<br />
		������Ǥ���?<br />
		<br />
		<div align="center" style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
