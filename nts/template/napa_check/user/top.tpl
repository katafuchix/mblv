<!--�إå���-->
{include file="user/header.tpl" title="�ʥѥ��������TOP" bgcolor="#FFFFFF" text="#66AAEE" link="#AA3366" vlink="#CC5588"}

<!-- napatown -->
<a name="d_top" id="d_top"></a>
<!--top��-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=165">
	<!--<img src="img_napa/top/logo_napatown.jpg" width="240" height="70" border="0" />--><br />
	<!--�����ʎގŎ�-->
	{ad type="index"}
	{if $session.user.user_id && !$app.logout}
		[x:0037]<a href="?action_user_home=true">�ώ��͎ߎ�����</a>/
		[x:0105]<a href="?action_user_invite=true">ͧã����</a><br />
	{else}
		<!--�����󳫻�-->
		<div align="center" style="text-align:center;font-size:small;">
			[x:0107]<a href="fp.php?code=guide_mail"><span style="color:{$menucolor};">̵�������Ͽ</span></a>[x:0107]
		</div>
		<div align="center" style="text-align:center;font-size:small;">
			[<a href="?action_user_login_do=true&easy_login=true&guid=ON">����ێ��ގ���[x:0138]</a>]<br />
			�ێ��ގ��ݤǤ��ʤ�����<a href="?action_user_login=true">������</a>
		<!--������λ-->
	{/if}
