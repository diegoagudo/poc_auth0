<?php

require 'vendor/autoload.php';

class AuthTest {
    public $auth0;
    const  _domain = 'dev-voqz36zi.us.auth0.com';
    const _client_id = '__SUBSTITUIR__';
    const _client_secret = '__SUBSTITUIR__';
    const _redirect_uri_login = 'http://localhost:3003/callback.php';
    const _redirect_uri_logout= 'http://localhost:3003/';
    const _audience = 'http://teste-api.localhost';

    public function __construct()  {
        $this->auth0 = new \Auth0\SDK\Auth0([
            'domain' => self::_domain,
            'client_id' => self::_client_id,
            'client_secret' => self::_client_secret,
            'redirect_uri' => self::_redirect_uri_login,
            'audience' => self::_audience,
            'persist_id_token' => true,
            'persist_access_token' => true,
            'persist_refresh_token' => true
        ]);
    }

    public function getLoginUrl(array $params = []) : String {
        return $this->auth0->getLoginUrl([
            'scope' => 'distribute:newsletters read:profile read:email openid profile name email email_verified offline_access read:client_grants'
        ]);
    }

    public function logout() : void {
        $this->auth0->logout();

        $logoutUrl = sprintf(
            'https://%s/v2/logout?client_id=%s&returnTo=%s',
            self::_domain,
            self::_client_id,
            self::_redirect_uri_logout
        );

        Header("Location: ${logoutUrl}");
    }

    public function callbackLogin() : void {
        try {
            $this->auth0->getUser();
            Header("Location: index.php");

        } catch(\Exception $e) {
            Die("Erro: Usuário não validado.");
        }
    }
}

$authTest = new AuthTest();

