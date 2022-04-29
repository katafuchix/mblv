{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.contents.name}登録</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_contents_add_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="contents_code"}</th>
					<td>{form_input name="contents_code"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_title"}</th>
					<td>{form_input name="contents_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_body"}</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_file=true','ファイル管理','width=700,height=700,scrollbars=yes'))">ファイル管理</a><br />
						{form_input name="contents_body" cols="80" rows="50"}
						<div>
							<b>タグリファレンス</b><br />
							ファイルURLタグ（画像や動画へのURLです）<br />
							　##file「ファイル番号」##<br />
							　（例：<input type="text" value='<img src="##file1##">' size="50">）<br />
							フリーページURLタグ1<br />
							　##fp「フリーページID」##<br />
							　（例：<input type="text" value='<a href="##fp1##">フリーページ1へ</a>' size="50">）<br />
							フリーページURLタグ2<br />
							　##fp[「フリーページコード」]##<br />
							　（例：<input type="text" value='<a href="##fp[test_code]##">フリーページ1へ</a>' size="50">）<br />
							アバター詳細ページURLタグ<br />
							　##avatar「アバターID」##<br />
							　（例：<input type="text" value='<a href="##avatar1##">アバター1ページへ</a>' size="50">）<br />
							デコメール詳細ページURLタグ<br />
							　##decomail「デコメールID」##<br />
							　（例：<input type="text" value='<a href="##decomail1##">デコメール1ページへ</a>' size="50">）<br />
							デコメールダウンロードタグ<br />
							　##decomail_dl「デコメールID」##<br />
							　（例：<input type="text" value='<a href="##decomail_dl1##">デコメール1をダウンロード</a>' size="50">）<br />
							ゲーム詳細ページURLタグ<br />
							　##game「ゲームID」##<br />
							　（例：<input type="text" value='<a href="##game1##">ゲーム1をダウンロード</a>' size="50">）<br />
							サウンド詳細ページURLタグ<br />
							　##sound「サウンドID」##<br />
							　（例：<input type="text" value='<a href="##sound1##">サウンド1をダウンロード</a>' size="50">）<br />
							コミュニティトップページURLタグ<br />
							　##community「コミュニティID」##<br />
							　（例：<input type="text" value='<a href="##community1##">コミュニティ1ページへ</a>' size="50">）<br />
							総合トップページURLタグ<br />
							　##top##<br />
							　（例：<input type="text" value='<a href="##top##">総合トップページへ</a>' size="50">）<br />
							マイページURLタグ<br />
							　##home##<br />
							　（例：<input type="text" value='<a href="##home##">マイページへ</a>' size="50">）<br />
							入会経路引き継ぎメールアドレスタグ<br />
							　##media_mailaddress[「入会経路コード」]##<br />
							　（例：<input type="text" value='<a href="mailto:##media_mailaddress[test_media]##?subject=件名&body=本文">' size="50">）<br />
							会員登録メールアドレスタグ<br />
							　##regist_mailaddress##<br />
							　（例：<input type="text" value='<a href="mailto:##regist_mailaddress##?subject=件名&body=本文">' size="50">）<br />
							メールドメインタグ<br />
							　##mail_domain##<br />
							　（例：<input type="text" value="test@##mail_domain##" size="50">）<br />
							広告URLタグ<br />
							　##ad「広告ID」##<br />
							　（例：<input type="text" value='<a href="##ad1##">広告1のサイトへ</a>' size="50">）<br />
							広告バナータグ<br />
							　##ad_banner「広告ID」##<br />
							　（例：<input type="text" value="##ad_banner1##" size="50">）<br />
							広告ランダムバナータグ<br />
							　##ad_banner(「広告IDリスト」)##<br />
							　（例：<input type="text" value="##ad_banner(1,2,3,4,5)##" size="50">）<br />
						</div>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="登録"}</td>
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
