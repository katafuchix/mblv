<!--目永母□-->
{include file="user/header.tpl" title="瓜由正它件鍚寧TOP" bgcolor="#FFFFFF" text="#66AAEE" link="#AA3366" vlink="#CC5588"}

<!-- napatown -->
<a name="d_top" id="d_top"></a>
<!--top伕打-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=165">
	<!--<img src="img_napa/top/logo_napatown.jpg" width="240" height="70" border="0" />--><br />
	<!--僮屢��������-->
	{ad type="index"}
	{if $session.user.user_id && !$app.logout}
		[x:0037]<a href="?action_user_home=true">��������������</a>/
		[x:0105]<a href="?action_user_invite=true">竻瓊噸謹</a><br />
	{else}
		<!--伕弘奶件釩銨-->
		<div align="center" style="text-align:center;font-size:small;">
			[x:0107]<a href="fp.php?code=guide_mail"><span style="color:{$menucolor};">拑恔莘夠瓚狤</span></a>[x:0107]
		</div>
		<div align="center" style="text-align:center;font-size:small;">
			[<a href="?action_user_login_do=true&easy_login=true&guid=ON">莘夠���������幍x:0138]</a>]<br />
			���������搕リ迨吨卅�反<a href="?action_user_login=true">������</a>
		<!--伕弘奶件蔽弇-->
	{/if}
<font size="1"><a href="http://m.napatown.jp/?guid=ON&autologin=true">����������������</a>/<a href="?action_user_decomail=true">��������</a>/<a href="?action_user_sound=true">邋丹凶</a>/<a href="?action_user_game=true">��������</a>/<a href="fp.php?code=fortune_index">褲蠅�母磥�</a></font><br>
</div>
<!--NEWS-->
<!-- napatoen -->

<!--巨仿□丟永本□斥刓憎釩銨-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div>
<!--巨仿□丟永本□斥刓憎蔽弇-->

<!--戊件氾件汁釩銨-->
<!-- napatown strat -->
<div style="background-color:#ccffff; text-align:left;"><!--#CCDDFF-->
	<img src="img_napa/top/title_news.gif"><!--凶中午月↙NEWS-->
	<span style="font-size:xx-small; color:#AA0000">
		{if count($app.listview_data)}
			{foreach from=$app.listview_data item=news}
				╯{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=top">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
</div>
<div style="background-color:#ccffff; text-align:right;">
	<a href="?action_user_news_list=true"><span style="font-size:xx-small; color:#5577CC">手勻午葦月</span></a></div>
<!--<img src="img_napa/top/sita_news.gif">票↙NEWS-->

<!--╮╮�������悢﹜�-->
<div style="background-color:#ffdd99">
<img src="f.php?type=file&id=170"><!--<img src="img_napa/top/title_game.gif">--><!--凶中午月↙必□丞-->
<!--<div style="background-color:#FFBB33; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
瘉雄↙爛����������</span></div>-->
<!--手切引月Touch!DE��������-->


<table valign="top">
<tr align="center">
<td colspan="2">
<a href="?action_user_game=true"><span style="font-size:x-small;">墓沓及鍍猾切��������������</span></a><br />
</td></tr>
<tr>
<td width="60" height="60">
<img src="f.php?type=file&id=156"  width="60" height="60" style="float:left;">
</td>
<td>
<span style="font-size:xx-small">飲曼及�����������滃x:0151]����������������!(*'-')<踞仃化��������������!</span><br />
</td>
</tr>
<tr align="center">
<td colspan="2">
<a href="?action_user_game=true"><span style="font-size:x-small;">��������������������</span></a><br />
</td></tr>
<tr>
<td width="60" height="60">
<img src="f.php?type=file&id=158"  width="60" height="60" style="float:right;">
</td>
<td>
<span style="font-size:xx-small">呺芊劑輝煙產���������棼礞�������!<br />���������惜臗壑�!!</span><br /><br />
<div style="background-color:#ffdd99; text-align:right; font-size:xx-small;">
<a href="?action_user_game=true">手勻午�������娙x:0771]</a>
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
<a href="?action_user_game=true"><div style="font-size:x-small;float:right;">墓沓及鍍猾切��������������</span></a><br />
</td>
</tr>
</table>
<span style="font-size:xx-small">飲曼及�����������滃x:0151]����������������!<br />(*'-')<踞仃化��������������!</span><br /><br />

