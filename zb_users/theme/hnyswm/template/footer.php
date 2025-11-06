
<footer>
  <div class="layout  footer-bot">
    <div class="container text-center"> {if $type=='index'&&$page=='1'}
      <div class="foot-flink">
        <ul>
          {if $zbp->Config('hnyswm')->enandch}Links:{else}友情链接：{/if}{module:link}
        </ul>
      </div>
      {/if}
      {if $zbp->Config('hnyswm')->ysbnavon}
      <div class="foot-link hidden-l">
        <ul>
          {$zbp->Config('hnyswm')->ysbnav}
        </ul>
      </div>
      {/if}
      <div class="Copyright">{$copyright}&nbsp;&nbsp; {$zblogphphtml}&nbsp;&nbsp;{if $zbp->Config('hnyswm')->china}
        <svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-zhongwen"></use>
        </svg>
        <a target="_blank" href="{$zbp->Config('hnyswm')->china}">中文版</a>{/if}&nbsp;&nbsp;{if $zbp->Config('hnyswm')->english}
        <svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-yingwen"></use>
        </svg>
        <a target="_blank" href="{$zbp->Config('hnyswm')->english}">English</a>{/if}</div>
    </div>
  </div>
</footer>
</body></html>