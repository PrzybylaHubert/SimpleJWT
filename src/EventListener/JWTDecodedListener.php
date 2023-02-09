<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\RequestStack;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;

/**
 * JWTDecodedListener
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class JWTDecodedListener
{
    public function __construct(
        private RequestStack $requestStack,
    ) {}
    /**
     * @param JWTDecodedEvent $event
     *
     * @return void
     */
    public function onJWTDecoded(JWTDecodedEvent $event)
    {
        $session = $this->requestStack->getSession();
        $payload = $event->getPayload();

        if($session->get('userEmail', '') !== $payload['username'])
        {
            $event->markAsInvalid();
        }
    }
}