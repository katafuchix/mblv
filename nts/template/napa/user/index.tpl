<!--�إå� ����TOP��--> {include file="user/header.tpl" title="���ʎގ���,���ʎގ����Ǻ�ΎŎʎߎ�����TOP" bgcolor="#FFFFFF" 
text="#666666" link="#0099FF" vlink="#6666FF"} 
<!-- napatown -->
<a name="d_top" id="d_top"></a> 
<!--top��-->
<div style="text-align:center; font-size:xx-small;">
        <img src="f.php?type=file&id=268" alt="���ʎގ����ʤ�Ŏʎߎ�����,TOP�ێ���">
	<!--<img src="img_napa/top/logo_napatown.jpg" width="240" height="70" border="0" />--><br />
	<!--�����ʎގŎ�-->
	{ad type="index"}
	{if $session.user.user_id && !$app.logout}
		[x:0037]<a href="?action_user_home=true">�ώ��͎ߎ�����</a>[x:0037]<br />
		[x:0105]<a href="?action_user_invite=true">ͧã����</a>[x:0105]<br /><br />
	{else}
		<!--�����󳫻�-->
		
  <div align="center" style="text-align:center;font-size:small;"> [x:0107]<a href="fp.php?code=guide_mail"><span style="color:{$menucolor};">̵�������Ͽ</span></a>[x:0107] 
  </div>

<div align="center" style="text-align:center;font-size:small;">
[<a href="http://c.napatown.jp/fp.php?action_user_login_do=true&easy_login=true&guid=ON">����ێ��ގ���[x:0138]</a>]</div>

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
</div>
<!--���顼��å�����ɽ����λ-->

<!--����ƥ�ĳ���-->
<!-- napatown strat -->
<div style="text-align:left;"> 
<!--
<div style="text-align:center;"><img src="f.php?type=file&id=210" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Ŏʎߎ����ݎƎ�����"></div>-->
  <!--�����Ȥ��NEWS-->
<!--<span style="font-size:xx-small; color:#3333CC"> {if count($app.listview_data)} 
  {foreach from=$app.listview_data item=news} ��{$news.news_time}<a href="fp.php?code=guide_mail">{$news.news_title}</a><br />
			{/foreach}
		{/if}
	</span>
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=guide_mail">��äȸ���</a>[x:0771]
	<div style="text-align:center;"><img src="f.php?type=file&id=221" width="240" height="10" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Ǝ������ێ���"></div>
</div>-->

<!--�����ý�����-->
<div style="text-align:center;"><img src="f.php?type=file&id=251" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,PickUp!"></div>
  <div style="text-align:center;"> <span style="font-size:xx-small"> </span> <a href="http://m.napatown.jp/?guid=ON&autologin=true"><span style="font-size:xx-small;">[x:0201]�ʥѥ�����ޡ����å�[x:0201]</span><br />
    <img src="f.php?type=file&id=271" width="150" height="30" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Ŏʎߎ����ݎώ�������"></a><br />
    <span style="font-size:xx-small; color:#808080">�����ٳ�����!!</span><br />
    <div style="text-align:center;"><img src="f.php?type=file&id=272" width="150" height="3" alt="���ʎގ����ʤ�Ŏʎߎ�����,Pickup�̎ގ׎ݎ�"></div>
    <a href="http://m.napatown.jp/?action_mall_shop=true&shop_id=1"><span style="font-size:xx-small;">[x:0138]�������Ўݎێ�����[x:0138]</span><br />
    <img src="f.php?type=file&id=270" width="150" height="30" alt="���ʎގ����ʤ�Ŏʎߎ�����,�ʎߎ܎����Ď��ݤΎ������Ўݎێ�����"></a><br />
    <span style="font-size:xx-small; color:#808080">�ꤤ��𤨤ơ��ʎߎ܎����Ď���!!</span><br />
  </div>
    <div style="text-align:right; font-size:xx-small;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>
  <!--�������ʎގ����������̎ߢ�����-->
  <div style="text-align:center;"><img src="f.php?type=file&id=252" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ʎގ����ێ���"></div>
  <table valign="top">
    <tr>
      <td> <img src="f.php?type=file&id=259" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ʎގ���"> 
      </td>
      <td> <a href="fp.php?code=about_avatar"> <span style="font-size:x-small;">���ʎގ����ä�?</span></a><br />
        <span style="font-size:xx-small; color:#808080">��ʬ�餷��[x:0156]�����٤�[x:0159]<br />
        �ĎڎݎĎގ����Î�[x:0160]�����夰���[x:0214]�ޤ�!</span> </td>
    </tr>
  </table>
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=intro_avatar">��äȎ��ʎގ���</a>[x:0771]
</div>