<hr noshade color="#FFEECC">--><!--左伊件斥照瞬-->

<!--壑釵懾曰答墊-->
<!--<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=158"  width="100" height="100" style="float:left;">
</td>
<td>
<a href="?action_user_game=true"><div style="font-size:x-small;float:right;">��������������������</span></a>
</td>
</tr>
</table>
<span style="font-size:xx-small">呺芊劑輝煙產���������棼礞�������!<br />���������惜臗壑�!!<br />

<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="?action_user_game=true">手勻午�������娙x:0771]</a>
</div>-->

<!--╮╮褲蠅’燥中╮╮-->
<!--<div style="background-color:#9999EE; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
↘燥中’褲蠅↘</span></div>-->
<div style="background-color:#bdbded">
<img src="f.php?type=file&id=171">
<!--<img src="img_napa/top/title_uranai.gif">--><!--凶中午月↙燥中-->
<!--<div style="background-color:#FFFFFF; text-align:left;">
<img src="f.php?type=file&id=163" style="float:left;">
<a href="fp.php?code=fortune_index"><span style="font-size:x-small;">丐卅凶反窒匏〝＞唱嶺卞���瓣蹀捱癒������������瘏紛�!!</span></a><br />
<span style="font-size:xx-small">蕙邋!≦唱嶺卞���瓣蹀捱癒棽蛑捌�</span><br />
</div>
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="fp.php?code=fortune_index">手勻午褲蠅�母磥久x:0771]</a>
</div>-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=163" style="float:left;">
</td>
<td>
<a href="fp.php?code=fortune_index"><div style="font-size:x-small;float:right;">丐卅凶反窒匏〝＞唱嶺卞���瓣蹀捱癒������������瘏紛�!!</span></a>
</td>
</tr>
</table>

<span style="font-size:xx-small; color:#808000">蕙邋!≦唱嶺卞���瓣蹀捱癒棽蛑捌�</span><br />
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=fortune_index">手勻午褲蠅�母磥久x:0771]</a>
</div></div>

<!--╮╮邋丹凶╮╮-->
<!--<div style="background-color:#666666; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
ｎ邋丹凶ｎ</span></div>-->
<div style="background-color:#dcdcdc">
<img src="f.php?type=file&id=172">
<!--<img src="img_napa/top/title_uta.gif">--><!--凶中午月↙邋丹凶-->
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=162">
</div></td>
<td>
<div style="background-color:#dcdcdc; text-align:left;">
<a href="?action_user_sound=true"><span style="font-size:x-small; float:right">瓜由正它件つ燥т耨!!</span></a><br />

<span style="font-size:xx-small; color:#8b008b">
�����舅咫樻�仄引匹<br />瓜由正它件分仃及����������������������<br />
</span>
<span style="font-size:xx-small; color:#808080">
������/����������/����������/������������<br />棕雁祥/が坁�����占tc.
</span>
</td>
</tr>
</table>
<!--
<span style="font-size:small">ｎLove Breeze <br />
ｎBeat Is Rockin'<br />
ｎTransOut <br />
</span>
-->
<div style="text-align:right; font-size:xx-small;">
<a href="?action_user_sound=true">手勻午邋丹凶[x:0771]</a>
</div></div>

<!--╮╮扑亦永疋件弘╮╮>
<img src="img_napa/top/line01_pink.gif"><!--仿奶件↙疋件弁>
<div style="background-color:#FFEEEE; text-align:center;">
<img src="img_napa/top/logo_napa.gif"  width="146" height="80" border="1" /><br />
<a href="{$config.spgv_url}"><span style="font-size:x-small;">����������������������</span></a><br />
<span style="font-size:xx-small">↗ы木嗓樹扷↗</span>
</div>

