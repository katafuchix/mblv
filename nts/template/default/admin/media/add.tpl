{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�����ϩ��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_media_add_do"}
			{uniqid}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="media_code"}</th>
					<td>{form_input name="media_code"}</td>
				</tr>
				<tr>
					<th>{form_name name="media_name"}</th>
					<td>{form_input name="media_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="community_id"}</th>
					<td>{form_input name="community_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="media_point"}</th>
					<td>{form_input name="media_point"}{$ft.point.name}</td>
				</tr>
				<tr>
					<th>{form_name name="media_param1"}</th>
					<td>
						�����񸵥�ǥ��������̤���������ݤ�ɬ�פȤʤ�ѥ�᥿̾����ꤷ�Ʋ�������<br />
						{form_input name="media_param1" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="media_param2"}</th>
					<td>
						�����񸵥�ǥ��������̤���������ݤ�ɬ�פȤʤ�ѥ�᥿̾����ꤷ�Ʋ�������<br />
						{form_input name="media_param2" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="media_param3"}</th>
					<td>
						�����񸵥�ǥ��������̤���������ݤ�ɬ�פȤʤ�ѥ�᥿̾����ꤷ�Ʋ�������<br />
						{form_input name="media_param3" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="media_res_url"}</th>
					<td>{form_input name="media_res_url" size=100}</td>
				</tr>
				<tr>
					<th>{form_name name="media_mail_title"}</th>
					<td>{form_input name="media_mail_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="media_mail_body"}</th>
					<td>
						{form_input name="media_mail_body" rows="30" cols="30"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="media_avatar"}</th>
					<td>
						{form_input name="media_avatar"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="��Ͽ"}</td>
				</tr>
			</table>
			{/form}
			<div>
			����������ֵ���URL�ˤĤ���<br />
			����ǥ�����ͳ�ǤΥ����������˼�����ä��ѥ�᡼���򡢥桼������������˻���URL���ֵѤ��������ϡ�<br />
			���ִ�ʸ�������Ѥ��ƥѥ�᡼������ꤷ�ޤ���<br />
			���������ȯ�����˥桼�������̣ɣĤȥѥ�᡼��3���ֵѤ��������<br />
			��http://exsample.com/index.cgi?res=true&user={$config.tag_cut}user_hash{$config.tag_cut}&param3={$config.tag_cut}3{$config.tag_cut}<br />
			���桼�������̣ɣ�:{$config.tag_cut}user_hash{$config.tag_cut}<br />
			��ü�����̾���:{$config.tag_cut}user_uid{$config.tag_cut}<br />
			���ѥ�᡼��������:{$config.tag_cut}1{$config.tag_cut}<br />
			���ѥ�᡼��������:{$config.tag_cut}2{$config.tag_cut}<br />
			���ѥ�᡼��������:{$config.tag_cut}3{$config.tag_cut}<br />
			</div>
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}

