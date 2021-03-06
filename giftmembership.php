<?php

require_once 'giftmembership.civix.php';
use CRM_Giftmembership_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function giftmembership_civicrm_config(&$config) {
  _giftmembership_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function giftmembership_civicrm_xmlMenu(&$files) {
  _giftmembership_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function giftmembership_civicrm_install() {
  _giftmembership_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function giftmembership_civicrm_postInstall() {
  _giftmembership_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function giftmembership_civicrm_uninstall() {
  _giftmembership_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function giftmembership_civicrm_enable() {
  _giftmembership_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function giftmembership_civicrm_disable() {
  _giftmembership_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function giftmembership_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _giftmembership_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function giftmembership_civicrm_managed(&$entities) {
  _giftmembership_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function giftmembership_civicrm_caseTypes(&$caseTypes) {
  _giftmembership_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function giftmembership_civicrm_angularModules(&$angularModules) {
  _giftmembership_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function giftmembership_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _giftmembership_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 */
function giftmembership_civicrm_navigationMenu(&$menu) {
  _giftmembership_civix_insert_navigation_menu($menu, 'Administer/CiviMember', array(
    'label' => E::ts('Gift Membership Settings'),
    'name' => 'giftmembership_settings',
    'url' => 'civicrm/admin/member/giftmembership',
    'permission' => 'access CiviMember',
    'separator' => TRUE,
  ));
  _giftmembership_civix_navigationMenu($menu);
}

/**
 * Implements hook_civicrm_container().
 *
 * Used to set up listeners for DAO events.
 *
 * @link https://docs.civicrm.org/dev/en/master/hooks/hook_civicrm_container/
 */
function giftmembership_civicrm_container($container) {
  $container->findDefinition('dispatcher')->addMethodCall('addListener', array('civi.dao.postInsert', array('CRM_Giftmembership_Listener_MembershipPayment', 'onUpsert')));
  $container->findDefinition('dispatcher')->addMethodCall('addListener', array('civi.dao.postUpdate', array('CRM_Giftmembership_Listener_MembershipPayment', 'onUpsert')));
}
