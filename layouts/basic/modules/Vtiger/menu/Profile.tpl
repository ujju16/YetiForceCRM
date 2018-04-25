{strip}
	{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
	{if AppConfig::security('CHANGE_LOGIN_PASSWORD')}
		{assign var=ICON value=Vtiger_Menu_Model::getMenuIcon($MENU, Vtiger_Menu_Model::vtranslateMenu($MENU['name'],$MENU_MODULE))}
		<li class="tpl-menu-Profile nav-item menuLabel {if !$HASCHILDS}hasParentMenu{/if}" data-id="{$MENU['id']}">
			<a class="nav-link collapsed{if $ICON} hasIcon{/if}{if $HASCHILDS == 'true'} js-submenu-toggler{/if}"
			{if $HASCHILDS == 'true'} data-toggle="collapse" data-target="#submenu-{$MENU['id']}" role="button" href="#" aria-haspopup="true" aria-expanded="false" aria-controls="submenu-{$MENU['id']}"{/if}>
				{$ICON}
				<span class="menuName">{Vtiger_Menu_Model::vtranslateMenu($MENU['name'],$MENU_MODULE)}</span>
				{if $HASCHILDS == 'true'}<span class="toggler" aria-hidden="true"><span class="fas fa-plus-circle"></span><span class="fas fa-minus-circle"></span></span>{/if}
			</a>
			<div class="tpl-menu-Profile_submenu js-submenu collapse" id="submenu-{$MENU['id']}" data-js="bootstrap:collapse" data-parent="#js-menu">
				<ul class="nav flex-column">
					<li class="menuPanel nav-item">
						<button name="changePass" data-url="index.php?module=Users&view=PasswordModal&mode=change&record={$USER_MODEL->getRealId()}"
								class=" btn btn-block btn-light showModal" type="button">
							{Vtiger_Menu_Model::vtranslateMenu('LBL_CHANGE_LOGIN_PASSWORD',$MENU_MODULE)}
						</button>
					</li>
				</ul>
			</div>
		</li>
	{/if}
{/strip}
