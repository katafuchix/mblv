<!--�إå� ����TOP��-->
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
		[x:0037]<a href="?action_user_home=true">�ώ��͎ߎ�����</a>[x:0037]<br />
		[x:0105]<a href="?action_user_invite=true">ͧã����</a>[x:0105]<br /><br />
	{else}
		<!--�����󳫻�-->
		<div align="center" style="text-align:center;font-size:small;">
			<img src="f.php?type=file&id=188">[x:0107]<a href="fp.php?code=guide_mail"><span style="color:{$menucolor};">̵�������Ͽ</span></a>[x:0107]<img src="f.php?type=file&id=187">
		</div>

<div align="center" style="text-align:center;font-size:small;">
[<a href="?action_user_login_do=true&easy_login=true&guid=ON">����ێ��ގ���[x:0138]</a>]</div>
</table>
<!--�ێ��ގ��ݤǤ��ʤ�����<a href="?action_user_login=true">������</a>-->

		<!--������λ-->
	{/if}
<!--<font size="1"><a href="http://m.napatown.jp/?guid=ON&autologin=true">�������ˎߎݎ���</a>/<a href="fp.php?code=guide_mail">�Îގ���</a>/<a href="fp.php?code=guide_mail">�夦��</a>/<a href="fp.php?code=guide_mail">���ގ���</a>/<a href="fp.php?code=guide_mail">���ǎ��ꤤ</a></font><br>-->
</div>
<!--NEWS-->
<!-- napatoen -->

<!--���顼��å�����ɽ������-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div></div>
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
<div style="background-color:#ccffff; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��äȸ���</a>[x:0771]
</div>

<!--�������ʎގ����������̎ߢ�����-->
<div style="background-color:#ffffcc">
<img src="f.php?type=file&id=192">
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=167">
</div></td>
<td>
<a href="fp.php?code=guide_mail">
<span style="font-size:x-small;float:right;">�������ˤ���������</span></a><br />
<span style="font-size:xx-small;">
��ʬ�餷��[x:0156]�����٤�[x:0159]<br />�ĎڎݎĎގ����Î�[x:0160]�����夰���[x:0214]�ޤ�!</span>
</td>
</tr>
</table>
<div style="background-color:#ffffcc; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��äȎ��ʎގ���</a>[x:0771]
</div>

<!--�������ǡ��ꤤ����-->
<div style="background-color:#bdbded">
<img src="f.php?type=file&id=195">
<table valign="top">
<tr>
<td>
<div style="float:left; background-color:#bdbded">
<img src="f.php?type=file&id=163" style="float:left;">
</div>
</td>

<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;float:right;">���ʤ��ϲ���?�������ˎӎä������׎ݎ��ݎ���ȯɽ!!</span></a><br />
<span style="font-size:xx-small; color:#808000">�ذ����ˎӎä����¡��ۿ���</span><br />
</td>
</tr>
</table>


<div style="background-color:#bdbded; text-align:right; font-size:xx-small; background-color:#bdbded">
<a href="fp.php?code=guide_mail">��äȿ��ǎ��ꤤ</a>[x:0771]
</div>


<!--�����夦������-->
<div style="background-color:#dcdcdc; text-align:left;">
<img src="f.php?type=file&id=172">
<table valign="top">
<tr>
<td width="50" height="50">
<div style="float:left;">
<img src="f.php?type=file&id=162" width="50" height="50">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small; float:right">�ʥѥ����������ۿ�!!</span></a><br />
<span style="font-size:xx-small; color:#8b008b">
�ێ������������ޤ�<br />���������Ύ��؎��ގŎَ����ݎĎ�<br />
</span>
<span style="font-size:xx-small; color:#808080">
�ێ���/�Ύߎ��̎�/���ގ�����/�ˎ��؎ݎ��ގ���etc<br />
</span>
</td>
</tr>
</table>
<div style="background-color:#dcdcdc; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��ä��夦��</a>[x:0771]
</div>

<!--�������ގ��Ѣ���-->
<div style="background-color:#ffdd99">
<img src="f.php?type=file&id=194">

<table valign="top">
<tr>
<td width="65" height="65">
<img src="f.php?type=file&id=156" width="65" height="65" style="float:left;">
</td>
<td>
<span style="font-size:xx-small"><a href="fp.php?code=guide_mail">����������؎Ύގَʎގ�</a><br />
���ҤΎ��ˎߎ��Ď�[x:0151]<br />���ގݎ���������!<br />(*'-')<�����Ǝ؎Ύގَʎގ�!</span><br />
</td>
</tr>
</table>
<div style="background-color:#ffdd99; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��äȎ��ގ���</a>[x:0771]
</div>


<!--�����Îގ��Ң�����-->
<div style="background-color:#ffaaaa">
<img src="f.php?type=file&id=193">
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=166">
</div></td>
<td>
<a href="fp.php?code=guide_mail"><span style="font-size:x-small;float:right">
�����Ȥ�����</span></a><br />
<span style="font-size:xx-small;">
��͵�[x:0085]�פ��դ뎷���פΎ��܎���[x:0183]�����äѤ�[x:0200]</span>
</td>
</tr>
</table>
<div style="background-color:#ffaaaa; text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��äȎÎގ���</a>[x:0771]
</div>
</div>
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">

<img src="img_napa/top/line01_blue.gif"><!--�饤�����-->
<a name="d_category" id="d_category">
<div style="background-color:#AABBFF; text-align:center;"><!--#88ddee-->
<span style="font-size:small; color:#FFFFFF">
�����Î��ގآ�</span>
</div>
<div style="background-color:#CCDDFF; text-align:left; font-size:xx-small"><!--#ccffff-->
<a href="http://m.napatown.jp/?guid=ON&autologin=true"><span style="font-size:xx-small; color:#ff1493">�������ˎߎݎ���</span></a><span style="font-size:xx-small; color:#ffffff">��</span>:<span style="font-size:xx-small; color:#886666">�����������㤤ʪ��</span><br />
<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#8a2be2">�夦��</span></a><span style="font-size:xx-small; color:#ffffff">����</span>:<span style="font-size:xx-small; color:#886666">ή�Ԏ����ݎĎ�</span><br />


<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:red">���ʎގ���</span></a><span style="font-size:xx-small; color:#ffffff">���� </span>:<span style="font-size:xx-small; color:#886666">���������������ʎߎ�</span><br />


<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#ffa500">���ގ���</span></a><span style="font-size:xx-small; color:#ffffff">������</span>:<span style="font-size:xx-small; color:#886666">�ڤ������ߤ���</span><br />

<!--
<a href="http://m.panatown.jp/?guid=ON"><span style="font-size:xx-small; color:#808000">����å�</span></a>
<span style="font-size:xx-small; color:#ffffff">��</span>:
<span style="font-size:xx-small; color:#886666">��������</span><br />
-->


<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#113366">���ǡ��ꤤ</span></a>:<span style="font-size:xx-small; color:#886666">�ճ��ʿ��¤�!?</span><br />


<a href="fp.php?code=guide_mail"><span style="font-size:xx-small; color:#ff69b4">�Îގ���</span></a><span style="font-size:xx-small; color:#ffffff">������</span>:<span style="font-size:xx-small; color:#886666">�����Ȥ�����</span><br />
</div>
<img src="img_napa/top/line01_blue.gif"><!--�饤�����-->
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<img src="f.php?type=file&id=190"><a href="#d_top">������[x:0134]</a><br />
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

<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
{/if}
<!-- napatown footer end -->
</div>

<!--�եå���-->
{include file="user/footer.tpl" no_navi=true}

</div>