<!--齒圴1>
<div style="background-color:#FFEEEE; text-align:center;">
<img src="img_napa/top/napa_test1.gif"  width="100" height="50" style="float:left;">
<a href="{$config.spgv_url}"><span style="font-size:x-small;">xxxxxxxxxx</span></a><br />
<span style="font-size:xx-small">xxxxxxxxxxxxxxxxx</span><br /><br /><br />
<!--齒圴2>
<img src="img_napa/top/napa_test2.gif"  width="100" height="50" style="float:left;">
<a href="{$config.spgv_url}"><span style="font-size:x-small;">xxxxxxxxxx</span></a><br />
<span style="font-size:xx-small">xxxxxxxxxxxxxxxxx</span><br /><br /><br />
</div>
<div style="background-color:#FFEEEE; text-align:center; font-size:xx-small;">
<a href="{$config.spgv_url}">引分引分丐曰引允!<br />�����甭鉹儩牝�</a>
</div>
<img src="img_napa/top/line01_pink.gif"><!--仿奶件↙疋件弁-->

<!--╮╮�������������������腡﹜���-->
<!--<div style="background-color:#FFCC66; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
∥�������������������腄�</span></div>-->
<div style="background-color:#ffffcc">
<img src="f.php?type=file&id=168">
<!--<img src="img_napa/top/title_avatar.gif">--><!--凶中午月↙失田正□-->

<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=167">
<!--<img src="img_napa/top/avatar.gif" width="100" height="80" style="float:left;">-->
</td>
<td>
<a href="?action_user_avatar=true"><span style="font-size:x-small;float;right">�����������������悀リ炊楔膉鴗豸迨誘咫芋�</span></a>
<td>
</tr>
</table>
<br />
</div>
<!--╮╮�������牶﹜���-->
<!--<div style="background-color:#FFAAAA; text-align:center;">
<span style="font-size:small; color:#FFFFFF">
╮犯戊丟╮</span></div>-->
<div style="background-color:#ffaaaa">
<img src="f.php?type=file&id=169">
<!--<img src="img_napa/top/title_deco.gif">--><!--凶中午月↙DECO-->
<table valign="top">
<tr>
<td>
<div style="float:left;">
<img src="f.php?type=file&id=166">
<!--<img src="img_napa/top/test5.gif" width="100" height="80" style="float:left;">-->
</td>
<td>
<a href="?action_user_decomail=true"><span style="font-size:x-small;float:right;">井歹中中������������<br />蟈朿午曰旵鎖<br />釐諦竣尤切孔月<br />�����蚺洶中瓣悀�</span></a>
</td>
</tr>
</table>
</div>

{$sns_navi_template}
<img src="img_napa/top/line01_blue.gif"><!--仿奶件↙斂-->
<div style="background-color:#FFFFFF; text-align:right; font-size:xx-small;">
<a href="#d_top">曉卞枑月[x:0134]</a><br />
</div>

<div style="background-color:#FFFFFF; text-align:left; font-size:xx-small">
<span style="font-size:x-small; color:#CCDDFF">╯</span><a href="fp.php?code=guide_terms">厙迕筋沶</a><br />
<span style="font-size:x-small; color:#BBCCFF">╯</span><a href="fp.php?code=guide_policy">���������������動搛謅恀�親</a><br />
<!--<span style="font-size:x-small; color:#BBCCFF">╯</span><a href="fp.php?code=guide_qa">Q&amp;A</a><br />-->
<span style="font-size:x-small; color:#AABBFF">╯</span><a href="fp.php?code=guide_inquiry">杽中寧歹六</a><br>
<span style="font-size:x-small; color:#99AAFF">╯</span><a href="?action_user_config=true">澀爛</a><br>

<span style="font-size:x-small; color:#8899FF">╯</span><a href="fp.php?code=guide_device2">覆殺窗潘域厖</a><br />
<span style="font-size:x-small; color:#7788FF">╯</span><a href="fp.php?code=guide_point">���������艉彖舅慲�</a><br />
<!--<span style="font-size:x-small; color:#6677FF">╯</span><a href="?action_user_home=true">��������������</a><br>-->

<span style="font-size:x-small; color:#5566FF">╯</span><a href="?action_user_invite=true">竻瓊噸謹</a><br>
<span style="font-size:x-small; color:#4455FF">╯</span><a href="?action_user_logout_do=true">������������</a><br>
{if $session.user.user_id && !$app.logout}
<span style="font-size:x-small; color:#4455FF">╯</span><a href="?action_user_resign_confirm=true">轉莘</a><br>
{/if}
<!-- napatown footer end -->
</div>

<!--白永正□-->
{include file="user/footer.tpl" no_navi=true}
