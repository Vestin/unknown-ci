<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId' => config('services.OAuth.clientId'),    // The client ID assigned to you by the provider
            'clientSecret' => config('services.OAuth.clientSecret'),   // The client password assigned to you by the provider
            'redirectUri' => config('services.OAuth.redirectUri'),
            'urlAuthorize' => config('services.OAuth.urlAuthorize'),
            'urlAccessToken' => config('services.OAuth.urlAccessToken'),
            'urlResourceOwnerDetails' => config('services.OAuth.urlResourceOwnerDetails')
        ]);

// If we don't have an authorization code then get one
        if (!$request->get('code',null)) {

            // Fetch the authorization URL from the provider; this returns the
            // urlAuthorize option and generates and applies any necessary parameters
            // (e.g. state).
            $authorizationUrl = $provider->getAuthorizationUrl();

            // Get the state generated for you and store it to the session.
            session(['oauth2state' => $provider->getState()]);

            // Redirect the user to the authorization URL.
            header('Location: ' . $authorizationUrl);
            return response()->redirectTo($authorizationUrl);

// Check given state against previously stored one to mitigate CSRF attack
        } elseif (empty($_GET['state']) || ($_GET['state'] !== session('oauth2state'))) {
            session()->forget('oauth2state');
            session()-save();
            exit('Invalid state');

        } else {

            try {

                // Try to get an access token using the authorization code grant.
                $accessToken = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);

                // We have an access token, which we may use in authenticated
                // requests against the service provider's API.
                echo $accessToken->getToken() . "\n";
                echo $accessToken->getRefreshToken() . "\n";
                echo $accessToken->getExpires() . "\n";
                echo ($accessToken->hasExpired() ? 'expired' : 'not expired') . "\n";

                // Using the access token, we may look up details about the
                // resource owner.
                $resourceOwner = $provider->getResourceOwner($accessToken);

                var_export($resourceOwner->toArray());

                // The provider provides a way to get an authenticated API request for
                // the service, using the access token; it returns an object conforming
                // to Psr\Http\Message\RequestInterface.
                $request = $provider->getAuthenticatedRequest(
                    'GET',
                    'http://brentertainment.com/oauth2/lockdin/resource',
                    $accessToken
                );

            } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

                // Failed to get the access token or user details.
                exit($e->getMessage());

            }

        }
    }
}
