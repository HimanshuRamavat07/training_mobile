<?php
declare(strict_types=1);

namespace NITSAN\NsMobile\EventListener;

use TYPO3\CMS\FrontendLogin\Event\BeforeRedirectEvent;

/**
 * The password 'joh316' was historically used as default password for
 * the TYPO3 install tool.
 * Today this password is an unsecure choice as it is well-known, too short
 * and does not contain capital letters or special characters.
 */
final class Joh316PasswordInvalidator
{
    public function __invoke(BeforeRedirectEvent $event): void
    {
        if ($event->getRedirectUrl()) {
            debug($event->getRedirectUrl()); exit;
            $event->setAsInvalid('This password is not allowed');
        }
        debug($event->getRedirectUrl()); exit;
    }   
}