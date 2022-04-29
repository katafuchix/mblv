{include file="admin/util/tag/header.tpl"}

<h2>タグリファレンス（{$ft.contents.name}）</h2>

<table class="sheet">
	<tr>
		<th>ファイルURLタグ（画像や動画へのURLです）</th>
		<td>
			##file「ファイル番号」##<br />
			（例：<input type="text" value="##file1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>ファイルURLタグ（画像や動画へのURLです）</th>
		<td>
			##file「ファイル番号」##<br />
			（例：<input type="text" value="##file1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>フリーページURLタグ1</th>
		<td>
			##fp「フリーページID」##<br />
			（例：<input type="text" value="##fp1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>フリーページURLタグ2</th>
		<td>
			##fp[「フリーページコード」]##<br />
			（例：<input type="text" value="##fp[test_code]##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>商品ページURLタグ</th>
		<td>
			##item「商品ID」##<br />
			（例：<input type="text" value="##item1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>商品画像タグ</th>
		<td>
			##item_img「商品ID」##<br />
			（例：<input type="text" value="##item_img1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>商品カテゴリ画像タグ</th>
		<td>
			##ic_img「商品カテゴリID」##<br />
			（例：<input type="text" value="##ic_img1##" size="50" onmouseover="this.select()">）<br />
		</td>
	</tr>
	<tr>
		<th>アバター詳細ページURLタグ</th>
		<td>
			##avatar「アバターID」##<br />
		（例：<input type="text" value="##avatar1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>デコメール詳細ページURLタグ</th>
		<td>
			##decomail「デコメールID」##<br />
			（例：<input type="text" value="##decomail1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>デコメールダウンロードタグ</th>
		<td>
			##decomail_dl「デコメールID」##<br />
			（例：<input type="text" value="##decomail_dl1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>ゲーム詳細ページURLタグ</th>
		<td>
			##game「ゲームID」##<br />
			（例：<input type="text" value="##game1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>サウンド詳細ページURLタグ</th>
		<td>
			##sound「サウンドID」##<br />
			（例：<input type="text" value="##sound1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>コミュニティトップページURLタグ</th>
		<td>
			##community「コミュニティID」##<br />
			（例：<input type="text" value="##community1##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>総合トップページURLタグ</th>
		<td>
			##top##<br />
			（例：<input type="text" value="##top##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>マイページURLタグ</th>
		<td>
			##home##<br />
			（例：<input type="text" value="##home##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>会員登録メールアドレスタグ</th>
		<td>
			##regist_mailaddress##<br />
			（例：<input type="text" value="##regist_mailaddress##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>メールドメインタグ</th>
		<td>
			##mail_domain##<br />
			（例：<input type="text" value="##mail_domain##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>入会経路引き継ぎメールアドレスタグ</th>
		<td>
			##media_mailaddress[「入会経路コード」]##<br />
			（例：<input type="text" value="##media_mailaddress[test_media]##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>サイト名タグ</th>
		<td>
			##site_name##<br />
			（例：<input type="text" value="##site_name##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>サイト運営会社タグ</th>
		<td>
			##site_company_name##<br />
			（例：<input type="text" value="##site_company_name##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>サイト運営会社電話番号タグ</th>
		<td>
			##site_phone##<br />
			（例：<input type="text" value="##site_phone##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>HTMLタイトルタグ</th>
		<td>
			##site_html_title##<br />
			（例：<input type="text" value="##site_html_title##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>META Descriptionタグ</th>
		<td>
			##site_meta_description##<br />
			（例：<input type="text" value="##site_meta_description##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>META Keywordsタグ</th>
		<td>
			##site_meta_keywords##<br />
			（例：<input type="text" value="##site_meta_keywords##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>META robotsタグ</th>
		<td>
			##site_meta_robots##<br />
			（例：<input type="text" value="##site_meta_robots##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>META authorタグ</th>
		<td>
			##site_meta_robots##<br />
			（例：<input type="text" value="##site_meta_author##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>ナビゲーションテンプレートタグ</th>
		<td>
			##site_navi_template##<br />
			（例：<input type="text" value="##site_navi_template##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>入会時付与ポイントタグ</th>
		<td>
			##site_navi_template##<br />
			（例：<input type="text" value="##site_regist_point##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>友達招待入会時付与ポイント（招待者）タグ</th>
		<td>
			##site_invite_from_point##<br />
			（例：<input type="text" value="##site_invite_from_point##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>友達招待入会時付与ポイント（被招待者）タグ</th>
		<td>
			##site_invite_to_point##<br />
			（例：<input type="text" value="##site_invite_to_point##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>背景色タグ</th>
		<td>
			##site_bg_color##<br />
			（例：<input type="text" value="##site_bg_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>文字色タグ</th>
		<td>
			##site_text_color##<br />
			（例：<input type="text" value="##site_text_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>リンク色タグ</th>
		<td>
			##site_link_color##<br />
			（例：<input type="text" value="##site_link_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>アクティブリンク色タグ</th>
		<td>
			##site_alink_color##<br />
			（例：<input type="text" value="##site_alink_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>訪問済みリンク色タグ</th>
		<td>
			##site_vlink_color##<br />
			（例：<input type="text" value="##site_vlink_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>タイトル背景色タグ</th>
		<td>
			##site_title_bg_color##<br />
			（例：<input type="text" value="##site_title_bg_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>タイトル文字色タグ</th>
		<td>
			##site_title_font_color##<br />
			（例：<input type="text" value="##site_title_font_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>メニュー色タグ</th>
		<td>
			##site_menu_color##<br />
			（例：<input type="text" value="##site_menu_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>水平線色タグ</th>
		<td>
			##site_hr_color##<br />
			（例：<input type="text" value="##site_hr_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>時刻色タグ</th>
		<td>
			##site_time_color##<br />
			（例：<input type="text" value="##site_time_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>フォーム名色タグ</th>
		<td>
			##site_form_name_color##<br />
			（例：<input type="text" value="##site_form_name_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>エラー文字色タグ</th>
		<td>
			##site_error_color##<br />
			（例：<input type="text" value="##site_error_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>ページャ文字色タグ</th>
		<td>
			##site_pager_text_color##<br />
			（例：<input type="text" value="##site_pager_text_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>ページャ背景色タグ</th>
		<td>
			##site_pager_bg_color##<br />
			（例：<input type="text" value="##site_pager_bg_color##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>DOCOMO下位端末タグ</th>
		<td>
			##site_low_term_d##<br />
			（例：<input type="text" value="##site_low_term_d##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>AU下位端末タグ</th>
		<td>
			##site_low_term_a##<br />
			（例：<input type="text" value="##site_low_term_a##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
	<tr>
		<th>SOFTBANK下位端末タグ</th>
		<td>
			##site_low_term_s##<br />
			（例：<input type="text" value="##site_low_term_s##" size="50" onmouseover="this.select()">）
		</td>
	</tr>
</table>


{include file="admin/util/tag/footer.tpl"}