<!--�������ǡ��ꤤ����-->
    <div style="text-align:center;"><img src="f.php?type=file&id=257" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ǎ��ꤤ�ێ���"></div>
    
  <table valign="top">
    <tr>
      <td> <img src="f.php?type=file&id=265" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ǎ��ꤤ"> 
      </td>
      <td> <a href="fp.php?code=intro_fortune"><span style="font-size:x-small;float:">ͭ̾�ꤤ�մƽ��ο��ǎ��ꤤ������̵��!!</span></a><br />
        <span style="font-size:xx-small; color:#808080">���ޤ���ä����ʤ��α�̿��?<br>
        ��᤿�Ϥ�����Ф��ʎߎ܎����Ď��ݤ�������!!</span><br />
      </td>
    </tr>
  </table>


  <div style="text-align:right; font-size:xx-small;"> <a href="fp.php?code=intro_fortune">��äȿ��ǎ��ꤤ</a>[x:0771] 
    <div style="text-align:right; font-size:xx-small;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>
  </div>


<!--�����夦������-->
  <div style="text-align:left;"> 
    <div style="text-align:center;"><img src="f.php?type=file&id=258" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,�夦���ێ���"></div>
    <table valign="top">
<tr>
<td width="50" height="50">
<div style="float:left;">
<img src="f.php?type=file&id=266" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,�夦�����Ҏ�����">
</div></td>
<td>
<a href="fp.php?code=intro_sound"><span style="font-size:x-small;">�ʥѥ����������ۿ�!!</span></a><br />
          <span style="font-size:xx-small; color:#808080">�ێ������������ޤǎ��������Ύ��؎��ގŎَ����ݎĎ�<br />
�ێ���/�Ύߎ��̎�/���ގ�����/�ˎ��؎ݎ��ގ���etc<br />
</span>
</td>
</tr>
</table>
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=intro_sound">��ä��夦��</a>[x:0771]
</div>

<!--�������ގ��Ѣ���-->
      <div style="text-align:center;"><img src="f.php?type=file&id=269" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ގ��юێ���"></div>
      
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=263" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ގ���"> 
        </td>
        <td> <a href="fp.php?code=intro_game"><span style="font-size:x-small;"> ����������؎Ύގَʎގ�</span></a><br />
          <span style="font-size:xx-small; color:#808080">���ҤΎ��ˎߎ��Ď�[x:0151]���ގݎ���������!(*'-')&lt;�����Ǝ؎Ύގَʎގ�!</span><br />
        </td>
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"> <a href="fp.php?code=intro_game">��äȎ��ގ���</a>[x:0771] 
      <div style="text-align:right; font-size:xx-small;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>
    </div>
	
	
    <!--�����Îގ��Ң�����-->
      <div style="text-align:center;"><img src="f.php?type=file&id=254" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Îގ��Ҏێ���"></div>
      
    <table valign="top">
      <tr>
        <td> <img src="f.php?type=file&id=262" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,�Îގ���"> 
        </td>
        <td> <a href="fp.php?code=intro_deco"><span style="font-size:x-small;"> 
          ���襤�������׎������������ʎߎ�</span></a><br />
          <span style="font-size:xx-small; color:#808080">��̣�������ʳ�ʸ������������<blink><span style="; color:#FF0000">(�������)</span></blink></span> 
        </td>
      </tr>
    </table>
