{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="ethna-error">���顼��ȯ�����ޤ����������ԤޤǤ�Ϣ��������<br />{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
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
