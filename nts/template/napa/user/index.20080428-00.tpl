<!--�إå���-->
{include file="user/header.tpl" title="�ʥѥ��������TOP" bgcolor="#FFFFFF" text="#66AAEE" link="#AA3366" vlink="#CC5588"}

<!-- napatown -->
<a name="d_top" id="d_top"></a>
<!--top��-->
<div style="text-align:center; font-size:xx-small;">
	<img src="img_napa/top/logo_napatown.jpg" width="240" height="70" border="0" /><br />
	<!--�����ʎގŎ�-->
	{ad type="index"}
	{if $session.user.user_id && !$app.logout}
		[x:0037]<a href="?action_user_home=true">�ώ��͎ߎ�����</a>[x:0037]<br />
		[x:0105]<a href="?action_user_invite=true">ͧã����</a>[x:0105]<br /><br />
	{else}
		<!--�����󳫻�-->
		<div align="center" style="text-align:center;font-size:small;">
			[x:0107]<a href="fp.php?code=guide_mail"><span style="color:{$menucolor};">̵�������Ͽ</span></a>[x:0107]
		</div>
		<div align="center" style="text-align:center;font-size:small;">
			[<a href="?action_user_login_do=true&easy_login=true&guid=ON">����ێ��ގ���[x:0138]</a>]<br />
			�ێ��ގ��ݤǤ��ʤ�����<a href="?action_user_login=true">������</a>
		</div>
		<!--������λ-->
	{/if}
<font size="1"><a href="fp.php?code=guide_mail">�Îގ���</a>/<a href="fp.php?code=guide_mail">�夦��</a>/<a href="fp.php?code=guide_mail">���ގ���</a>/<a href="fp.php?code=guide_mail">���ǎ��ꤤ</a></font><br><br>
</div>
<!--NEWS-->
<!-- napatoen -->

<!--���顼��å�����ɽ������-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div>
<!--���顼��å�����ɽ����λ-->

<!--����ƥ�ĳ���-->
<!-- napatown strat -->
<div style="background-color:#ccffff; text-align:left;"><!--#CCDDFF-->
	<img src="img_napa/top/title_news.gif"><!--�����Ȥ��NEWS-->
	<span style="font-size:xx-small; color:#AA0000">
		{if count($app.listview_data)}
			{foreach from=$app.listview_data item=news}
				��{$news.news_time}<a href="fp.php?code=guide_mail">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
</div>
<div style="background-color:#ccffff; text-align:right;">
	<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#5577CC">��äȸ���</span></a></div>
<!--<img src="img_napa/top/sita_news.gif">����NEWS-->

<!--�������ގ��Ѣ���-->
<img src="img_napa/top/title_game.gif"><!--�����Ȥ��������-->
<!--<div style="background-color:#FFBB33; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
�Ƕ������֎��ގ���</span></div>-->
<!--����ޤ�Touch!DE���ގ���-->
<!--<div style="background-color:#FFFFFF; text-align:left;">
<img src="img_napa/top/g1_test.gif"  width="60" height="60" style="float:left;">
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;">����ޤ�Touch!DE���ގ���</span></a><br />
<span style="font-size:xx-small">����ޤ뎹�ގ�����2��[x:0183]�����٤Ϥ⤰�餿����[x:0765]���襤�������׎�����ã�򤤤äѤ�á����</span><br /><br />
<hr noshade color="#FFEECC">--><!--����󥸷���-->
<!--������굪��-->
<!--<img src="img_napa/top/g5_test.gif"  width="60" height="60" style="float:right;">
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;">������굪��</span></a><br />
<span style="font-size:xx-small">���ȤäƤ⎼�ݎ̎ߎ٤���ꎹ�ގ��ю�������ʪ������������γ������</span><br />
</div>-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="img_napa/top/g1_test.gif"  width="60" height="60" style="float:left;">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;folat:right;">����ޤ�Touch!DE���ގ���</span></a>
</td>
</tr>
</table>
<span style="font-size:xx-small">����ޤ뎹�ގ�����2��[x:0183]�����٤Ϥ⤰�餿����[x:0765]���襤�������׎�����ã�򤤤äѤ�á����</span><br /><br />
<hr noshade color="#FFEECC"><!--����󥸷���-->

<!--������굪��-->
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="img_napa/top/g5_test.gif"  width="60" height="60" style="float:left;">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;float:right;">������굪��</span></a>
</td>
</tr>
</table>
<span style="font-size:xx-small">���ȤäƤ⎼�ݎ̎ߎ٤���ꎹ�ގ��ю�������ʪ������������γ������</span><br />

<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��äȎ��ގ���[x:0771]</a>
</div>

<!--�������ǡ��ꤤ����-->
<!--<div style="background-color:#9999EE; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
���ꤤ�����ǡ�</span></div>-->
<img src="img_napa/top/title_uranai.gif"><!--�����Ȥ���ꤤ-->
<!--<div style="background-color:#FFFFFF; text-align:left;">
<img src="f.php?type=file&id=163" style="float:left;">
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;">���ʤ��ϲ��̡��ְ����ˎӎä����¡׎׎ݎ��ݎ���ȯɽ!!</span></a><br />
<span style="font-size:xx-small">����!�ذ����ˎӎä����¡��ۿ���</span><br />
</div>
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��äȿ��ǎ��ꤤ[x:0771]</a>
</div>-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=163" style="float:left;">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;float:right;">���ʤ��ϲ��̡��ְ����ˎӎä����¡׎׎ݎ��ݎ���ȯɽ!!</span></a>
</td>
</tr>
</table>
<span style="font-size:xx-small">����!�ذ����ˎӎä����¡��ۿ���</span><br />

