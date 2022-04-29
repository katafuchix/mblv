{include file="admin/util/tag/header.tpl"}

<h2>タグリファレンス（{$ft.htmltemplate.name}）</h2>

<table class="sheet">
	<tr>
		<th>ファイルURLタグ（画像や動画へのURLです）</th>
		<td>
			src=f.php?type=file&id=「ファイル番号」<br />
			（例：<input type="text" value="src=f.php?type=file&id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>ファイルURLタグ（画像や動画へのURLです）</th>
		<td>
			src=f.php?type=file&id=「ファイル番号」<br />
			（例：<input type="text" value="src=f.php?type=file&id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>フリーページURLタグ1</th>
		<td>
			?action_user_contents=true&contents_id=「フリーページID」<br />
			（例：<input type="text" value="?action_user_contents=true&contents_id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>フリーページURLタグ2</th>
		<td>
			?action_user_contents=true&code=「フリーページコード」]<br />
			（例：<input type="text" value="?action_user_contents=true&code=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>商品ページURLタグ</th>
		<td>
			?action_user_ec_item=true&item_id=「商品ID」<br />
			（例：<input type="text" value="?action_user_ec_item=true&item_id=1" size="50">）
		</td>
	</tr>
<!--
	<tr>
		<th>商品画像タグ</th>
		<td>
			##item_img「商品ID」##<br />
			（例：<input type="text" value="##item_img1##" size="50">）
		</td>
	</tr>
	<tr>
		<th>商品カテゴリ画像タグ</th>
		<td>
			##ic_img「商品カテゴリID」##<br />
			（例：<input type="text" value="##ic_img1##" size="50">）<br />
		</td>
	</tr>
-->
	<tr>
		<th>アバター詳細ページURLタグ</th>
		<td>
			?action_user_avatar_buy=true&avatar_id=「アバターID」<br />
		（例：<input type="text" value="?action_user_avatar_buy=true&avatar_id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>デコメール詳細ページURLタグ</th>
		<td>
			?action_user_decomail_buy=true&decomail_id=「デコメールID」<br />
			（例：<input type="text" value="?action_user_decomail_buy=true&decomail_id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>デコメールダウンロードタグ</th>
		<td>
			?action_user_decomail_buy_do=true&decomail_id=「デコメールID」<br />
			（例：<input type="text" value="?action_user_decomail_buy_do=true&decomail_id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>ゲーム詳細ページURLタグ</th>
		<td>
			?action_user_game_buy=true&game_id=「ゲームID」<br />
			（例：<input type="text" value="?action_user_game_buy=true&game_id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>サウンド詳細ページURLタグ</th>
		<td>
			?action_user_sound_buy=true&sound_id=「サウンドID」<br />
			（例：<input type="text" value="?action_user_sound_buy=true&sound_id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>コミュニティトップページURLタグ</th>
		<td>
			?action_user_community_view=true&community_id=「コミュニティID」<br />
			（例：<input type="text" value="?action_user_community_view=true&community_id=1" size="50">）
		</td>
	</tr>
	<tr>
		<th>総合トップページURLタグ</th>
		<td>
			?action_user_top=true<br />
			（例：<input type="text" value="?action_user_top=true" size="50">）
		</td>
	</tr>
	<tr>
		<th>マイページURLタグ</th>
		<td>
			?action_user_home=true<br />
			（例：<input type="text" value="?action_user_home=true" size="50">）
		</td>
	</tr>
	<tr>
		<th>会員登録メールアドレスタグ</th>
		<td>
			{literal}{html_style type='mailto' account='regist' hash=$session.media_access_hash}{/literal}<br />
			（例：<input type="text" value="{literal}{html_style type='mailto' account='regist' hash=$session.media_access_hash}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>メールドメインタグ</th>
		<td>
			{literal}{$config.mail_domain}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.mail_domain}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>入会経路引き継ぎメールアドレスタグ</th>
		<td>
			{literal}{html_style type='mailto' account='regist' hash=$session.media_access_hash}{/literal}<br />
			（例：<input type="text" value="{literal}{html_style type='mailto' account='regist' hash=$session.media_access_hash}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>サイト名タグ</th>
		<td>
			{literal}{$config.site_name}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_name}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>サイト運営会社タグ</th>
		<td>
			{literal}{$config.site_company_name}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_company_name}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>サイト運営会社電話番号タグ</th>
		<td>
			{literal}{$config.site_phone}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_phone}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>HTMLタイトルタグ</th>
		<td>
			{literal}{$config.site_html_title}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_html_title}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>META Descriptionタグ</th>
		<td>
			{literal}{$config.site_meta_description}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_meta_description}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>META Keywordsタグ</th>
		<td>
			{literal}{$config.site_meta_keywords}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_meta_keywords}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>META robotsタグ</th>
		<td>
			{literal}{$config.site_meta_robots}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_meta_robots}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>META authorタグ</th>
		<td>
			{literal}{$config.site_meta_robots}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_meta_author}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>ナビゲーションテンプレートタグ</th>
		<td>
			{literal}{$config.site_navi_template}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_navi_template}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>入会時付与ポイントタグ</th>
		<td>
			{literal}{$config.site_navi_template}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_regist_point}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>友達招待入会時付与ポイント（招待者）タグ</th>
		<td>
			{literal}{$config.site_invite_from_point}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_invite_from_point}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>友達招待入会時付与ポイント（被招待者）タグ</th>
		<td>
			{literal}{$config.site_invite_to_point}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_invite_to_point}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>背景色タグ</th>
		<td>
			{literal}{$config.site_bg_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_bg_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>文字色タグ</th>
		<td>
			{literal}{$config.site_text_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_text_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>リンク色タグ</th>
		<td>
			{literal}{$config.site_link_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_link_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>アクティブリンク色タグ</th>
		<td>
			{literal}{$config.site_alink_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_alink_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>訪問済みリンク色タグ</th>
		<td>
			{literal}{$config.site_vlink_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_vlink_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>タイトル背景色タグ</th>
		<td>
			{literal}{$config.site_title_bg_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_title_bg_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>タイトル文字色タグ</th>
		<td>
			{literal}{$config.site_title_font_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_title_font_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>メニュー色タグ</th>
		<td>
			{literal}{$config.site_menu_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_menu_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>水平線色タグ</th>
		<td>
			{literal}{$config.site_hr_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_hr_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>時刻色タグ</th>
		<td>
			{literal}{$config.site_time_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_time_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>フォーム名色タグ</th>
		<td>
			{literal}{$config.site_form_name_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_form_name_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>エラー文字色タグ</th>
		<td>
			{literal}{$config.site_error_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_error_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>ページャ文字色タグ</th>
		<td>
			{literal}{$config.site_pager_text_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_pager_text_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>ページャ背景色タグ</th>
		<td>
			{literal}{$config.site_pager_bg_color}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_pager_bg_color}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>DOCOMO下位端末タグ</th>
		<td>
			{literal}{$config.site_low_term_d}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_low_term_d}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>AU下位端末タグ</th>
		<td>
			{literal}{$config.site_low_term_a}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_low_term_a}{/literal}" size="50">）
		</td>
	</tr>
	<tr>
		<th>SOFTBANK下位端末タグ</th>
		<td>
			{literal}{$config.site_low_term_s}{/literal}<br />
			（例：<input type="text" value="{literal}{$config.site_low_term_s}{/literal}" size="50">）
		</td>
	</tr>
</table>


{include file="admin/util/tag/footer.tpl"}
