{if !$no_navi}
{$sns_navi_template}
{/if}
<hr color="#ff6699" style="border:solid 1px #ff6699;">
{if !$no_footer}
<div align="left" style="text-align:left;font-size:small;">
{if $session.user.user_id && !$app.logout}
	<!--��������եå�������-->
	<a href="?action_user_top=true" accesskey="0">���TOP��</a><br />
	<a href="?action_user_home=true" accesskey="1">�ώ��͎ߎ�����</a>
	<!--��������եå�����λ-->
{else}
	<!--̤��������եå�������-->
	<a href="?action_user_index=true" accesskey="0">���TOP��</a>
	<!--̤��������եå�����λ-->
{/if}
</div>
{/if}
<div style="background-color:#ffffff;text-align:center;font-size:x-small">(c)���͎ߎ���������</div>
{*if $title}
	{html_style type="title" title="$title" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
	{html_style type="title" title="(c)$sns_name" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if*}
</div>
<!--����ƥʽ�λ-->
</body>
</html>
