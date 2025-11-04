<?php

declare(strict_types=1);

namespace Bone\NativeApi;

use Barnacle\Container;
use Bone\Contracts\Container\ContainerInterface;
use Bone\Contracts\Container\DefaultSettingsProviderInterface;
use Bone\Contracts\Container\DependentPackagesProviderInterface;
use Bone\Contracts\Container\RegistrationInterface;
use Bone\OAuth2\Http\Middleware\ResourceServerMiddleware;
use Bone\Router\Router;
use Bone\Router\RouterConfigInterface;

class NativeApiPackage implements RegistrationInterface, DependentPackagesProviderInterface,  RouterConfigInterface, DefaultSettingsProviderInterface
{
    public function addToContainer(ContainerInterface $c): void {}

    public function addRoutes(Container $c, Router $router)
    {
        $demoApiRoute = $c->get('bone-native') ? $c->get('bone-native')['demoApiRoute'] : true;

        if ($demoApiRoute === true) {
            $auth = $c->get(ResourceServerMiddleware::class);
            $router->map('GET', '/listings', [DemoApiController::class, 'listings'])->middleware($auth);
            $router->map('POST', '/listings', [DemoApiController::class, 'addListing'])->middlewares([$auth, new JsonParse()]);
        }

        return $router;
    }

    public function getRequiredPackages(): array
    {
        return [
            'Bone\Mail\MailPackage',
            'Bone\BoneDoctrine\BoneDoctrinePackage',
            'Bone\Paseto\PasetoPackage',
            'Del\Person\PersonPackage',
            'Del\UserPackage',
            'Del\Passport\PassportPackage',
            'Bone\Passport\PassportPackage',
            'Bone\User\BoneUserPackage',
            'Bone\OAuth2\BoneOAuth2Package',
            'Bone\OpenApi\OpenApiPackage',
            'Bone\BoneUserApi\BoneUserApiPackage',
            'Bone\Settings\SettingsPackage',
            'Bone\Notification\PushToken\PushNotificationPackage',
            self::class
        ];
    }

    public function getSettingsFileName(): string
    {
        return __DIR__ . '/../data/config/bone-native.php';
    }
}
