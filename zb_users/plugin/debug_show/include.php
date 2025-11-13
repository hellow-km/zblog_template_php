<?php
RegisterPlugin("debug_show","ActivePlugin_debug_show");

function ActivePlugin_debug_show() {
    Add_Filter_Plugin('Filter_Plugin_Cmd_Ajax', 'debug_show_Cmd_Ajax');
    Add_Filter_Plugin('Filter_Plugin_Admin_Footer', 'debug_show_Admin_Footer');
}

function debug_show_Cmd_Ajax($src){
    global $zbp;
    
    if ($src == 'set-debug'){
        CheckIsRefererValid();
        $zbp->CheckRights('root') || $zbp->ShowError(6);
        $zbp->Config('system')->ZC_DEBUG_MODE = !!GetVars('value', 'GET');
        $zbp->SaveConfig('system');
        ob_clean();
        exit('ok');
    }
    
    if ($src == 'set-developer'){
        CheckIsRefererValid();
        $zbp->CheckRights('root') || $zbp->ShowError(6);
        $zbp->Config('AppCentre')->enabledevelop = !!GetVars('value', 'GET');
        $zbp->SaveConfig('AppCentre');
        ob_clean();
        exit('ok');
    }
}

function debug_show_Admin_Footer(){
    global $zbp;
    
    if (!$zbp->CheckRights('root')){
        return;
    }
    
    ?>
    <style>
        .userbtn{
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .debug-show-checkbox input{
            vertical-align: middle;
        }
    </style>
    <script>
        (() => {
            const container = document.querySelector('.userbtn')
            container.insertAdjacentHTML('afterbegin', `
            <a><label class="debug-show-checkbox"><input type="checkbox" name="set-debug" <?php echo $zbp->Config('system')->ZC_DEBUG_MODE ? 'checked' : ''?>><span>调试模式</span></label></a>
            <a><label class="debug-show-checkbox"><input type="checkbox" name="set-developer" <?php echo $zbp->Config('AppCentre')->enabledevelop ? 'checked' : ''?>><span>应用开发者模式</span></label></a>
            `)
            document.querySelectorAll('.debug-show-checkbox input').forEach(v => {
                v.addEventListener('change', e => {
                    const input = e.target
                    fetch(`${ajaxurl}${input.name}&value=${input.checked ? '1' : '0'}&csrfToken=<?php echo $zbp->GetCSRFToken()?>`).then(async res => {
                        if (!res.ok || await res.text() != 'ok'){
                            v.target.checked = !v.target.checked
                            return
                        }
                        const act = Object.fromEntries(new URLSearchParams(location.search)).act || ''
                        if (input.name == 'set-developer' && ['ThemeMng', 'PluginMng'].includes(act)){
                            location.reload()
                        }
                    })
                })
            })
        })()
    </script>
    <?
}