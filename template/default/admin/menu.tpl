{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>管理メニュー</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<!--blockquote>
			<a href="?action_admin_util=true&page=faq_index">2008/02/28 管理操作マニュアルを更新しました。</a>
			</blockquote-->
			<table>
				<tr>
					<td valign="top">
						<ul>
							<li>ユーザ管理</li>
							<ul>
								{if $smarty.session.auth_action_list.admin_user_list}
								<li><a href="?action_admin_user_list=true">{$ft.user.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_media_list}
								<li><a href="?action_admin_media_list=true">{$ft.media.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_analytics_day}
								<li><a href="?action_admin_analytics_day=true">{$ft.analytics.name}</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_blacklist_list}
								<li><a href="?action_admin_blacklist_list=true">{$ft.blacklist.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_report_list}
								<li><a href="?action_admin_report_list=true">{$ft.report.name}管理</a></li>
								{/if}
							</ul>
							<li>{$ft.magazine.name}管理</li>
							<ul>
								{if $smarty.session.auth_action_list.admin_magazine_list}
								<li><a href="?action_admin_magazine_list=true">{$ft.magazine.name}カレンダー</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_magazine_add}
								<li><a href="?action_admin_magazine_add=true">{$ft.magazine.name}登録</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_segment_list}
								<li><a href="?action_admin_segment_list=true">{$ft.segment.name}管理</a></li>
								{/if}
							</ul>
							<li>投稿管理</li>
							<ul>
								{if $smarty.session.auth_action_list.admin_blog_article_list}
								<li><a href="?action_admin_blog_article_list=true">{$ft.blog_article.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_blog_comment_list}
								<li><a href="?action_admin_blog_comment_list=true">{$ft.blog_article.name}{$ft.blog_comment.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_community_list}
								<li><a href="?action_admin_community_list=true">{$ft.community.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_community_article_list}
								<li><a href="?action_admin_community_article_list=true">{$ft.community_article.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_community_comment_list}
								<li><a href="?action_admin_community_comment_list=true">{$ft.community.name}{$ft.community_comment.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_comment_list}
								<li><a href="?action_admin_comment_list=true">{$ft.comment.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_message_list}
								<li><a href="?action_admin_message_list=true">{$ft.message.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_bbs_list}
								<li><a href="?action_admin_bbs_list=true">{$ft.bbs.name}検索</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_image_list}
								<li><a href="?action_admin_image_list=true">{$ft.image.name}検索</a></li>
								{/if}
								{if $config.option.movie}
								{if $smarty.session.auth_action_list.admin_movie_list}
								<li><a href="?action_admin_movie_list=true">{$ft.movie.name}検索</a></li>
								{/if}
								{/if}
								{if $smarty.session.auth_action_list.admin_user_friend_introduction_list}
								<li><a href="?action_admin_user_friend_introduction_list=true">{$ft.friend_introduction.name}検索</a></li>
								{/if}
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>基本設定</li>
							<ul>
								{if $smarty.session.auth_action_list.admin_config_edit}
								<li><a href="?action_admin_config_edit=true">{$ft.config.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_config_user_prof}
								<li><a href="?action_admin_config_user_prof=true">{$ft.profile.name}項目管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_config_community_category}
								<li><a href="?action_admin_config_community_category=true">{$ft.community_category.name}変更</a></li>
								{/if}
								{if $session.admin.admin_status > 0}
								{if $smarty.session.auth_action_list.admin_account_list}
								<li><a href="?action_admin_account_list=true">{$ft.account.name}管理</a></li>
								{/if}
								{/if}
							</ul>
							<li>広告管理</li>
							<ul>
								{if $config.option.point}
								{if $smarty.session.auth_action_list.admin_ad_list}
								<li><a href="?action_admin_ad_list=true">{$ft.ad.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_admenu_edit}
								<li><a href="?action_admin_admenu_edit=true">{$ft.admenu.name}管理</a></li>
								{/if}
								{/if}
								{if $smarty.session.auth_action_list.admin_banner_list}
								<li><a href="?action_admin_banner_list=true">{$ft.banner.name}管理</a></li>
								{/if}
							</ul>
							<li>コンテンツ管理</li>
							<ul>
								{if $smarty.session.auth_action_list.admin_news_list}
								<li><a href="?action_admin_news_list=true">{$ft.news.name}管理</a></li>
								{/if}
								{if $config.option.point}
								{if $smarty.session.auth_action_list.admin_point_list}
								<li><a href="?action_admin_point_list=true">{$ft.point.name}管理</a></li>
								{/if}
								{/if}
								{if $config.option.avatar}
								{if $smarty.session.auth_action_list.admin_avatarcategory_list}
								<li><a href="?action_admin_avatarcategory_list=true">{$ft.avatar.name}管理</a></li>
								{/if}
								{/if}
								{if $config.option.decomail}
								{if $smarty.session.auth_action_list.admin_decomailcategory_list}
								<li><a href="?action_admin_decomailcategory_list=true">{$ft.decomail.name}管理</a></li>
								{/if}
								{/if}
								{if $config.option.game}
								{if $smarty.session.auth_action_list.admin_gamecategory_list}
								<li><a href="?action_admin_gamecategory_list=true">{$ft.game.name}管理</a></li>
								{/if}
								{/if}
								{if $config.option.sound}
								{if $smarty.session.auth_action_list.admin_soundcategory_list}
								<li><a href="?action_admin_soundcategory_list=true">{$ft.sound.name}管理</a></li>
								{/if}
								{/if}
								{if $smarty.session.auth_action_list.admin_contents_list}
								<li><a href="?action_admin_contents_list=true">{$ft.contents.name}管理</a></li>
								{/if}
								{if $config.option.video}
								{if $smarty.session.auth_action_list.admin_videocategory_list}
								<li><a href="?action_admin_videocategory_list=true">{$ft.video.name}管理</a></li>
								{/if}
								{/if}
							</ul>
						</ul>
					</td>
					<td valign="top">
						<ul>
							<li>EC管理</li>
							<ul>
								{if $smarty.session.auth_action_list.admin_ec_review_list}
								<li><a href="?action_admin_ec_review_list=true">{$ft.review.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_ec_userorder_list}
								<li><a href="?action_admin_ec_userorder_list=true">{$ft.user_order.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_ec_shop_list}
								<li><a href="?action_admin_ec_shop_list=true">{$ft.shop.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_ec_itemcategory_list}
								<li><a href="?action_admin_ec_itemcategory_list=true">{$ft.item_category.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_ec_item_list}
								<li><a href="?action_admin_ec_item_list=true">{$ft.item.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_ec_supplier_list}
								<li><a href="?action_admin_ec_supplier_list=true">{$ft.supplier.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_ec_postage_list}
								<li><a href="?action_admin_ec_postage_list=true">{$ft.postage.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_ec_exchange_list}
								<li><a href="?action_admin_ec_exchange_list=true">{$ft.exchange.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_config_edit}
								<li><a href="?action_admin_config_edit=true&site_type=mall">{$ft.ec.name}{$ft.config.name}管理</a></li>
								{/if}
							</ul>
							<li>ユーティリティ</li>
							<ul>
								{if $smarty.session.auth_action_list.admin_stats_list}
								<li><a href="?action_admin_stats_list=true&type=access&term=month">{$ft.stats.name}</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_htmltemplate_list}
								<li><a href="?action_admin_htmltemplate_list=true">{$ft.htmltemplate.name}管理</a></li>
								{/if}
								{if $smarty.session.auth_action_list.admin_mailtemplate_list}
								<li><a href="?action_admin_mailtemplate_list=true">{$ft.mailtemplate.name}管理</a></li>
								{/if}
								<li><a href="?action_admin_util=true&page=faq_index">{$ft.faq.name}</a></li>
								{if $smarty.session.auth_action_list.admin_emoji}
								<li><a href="#" onClick="javascript:void(window.open('?action_admin_emoji=true','{$ft.emoji.name}','width=400,height=400,scrollbars=yes'))">{$ft.emoji.name}</a></li>
								{/if}
								{if $config.option.ngword}
								{if $smarty.session.auth_action_list.admin_ngword_edit}
								<li><a href="?action_admin_ngword_edit=true">{$ft.ngword.name}設定</a></li>
								{/if}
								{/if}
								<li><a href="?action_admin_logout_do=true">{$ft.logout.name}</a></li>
							</ul>
						</ul>
					</td>
				</tr>
			</table>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
