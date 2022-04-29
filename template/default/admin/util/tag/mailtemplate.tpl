{include file="admin/util/tag/header.tpl"}

<h2>タグリファレンス（{$ft.mailtemplate.name}）</h2>

<table class="sheet">
	<tr>
		<th>会員登録URLタグ</th>
		<td>
			##regist_url##<br />
			（例：<input type="text" value="##regist_url##" size="50">）
		</td>
	</tr>
	<tr>
		<th>ログインURLタグ</th>
		<td>
			##login_url##<br />
			（例：<input type="text" value="##login_url##" size="50">）
		</td>
	</tr>
	<tr>
		<th>サポートメールアドレスタグ</th>
		<td>
			##support_mailaddress##<br />
			（例：<input type="text" value="##support_mailaddress##" size="50">）
		</td>
	</tr>
	<tr>
		<th>請求されたパスワードタグ</th>
		<td>
			##user_password##<br />
			（例：<input type="text" value="##user_password##" size="50">）
		</td>
	</tr>
	<tr>
		<th>招待元ユーザニックネームタグ</th>
		<td>
			##from_user_nickname##<br />
			（例：<input type="text" value="##from_user_nickname##" size="50">）
		</td>
	</tr>
	<tr>
		<th>メール送信先ユーザニックネームタグ</th>
		<td>
			##to_user_nickname##<br />
			（例：<input type="text" value="##to_user_nickname##" size="50">）
		</td>
	</tr>
	<tr>
		<th>メール送信先メールアドレスタグ</th>
		<td>
			##to_user_mailaddress##<br />
			（例：<input type="text" value="##to_user_mailaddress##" size="50">）
		</td>
	</tr>
	<tr>
		<th>招待メッセージタグ</th>
		<td>
			##invite_message##<br />
			（例：<input type="text" value="##invite_message##" size="50">）
		</td>
	</tr>
	<tr>
		<th>サイト名タグ</th>
		<td>
			##site_name##<br />
			（例：<input type="text" value="##site_name##" size="50">）
		</td>
	</tr>
	<tr>
		<th>サイト運営会社タグ</th>
		<td>
			##site_company_name##<br />
			（例：<input type="text" value="##site_company_name##" size="50">）
		</td>
	</tr>
	<tr>
		<th>サイト運営会社電話番号タグ</th>
		<td>
			##site_phone##<br />
			（例：<input type="text" value="##site_phone##" size="50">）
		</td>
	</tr>
	<tr>
		<th>HTMLタイトルタグ</th>
		<td>
			##site_html_title##<br />
			（例：<input type="text" value="##site_html_title##" size="50">）
		</td>
	</tr>
	<tr>
		<th>META Descriptionタグ</th>
		<td>
			##site_meta_description##<br />
			（例：<input type="text" value="##site_meta_description##" size="50">）
		</td>
	</tr>
	<tr>
		<th>META Keywordsタグ</th>
		<td>
			##site_meta_keywords##<br />
			（例：<input type="text" value="##site_meta_keywords##" size="50">）
		</td>
	</tr>
	<tr>
		<th>META robotsタグ</th>
		<td>
			##site_meta_robots##<br />
			（例：<input type="text" value="##site_meta_robots##" size="50">）
		</td>
	</tr>
	<tr>
		<th>META authorタグ</th>
		<td>
			##site_meta_robots##<br />
			（例：<input type="text" value="##site_meta_author##" size="50">）
		</td>
	</tr>
	<tr>
		<th>ナビゲーションテンプレートタグ</th>
		<td>
			##site_navi_template##<br />
			（例：<input type="text" value="##site_navi_template##" size="50">）
		</td>
	</tr>
	<tr>
		<th>入会時付与ポイントタグ</th>
		<td>
			##site_navi_template##<br />
			（例：<input type="text" value="##site_regist_point##" size="50">）
		</td>
	</tr>
	<tr>
		<th>友達招待入会時付与ポイント（招待者）タグ</th>
		<td>
			##site_invite_from_point##<br />
			（例：<input type="text" value="##site_invite_from_point##" size="50">）
		</td>
	</tr>
	<tr>
		<th>友達招待入会時付与ポイント（被招待者）タグ</th>
		<td>
			##site_invite_to_point##<br />
			（例：<input type="text" value="##site_invite_to_point##" size="50">）
		</td>
	</tr>
	<tr>
		<th>背景色タグ</th>
		<td>
			##site_bg_color##<br />
			（例：<input type="text" value="##site_bg_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>文字色タグ</th>
		<td>
			##site_text_color##<br />
			（例：<input type="text" value="##site_text_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>リンク色タグ</th>
		<td>
			##site_link_color##<br />
			（例：<input type="text" value="##site_link_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>アクティブリンク色タグ</th>
		<td>
			##site_alink_color##<br />
			（例：<input type="text" value="##site_alink_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>訪問済みリンク色タグ</th>
		<td>
			##site_vlink_color##<br />
			（例：<input type="text" value="##site_vlink_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>タイトル背景色タグ</th>
		<td>
			##site_title_bg_color##<br />
			（例：<input type="text" value="##site_title_bg_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>タイトル文字色タグ</th>
		<td>
			##site_title_font_color##<br />
			（例：<input type="text" value="##site_title_font_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>メニュー色タグ</th>
		<td>
			##site_menu_color##<br />
			（例：<input type="text" value="##site_menu_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>水平線色タグ</th>
		<td>
			##site_hr_color##<br />
			（例：<input type="text" value="##site_hr_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>時刻色タグ</th>
		<td>
			##site_time_color##<br />
			（例：<input type="text" value="##site_time_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>フォーム名色タグ</th>
		<td>
			##site_form_name_color##<br />
			（例：<input type="text" value="##site_form_name_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>エラー文字色タグ</th>
		<td>
			##site_error_color##<br />
			（例：<input type="text" value="##site_error_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>ページャ文字色タグ</th>
		<td>
			##site_pager_text_color##<br />
			（例：<input type="text" value="##site_pager_text_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>ページャ背景色タグ</th>
		<td>
			##site_pager_bg_color##<br />
			（例：<input type="text" value="##site_pager_bg_color##" size="50">）
		</td>
	</tr>
	<tr>
		<th>DOCOMO下位端末タグ</th>
		<td>
			##site_low_term_d##<br />
			（例：<input type="text" value="##site_low_term_d##" size="50">）
		</td>
	</tr>
	<tr>
		<th>AU下位端末タグ</th>
		<td>
			##site_low_term_a##<br />
			（例：<input type="text" value="##site_low_term_a##" size="50">）
		</td>
	</tr>
	<tr>
		<th>SOFTBANK下位端末タグ</th>
		<td>
			##site_low_term_s##<br />
			（例：<input type="text" value="##site_low_term_s##" size="50">）
		</td>
	</tr>
</table>


{include file="admin/util/tag/footer.tpl"}