<font size="1"><a href="http://m.napatown.jp/?guid=ON&autologin=true">�������ˎߎݎ���</a>/<a href="?action_user_decomail=true">�Îގ���</a>/<a href="?action_user_sound=true">�夦��</a>/<a href="?action_user_game=true">���ގ���</a>/<a href="fp.php?code=fortune_index">���ǎ��ꤤ</a></font><br>
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
				��{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=top">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
</div>
<div style="background-color:#ccffff; text-align:right;">
	<a href="?action_user_news_list=true"><span style="font-size:xx-small; color:#5577CC">��äȸ���</span></a></div>
<!--<img src="img_napa/top/sita_news.gif">����NEWS-->

<!--�������ގ��Ѣ���-->
<div style="background-color:#ffdd99">
<img src="f.php?type=file&id=170"><!--<img src="img_napa/top/title_game.gif">--><!--�����Ȥ��������-->
<!--<div style="background-color:#FFBB33; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
�Ƕ������֎��ގ���</span></div>-->
<!--����ޤ�Touch!DE���ގ���-->


<table valign="top">
<tr align="center">
<td colspan="2">
<a href="?action_user_game=true"><span style="font-size:x-small;">����������؎Ύގَʎގ�</span></a><br />
</td></tr>
<tr>
<td width="60" height="60">
<img src="f.php?type=file&id=156"  width="60" height="60" style="float:left;">
</td>
<td>
<span style="font-size:xx-small">���ҤΎ��ˎߎ��Ď�[x:0151]���ގݎ���������!(*'-')<�����Ǝ؎Ύގَʎގ�!</span><br />
</td>
</tr>
<tr align="center">
<td colspan="2">
<a href="?action_user_game=true"><span style="font-size:x-small;">���ގ����َ��ގ�����</span></a><br />
</td></tr>
<tr>
<td width="60" height="60">
<img src="f.php?type=file&id=158"  width="60" height="60" style="float:right;">
</td>
<td>
<span style="font-size:xx-small">��ˡ�����ϲ������ێ����򤱎�����!<br />�ʎ�������������!!</span><br /><br />
<div style="background-color:#ffdd99; text-align:right; font-size:xx-small;">
<a href="?action_user_game=true">��äȎ��ގ���[x:0771]</a>
</div>
</td>
</tr>
</table>
</div>
<!--<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=156"  width="100" height="100" style="float:left;">
</td>
<td>
<a href="?action_user_game=true"><div style="font-size:x-small;float:right;">����������؎Ύގَʎގ�</span></a><br />
</td>
</tr>
</table>
<span style="font-size:xx-small">���ҤΎ��ˎߎ��Ď�[x:0151]���ގݎ���������!<br />(*'-')<�����Ǝ؎Ύގَʎގ�!</span><br /><br />

<hr noshade color="#FFEECC">--><!--����󥸷���-->

<!--������굪��-->
<!--<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=158"  width="100" height="100" style="float:left;">
</td>
<td>
<a href="?action_user_game=true"><div style="font-size:x-small;float:right;">���ގ����َ��ގ�����</span></a>
</td>
</tr>
</table>
<span style="font-size:xx-small">��ˡ�����ϲ������ێ����򤱎�����!<br />�ʎ�������������!!<br />

<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="?action_user_game=true">��äȎ��ގ���[x:0771]</a>
</div>-->

<!--�������ǡ��ꤤ����-->
<!--<div style="background-color:#9999EE; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
���ꤤ�����ǡ�</span></div>-->
<div style="background-color:#bdbded">
<img src="f.php?type=file&id=171">
<!--<img src="img_napa/top/title_uranai.gif">--><!--�����Ȥ���ꤤ-->
<!--<div style="background-color:#FFFFFF; text-align:left;">
<img src="f.php?type=file&id=163" style="float:left;">
<a href="fp.php?code=fortune_index"><span style="font-size:x-small;">���ʤ��ϲ��̡��ְ����ˎӎä����¡׎׎ݎ��ݎ���ȯɽ!!</span></a><br />
<span style="font-size:xx-small">����!�ذ����ˎӎä����¡��ۿ���</span><br />
</div>
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="fp.php?code=fortune_index">��äȿ��ǎ��ꤤ[x:0771]</a>
</div>-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=163" style="float:left;">
</td>
<td>
<a href="fp.php?code=fortune_index"><div style="font-size:x-small;float:right;">���ʤ��ϲ��̡��ְ����ˎӎä����¡׎׎ݎ��ݎ���ȯɽ!!</span></a>
</td>
</tr>
</table>

<span style="font-size:xx-small; color:#808000">����!�ذ����ˎӎä����¡��ۿ���</span><br />
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=fortune_index">��äȿ��ǎ��ꤤ[x:0771]</a>
</div></div>

<!--�����夦������-->
<!--<div style="background-color:#666666; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
���夦����</span></div>-->
<div style="background-color:#dcdcdc">
<img src="f.php?type=file&id=172">
<!--<img src="img_napa/top/title_uta.gif">--><!--�����Ȥ���夦��-->
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=162">
</div></td>
<td>
<div style="background-color:#dcdcdc; text-align:left;">
<a href="?action_user_sound=true"><span style="font-size:x-small; float:right">�ʥѥ����������ۿ�!!</span></a><br />

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
</span>
-->
<div style="text-align:right; font-size:xx-small;">
<a href="?action_user_sound=true">��ä��夦��[x:0771]</a>
</div></div>

<!--��������åԥ󥰢���>
<img src="img_napa/top/line01_pink.gif"><!--�饤����ԥ�>
<div style="background-color:#FFEEEE; text-align:center;">
<img src="img_napa/top/logo_napa.gif"  width="146" height="80" border="1" /><br />
<a href="{$config.spgv_url}"><span style="font-size:x-small;">�ŎʎߎŎʎߎώ�������</span></a><br />
<span style="font-size:xx-small">�����ھ����</span>
</div>

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
<div style="background-color:#ffffcc">
<img src="f.php?type=file&id=168">
<!--<img src="img_napa/top/title_avatar.gif">--><!--�����Ȥ�����Х���-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=167">
<!--<img src="img_napa/top/avatar.gif" width="100" height="80" style="float:left;">-->
</td>
<td>
<a href="?action_user_avatar=true"><span style="font-size:x-small;float;right">�ĎڎݎĎގ����ÎѤǤ������ˤ���������</span></a>
<td>
</tr>
</table>
<br />
</div>
<!--�����Îގ��Ң�����-->
<!--<div style="background-color:#FFAAAA; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
���ǥ��ᢡ</span></div>-->
<div style="background-color:#ffaaaa">
<img src="f.php?type=file&id=169">
<!--<img src="img_napa/top/title_deco.gif">--><!--�����Ȥ��DECO-->
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=166">
<!--<img src="img_napa/top/test5.gif" width="100" height="80" style="float:left;">-->
</td>
<td>
<a href="?action_user_decomail=true"><span style="font-size:x-small;float:right;">���襤�������׎�����<br />�����Ȥ�����<br />��͵��פ��դ�<br />�����פ����äѤ�</span></a>
</td>
</tr>
</table>
</div>

{$sns_navi_template}
<img src="img_napa/top/line01_blue.gif"><!--�饤�����-->
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
<span style="font-size:x-small; color:#4455FF">��</span><a href="?action_user_logout_do=true">�ێ��ގ�����</a><br>
{if $session.user.user_id && !$app.logout}
<span style="font-size:x-small; color:#4455FF">��</span><a href="?action_user_resign_confirm=true">���</a><br>
{/if}
<!-- napatown footer end -->
</div>

<!--�եå���-->
{include file="user/footer.tpl" no_navi=true}
