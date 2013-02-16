<?php
// src/Codopenex/UserBundle/EventListener/RegistrationListener.php

namespace Codopenex\UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\UserEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Listener responsible to add Role to user when they register
 * This gets registered by doing import at top of app/config/config.yml of resource: @CodopenexUserBundle/Resources/config/registration.xml
 */
class RegistrationListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_INITIALIZE => 'onRegistrationInitialize',
        );
    }

    public function onRegistrationInitialize(UserEvent $event)
    {
		$user = $event->getUser();
		$user->setRoles(array('ROLE_REGISTERED'));
    }
}