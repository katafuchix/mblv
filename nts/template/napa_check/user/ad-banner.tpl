{if $ad.ad_image}
<a href="?action_user_ad_redirect=true&ad_id={$ad.ad_id}"><img src="?action_user_file_get=true&file=ad/{$ad.ad_image}&SESSID={$SESSID}" size="40"></a><br />
{else}
<a href="?action_user_ad_redirect=true&ad_id={$ad.ad_id}">{*$ad.ad_name*}{$ad.ad_desc}</a><br />
{/if}
<!--
¡Ê{if $ad.ad_type == 1}¸Ø¯¸{else}ÅĞÏ¿{/if}¡§{if $ad.ad_point_type==1}{$ad.ad_point}{else}{$ad.ad_ad_price*$ad.ad_point_percent/100}{/if}{$ft.point.name}¡Ë
-->
