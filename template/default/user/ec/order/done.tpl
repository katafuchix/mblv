{include file="user/header.tpl"}

<!--��ʸ��λ����-->
{html_style type="title" title="�����꤬�Ȥ��������ޤ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	�����Ѥ��꤬�Ȥ��������ޤ���<br />
	����ʸ���Ƴ�ǧ�Ҏ��٤����ꤷ�ޤ��Τǡ�����ʸ���ƤΤ���ǧ�򤪴ꤤ�פ��ޤ���<br />
	<br />
</div>
<!--��ʸ��λ��λ-->

{include file="user/footer.tpl"}
