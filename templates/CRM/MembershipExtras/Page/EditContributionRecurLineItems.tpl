<div id="periodsContainer" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
  {* Tab management *}
  <script type="text/javascript">
    var selectedTab  = 'contributions';
    {literal}
    CRM.$(function($) {
      var tabIndex = $('#tab_' + selectedTab).prevAll().length;
      $("#periodsContainer").tabs({active: tabIndex});
      $(".crm-tab-button").addClass("ui-corner-bottom");
    });
    {/literal}
  </script>
  <ul class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">
    <li id="tab_current" class="crm-tab-button ui-corner-all ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active">
      <a href="#current-subtab" title="{ts}Contributions{/ts}">
        {ts}Current Period{/ts}
      </a>
    </li>
    <li id="tab_next" class="crm-tab-button ui-corner-all ui-tabs-tab ui-corner-top ui-state-default ui-tab">
      <a href="#next-subtab" title="{ts}Recurring Contributions{/ts}">
        {ts}Next Period{/ts}
      </a>
    </li>
  </ul>

  <div id="current-subtab" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
    {include file="CRM/MembershipExtras/Page/CurrentPeriodTab.tpl"}
  </div>
  <div id="next-subtab" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
    [ NEXT PERIOD ]
  </div>
  <div class="clear"></div>
</div>
