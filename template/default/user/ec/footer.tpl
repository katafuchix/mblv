<!--�եå�������-->

<!--�եå������γ���-->
{html_style type="title" title="[x:0074]�������Ď����ĎҎƎ���[x:0074]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	<!-- ���å���󤬤��äƥ��������ѿ����ʤ���� -->
	{if $session.user.user_id && !$app.logout}
		<!-- ���å����˥˥å��͡��ब������ -->
		{if $session.user.user_nickname}
			{$session.user.user_nickname}��<br />
		{/if}
		[x:0116]<a href="{$mall_url}?action_user_ec_delivery_edit=true&SESSID={$SESSID}" accesskey="2">��������ѹ�</a><br />
	{else}
		<!--�����󤷤Ƥ��ʤ����-->
		[x:0115]<a href="{$mall_url}{$scipt}?action_user_login=true" accesskey="1">�ێ��ގ���</a><br />
	{/if}
	<!-- �㤤ʪ������������ -->
	{if $session.cart_hash && !$app.logout}
		[x:0117]<a href="{$mall_url}?action_user_ec_cart=true&shop_id={$form.shop_id}&SESSID={$SESSID}" accesskey="3">��������򸫤�</a><br />
	{/if}

	<!-- ���å���󤬤��äƥ��������ѿ����ʤ���� -->
	{if $session.user.user_id && !$app.logout}
		[x:0118]<a href="?action_user_logout_do=true" accesskey="4">�ێ��ގ�����</a><br />
	{/if}

	<!--���̥եå��� TOP��-->
	[x:0119]<a href="{$mall_url}?action_user_index=true&SESSID={$SESSID}" accesskey="5">{$mall_name}TOP��</a><br />
	[x:0124]<a href="{$site_url}?guid=ON" accesskey="0">���TOP��</a><br />
</div>
<!--�եå������ν�λ-->

<!-- cmark-->
{html_style type="title" title="(c){$app.company_name}" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥʽ�λ-->
</div>

<!--�եå�����λ-->
</body>
</html>
