<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�Îގ��Ҏ��َΎߎ�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
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
<!--��������ƥ�Ľ�λ-->



<!--�����ȥ�-->
{html_style type="title" title="�Îݎ̎ߎڎ׎ݎ��ݎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
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
	=><a href="?action_user_decomail_ranking=true&decomail_category_id=2">��äȸ���</a>
	</div>
	{html_style type="br"}
</div>
<!--��������ƥ�Ľ�λ-->

<!--�����ȥ�-->
{html_style type="title" title="��ʸ���׎ݎ��ݎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.ranking2 item=item name=decomail key =k}
		{if $item.decomail_file1}
		<a href="?action_user_decomail_buy=true&decomail_id={$item.decomail_id}"><img src="f.php?&file=decomail/{$item.decomail_file1}&SESSID={$SESSID}" style="float:left;" width="30px"></a>
		{/if}
	{/foreach}
	<div align="right" style="text-align:right;font-size:small;">
	=><a href="?action_user_decomail_ranking=true&decomail_category_id=3">��äȸ���</a>
	</div>
	{html_style type="br"}
</div>
<!--��������ƥ�Ľ�λ-->

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{$app_ne.cms_html3}
</div>
<!--��������ƥ�Ľ�λ-->

<!--�����ȥ�-->
{html_style type="title" title="`$ft.decomail.name`���Î��ގ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.category item=item name=decomail key =k}
		<a href="?action_user_decomail_list=true&decomail_category_id={$item.decomail_category_id}">{$item.decomail_category_name}</a>/
	{/foreach}
</div>
<!--��������ƥ�Ľ�λ-->

<!--��������-->
{html_style type="title" title="`$ft.decomail.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_decomail_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="����"}
	{/form}
</div>
<!--������λ-->

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html2}
</div>
<!--��������ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
