<!--ヘッダー-->
{include file="user/header.tpl" title="NAPATOWN着うた" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}

<!--タイトル-->
<!--ＴＯＰ-->
<center><img src="img_napa/sound/img/top.gif" alt="TOP"></center>
<span style="display: -wap-marquee;-wap-marquee-style: scroll;-wap-marquee-loop: infinite">
	<marquee loop="infinite" scrollamount="3">
		<span style="font-size:small;color:#f23297;">NAPATOWN</span><span style="font-size:small;color:#999999;">だけの着うた♪ｲｯﾊﾟｲ!</span>
	</marquee>
</span>

<!--バナー枠-->
<hr align="center" size="1" width="240" color="#000000"></hr>
<div align="center" style="text-align:center;font-size:small;">
	{ad id="15"}
</div>
<hr align="center" size="1" width="240" color="#771155"></hr>

<!--上部コンテンツ開始-->
<!--新着情報-->
<div style="background-color:#771155">
	[x:0112]<span style="font-size:small;color:#ffffff">ナパタウンNEWS</span>
</div>
<div align="light">
<span style="font-size:small;">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			■{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=sound">{$news.news_title}</a><br />
		{/foreach}
	{/if}
</span>
</div>


<!--タイトル-->
<div style="background-color:#771155">
	<span style="font-size:small;color:#ffffff">▼ｼﾞｬﾝﾙから選ぶ</span>
</div>

<!--中部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.category item=item name=ad key =k}
			<a href="?action_user_sound_list=true&sound_category_id={$item.sound_category_id}">
			{if $item.sound_category_file1}<img src="f.php?file=sound/{$item.sound_category_file1}&SESSID={$SESSID}"><br />{/if}
			</a>
			<!--div style="background-color:{if $item.sound_category_color}{$item.sound_category_color}{else}#000000{/if};"><span style="font-size:xx-small;color:#ffffff;">&gt;{$item.sound_category_name}</span></div-->
			{*$item.sound_category_desc*}
	{/foreach}
	<!-- hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" -->
</div>
<!--中部コンテンツ終了-->


<!--タイトル-->
<div style="background-color:#771155" >
	<span style="font-size:small;color:#ffffff">▼[x:0167]WEEKLY♪RANKING</span>
</div>


<!--中部コンテンツ開始-->
<div style="background-color:#000000">
	{foreach from=$app.ranking item=item name=sound key =k}
		<div>
			<span style="font-size:small;color:#ffffff">{$k+1}位&gt;</span>
			<a href="?action_user_sound_buy=true&sound_id={$item.sound_id}">
			<span style="font-size:small;color:#00ccff">{$item.sound_name}</span></a>
			<br />
			<div align="right" style="text-align:right;">
				<a href="?action_user_sound_list=true&sound_category_id={$item.sound_category_id}"><span style="font-size:xx-small;text-align:right;color:{$item.sound_category_color}">【{$item.sound_category_name}】</span></a>
			</div>
			<span style="font-size:xx-small;color:#cccccc"><img src="img/l-white.gif">{$item.sound_desc}</span>
			<!--{if $item.sound_file1}<img src="f.php?file=sound/{$item.sound_file1}&SESSID={$SESSID}"><br />{/if}-->
		</div>
	{/foreach}
</div>
<!--中部コンテンツ終了-->

<!--下部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{$app_ne.cms_html2}
</div>
<!--下部コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)ｽﾍﾟｰｽｱｳﾄ" title_fontcolor="#000000"}
