<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�Ҏ��َ��Ďގڎ��ѹ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	��Ͽ�����Ҏ��َ��Ďގڎ����ѹ����ޤ��Τǡ������Ύ؎ݎ��򎸎؎������Ƥ���᡼��򤷤Ʋ�������<br />
	�Ҏ��������夷�Ф餯����ȎҎ��َ��Ďގڎ��ѹ���λ�Ҏ��٤��Ϥ��ޤ���
	<br />
	<div align="center" style="text-align:center;font-size:small;">
	<a href="{html_style type='mailto' account='change' subject='���ΤޤގҎ��٤��������Ƥ�������' body=$session.user.user_hash}">[x:0105]�Ҏ��َ��Ďގڎ��ѹ�[x:0105]</a><br />
	</div>
	<br />
	���ǥ᡼���к��򤷤Ƥ������ϡ�{$config.mail_domain}�פ���ΎҎ��٤�����Ǥ���褦����򤪴ꤤ�פ��ޤ���
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
