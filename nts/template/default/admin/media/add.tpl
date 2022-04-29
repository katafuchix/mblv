{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>入会経路登録</h2>
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
						※入会元メディアに成果を送信する際に必要となるパラメタ名を指定して下さい。<br />
						{form_input name="media_param1" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="media_param2"}</th>
					<td>
						※入会元メディアに成果を送信する際に必要となるパラメタ名を指定して下さい。<br />
						{form_input name="media_param2" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="media_param3"}</th>
					<td>
						※入会元メディアに成果を送信する際に必要となるパラメタ名を指定して下さい。<br />
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
					<td>{form_submit value="登録"}</td>
				</tr>
			</table>
			{/form}
			<div>
			入会時成果返却先URLについて<br />
			　メディア経由でのアクセス時に受け取ったパラメータを、ユーザーの入会時に指定URLに返却したい場合は、<br />
			　置換文字列を使用してパラメータを指定します。<br />
			　例）成果発生時にユーザー識別ＩＤとパラメータ3を返却したい場合<br />
			　http://exsample.com/index.cgi?res=true&user={$config.tag_cut}user_hash{$config.tag_cut}&param3={$config.tag_cut}3{$config.tag_cut}<br />
			　ユーザー識別ＩＤ:{$config.tag_cut}user_hash{$config.tag_cut}<br />
			　端末識別情報:{$config.tag_cut}user_uid{$config.tag_cut}<br />
			　パラメータ１　　:{$config.tag_cut}1{$config.tag_cut}<br />
			　パラメータ２　　:{$config.tag_cut}2{$config.tag_cut}<br />
			　パラメータ３　　:{$config.tag_cut}3{$config.tag_cut}<br />
			</div>
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}

