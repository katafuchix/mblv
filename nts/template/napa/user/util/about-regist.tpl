<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="������Ͽ�ˤĤ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<div align="center" style="text-align:center;font-size:medium;">
		<span style="font-size:small;text-decoration: blink;">[x:0107]</span>
		<a href="mailto:{$config.mail_account.regist.account}_{$session.media_access_hash}@{$config.mail_domain}?subject={$config.mail_account.regist.subject}&body={$config.mail_account.regist.body}"><span style="color:{$menucolor};">̵�������Ͽ</span></a>
		<span style="font-size:small;text-decoration: blink;">[x:0107]</span>
	</div>
	<br />
	�ȥåץڡ����Ρֲ����Ͽ���᡼��פȤ�����󥯤򥯥�å�����ȥ᡼�顼��Ω���夬��ޤ���<br />
	<br />
	<div align="center" style="text-align:center;">������</div>
	<br />
	�����ȥ롢��ʸ�Ȥ�˶��ξ��֤ǥ᡼����������Ʋ�������<br />
	<br />
	<div align="center" style="text-align:center;">������</div>
	<br />
	��ư�ֿ��᡼�뤬�Ϥ��ޤ��Τǡ���ʸ�˵��ܤ��줿URL�˥����������Ʋ�������<br />
	<br />
	<div align="center" style="text-align:center;">������</div>
	<br />
	����������Υڡ����ǥץ�ե������������Ϥ��Ʋ�������<br />
	<br />
	<div align="center" style="text-align:center;">������</div>
	<br />
	����Ͽ��λ�Ǥ���<br />
	<div align="center" style="text-align:center;font-size:medium;">
		<span style="font-size:small;text-decoration: blink;">[x:0107]</span>
		<a href="mailto:{$config.mail_account.regist.account}_{$session.media_access_hash}@{$config.mail_domain}?subject={$config.mail_account.regist.subject}&body={$config.mail_account.regist.body}"><span style="color:{$menucolor};">̵�������Ͽ</span></a>
		<span style="font-size:small;text-decoration: blink;">[x:0107]</span>
	</div>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
