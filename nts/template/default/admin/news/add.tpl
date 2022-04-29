{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>ニュース登録</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_news_add_do"}
			{uniqid}
			<table class="sheet" id="w200">
			{* NAPATOWN
				<tr>
					<th>{form_name name="news_type"}</th>
					<td>{form_input name="news_type"}</td>
				</tr>
			*}
				<tr>
					<th>{form_name name="news_title"}</th>
					<td>{form_input name="news_title" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="news_body"}</th>
					<td>{form_input name="news_body" cols="50" rows="30"}</td>
				</tr>
				<tr>
					<th>{form_name name="news_time"}</th>
					<td>
						※入力したテキストがそのまま表示されます。<br />
						{form_input name="news_time"}
					</td>
				</tr>
				<tr>
					<th>配信開始日時</th>
					<td>
						{form_input name="news_start_status"}{form_name name="news_start_status"}<br />
						{form_input name="news_start_year" emptyoption=""}年
						{form_input name="news_start_month" emptyoption=""}月
						{form_input name="news_start_day" emptyoption=""}日
						{form_input name="news_start_hour" emptyoption=""}時
						{form_input name="news_start_min" emptyoption=""}分
					</td>
				</tr>
				<tr>
					<th>配信終了日時</th>
					<td>
						{form_input name="news_end_status"}{form_name name="news_end_status"}<br />
						{form_input name="news_end_year" emptyoption=""}年
						{form_input name="news_end_month" emptyoption=""}月
						{form_input name="news_end_day" emptyoption=""}日
						{form_input name="news_end_hour" emptyoption=""}時
						{form_input name="news_end_min" emptyoption=""}分
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="ニュース登録"}</td>
				</tr>
			</table>
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}

