<!--�إå� ���TOP��--> {include file="user/header.tpl" title="���ʎގ���,���ʎގ����Ǻ�ΎŎʎߎ�����TOP" bgcolor="#FFFFFF" 
text="#666666" link="#0099FF" vlink="#6666FF"} 
<!-- napatown -->
<a name="d_top" id="d_top"></a> 
<!--top��-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=165" alt="���ʎގ����ʤ�Ŏʎߎ�����,TOP�ێ���">
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
			�ێ��ގ��ݤǤ��ʤ�����<a href="?action_user_login=true">������</a><br />
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
<div style="text-align:left;background-color:#FFFFCC;"><!--#CCDDFF-->
    <!--<div style="background-color:#3366FF; text-align:center;">���Τ餻</div>-->
    <img src="f.php?type=file&id=210" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,TOP�ێ���">
    <!--�����Ȥ��NEWS-->
    <span style="font-size:xx-small; color:#003399"> {if count($app.listview_data)} 
    {foreach from=$app.listview_data item=news} ��{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=top">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
<div style="text-align:right;">
	<a href="?action_user_news_list=true"><span style="font-size:xx-small;">��äȸ���[x:0771]</span></a><img src="f.php?type=file&id=221" width="240" height="10" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Ǝ������ێ���"></div>
</div>
<!--<img src="img_napa/top/sita_news.gif">����NEWS-->

<!--�����ý�����-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">�ý�</span></div>-->
<!--<img src="f.php?type=file&id=211" width="240" height="20">
<div style="text-align:left;">
<table valign="top">
<tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50"> </td>
      <td> <span style="font-size:xx-small"><a href=""><span style="font-size:x-small;">��ͼ�ý�</span></a><br />
��ͼ�Îގ��Ҏ��ގ��Ĥ���!!</span><br />
</td>
</tr>
</table></div>
-->
<!--�������Ў��ƎÎ�����-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">���ߥ�˥ƥ�</span></div>-->
  <img src="f.php?type=file&id=212" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,���Ў��ƎÎ��ێ���">
<div style="text-align:left;">
    <table valign="top">
      <tr> 
        <td> <img src="f.php?type=file&id=219" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,��ë�ղ����Ў��ƎÎ�"> </td>
        <td> <span style="font-size:xx-small"><a href="?action_user_community_view=true&community_id=7"><span style="font-size:x-small;">���ι����ϸ�����������Ў��ƎÎ�</span></a><br />
          �ʎߎ܎����Ď����繥���ʿͽ��ޤ�!<br>
          ���Ď��ݎ��׎ˎߎ��ġ���ë�ղ������θ�ǧ���Ў��ƎÎ���</span><br />
        </td>
      </tr>
      <tr>
        <td> <img src="f.php?type=file&id=220" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,���Ҏ��ݎ��Ў��ƎÎ�"> </td>
        <td> <span style="font-size:xx-small"><a href="?action_user_community_view=true&community_id=6"><span style="font-size:x-small;">���Ҏ��ݤ��ꤤ�������Ў��ƎÎ�</span></a><br />
          �Ӥä��ꤹ��ۤɎ����ҎݤʤΤˎ��ꤤ��Ķ�ܳ���!<br />
		  �����Ҏ��ꤤ�Վ����Ҏ��ݤθ������Ў��ƎÎ���</span><br />
        </td>
      </tr>
    </table>
    <div style="text-align:right;"> <a href="?action_user_community_search=true"><span style="font-size:xx-small;">���Ў��ƎÎ�����[x:0771]</span></a></div>
  </div>

<!--�������ގ��Ѣ���-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">������</span></div>-->
<img src="f.php?type=file&id=213" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ގ��юێ���">

<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ގ���"> </td>
        <td> <span style="font-size:xx-small"><a href="?action_user_game=true"><span style="font-size:x-small;">����������؎Ύގَʎގ�</span></a><br />
          ���ҤΎ��ˎߎ��Ď�[x:0151]���ގݎ���������!(*'-')&lt;�����Ǝ؎Ύގَʎގ�!</span><br />
        </td>
      </tr>
    </table>
    <div style="text-align:right;"> <a href="?action_user_game=true"><span style="font-size:xx-small;">��äȎ��ގ���[x:0771]</span></a></div>
	<div style="text-align:right;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>
  </div>

<!--�������ǡ��ꤤ����-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">���ǎ��ꤤ</span></div>-->
<img src="f.php?type=file&id=214" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ǎ��ꤤ�ێ���"><!--�����Ȥ���ꤤ-->

<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=222" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ǎ��ꤤ"> </td>
        <td> 
          <div style="font-size:x-small;float:right;"><a href="fp.php?code=fortune_woman_index">���ι����ϸ���</a><br />
            <span style="font-size:xx-small; color:#808080">���ʤ��ώ�������뎣��?��<br />
			�ɤ����Ƥ�����Ǥ��ʤ�! ���������ˤʤ���԰¡�<br />
���󤹤�? ���ä������?</span>  </div>
        </td>
      </tr>
    </table>
  </div>

<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=fortune_index">��äȿ��ǎ��ꤤ[x:0771]</a>
</div>

<!--�����夦������-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">�夦��</span></div>-->
<img src="f.php?type=file&id=215" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,�夦���ێ���">
<!--�����Ȥ���夦��-->
<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=223" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,�夦��"> </td>
        <td> 
          <div style="text-align:left;"> <a href="?action_user_sound=true"><span style="font-size:x-small;">�ʥѥ����������ۿ�!!</span></a><br />
            <span style="font-size:xx-small;color:#808080"> �ێ������������ޤ� �ʥѥ���������Ύ��؎��ގŎَ����ݎĎ�<br />
            �ێ���/�Ύߎ��̎�/���ގ�����/�ˎ��؎ݎ���/�Ķ���/ưʪ������etc. </span></div>
        </td>
      </tr>
    </table>
</div>
<!--
<span style="font-size:small">��Love Breeze <br />
��Beat Is Rockin'<br />
��TransOut <br />
</span>
-->
<div style="text-align:right; font-size:xx-small;">
<a href="?action_user_sound=true">��ä��夦��[x:0771]</a>
</div>
<div style="text-align:right;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>


<!--�������ʎގ����������̎ߢ�����-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">���Х���</span></div>-->
<img src="f.php?type=file&id=216" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ʎގ����ێ���">
<!--�����Ȥ�����Х���-->

<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ʎގ���"> </td>
        <td> <a href="?action_user_avatar=true"><span style="font-size:x-small;float;right">�ĎڎݎĎގ����ÎѤǤ������ˤ���������</span></a> 
        <td> 
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"> <a href="?action_user_avatar=true">��äȎ��ʎގ���[x:0771]</a> 
    </div>
  </div>

  <!--�����Îގ��Ң�����-->
<!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">�ǥ���</span></div>-->
<img src="f.php?type=file&id=217" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Îގ��Ҏێ���">
<!--�����Ȥ��DECO-->
<div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Îގ���"> </td>
        <td> <span style="font-size:x-small;float:right;"><a href="?action_user_decomail=true">���襤�������׎����������Ȥ�����</a><br />
          ��͵��פ��դ뎷���פ����äѤ�</span> </td>
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"> <a href="?action_user_decomail=true">��äȎÎގ���[x:0771]</a>
    </div>
	<div style="text-align:right;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>
  </div>
  <!--��������åԥ󥰢���-->
  <!--<div style="background-color:#3366FF;text-align:center;"><span style="color:#FFFFFF;font-size:small;">���㤤ʪ</span></div>-->
  <img src="f.php?type=file&id=218" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,�������ˎߎݎ��ގێ���"> 
  <div style="text-align:left;">
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=209" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,�������ˎߎݎ���"> </td>
        <td> <span style="font-size:xx-small"><a href="http://m.napatown.jp/?guid=ON&autologin=true"><span style="font-size:x-small;">�������Ҥξ���</span></a><br />
          �����Ƥ�ΤϤ��ξ��ʤ�!<br />
          �ߤ�ʵޤ�!</span><br />
        </td>
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"> <a href="http://m.napatown.jp/?guid=ON&autologin=true">�ʥѥ�����ޡ����åȤ�[x:0771]</a> 
    </div>
  </div>
<br />


<!--�����פ�DECO���˥�ͶƳ������-->
<div style="text-align:center; font-size:xx-small">
<a href="http://anime.puchifuru.jp"><img src="f.php?type=file&id=206" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Îގ����Ǝ�"></a><br />
�Ďގ�������[xf:0138]906i/706i�б�������<br />�ʲ������Îގ��Ҥä�?
</div>


<!--�����ȥ�-->
{html_style type="title" title="�ʥѡ������" bgcolor=#fa6b73 fontcolor=#ffffff}

<!--�����ȥ桼�����κǿ���������-->
<div align="left" style="text-align:left;font-size:small;">
	{*�����ȥ桼�����κǿ�������5��ޤ�ɽ�����ޤ�*}
	{foreach from=$app.whole_blog_article_list item=item name=blog key =k}
			<div align="left" style="text-align:left;float:left;">
				{if $config.option.avatar}
					<!--img src="f.php?type=avatar&user_id={$item.user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" /-->
				{else}
					{if $item.user_image_id}
					<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
					{/if}
				{/if}
				<span>
					<span style="color:{$timecolor};">{$item.blog_article_created_time|jp_date_format:"%m/%d (%a) %H:%M"}</span><br />
					<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}({$item.blog_article_comment_num})</a>
					({$item.user_nickname}����)
				</span>
			</div>
			{html_style type="line" color="gray"}
	{foreachelse}
		<div align="left" style="text-align:left;font-size:small;">
			�ޤ�����ޤ���<br />
		</div>
	{/foreach}{$key}
	{if $app.whole_blog_article_list && $k >=4}
		<div align="right" style="text-align:right;font-size:small;">
			&nbsp;��<a href="?action_user_blog_article_whole=true&guest=true">��äȸ���</a>[x:0082]
		</div>
		{html_style type="line" color="gray"}
	{/if}
</div>
<!--�����ȥ桼�����κǿ�������λ-->



{$sns_navi_template}
<img src="img_napa/top/line01_blue.gif" alt="���ʎގ����ʤ�Ŏʎߎ�����,�׎���"><!--�饤�����-->
<div style="text-align:right;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>

  <div style="background-color:#FFFFFF; text-align:left; font-size:xx-small"> <span style="font-size:x-small; color:#3366FF">��</span><a href="fp.php?code=guide_terms">���ѵ���</a><br />
    <span style="font-size:x-small; color:#3366FF">��</span><a href="fp.php?code=guide_policy">�̎ߎ׎��ʎގ����ݸ������</a><br />
    <!--<span style="font-size:x-small; color:#BBCCFF">��</span><a href="fp.php?code=guide_qa">Q&amp;A</a><br />-->
    <span style="font-size:x-small; color:#3366FF">��</span><a href="fp.php?code=guide_inquiry">�䤤��碌</a><br>
    <span style="font-size:x-small; color:#3366FF">��</span><a href="?action_user_config=true">����</a><br>
    <span style="font-size:x-small; color:#3366FF">��</span><a href="fp.php?code=guide_device2">�б��������</a><br />
    <span style="font-size:x-small; color:#3366FF">��</span><a href="fp.php?code=guide_point">�ŎʎߎΎߤν�����</a><br />
    <!--<span style="font-size:x-small; color:#6677FF">��</span><a href="?action_user_home=true">�ώ��͎ߎ�����</a><br>-->
    <span style="font-size:x-small; color:#3366FF">��</span><a href="?action_user_invite=true">ͧã����</a><br>
    <span style="font-size:x-small; color:#3366FF">��</span><a href="?action_user_logout_do=true">�ێ��ގ�����</a><br>
{if $session.user.user_id && !$app.logout}
<span style="font-size:x-small; color:#3366FF">��</span><a href="?action_user_resign_confirm=true">���</a><br>
{/if}
<!-- napatown footer end -->
</div></div>

<!--�եå���-->
{include file="user/footer.tpl" no_navi=true} 