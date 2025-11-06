{template:header} 
<!-- header end--> 

{if $type=='index'&&$page=='1'}
{template:post-default}
{else}
{template:post-list}
{/if} 

<!--footer--> 
{template:footer} 

<!--footer--> 
