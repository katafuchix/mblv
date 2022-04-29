{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>メルマガ追加</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" method="post" ethna_action="admin_magazine_add_do" onsubmit="updateTextArea('magazine_body_html')"}
			<table class="sheet">
				<tr>
					<th>配信日時</th>
					<td>
						{form_input name="year"}年
						{form_input name="month"}月
						{form_input name="day"}日
						{form_input name="hour"}時
						{form_input name="min"}分
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_signature"}</th>
					<td>
						※送信元が「署名&lt;{$config.magazine_mailaddress}&gt;」となります。（空欄の場合は署名が入りません。）<br />
						{form_input name="magazine_signature" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_title"}</th>
					<td>
					{form_input name="magazine_title" size=50}
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body_text"}</th>
					<td>
						{form_input name="magazine_body_text" cols=38 rows=30 style="float:left;margin-right:10px;padding-right:10px;"}
						<span style="float:left;">
						■使用可能なタグ<br />
						広告リンクの挿入：「##ad広告ID##」<br />
						ユーザニックネームの挿入：「##user_nickname##」<br />
						ユーザポイントの挿入：「##user_point##」<br />
						</span>
					</td>
				</tr>
				<tr>
					<th>{form_name name="magazine_body_html"}</th>
					<td>
						{form_input name="magazine_body_html_status"}<br />
						{form_input name="magazine_body_html" cols=40 rows=20 style="float:left;" id="magazine_body_html"}
{html_style type="j_emoji_replace"}
<script language="javascript1.2">
generate_wysiwyg('magazine_body_html');
</script>
						<span style="float:left;width:300px;">
						※デコメール編集上の注意事項<br />
						デコメールに使用可能なタグはDOCOMO,AU,SOFTBANK指定のもののみとしております。<br />
						使用不可能なタグが挿入された場合は「HTML」&lt;=&gt;「TEXT」ボタンを押すことにより整えることが可能です。<br />
						デコメールでは画像の表示サイズ、MARQUEE、の縦＆幅、DIVの縦＆幅、BLINKの縦＆幅を指定することはできません。<br />
						デコメールでは画像容量に限界がありますので画像を添付する場合は注意して下さい。<br />
						絵文字をBLINK、MARQUEEとして表示させたい場合は、「HTMLモード」で編集するか、一旦「文字」を選択た状態でボタンを押してから、該当部分に絵文字を挿入して下さい。<br />
						ブラウザの仕様により左のエディタ上でMARQUEEは正常に動作できない場合があります。<br />
						ブラウザの仕様により左のエディタ上でBLINKは正常に動作できない場合があります。<br />
						<br />
						■使用可能なタグ<br />
						広告リンクの挿入：「##ad:広告ID##」<br />
						ユーザニックネームの挿入：「##user_nickname##」<br />
						ユーザポイントの挿入：「##user_point##」<br />
						</span>
					</td>
				</tr>
				<tr>
					<th>テスト配送</th>
					<td>
						{form_name name="test_mailaddress"}：{form_input name="test_mailaddress" size="50"}<br />
						{form_input name="magazine_test"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="segment_id"}</th>
					<td>
						{form_input name="segment_id" emptyoption="全体"}<br />
						<span class="err">※セグメント配信を使用する場合、利用したいセグメントを選択してください。選択されない場合は全体配信となります。</span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="メルマガ登録"}</td>
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