<div style="text-align:right; font-size:xx-small;">
<a href="fp.php?code=intro_deco">��äȎÎގ���</a>[x:0771]
</div>
</div>
<div align="left" style="text-align:left;font-size:small;">


    <!--��������åԥ󥰢�����-->
      <div style="text-align:center;"><img src="f.php?type=file&id=256" width="240" height="20" alt="���ʎގ����ʤ�Ŏʎߎ�����,�������ˎߎݎ��ގێ���"></div>
      
    <table valign="top">
      <tr> 
        <td> <img src="f.php?type=file&id=276" width="50" height="50" alt="���ʎގ����ʤ�Ŏʎߎ�����,�������ˎߎݎ���"> 
        </td>
        <td> <span style="font-size:xx-small; color:#808080"><a href="http://m.napatown.jp/?action_mall_item=true&item_id=9"><span style="font-size:x-small;">�������ގ�����&�ˎώ׎Կ徽�Ύ̎ގڎ�</span></a><br />
          �ˎގ��ގȎ��������������͎��Ɀ��夲�����ͤˎ������ҤΎ̎ގڎ�!!<br />
        </td>
      </tr>
    </table>
    <div style="text-align:right; font-size:xx-small;"><a href="http://m.napatown.jp/?guid=ON&autologin=true">��äȤ��㤤ʪ</a>[x:0771] 
      <div style="text-align:right; font-size:xx-small;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>
    </div>
</div>
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">


<img src="img_napa/top/line01_blue.gif" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ʎގ����׎���"><!--�饤�����-->
<a name="d_category" id="d_category"></a>
<div style="background-color:#AABBFF; text-align:center;"><!--#88ddee-->
<span style="font-size:small; color:#FFFFFF">
�����Î��ގآ�</span>
</div>
<div style="background-color:#CCDDFF; text-align:left; font-size:xx-small"><!--#ccffff-->
<a href="http://m.napatown.jp/?guid=ON&autologin=true"><span style="font-size:xx-small; color:#ff1493">�������ˎߎݎ���</span></a><span style="font-size:xx-small; color:#ffffff">��</span>:<span style="font-size:xx-small; color:#886666">�����������㤤ʪ��</span><br />
<a href="fp.php?code=intro_sound"><span style="font-size:xx-small; color:#8a2be2">�夦��</span></a><span style="font-size:xx-small; color:#ffffff">����</span>:<span style="font-size:xx-small; color:#886666">ή�Ԏ����ݎĎ�</span><br />


<a href="fp.php?code=intro_avatar"><span style="font-size:xx-small; color:red">���ʎގ���</span></a><span style="font-size:xx-small; color:#ffffff">���� </span>:<span style="font-size:xx-small; color:#886666">���������������ʎߎ�</span><br />


<a href="fp.php?code=intro_game"><span style="font-size:xx-small; color:#ffa500">���ގ���</span></a><span style="font-size:xx-small; color:#ffffff">������</span>:<span style="font-size:xx-small; color:#886666">�ڤ������ߤ���</span><br />

<!--
<a href="http://m.panatown.jp/?guid=ON"><span style="font-size:xx-small; color:#808000">����å�</span></a>
<span style="font-size:xx-small; color:#ffffff">��</span>:
<span style="font-size:xx-small; color:#886666">��������</span><br />
-->


<a href="fp.php?code=intro_fortune"><span style="font-size:xx-small; color:#113366">���ǡ��ꤤ</span></a>:<span style="font-size:xx-small; color:#886666">�ճ��ʿ��¤�!?</span><br />


<a href="fp.php?code=intro_deco"><span style="font-size:xx-small; color:#ff69b4">�Îގ���</span></a><span style="font-size:xx-small; color:#ffffff">������</span>:<span style="font-size:xx-small; color:#886666">�����Ȥ�����</span><br />
</div>
    <img src="img_napa/top/line01_blue.gif" alt="���ʎގ����ʤ�Ŏʎߎ�����,���ʎގ����׎���">
    <!--�饤�����-->
    <div style="text-align:right; font-size:xx-small;"><a href="#d_top">���͎ߎ����ގĎ��̎ߤ�</a></div>
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
      {if $session.user.user_id && !$app.logout} <span style="font-size:x-small; color:#3366FF">��</span><a href="?action_user_resign_confirm=true">���</a><br>

<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
{/if}
<!-- napatown footer end -->
</div>

<!--�եå���-->
{include file="user/footer.tpl" no_navi=true}

</div></div></div>