{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>メルマガリスト</h2>
			<div class="entry_box">
				▼<a href="?action_admin_magazine_add=true">メルマガ登録</a><br />
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<form action="{$script}" method="post">
			<input type="hidden" name="action_admin_magazine_list" value="true">
			{select name="year" list=$app.year_list value=$form.year}年
			{select name="month" list=$app.month_list value=$form.month}月
			<input type="submit" value="表示">
			</form>
			<table class="sheet">
				<tr>
					<th nowrap>登録</th>
					<th nowrap>日時</th>
					<th nowrap>ID</th>
					<th nowrap>配信ステータス</th>
					<th nowrap>タイトル</th>
					<th nowrap>配信予約時間</th>
					<th nowrap>配信開始時間</th>
					<th nowrap>配信終了時間</th>
					<th nowrap>配信予定数</th>
					<th nowrap>配信数</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.magazine_list item=i}
					{if $i.magazine_count != 0}
						{foreach from=$i.main item=j key=k}
							<tr>
								{if $j.magazine_top == 1}
								<td rowspan="{$i.magazine_count}">
									{if $app.today <= $i.magazine_today}
									<a href="?action_admin_magazine_add=true&year={$i.magazine_year}&month={$i.magazine_month}&day={$i.magazine_day}">登録</a>
									{/if}
								</td>
								<td rowspan="{$i.magazine_count}" nowrap>{$i.magazine_date}</td>
								{/if}
								<td>{$j.magazine_id}</td>
								<td>
									{if $j.magazine_status==1}
									未配信
									{elseif $j.magazine_status==2}
									配信中&nbsp;=&gt;<a href="?action_admin_magazine_stop_do=true&magazine_id={$j.magazine_id}" onClick="return confirm('本当にこのメルマガの配信を強制終了してもよろしいですか？');">強制終了</a>
									{elseif $j.magazine_status==3}
									配信済み
									{elseif $j.magazine_status==4}
									強制終了
									{/if}
								</td>
								<td>{$j.magazine_title}</td>
								<td>{$j.magazine_reserve_time|jp_date_format:"%H:%M"}</td>
								<td>{if $j.magazine_status!=1}{$j.magazine_start_time|jp_date_format:"%H:%M"}{/if}</td>
								<td>{if $j.magazine_status!=1}{$j.magazine_end_time|jp_date_format:"%H:%M"}{/if}</td>
								<td>{$j.magazine_user_num}</td>
								<td>{$j.magazine_sent_num}</td>
								<td><a href="?action_admin_magazine_edit=true&magazine_id={$j.magazine_id}">編集</a></td>
								<td><a href="?action_admin_magazine_delete_do=true&magazine_id={$j.magazine_id}" onClick="return confirm('本当にこのメルマガを削除してもよろしいですか？');">削除</a></td>
							</tr>
						{/foreach}
					{else}
						<tr>
							<td>
								{if $app.today <= $i.magazine_today}
								<a href="?action_admin_magazine_add=true&year={$i.magazine_year}&month={$i.magazine_month}&day={$i.magazine_day}">登録</a>
								{/if}
							</td>
							<td>{$i.magazine_date}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					{/if}
				{/foreach}
			</table>
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- ***********************　#main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
