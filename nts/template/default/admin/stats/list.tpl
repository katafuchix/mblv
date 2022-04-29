{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$config.stats_type[$form.type].name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_stats_list"}
			<table class="sheet">
				<tr>
					<th>����</th>
					<td {if $app.year_active}class="active"{/if} nowrap>
						{form_input name="year" emptyoption="�߷�"}ǯ
						{form_input name="month" emptyoption=""}��
						&nbsp;��
						{form_input name="weekno" emptyoption=""}��
						&nbsp;
						{form_input name="day" emptyoption=""}��
						{form_input name="type"}
						&nbsp;
						ID:{if $form.type=="access"}{form_input name="id_use" value="`$form.id`" size=40}{else}{form_input name="id_use" value="`$form.id`" size=8}{/if}
						&nbsp;
						{form_submit value="�������ס�"}
					</td>
			</table>
			{/form}
			
			{if $app.listview_data}{* �ǡ�����¸�ߤ����� *}
			{if $app.name}[{$app.name}]{elseif $id.id}[ID:{$form.id}]{/if}
			{if $form.term=='year'}ǯñ��{elseif $form.term=='month'}��ñ��{elseif $form.term=='week'}��ñ��{elseif $form.term=='day'}��ñ��{elseif $form.term=='hour'}��ñ��{/if}{if $form.term=='all'}{$form.date}{else}:{$form.date}{/if}<br />
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
			{if $form.id!=''}{* [term]�̤ν��� *}
			{if $form.term=='all'}{* �߷� *}
			<table class="sheet">
				<tr>
					<th width="130px;">ǯ</th>
					<th width="30px;">����</th>
					<th width="10px;">������</th>
					<th>�����</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="130px;">
						<a href="?action_admin_stats_list=true&type={$form.type}&year={$item.stats_date|date_format:'%Y'}&month={$form.month}&weekno={$form.weekno}&day={$form.day}&id={$form.id}">{$item.stats_date|jp_date_format:"%Yǯ"}</a>
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
			{elseif $form.term=='year'}{* ǯñ�� *}
			<table class="sheet">
				<tr>
					<th width="130px;">��</th>
					<th width="60px;">����</th>
					<th width="10px;">������</th>
					<th>�����</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="130px;">
						<a href="?action_admin_stats_list=true&type={$form.type}&year={$form.year}&month={$item.stats_date|date_format:'%m'}&weekno={$form.weekno}&day={$form.day}&id={$form.id}">{$item.stats_date|jp_date_format:"%Yǯ%m��"}</a>
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
			{elseif $form.term=='month'}{* ��ñ�� *}
			<table class="sheet">
				<tr>
					<th width="130px;">��</th>
					<th width="60px;">����</th>
					<th width="10px;">������</th>
					<th>�����</th>
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
			{elseif $form.term=='week'}{* ��ñ�� *}
			<table class="sheet">
				<tr>
					<th width="130px;">��</th>
					<th width="60px;">����</th>
					<th width="10px;">������</th>
					<th>�����</th>
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
			{elseif $form.term=='day'}{* ��ñ�� *}
			<table class="sheet">
				<tr>
					<th width="130px;">����</th>
					<th width="60px;">����</th>
					<th width="10px;">������</th>
					<th>�����</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td width="130px;">{$item.stats_date|jp_date_format:"%H��"}</td>
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
			{/if}{* [term]�̤ν��׽�λ *}
			{else}{* ��󥭥� *}
			<table class="sheet">
				<tr>
					<th width="200px;">ID</th>
					<th width="60px;">����</th>
					<th width="10px;">������</th>
					<th>�����</th>
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
			�ǡ�����¸�ߤ��ޤ���
			{/if}
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
