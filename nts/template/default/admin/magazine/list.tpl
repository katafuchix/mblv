{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>���ޥ��ꥹ��</h2>
			<div class="entry_box">
				��<a href="?action_admin_magazine_add=true">���ޥ���Ͽ</a><br />
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<form action="{$script}" method="post">
			<input type="hidden" name="action_admin_magazine_list" value="true">
			{select name="year" list=$app.year_list value=$form.year}ǯ
			{select name="month" list=$app.month_list value=$form.month}��
			<input type="submit" value="ɽ��">
			</form>
			<table class="sheet">
				<tr>
					<th nowrap>��Ͽ</th>
					<th nowrap>����</th>
					<th nowrap>ID</th>
					<th nowrap>�ۿ����ơ�����</th>
					<th nowrap>�����ȥ�</th>
					<th nowrap>�ۿ�ͽ�����</th>
					<th nowrap>�ۿ����ϻ���</th>
					<th nowrap>�ۿ���λ����</th>
					<th nowrap>�ۿ�ͽ���</th>
					<th nowrap>�ۿ���</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.magazine_list item=i}
					{if $i.magazine_count != 0}
						{foreach from=$i.main item=j key=k}
							<tr>
								{if $j.magazine_top == 1}
								<td rowspan="{$i.magazine_count}">
									{if $app.today <= $i.magazine_today}
									<a href="?action_admin_magazine_add=true&year={$i.magazine_year}&month={$i.magazine_month}&day={$i.magazine_day}">��Ͽ</a>
									{/if}
								</td>
								<td rowspan="{$i.magazine_count}" nowrap>{$i.magazine_date}</td>
								{/if}
								<td>{$j.magazine_id}</td>
								<td>
									{if $j.magazine_status==1}
									̤�ۿ�
									{elseif $j.magazine_status==2}
									�ۿ���&nbsp;=&gt;<a href="?action_admin_magazine_stop_do=true&magazine_id={$j.magazine_id}" onClick="return confirm('�����ˤ��Υ��ޥ����ۿ�������λ���Ƥ������Ǥ�����');">������λ</a>
									{elseif $j.magazine_status==3}
									�ۿ��Ѥ�
									{elseif $j.magazine_status==4}
									������λ
									{/if}
								</td>
								<td>{$j.magazine_title}</td>
								<td>{$j.magazine_reserve_time|jp_date_format:"%H:%M"}</td>
								<td>{if $j.magazine_status!=1}{$j.magazine_start_time|jp_date_format:"%H:%M"}{/if}</td>
								<td>{if $j.magazine_status!=1}{$j.magazine_end_time|jp_date_format:"%H:%M"}{/if}</td>
								<td>{$j.magazine_user_num}</td>
								<td>{$j.magazine_sent_num}</td>
								<td><a href="?action_admin_magazine_edit=true&magazine_id={$j.magazine_id}">�Խ�</a></td>
								<td><a href="?action_admin_magazine_delete_do=true&magazine_id={$j.magazine_id}" onClick="return confirm('�����ˤ��Υ��ޥ��������Ƥ������Ǥ�����');">���</a></td>
							</tr>
						{/foreach}
					{else}
						<tr>
							<td>
								{if $app.today <= $i.magazine_today}
								<a href="?action_admin_magazine_add=true&year={$i.magazine_year}&month={$i.magazine_month}&day={$i.magazine_day}">��Ͽ</a>
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
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- ***********************��#main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
