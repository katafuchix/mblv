<!--�إå���-->
{include file="user/header.tpl" title="�ʥѥ�����ǥ���TOP" bgcolor="#ffffff" text="#ff69b4" link="#4b0082" vlink="#3399FF"}

<!--�����ȥ�-->
<a name="d_top" id="d_top"></a>
<!--top��-->
<div style="text-align:center;">
	<img src="img_napa/decomail/img/logo_test.gif" width="240" height="60" border="1" /><br />
</div>
<div style="background-color:#fff4ff; text-align:center;">
	<span style="display: -wap-marquee;-wap-marquee-style: scroll;-wap-marquee-loop: infinite">
	<span style="font-size:xx-small; color:#ff6699">
		���襤��[x:0167]�����׎�����[x:0128]�Îގ������äѤ�
	</span>
	</span>
</div>

<!--
{html_style type="title" title="�Îގ��Ҏ��َΎߎ�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->



<!--��������ƥ�ĳ���-->
<!--NEWS-->
<div style="background-color:#ffffff; text-align:left;font-size:small;">
<span style="font-size:xx-small; color:#0000cd">
�Ŏʎߎ�����NEWS</span><br />
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			<span style="font-size:xx-small">��</span>{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=decomail"><span style="font-size:xx-small; color:#0000cd">{$news.news_title}</span></a><br />
		{/foreach}
	{/if}
</div>

{$app_ne.cms_html1}

{*�����ȥ�����
<!--
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_decomail_home=true">�ώ��Îގ��Ҏ���</a>
</div>
-->
<!--��������ƥ�Ľ�λ-->
*}


<!--�����ȥ�-->
{*�����ȥ�����
<!--
<div style="background-color:#ff6699; text-align:center;">
<span style="font-size:xx-small; color:#ffffd6">
�ƥ�ץ�[x:0167]��󥭥�<br />
</span>
</div>
<!--
{html_style type="title" title="�Îݎ̎ߎڎ׎ݎ��ݎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->
*}

<!--��������ƥ�ĳ���-->
{*�����ȥ�����
<!--
<div style="background-color:#fff4ff; text-align:center;">
	<span style="font-size:xx-small; color:#ff00cc">
		�͵��ǥ�[x:0164]������å�[x:0086]
	</span>
</div>
<div style="background-color:#fff4ff; text-align:center;">
	{foreach from=$app.ranking1 item=item name=decomail key =k}
			<span style="font-size:xx-small;">[x:0138]��{$k+1}��[x:0138]</span><br />
			{if $item.decomail_file1}<img src="f.php?&file=decomail/{$item.decomail_file1}&SESSID={$SESSID}"><br />{/if}
			<a href="?action_user_decomail_buy=true&decomail_id={$item.decomail_id}"><span style="font-size:small;">
			{$item.decomail_name}<br />{if $item.decomail_desc}��{$item.decomail_desc}��<br />{/if}��{$item.decomail_point}{$ft.point.name}��<br /></span></a>
			{html_style type="br"}
	{/foreach}
</div>
<div style="background-color:#ffffdb; text-align:right; font-size:xx-small;">
<a href="?action_user_decomail_ranking=true&decomail_category_id=1">��äȸ���</a>
</div>

<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.ranking1 item=item name=decomail key =k}
		<div align="left" style="text-align:left;float:left;">
			{if $item.decomail_file1}<img src="f.php?&file=decomail/{$item.decomail_file1}&SESSID={$SESSID}" style="float:left;">{/if}
			<span style="margin-top:5px;">
				<a href="?action_user_decomail_buy=true&decomail_id={$item.decomail_id}">{$item.decomail_name}</a><br />
				{$item.decomail_desc}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
	<div align="right" style="text-align:right;font-size:small;">
	=><a href="?action_user_decomail_ranking=true&decomail_category_id=13">��äȸ���</a>
	</div>
	{html_style type="br"}
</div>
-->
<!--��������ƥ�Ľ�λ-->
*}


<!--�����ȥ�-->
<!--div style="background-color:#d6adff; text-align:center;">
	<span style="font-size:xx-small; color:#0000cd">
		��ʸ������󥭥�
	</span>
</div-->



<!--
{html_style type="title" title="��ʸ���׎ݎ��ݎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->

<!--��������ƥ�ĳ���-->
{*�����ȥ�����
<!--
<div style="background-color:#f9f4ff; text-align:center;">
	{foreach from=$app.ranking2 item=item name=decomail key =k}
		{if $item.decomail_file1}
		<a href="?action_user_decomail_buy=true&decomail_id={$item.decomail_id}"><img src="f.php?&file=decomail/{$item.decomail_file1}&SESSID={$SESSID}" width="20" height="20"></a>&nbsp;
		{/if}
	{/foreach}
</div>
<div style="background-color:#f9f4ff; text-align:right; font-size:xx-small;">
	<a href="?action_user_decomail_ranking=true&decomail_category_id=2">��äȸ���</a>
</div>

<!--
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.ranking2 item=item name=decomail key =k}
		{if $item.decomail_file1}
		<a href="?action_user_decomail_buy=true&decomail_id={$item.decomail_id}"><img src="f.php?&file=decomail/{$item.decomail_file1}&SESSID={$SESSID}" style="float:left;" width="30px"></a>
		{/if}
	{/foreach}
	<div align="right" style="text-align:right;font-size:small;">
	=><a href="?action_user_decomail_ranking=true&decomail_category_id=14">��äȸ���</a>
	</div>
	{html_style type="br"}
</div>
-->
*}
<!--��������ƥ�Ľ�λ-->


{$app_ne.cms_html3}

{*�����ȥ�����

<!--�����ȥ�-->
<!--
{html_style type="title" title="`$ft.decomail.name`���Î��ގ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->
<!--��������ƥ�ĳ���-->
<!--div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.category item=item name=decomail key =k}
		<a href="?action_user_decomail_list=true&decomail_category_id={$item.decomail_category_id}">{$item.decomail_category_name}</a>/
	{/foreach}
</div-->
<!--��������ƥ�Ľ�λ-->


<!--��������-->

<!--
{html_style type="title" title="`$ft.decomail.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_decomail_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="����"}
	{/form}
</div>
-->
<!--������λ-->

<!--��������ƥ�ĳ���-->
<!--
<div align="left" style="text-align:left;font-size:small;">
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html2}
</div>
-->
<!--��������ƥ�Ľ�λ-->
*}

<!--�եå���-->
{include file="user/footer.tpl" title_bgcolor="#ff6699" hrcolor="#ff6699" title="(C)���͎ߎ���������"}