<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��äȿ��ǎ��ꤤ[x:0771]</a>
</div>



<!--�����夦������-->
<!--<div style="background-color:#666666; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
���夦����</span></div>-->
<img src="img_napa/top/title_uta.gif"><!--�����Ȥ���夦��-->
<div style="background-color:#FFFFFF; text-align:left;">

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=162">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small; float:right">�ʥѥ����������ۿ�!!</span></a><br />
<span style="font-size:xx-small; color:#8b008b">
�ێ������������ޤ�<br />�ʥѥ���������Ύ��؎��ގŎَ����ݎĎ�<br />
</span>
<span style="font-size:xx-small; color:#808080">
�ێ���/�Ύߎ��̎�/���ގ�����/�ˎ��؎ݎ���<br />�Ķ���/ưʪ������etc.
</span>
</td>
</tr>
</table>
<!--
<span style="font-size:small">��Love Breeze <br />
��Beat Is Rockin'<br />
��TransOut <br />
</span>-->

</div>
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��ä��夦��[x:0771]</a>
</div>

<!--��������åԥ󥰢���-->
<!--img src="img_napa/top/line01_pink.gif"><!--�饤����ԥ�>
<div style="background-color:#FFEEEE; text-align:center;">
<img src="img_napa/top/logo_napa.gif"  width="146" height="80" border="1" /><br />
<a href="{$config.spgv_url}"><span style="font-size:x-small;">�ŎʎߎŎʎߎώ�������</span></a><br />
<span style="font-size:xx-small">�����ھ����</span>


<!--����1>
<div style="background-color:#FFEEEE; text-align:center;">
<img src="img_napa/top/napa_test1.gif"  width="100" height="50" style="float:left;">
<a href="{$config.spgv_url}"><span style="font-size:x-small;">xxxxxxxxxx</span></a><br />
<span style="font-size:xx-small">xxxxxxxxxxxxxxxxx</span><br /><br /><br />
<!--����2>
<img src="img_napa/top/napa_test2.gif"  width="100" height="50" style="float:left;">
<a href="{$config.spgv_url}"><span style="font-size:x-small;">xxxxxxxxxx</span></a><br />
<span style="font-size:xx-small">xxxxxxxxxxxxxxxxx</span><br /><br /><br />
</div>
<div style="background-color:#FFEEEE; text-align:center; font-size:xx-small;">
<a href="{$config.spgv_url}">�ޤ��ޤ�����ޤ�!<br />�Ҏ�����쾦��</a>
</div>
<img src="img_napa/top/line01_pink.gif"><!--�饤����ԥ�-->

<!--�������ʎގ����������̎ߢ�����-->
<!--<div style="background-color:#FFCC66; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
�����ʎގ����������̎ߡ�</span></div>-->
<img src="img_napa/top/title_avatar.gif"><!--�����Ȥ�����Х���-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="img_napa/top/avatar.gif" width="100" height="80" style="float:left">
</div></td>
<td>
<a href="fp.php?code=guide_mail">
<span style="font-size:x-small;float:right;">�ĎڎݎĎގ����ÎѤǤ������ˤ���������</span></a>
</td>
</tr>
</table>
<br />

<!--�����Îގ��Ң�����-->
<!--<div style="background-color:#FFAAAA; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
���ǥ��ᢡ</span></div>-->
<img src="img_napa/top/title_deco.gif"><!--�����Ȥ��DECO-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="img_napa/top/test5.gif" width="100" height="80" style="float:left;">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;float:right">���襤�������׎�����<br />�����Ȥ�����<br />��͵��פ��դ�<br />�����פ����äѤ�</span></a>
</td>
</tr>
</table>

{$sns_navi_template}
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="#d_top">������[x:0134]</a><br />
</div>

<div style="background-color:#FFFFFF; text-align:left; font-size:xx-small">
<span style="font-size:x-small; color:#CCDDFF">��</span><a href="fp.php?code=guide_terms">���ѵ���</a><br />
<span style="font-size:x-small; color:#BBCCFF">��</span><a href="fp.php?code=guide_policy">�̎ߎ׎��ʎގ����ݸ������</a><br />
<!--<span style="font-size:x-small; color:#BBCCFF">��</span><a href="fp.php?code=guide_qa">Q&amp;A</a><br />-->
<span style="font-size:x-small; color:#AABBFF">��</span><a href="fp.php?code=guide_inquiry">�䤤��碌</a><br>
<span style="font-size:x-small; color:#99AAFF">��</span><a href="?action_user_config=true">����</a><br>

<span style="font-size:x-small; color:#8899FF">��</span><a href="fp.php?code=guide_device2">�б��������</a><br />
<span style="font-size:x-small; color:#7788FF">��</span><a href="fp.php?code=guide_point">�ŎʎߎΎߤν�����</a><br />
<!--<span style="font-size:x-small; color:#6677FF">��</span><a href="?action_user_home=true">�ώ��͎ߎ�����</a><br>-->

<span style="font-size:x-small; color:#5566FF">��</span><a href="?action_user_invite=true">ͧã����</a><br>
<span style="font-size:x-small; color:#4455FF">��</span><a href="?action_user_logout=true">�ێ��ގ�����</a><br>
{if $session.user.user_id && !$app.logout}
<span style="font-size:x-small; color:#4455FF">��</span><a href="?action_user_resign_confirm=true">���</a><br>
{/if}
<!-- napatown footer end -->
</div>

<!--�եå���-->
{include file="user/footer.tpl" no_navi=true}

</div>