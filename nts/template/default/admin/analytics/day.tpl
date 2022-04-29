{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>会員数増減レポート</h2>
			{if count($errors)}<span class="ethna-error">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			{form action="$script" ethna_action="admin_analytics_day"}
				{form_input name="year"}年
				{form_input name="month"}月
				{form_submit value="の集計を表示"}
			{/form}
			<table class="sheet">
				<tr>
					<th>日付</th>
					<th>仮登録者数</th>
					<th>本登録者数</th>
					<th>友達招待登録者数</th>
					<th>自然登録者数</th>
					<th>退会者数</th>
				</tr>
				{foreach from=$app.analytics_list item=i}
				<tr>
					<td nowrap>{$i.analytics_date|jp_date_format:"%Y/%m/%d(%a)"}</td>
					<td>{$i.pre_regist_num}</td>
					<td>{$i.regist_num}</td>
					<td>{$i.friend_num}</td>
					<td>{$i.natural_num}</td>
					<td>{$i.resign_num}</td>
				</tr>
				{/foreach}
			</table>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- ***********************　#main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
