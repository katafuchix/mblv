{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ��������ᥤ�󥳥�ƥ��-->
				<h2>{$ft.exchange.name}�����Խ�</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_ec_exchange_edit_do" method="post" enctype="multipart/form-data"}
				<table class="sheet" id="w200">
				{form_input name="exchange_id"}
				<tr>
					<th>{form_name  name="exchange_name"}<br /><span class="required"></span></th>
					<td>{form_input name="exchange_name" size=50}</td>
				</tr>
				{if $form.exchange_type == 1}
					����Χ��{$ft.exchange.name}�����ꤷ�ޤ���<br />
					{form_input name="exchange_type" value="1"}
					{form_input name="exchange_same_status" value="1"}
					<tr>
						<th>{form_name  name="exchange_same_price"}<br /><span class="required"></span></th>
						<td>{form_input name="exchange_same_price"}��</td>
					</tr>
				{elseif $form.exchange_type == 2}
					��������{$ft.exchange.name}�����ꤷ�ޤ���<br />
					{form_input name="exchange_type" value="2"}
					<tr>
						<th>���϶�ۡ���λ��ۡ�{$ft.exchange.name}</th>
						<td>
							{php}$p=1;{/php}
							{if $app.exchange_range_list}
								{foreach from=$app.exchange_range_list item=i key=k name=temp1}
									<input type="hidden" name="exchange_range_id[]" value="{$i.exchange_range_id}">
									{php}if($p != strip_tags($this->_tpl_vars[app]['count'])){{/php}
										{php}if($p==1){{/php}
											0
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;	
											<input type="hidden" name="exchange_range_start[]" value="{$i.exchange_range_start}">
										{php}}else{{/php}
											<input type="text" name="exchange_range_start[]" value="{$i.exchange_range_start}">
										{php}}{/php}
										&nbsp;��&nbsp;
										<input type="text" name="exchange_range_end[]" value="{$i.exchange_range_end}">
										��
										<input type="text" name="exchange_range_price[]" value="{$i.exchange_range_price}">
										<br />
									{php}}{/php}
									{php}$p++;{/php}
								{/foreach}
							{else}
								<input type="hidden" name="exchange_range_id[]">
								<input type="text" name="exchange_range_start[]" >
								&nbsp;��&nbsp;
								<input type="text" name="exchange_range_end[]" >
								��
								<input type="text" name="exchange_range_price[]" >
							{/if}
							<div id="new_exchange_range"></div>
							{php}$p=1;{/php}
							{if $app.exchange_range_list}
								{foreach from=$app.exchange_range_list item=i key=k name=temp1}
									{php}if($p==strip_tags($this->_tpl_vars[app]['count'])){{/php}
										<input type="text" name="exchange_range_start[]" value="{$i.exchange_range_start}">
										&nbsp;��&nbsp;
										max
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="hidden" name="exchange_range_end[]" value="{$i.exchange_range_end}">
										��
										<input type="text" name="exchange_range_price[]" value="{$i.exchange_range_price}">
										<br />
									{php}}{/php}
									{php}$p++;{/php}
								{/foreach}
							{/if}
							<input type="button" value="�ե�������ɲ�" onClick="insertTextForm('new_exchange_range')">
						</td>
					</tr>
				{elseif $form.exchange_type == 3}
					����׶�ۤ�{$ft.exchange.name}�����ꤷ�ޤ���<br />
					{form_input name="exchange_type" value="3"}
					<tr>
						<th>{form_name  name="exchange_total_price_set"}</th>
						<td>{form_input name="exchange_total_price_set"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="exchange_total_price_value"}</th>
						<td>
							<input type="text" name="exchange_total_price_value" value="0" maxlength="1000000" disabled>��
							<input type="hidden" name="exchange_total_price_value" value="0" >
						</td>
					</tr>
					<tr>
						<th>{form_name  name="exchange_total_price_set_under"}</th>
						<td>{form_input name="exchange_total_price_set_under"}��</td>
					</tr>
				{elseif $form.exchange_type == 4}
					����׸Ŀ���{$ft.exchange.name}�����ꤷ�ޤ���<br />
					{form_input name="exchange_type" value="4"}
					<tr>
						<th>{form_name  name="exchange_total_piece_set"}</th>
						<td>{form_input name="exchange_total_piece_set"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="exchange_total_piece_value"}</th>
						<td>
							<input type="text" name="exchange_total_piece_value" value="0" maxlength="1000000" disabled>��
							<input type="hidden" name="exchange_total_piece_value" value="0" >
						</td>
					</tr>
					<tr>
						<th>{form_name  name="exchange_total_piece_set_under"}</th>
						<td>{form_input name="exchange_total_piece_set_under"}��</td>
					</tr>
				{/if}
					<tr>
						<th></th>
						<td>{form_input name="edit" value="���Խ���"}</td>
					</tr>
				</table>
				
				{/form}
					<!-- �����ޤǥᥤ�󥳥�ƥ��-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
