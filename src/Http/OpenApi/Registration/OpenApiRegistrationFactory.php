<?php


namespace App\Http\OpenApi\Registration;


use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;

/**
 * @author Elessa Maxime <elessamaxime@icloud.com>
 * @package App\Http\OpenApi\Registration
 */
class OpenApiRegistrationFactory implements OpenApiFactoryInterface
{

    private OpenApiFactoryInterface $decorated;
    private RegistrationPath $registrationPath;

    public function __construct(OpenApiFactoryInterface $decorated, RegistrationPath $registrationPath)
    {
        $this->decorated = $decorated;
        $this->registrationPath = $registrationPath;
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);

        $openApi->getPaths()->addPath("/api/registration",
        $this->registrationPath->addRegister("Registration")
        );

        return $openApi;
    }
}