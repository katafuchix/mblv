<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�ێ��ގ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $form.ad_id}
	<span style="color:{$menucolor}">��</span><a href="?action_user_ad_redirect=true&ad_id={$form.ad_id}&no_check=true">�ێ��ގ��ݡ������Ͽ���ʤ��Ǥ��Τޤ޿ʤ�</a><br />
	{/if}
	<span style="color:{$menucolor}">��</span><a href="?action_user_util=true&page=about-regist">�����Ͽ</a><br />
	<span style="color:{$menucolor}">��</span><a href="?action_user_login_do=true&easy_login=true&guid=ON">��ñ�ێ��ގ���</a><br />

	���ڡ����ؤ�<!--����-->[x:0073]�ΥХå��ܥ������äƤ���������<br />


</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
