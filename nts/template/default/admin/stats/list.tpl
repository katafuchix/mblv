{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$config.stats_type[$form.type].name}統計</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_stats_list"}
			<table class="sheet">
				<tr>
					<th>期間</th>
					<td {if $app.year_active}class="active"{/if} nowrap>
						{form_input name="year" emptyoption="累計"}年
						{form_input name="month" emptyoption=""}月
						&nbsp;第
						{form_input name="weekno" emptyoption=""}週
						&nbsp;
						{form_input name="day" emptyoption=""}日
						{form_input name="type"}
						&nbsp;
						ID:{if $form.type=="access"}{form_input name="id_use" value="`$form.id`" size=40}{else}{form_input name="id_use" value="`$form.id`" size=8}{/if}
						&nbsp;
						{form_submit value="　集　計　"}
					</td>
			</table>
			{/form}
			
			{if $app.listview_data}{* データが存在する場合 *}
			{if $app.name}[{$app.name}]{elseif $id.id}[ID:{$form.id}]{/if}
			{if $form.term=='year'}年単位{elseif $form.term=='month'}月単位{elseif $form.term=='week'}週単位{elseif $form.term=='day'}日単位{elseif $form.term=='hour'}時単位{/if}{if $form.term=='all'}{$form.date}{else}:{$form.date}{/if}<br />
			<!--
			|
			{if !$form.id}
				PV:{$app.pv}&nbsp;|&nbsp;
			{/if}
			-->
			{foreach from=$app.total item=item key=k}
				{$config.stats_score[$k].name}:{$item}&nbsp;|&nbsp;
			{/foreach}
			{include file="admin/pager.tpl"}
			{if $form.id!=''}{* [term]別の集計 *}
			{if $form.term=='all'}{* 累計 *}
			<table class="sheet">
				<tr>
					<th width="130px;">年</th>
					<th width="30px;">種別</th>
					<th width="10px;">スコア</th>
					<th>グラフ</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="130px;">
						<a href="?action_admin_stats_list=true&type={$form.type}&year={$item.stats_date|date_format:'%Y'}&month={$form.month}&weekno={$form.weekno}&day={$form.day}&id={$form.id}">{$item.stats_date|jp_date_format:"%Y年"}</a>
					</td>
					<td width="60px;">
						{foreach from=$app.score_keys item=sk}
						{if $item.$sk!=''}{$config.stats_score[$sk].name}<br>{/if}
						{/foreach}
					</td>
					<td width="10px;">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}{$item.$sk}<br />{/if}
						{/foreach}
					</td>
					<td align="left">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}
								{assign var="sk_each" value="`$sk`_each"}
								<div class="progress-container">
								<div style="background-color:{$config.stats_score[$sk].bar};width:{$item.$sk_each}%;"></div>
								</div>
								<br class="clear" />
							{/if}
						{/foreach}
					</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			{elseif $form.term=='year'}{* 年単位 *}
			<table class="sheet">
				<tr>
					<th width="130px;">月</th>
					<th width="60px;">種別</th>
					<th width="10px;">スコア</th>
					<th>グラフ</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="130px;">
						<a href="?action_admin_stats_list=true&type={$form.type}&year={$form.year}&month={$item.stats_date|date_format:'%m'}&weekno={$form.weekno}&day={$form.day}&id={$form.id}">{$item.stats_date|jp_date_format:"%Y年%m月"}</a>
					</td>
					<td width="60px;">
						{foreach from=$app.score_keys item=sk}
						{if $item.$sk!=''}{$config.stats_score[$sk].name}<br>{/if}
						{/foreach}
					</td>
					<td width="10px;">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}{$item.$sk}<br />{/if}
						{/foreach}
					</td>
					<td align="left">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}
								{assign var="sk_each" value="`$sk`_each"}
								<div class="progress-container">
								<div style="background-color:{$config.stats_score[$sk].bar};width:{$item.$sk_each}%;"></div>
								</div>
								<br class="clear" />
							{/if}
						{/foreach}
					</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			{elseif $form.term=='month'}{* 月単位 *}
			<table class="sheet">
				<tr>
					<th width="130px;">日</th>
					<th width="60px;">種別</th>
					<th width="10px;">スコア</th>
					<th>グラフ</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="130px;">
						<a href="?action_admin_stats_list=true&type={$form.type}&year={$form.year}&month={$form.month}&weekno={$form.weekno}&day={$item.stats_date|date_format:'%d'}&id={$form.id}">{$item.stats_date|jp_date_format:"%Y/%m/%d(%a)"}</a>
					</td>
					<td width="60px;">
						{foreach from=$app.score_keys item=sk}
						{if $item.$sk!=''}{$config.stats_score[$sk].name}<br>{/if}
						{/foreach}
					</td>
					<td width="10px;">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}{$item.$sk}<br />{/if}
						{/foreach}
					</td>
					<td align="left">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}
								{assign var="sk_each" value="`$sk`_each"}
								<div class="progress-container">
								<div style="background-color:{$config.stats_score[$sk].bar};width:{$item.$sk_each}%;"></div>
								</div>
								<br class="clear" />
							{/if}
						{/foreach}
					</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			{elseif $form.term=='week'}{* 週単位 *}
			<table class="sheet">
				<tr>
					<th width="130px;">日</th>
					<th width="60px;">種別</th>
					<th width="10px;">スコア</th>
					<th>グラフ</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="130px;">
						<a href="?action_admin_stats_list=true&type={$form.type}&year={$form.year}&month={$form.month}&weekno={$form.weekno}&day={$item.stats_date|date_format:'%d'}&id={$form.id}">{$item.stats_date|jp_date_format:"%Y/%m/%d(%a)"}</a>
					</td>
					<td width="60px;">
						{foreach from=$app.score_keys item=sk}
						{if $item.$sk!=''}{$config.stats_score[$sk].name}<br>{/if}
						{/foreach}
					</td>
					<td width="10px;">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}{$item.$sk}<br />{/if}
						{/foreach}
					</td>
					<td align="left">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}
								{assign var="sk_each" value="`$sk`_each"}
								<div class="progress-container">
								<div style="background-color:{$config.stats_score[$sk].bar};width:{$item.$sk_each}%;"></div>
								</div>
								<br class="clear" />
							{/if}
						{/foreach}
					</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			{elseif $form.term=='day'}{* 日単位 *}
			<table class="sheet">
				<tr>
					<th width="130px;">時間</th>
					<th width="60px;">種別</th>
					<th width="10px;">スコア</th>
					<th>グラフ</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="130px;">{$item.stats_date|jp_date_format:"%H時"}</td>
					<td width="60px;">
						{foreach from=$app.score_keys item=sk}
						{if $item.$sk!=''}{$config.stats_score[$sk].name}<br>{/if}
						{/foreach}
					</td>
					<td width="10px;">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}{$item.$sk}<br />{/if}
						{/foreach}
					</td>
					<td align="left">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}
								{assign var="sk_each" value="`$sk`_each"}
								<div class="progress-container">
								<div style="background-color:{$config.stats_score[$sk].bar};width:{$item.$sk_each}%;"></div>
								</div>
								<br class="clear" />
							{/if}
						{/foreach}
					</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			{/if}{* [term]別の集計終了 *}
			{else}{* ランキング *}
			<table class="sheet">
				<tr>
					<th width="200px;">ID</th>
					<th width="60px;">種別</th>
					<th width="10px;">スコア</th>
					<th>グラフ</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="200px;">
						<a href="?action_admin_stats_list=true&type={$form.type}&year={$form.year}&month={$form.month}&weekno={$form.weekno}&day={$form.day}&id={$item.id}">
						{if $form.type=="access"}{if $app.al[$item.id]}{$app.al[$item.id]}{else}{$item.id}{/if}{elseif $item.name}{$item.name}{else}{$item.id}{/if}
						</a>
					</td>
					<td width="60px;">
						{foreach from=$app.score_keys item=sk}
						{if $item.$sk!=''}{$config.stats_score[$sk].name}<br>{/if}
						{/foreach}
					</td>
					<td width="10px;">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}{$item.$sk}<br />{/if}
						{/foreach}
					</td>
					<td align="left">
						{foreach from=$app.score_keys item=sk}
							{if $item.$sk!=''}
								{assign var="sk_each" value="`$sk`_each"}
								<div class="progress-container">
								<div style="background-color:{$config.stats_score[$sk].bar};width:{$item.$sk_each}%;"></div>
								</div>
								<br class="clear" />
							{/if}
						{/foreach}
					</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			{/if}
			{include file="admin/pager.tpl"}
			{else}
			データが存在しません。
			{/if}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
