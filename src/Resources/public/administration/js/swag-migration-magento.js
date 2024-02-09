(function(){var e={939:function(){let{Component:e}=Shopware;e.extend("swag-migration-profile-magento19-local-credential-form","swag-migration-profile-magento-local-credential-form",{})},89:function(){let{Component:e}=Shopware;e.extend("swag-migration-profile-magento20-local-credential-form","swag-migration-profile-magento-local-credential-form",{})},46:function(){let{Component:e}=Shopware;e.extend("swag-migration-profile-magento21-local-credential-form","swag-migration-profile-magento-local-credential-form",{})},20:function(){let{Component:e}=Shopware;e.extend("swag-migration-profile-magento22-local-credential-form","swag-migration-profile-magento-local-credential-form",{})},640:function(){let{Component:e}=Shopware;e.extend("swag-migration-profile-magento23-local-credential-form","swag-migration-profile-magento-local-credential-form",{})}},a={};function t(n){var i=a[n];if(void 0!==i)return i.exports;var l=a[n]={exports:{}};return e[n](l,l.exports,t),l.exports}t.p="/bundles/swagmigrationmagento/",t.p=window.__sw__.assetPath+"/bundles/swagmigrationmagento/",function(){"use strict";let{Component:e}=Shopware;e.register("swag-migration-profile-magento-local-credential-form",{template:'<div class="swag-migration-wizard swag-migration-wizard-page-credentials"\n     @keypress.enter="onKeyPressEnter">\n    {% block swag_migration_magento_wizard_page_credentials_content %}\n        <div class="swag-migration-wizard__content">\n            {% block swag_migration_magento_wizard_page_credentials_information %}\n                <div class="swag-migration-wizard__content-information">\n                    {% block swag_migration_magento_wizard_page_credentials_local_hint %}\n                        {{ $tc(\'swag-migration.wizard.pages.credentials.magento.local.contentInformation\') }}\n                    {% endblock %}\n                </div>\n            {% endblock %}\n\n            {% block swag_migration_magento_wizard_page_credentials_credentials %}\n                <div class="swag-migration-wizard__form">\n                    {% block swag_migration_magento_wizard_page_credentials_local_db_host_port_group %}\n                        <sw-container columns="1fr 80px"\n                                      gap="16px">\n                            {% block swag_migration_magento_wizard_page_credentials_local_dbhost_field %}\n                                <sw-text-field\n                                    v-autofocus\n                                    name="sw-field--dbHost"\n                                    :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbHostLabel\')"\n                                    :placeholder="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbHostPlaceholder\')"\n                                    v-model:value="inputCredentials.dbHost"\n                                ></sw-text-field>\n                            {% endblock %}\n\n                            {% block swag_migration_magento_wizard_page_credentials_local_dbport_field %}\n                                <sw-text-field\n                                    name="sw-field--dbPort"\n                                    :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbPortLabel\')"\n                                    v-model:value="inputCredentials.dbPort"\n                                ></sw-text-field>\n                            {% endblock %}\n                        </sw-container>\n                    {% endblock %}\n\n                    {% block swag_migration_magento_wizard_page_credentials_local_dbuser_field %}\n                        <sw-text-field\n                            name="sw-field--dbUser"\n                            :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbUserLabel\')"\n                            :placeholder="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbUserPlaceholder\')"\n                            v-model:value="inputCredentials.dbUser"\n                        ></sw-text-field>\n                    {% endblock %}\n\n                    {% block swag_migration_magento_wizard_page_credentials_local_dbpassword_field %}\n                        <sw-password-field\n                            name="sw-field--dbPassword"\n                            type="password"\n                            :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbPasswordLabel\')"\n                            :placeholder="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbPasswordPlaceholder\')"\n                            v-model:value="inputCredentials.dbPassword"\n                        ></sw-password-field>\n                    {% endblock %}\n\n                    {% block swag_migration_magento_wizard_page_credentials_local_dbname_field %}\n                        <sw-text-field\n                            name="sw-field--dbName"\n                            :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbNameLabel\')"\n                            :placeholder="$tc(\'swag-migration.wizard.pages.credentials.magento.local.dbNamePlaceholder\')"\n                            v-model:value="inputCredentials.dbName"\n                        ></sw-text-field>\n                    {% endblock %}\n\n                    {% block swag_migration_magento_wizard_page_credentials_local_shopurlactive_field %}\n                        <sw-switch-field\n                            name="sw-field--shopUrlActive"\n                            :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.shopUrlActiveLabel\')"\n                            :helpText="$tc(\'swag-migration.wizard.pages.credentials.magento.local.shopUrlActiveHelp\')"\n                            v-model:value="shopUrlActive"\n                        ></sw-switch-field>\n                    {% endblock %}\n\n                    {% block swag_migration_magento_wizard_page_credentials_local_installationroot_field %}\n                        <sw-text-field\n                            v-if="shopUrlActive === false"\n                            name="sw-field--installationRoot"\n                            :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.installationRoot\')"\n                            :placeholder="$tc(\'swag-migration.wizard.pages.credentials.magento.local.installationRootPlaceholder\')"\n                            :helpText="$tc(\'swag-migration.wizard.pages.credentials.magento.local.installationRootHelp\')"\n                            v-model:value="inputCredentials.installationRoot"\n                        ></sw-text-field>\n                    {% endblock %}\n\n                    {% block swag_migration_magento_wizard_page_credentials_local_shopurl_field %}\n                        <sw-url-field\n                            v-if="shopUrlActive === true"\n                            name="sw-url-field--shopUrl"\n                            :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.shopUrl\')"\n                            :placeholder="$tc(\'swag-migration.wizard.pages.credentials.magento.local.shopUrlPlaceholder\')"\n                            :helpText="$tc(\'swag-migration.wizard.pages.credentials.magento.local.shopUrlHelp\')"\n                            v-model:value="inputCredentials.shopUrl"\n                        ></sw-url-field>\n                    {% endblock %}\n\n                    {% block swag_migration_magento_wizard_page_credentials_local_tableprefix_field %}\n                        <sw-text-field\n                            name="sw-field--tablePrefix"\n                            :label="$tc(\'swag-migration.wizard.pages.credentials.magento.local.tablePrefix\')"\n                            :placeholder="$tc(\'swag-migration.wizard.pages.credentials.magento.local.tablePrefixPlaceholder\')"\n                            v-model:value="inputCredentials.tablePrefix"\n                        ></sw-text-field>\n                    {% endblock %}\n                </div>\n            {% endblock %}\n        </div>\n    {% endblock %}\n</div>\n',props:{credentials:{type:Object,default(){return{}}}},data(){return{inputCredentials:{dbHost:"",dbPort:"3306",dbUser:"",dbPassword:"",dbName:"",installationRoot:"",shopUrl:"",tablePrefix:""},shopUrlActive:!1}},watch:{credentials:{immediate:!0,handler(e){if(null===e||Object.keys(e).length<1){this.emitCredentials(this.inputCredentials);return}this.inputCredentials=e,void 0!==this.inputCredentials.shopUrl&&"http://"!==this.inputCredentials.shopUrl&&"https://"!==this.inputCredentials.shopUrl&&""!==this.inputCredentials.shopUrl&&(this.shopUrlActive=!0),this.emitOnChildRouteReadyChanged(this.areCredentialsValid(this.inputCredentials))}},inputCredentials:{deep:!0,handler(e){this.emitCredentials(e)}},shopUrlActive(e){!0===e?this.inputCredentials.installationRoot="":this.inputCredentials.shopUrl="",this.emitCredentials(this.inputCredentials)}},methods:{areCredentialsValid(e){return this.validateInput(e.dbHost)&&this.validateInput(e.dbPort)&&this.validateInput(e.dbName)&&this.validateInput(e.dbUser)&&(!1===this.shopUrlActive&&this.validateInput(e.installationRoot)||!0===this.shopUrlActive&&this.validateShopUrl(e.shopUrl))},validateInput(e){return null!=e&&""!==e},validateShopUrl(e){return void 0!==e&&this.validateInput(e)&&"http://"!==e&&"https://"!==e},emitOnChildRouteReadyChanged(e){this.$emit("onChildRouteReadyChanged",e)},emitCredentials(e){this.$emit("onCredentialsChanged",e),this.emitOnChildRouteReadyChanged(this.areCredentialsValid(e))},onKeyPressEnter(){this.$emit("onTriggerPrimaryClick")}}}),t(939),t(89),t(46),t(20),t(640)}()})();
//# sourceMappingURL=swag-migration-magento.js.map